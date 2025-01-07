<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Models\Category;
use Carbon\Carbon;
use HELPER;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class CategoryController
{

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $categories = Category::query()
            ->when($request->input('name'), function ($query, $name) {
                $query->where('name->ar', 'LIKE', "%{$name}%")
                    ->orWhere('name->en', 'LIKE', "%{$name}%");
            })
            ->latest('id')
            ->paginate(15);

        return view('system_admin.categories.index', compact('categories'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('system_admin.categories.create');
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

        $category = new Category();
        $category->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];

        if ($request->image) {
            $image = FileHelper::uploadFile($request->image, 'public/categories');
            $image = str_replace('public/', '', $image);
            $category->image = $image;
        }

        $category->save();
        flash('تم  الاضافة بنجاح');
        return redirect()->route('system.categories.index');
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

        $category = Category::find($id);
        // Update localized names
        $category->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];

        // Handle image upload if a new image is provided
        if ($request->image) {
            $newImage = FileHelper::updateFile(
                'public/' . $category->image,
                $request->image,
                'public/categories'
            );
            $category->image = str_replace('public/', '', $newImage);
        }

        $category->save();
        flash('تم التحديث بنجاح');
        return redirect()->route('system.categories.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $testimonial
     * @return Response
     */
    public function edit($id)
    {
        $data['category'] = Category::find($id);

        return isset($data['category']) ? view('system_admin.categories.create', $data) : redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $categories
     * @return Response
     */
    public function delete(Request $request)
    {
        if (is_array($request->id)) {
            foreach ($request->id as $id) {
                Category::destroy($id);
            }
            return ['done' => 1];
        } else {
            $isDeleted = Category::destroy($request->id);
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
            $o = Category::find($id);
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
            $o = Category::find($id);
            $o->status = 2;
            $o->save();
        }
        return ['done' => 1];

    }
}
