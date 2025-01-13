<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Models\Favorite;
use Carbon\Carbon;
use HELPER;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class FavoriteController
{

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $favorites = Favorite::query()
            ->when($request->input('name'), function ($query, $name) {
                $query->where('name->ar', 'LIKE', "%{$name}%")
                    ->orWhere('name->en', 'LIKE', "%{$name}%");
            })
            ->when($request->input('favorite_id'), function ($query, $favorite_id) {
                $query->where('id', $favorite_id);
            })
            ->latest('id')
            ->paginate(15);

        return view('system_admin.favorites.index', compact('favorites'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('system_admin.favorites.create');
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

        $favorite = new Favorite();
        $favorite->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];

        if ($request->image) {
            $image = FileHelper::uploadFile($request->image, 'public/favorites');
            $image = str_replace('public/', '', $image);
            $favorite->image = $image;
        }

        $favorite->save();
        flash('تم  الاضافة بنجاح');
        return redirect()->route('system.favorites.index');
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

        $favorite = Favorite::find($id);
        // Update localized names
        $favorite->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];

        // Handle image upload if a new image is provided
        if ($request->image) {
            $newImage = FileHelper::updateFile(
                'public/' . $favorite->image,
                $request->image,
                'public/favorites'
            );
            $favorite->image = str_replace('public/', '', $newImage);
        }

        $favorite->save();
        flash('تم التحديث بنجاح');
        return redirect()->route('system.favorites.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param Favorite $favorite
     * @return Response
     */
    public function edit($id)
    {
        $data['favorite'] = Favorite::find($id);

        return isset($data['favorite']) ? view('system_admin.favorites.create', $data) : redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Favorite $favorites
     * @return Response
     */
    public function delete(Request $request)
    {
        if (is_array($request->id)) {
            foreach ($request->id as $id) {
                Favorite::destroy($id);
            }
            return ['done' => 1];
        } else {
            $isDeleted = Favorite::destroy($request->id);
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
            $o = Favorite::find($id);
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
            $o = Favorite::find($id);
            $o->status = 2;
            $o->save();
        }
        return ['done' => 1];

    }
}
