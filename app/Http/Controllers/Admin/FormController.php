<?php

namespace App\Http\Controllers\Admin;

use App\Models\Form;
use App\Helpers\FileHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class FormController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $forms = Form::query()
            ->when($request->input('name'), function ($query, $name) {
                $query->where('name->ar', 'LIKE', "%{$name}%")
                    ->orWhere('name->en', 'LIKE', "%{$name}%");
            })
            ->when($request->input('form_id'), function ($query, $form_id) {
                $query->where('id', $form_id);
            })
            ->latest('id')
            ->paginate(15);

        return view('system_admin.forms.index', compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('system_admin.forms.create');
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
                                                'name_ar' => 'required|string|max:255',
                                                'name_en' => 'required|string|max:255',
                                                'title_ar' => 'required|string|max:255',
                                                'title_en' => 'required|string|max:255',
                                                'body_ar' => 'required|string',
                                                'body_en' => 'required|string',
                                                'order' => 'required|integer',
                                                'status' => 'nullable|boolean',
                                            ]);

        // Create a new Form record
        $form = new Form();
        $form->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];
        $form->title = [
            'ar' => $validatedData['title_ar'],
            'en' => $validatedData['title_en'],
        ];
        $form->body = [
            'ar' => $validatedData['body_ar'],
            'en' => $validatedData['body_en'],
        ];
        $form->order = $validatedData['order'];
        $form->status = $validatedData['status'] ?? true; // Default to active if not provided

        // Handle file uploads if needed (e.g. images, documents)
        if ($request->image) {
            $image = FileHelper::uploadFile($request->image, 'public/forms');
            $image = str_replace('public/', '', $image);
            $form->image = $image;
        }

        // Save the Form
        $form->save();

        flash('تم  الاضافة بنجاح');
        return redirect()->route('system.forms.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Form $form
     * @return Response
     */
    public function edit($id)
    {
        $form = Form::find($id);

        return isset($form) ? view('system_admin.forms.create', compact('form')) : redirect()->back();
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
                                                'name_ar' => 'required|string|max:255',
                                                'name_en' => 'required|string|max:255',
                                                'title_ar' => 'required|string|max:255',
                                                'title_en' => 'required|string|max:255',
                                                'body_ar' => 'required|string',
                                                'body_en' => 'required|string',
                                                'order' => 'required|integer',
                                                'status' => 'nullable|boolean',
                                            ]);

        $form = Form::findOrFail($id);

        // Update Form attributes
        $form->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];
        $form->title = [
            'ar' => $validatedData['title_ar'],
            'en' => $validatedData['title_en'],
        ];
        $form->body = [
            'ar' => $validatedData['body_ar'],
            'en' => $validatedData['body_en'],
        ];
        $form->order = $validatedData['order'];
        $form->status = $validatedData['status'] ?? true;

        // Handle file upload if a new image is provided
        if ($request->image) {
            $newImage = FileHelper::updateFile(
                'public/' . $form->image,
                $request->image,
                'public/forms'
            );
            $form->image = str_replace('public/', '', $newImage);
        }

        // Save the updated Form
        $form->save();

        flash('تم التحديث بنجاح');
        return redirect()->route('system.forms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Form $form
     * @return Response
     */
    public function delete(Request $request)
    {
        if (is_array($request->id)) {
            foreach ($request->id as $id) {
                Form::destroy($id);
            }
            return ['done' => 1];
        } else {
            $isDeleted = Form::destroy($request->id);
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
            $form = Form::find($id);
            $form->status = 1;
            $form->save();
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
            $form = Form::find($id);
            $form->status = 0;
            $form->save();
        }
        return ['done' => 1];
    }
}
