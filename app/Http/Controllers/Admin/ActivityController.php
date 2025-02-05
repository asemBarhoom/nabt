<?php

namespace App\Http\Controllers\Admin;

use App\Models\Activity;
use App\Helpers\FileHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class ActivityController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $activities = Activity::query()
            ->with('user')
            ->when($request->input('name'), function ($query, $name) {
                $query->where('name->ar', 'LIKE', "%{$name}%")
                    ->orWhere('name->en', 'LIKE', "%{$name}%");
            })
            ->when($request->input('activity_id'), function ($query, $activity_id) {
                $query->where('id', $activity_id);
            })
            ->latest('id')
            ->paginate(15);

        return view('system_admin.activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('system_admin.activities.create');
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

        // Create a new Activity record
        $activity = new Activity();
        $activity->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];
        $activity->title = [
            'ar' => $validatedData['title_ar'],
            'en' => $validatedData['title_en'],
        ];
        $activity->body = [
            'ar' => $validatedData['body_ar'],
            'en' => $validatedData['body_en'],
        ];
        $activity->order = $validatedData['order'];
        $activity->status = $validatedData['status'] ?? true; // Default to active if not provided

        // Handle file uploads if needed (e.g. images, documents)
        if ($request->image) {
            $image = FileHelper::uploadFile($request->image, 'public/activities');
            $image = str_replace('public/', '', $image);
            $activity->image = $image;
        }

        // Save the Activity
        $activity->save();

        flash('تم  الاضافة بنجاح');
        return redirect()->route('system.activities.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Activity $activity
     * @return Response
     */
    public function edit($id)
    {
        $activity = Activity::find($id);

        return isset($activity) ? view('system_admin.activities.create', compact('activity')) : redirect()->back();
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

        $activity = Activity::findOrFail($id);

        // Update Activity attributes
        $activity->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];
        $activity->title = [
            'ar' => $validatedData['title_ar'],
            'en' => $validatedData['title_en'],
        ];
        $activity->body = [
            'ar' => $validatedData['body_ar'],
            'en' => $validatedData['body_en'],
        ];
        $activity->order = $validatedData['order'];
        $activity->status = $validatedData['status'] ?? true;

        // Handle file upload if a new image is provided
        if ($request->image) {
            $newImage = FileHelper::updateFile(
                'public/' . $activity->image,
                $request->image,
                'public/activities'
            );
            $activity->image = str_replace('public/', '', $newImage);
        }

        // Save the updated Activity
        $activity->save();

        flash('تم التحديث بنجاح');
        return redirect()->route('system.activities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Activity $activity
     * @return Response
     */
    public function delete(Request $request)
    {
        if (is_array($request->id)) {
            foreach ($request->id as $id) {
                Activity::destroy($id);
            }
            return ['done' => 1];
        } else {
            $isDeleted = Activity::destroy($request->id);
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
            $activity = Activity::find($id);
            $activity->status = 1;
            $activity->save();
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
            $activity = Activity::find($id);
            $activity->status = 0;
            $activity->save();
        }
        return ['done' => 1];
    }
}
