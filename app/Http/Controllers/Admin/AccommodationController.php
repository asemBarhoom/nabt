<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Models\Accommodation;
use Carbon\Carbon;
use HELPER;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class AccommodationController
{

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $accommodations = Accommodation::query()
            ->when($request->input('name'), function ($query, $name) {
                $query->where('name->ar', 'LIKE', "%{$name}%")
                    ->orWhere('name->en', 'LIKE', "%{$name}%");
            })
            ->when($request->input('accommodation_id'), function ($query, $accommodation_id) {
                $query->where('id', $accommodation_id);
            })
            ->latest('id')
            ->paginate(15);

        return view('system_admin.accommodations.index', compact('accommodations'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('system_admin.accommodations.create');
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

        $accommodation = new Accommodation();
        $accommodation->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];

        if ($request->image) {
            $image = FileHelper::uploadFile($request->image, 'public/accommodations');
            $image = str_replace('public/', '', $image);
            $accommodation->image = $image;
        }

        $accommodation->save();
        flash('تم  الاضافة بنجاح');
        return redirect()->route('system.accommodations.index');
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

        $accommodation = Accommodation::find($id);
        // Update localized names
        $accommodation->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];

        // Handle image upload if a new image is provided
        if ($request->image) {
            $newImage = FileHelper::updateFile(
                'public/' . $accommodation->image,
                $request->image,
                'public/accommodations'
            );
            $accommodation->image = str_replace('public/', '', $newImage);
        }

        $accommodation->save();
        flash('تم التحديث بنجاح');
        return redirect()->route('system.accommodations.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param Accommodation $accommodation
     * @return Response
     */
    public function edit($id)
    {
        $data['accommodation'] = Accommodation::find($id);

        return isset($data['accommodation']) ? view('system_admin.accommodations.create', $data) : redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Accommodation $accommodations
     * @return Response
     */
    public function delete(Request $request)
    {
        if (is_array($request->id)) {
            foreach ($request->id as $id) {
                Accommodation::destroy($id);
            }
            return ['done' => 1];
        } else {
            $isDeleted = Accommodation::destroy($request->id);
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
            $o = Accommodation::find($id);
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
            $o = Accommodation::find($id);
            $o->status = 2;
            $o->save();
        }
        return ['done' => 1];

    }
}
