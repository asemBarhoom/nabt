<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Models\Destination;
use Carbon\Carbon;
use HELPER;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class DestinationController
{

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $destinations = Destination::query()
            ->withCount('favorites')
            ->withCount('images')
            ->withCount('testimonials')
            ->when($request->input('name'), function ($query, $name) {
                $query->where('name->ar', 'LIKE', "%{$name}%")
                    ->orWhere('name->en', 'LIKE', "%{$name}%");
            })
            ->when($request->input('category_id'), function ($query, $category_id) {
                $query->where('category_id', $category_id);
            })
            ->when($request->input('destination_id'), function ($query, $destination_id) {
                $query->where('id', $destination_id);
            })
            ->latest('id')
            ->paginate(15);

        return view('system_admin.destinations.index', compact('destinations'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('system_admin.destinations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
        ]);

        $destination = new Destination();
        $destination->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];

        if ($request->image) {
            $image = FileHelper::uploadFile($request->image, 'public/destinations');
            $image = str_replace('public/', '', $image);
            $destination->image = $image;
        }

        if ($request->cover_image) {
            $cover_image = FileHelper::uploadFile($request->cover_image, 'public/destinations');
            $cover_image = str_replace('public/', '', $cover_image);
            $destination->cover_image = $cover_image;
        }

        $destination->save();
        flash('تم  الاضافة بنجاح');
        return redirect()->route('system.destinations.index');
    }




    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return void
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
        ]);

        $destination = Destination::find($id);
        // Update localized names
        $destination->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];

        // Handle image upload if a new image is provided
        if ($request->image) {
            $newImage = FileHelper::updateFile(
                'public/' . $destination->image,
                $request->image,
                'public/destinations'
            );
            $destination->image = str_replace('public/', '', $newImage);
        }

        if ($request->cover_image) {
            $newImage = FileHelper::updateFile(
                'public/' . $destination->cover_image,
                $request->cover_image,
                'public/destinations'
            );
            $destination->cover_image = str_replace('public/', '', $newImage);
        }

        $destination->save();
        flash('تم التحديث بنجاح');
        return redirect()->route('system.destinations.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param Destination $testimonial
     * @return Response
     */
    public function edit($id)
    {
        $data['destination'] = Destination::find($id);

        return isset($data['destination']) ? view('system_admin.destinations.create', $data) : redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Destination $destinations
     * @return Response
     */
    public function delete(Request $request)
    {
        if (is_array($request->id)) {
            foreach ($request->id as $id) {
                Destination::destroy($id);
            }
            return ['done' => 1];
        } else {
            $isDeleted = Destination::destroy($request->id);
            return ['done' => $isDeleted];
        }
    }

    public function activate(Request $request)
    {
        $ids = [];
        if (is_array($request->id)) {
            $ids = $request->id;
        } else {
            $ids[] = $request->id;

        }
        foreach ($ids as $id) {
            $o = Destination::find($id);
            $o->status = 1;
            $o->save();

        }
        return ['done' => 1];

    }

    public function deactivate(Request $request)
    {
        $ids = [];
        if (is_array($request->id)) {
            $ids = $request->id;
        } else {
            $ids[] = $request->id;

        }
        foreach ($ids as $id) {
            $o = Destination::find($id);
            $o->status = 2;
            $o->save();
        }
        return ['done' => 1];

    }
}
