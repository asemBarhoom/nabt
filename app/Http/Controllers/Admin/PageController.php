<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use App\Helpers\FileHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class PageController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $pages = Page::query()
            ->when($request->input('name'), function ($query, $name) {
                $query->where('title->ar', 'LIKE', "%{$name}%")
                    ->orWhere('title->en', 'LIKE', "%{$name}%");
            })
            ->when($request->input('page_id'), function ($query, $page_id) {
                $query->where('id', $page_id);
            })
            ->latest('id')
            ->paginate(15);

        return view('system_admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('system_admin.pages.create');
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
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'body_ar' => 'required|string',
            'body_en' => 'required|string',
            'status' => 'nullable|boolean',
        ]);

        // Create a new Page record
        $page = new Page();
        $page->title = [
            'ar' => $validatedData['title_ar'],
            'en' => $validatedData['title_en'],
        ];
        $page->title = [
            'ar' => $validatedData['title_ar'],
            'en' => $validatedData['title_en'],
        ];
        $page->body = [
            'ar' => $validatedData['body_ar'],
            'en' => $validatedData['body_en'],
        ];
        $page->status = $validatedData['status'] ?? true; // Default to active if not provided

        // Handle file uploads if needed (e.g. images, documents)
        if ($request->image) {
            $image = FileHelper::uploadFile($request->image, 'public/pages');
            $image = str_replace('public/', '', $image);
            $page->image = $image;
        }

        // Save the Page
        $page->save();

        flash('تم  الاضافة بنجاح');
        return redirect()->route('system.pages.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Page $page
     * @return Response
     */
    public function edit($id)
    {
        $page = Page::find($id);

        return isset($page) ? view('system_admin.pages.create', compact('page')) : redirect()->back();
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
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'body_ar' => 'required|string',
            'body_en' => 'required|string',
            'status' => 'nullable|boolean',
        ]);

        $page = Page::findOrFail($id);

        // Update Page attributes
        $page->title = [
            'ar' => $validatedData['title_ar'],
            'en' => $validatedData['title_en'],
        ];
        $page->title = [
            'ar' => $validatedData['title_ar'],
            'en' => $validatedData['title_en'],
        ];
        $page->body = [
            'ar' => $validatedData['body_ar'],
            'en' => $validatedData['body_en'],
        ];
        $page->status = $validatedData['status'] ?? true;

        // Handle file upload if a new image is provided
        if ($request->image) {
            $newImage = FileHelper::updateFile(
                'public/' . $page->image,
                $request->image,
                'public/pages'
            );
            $page->image = str_replace('public/', '', $newImage);
        }

        // Save the updated Page
        $page->save();

        flash('تم التحديث بنجاح');
        return redirect()->route('system.pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Page $page
     * @return Response
     */
    public function delete(Request $request)
    {
        if (is_array($request->id)) {
            foreach ($request->id as $id) {
                Page::destroy($id);
            }
            return ['done' => 1];
        } else {
            $isDeleted = Page::destroy($request->id);
            return ['done' => $isDeleted];
        }
    }

    /**
     * Activate the specified resource.
     *
     * @param Request $request
     * @return Response
     */
    public function activate(Request $request)
    {
        $ids = is_array($request->id) ? $request->id : [$request->id];
        foreach ($ids as $id) {
            $page = Page::find($id);
            $page->status = 1;
            $page->save();
        }
        return ['done' => 1];
    }

    /**
     * Deactivate the specified resource.
     *
     * @param Request $request
     * @return Response
     */
    public function deactivate(Request $request)
    {
        $ids = is_array($request->id) ? $request->id : [$request->id];
        foreach ($ids as $id) {
            $page = Page::find($id);
            $page->status = 0;
            $page->save();
        }
        return ['done' => 1];
    }
}
