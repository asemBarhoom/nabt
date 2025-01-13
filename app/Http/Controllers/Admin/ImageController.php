<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Models\Image;
use Carbon\Carbon;
use HELPER;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class ImageController
{

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $images = Image::query()
            ->when($request->input('image_id'), function ($query, $image_id) {
                $query->where('id', $image_id);
            })
            ->latest('id')
            ->paginate(15);

        return view('system_admin.images.index', compact('images'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('system_admin.images.create');
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

        $image = new Image();
        $image->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];

        if ($request->image) {
            $image = FileHelper::uploadFile($request->image, 'public/images');
            $image = str_replace('public/', '', $image);
            $image->image = $image;
        }

        $image->save();
        flash('تم  الاضافة بنجاح');
        return redirect()->route('system.images.index');
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

        $image = Image::find($id);
        // Update localized names
        $image->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];

        // Handle image upload if a new image is provided
        if ($request->image) {
            $newImage = FileHelper::updateFile(
                'public/' . $image->image,
                $request->image,
                'public/images'
            );
            $image->image = str_replace('public/', '', $newImage);
        }

        $image->save();
        flash('تم التحديث بنجاح');
        return redirect()->route('system.images.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param Image $image
     * @return Response
     */
    public function edit($id)
    {
        $data['image'] = Image::find($id);

        return isset($data['image']) ? view('system_admin.images.create', $data) : redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Image $images
     * @return Response
     */
    public function delete(Request $request)
    {
        if (is_array($request->id)) {
            foreach ($request->id as $id) {
                Image::destroy($id);
            }
            return ['done' => 1];
        } else {
            $isDeleted = Image::destroy($request->id);
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
            $o = Image::find($id);
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
            $o = Image::find($id);
            $o->status = 2;
            $o->save();
        }
        return ['done' => 1];

    }
}
