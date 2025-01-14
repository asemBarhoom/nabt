<?php

namespace App\Http\Controllers\Admin;

use App\Models\Step;
use App\Helpers\FileHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class StepController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $steps = Step::query()
            ->when($request->input('name'), function ($query, $name) {
                $query->where('name->ar', 'LIKE', "%{$name}%")
                    ->orWhere('name->en', 'LIKE', "%{$name}%");
            })
            ->when($request->input('step_id'), function ($query, $step_id) {
                $query->where('id', $step_id);
            })
            ->latest('id')
            ->paginate(15);

        return view('system_admin.steps.index', compact('steps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('system_admin.steps.create');
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

        // Create a new Step record
        $step = new Step();
        $step->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];
        $step->title = [
            'ar' => $validatedData['title_ar'],
            'en' => $validatedData['title_en'],
        ];
        $step->body = [
            'ar' => $validatedData['body_ar'],
            'en' => $validatedData['body_en'],
        ];
        $step->order = $validatedData['order'];
        $step->status = $validatedData['status'] ?? true; // Default to active if not provided

        // Handle file uploads if needed (e.g. images, documents)
        if ($request->image) {
            $image = FileHelper::uploadFile($request->image, 'public/steps');
            $image = str_replace('public/', '', $image);
            $step->image = $image;
        }

        // Save the Step
        $step->save();

        flash('تم  الاضافة بنجاح');
        return redirect()->route('system.steps.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Step $step
     * @return Response
     */
    public function edit($id)
    {
        $step = Step::find($id);

        return isset($step) ? view('system_admin.steps.create', compact('step')) : redirect()->back();
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

        $step = Step::findOrFail($id);

        // Update Step attributes
        $step->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];
        $step->title = [
            'ar' => $validatedData['title_ar'],
            'en' => $validatedData['title_en'],
        ];
        $step->body = [
            'ar' => $validatedData['body_ar'],
            'en' => $validatedData['body_en'],
        ];
        $step->order = $validatedData['order'];
        $step->status = $validatedData['status'] ?? true;

        // Handle file upload if a new image is provided
        if ($request->image) {
            $newImage = FileHelper::updateFile(
                'public/' . $step->image,
                $request->image,
                'public/steps'
            );
            $step->image = str_replace('public/', '', $newImage);
        }

        // Save the updated Step
        $step->save();

        flash('تم التحديث بنجاح');
        return redirect()->route('system.steps.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Step $step
     * @return Response
     */
    public function delete(Request $request)
    {
        if (is_array($request->id)) {
            foreach ($request->id as $id) {
                Step::destroy($id);
            }
            return ['done' => 1];
        } else {
            $isDeleted = Step::destroy($request->id);
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
            $step = Step::find($id);
            $step->status = 1;
            $step->save();
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
            $step = Step::find($id);
            $step->status = 0;
            $step->save();
        }
        return ['done' => 1];
    }
}
