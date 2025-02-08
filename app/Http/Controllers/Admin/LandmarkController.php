<?php

namespace App\Http\Controllers\Admin;

use App\Models\Landmark;
use App\Helpers\FileHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class LandmarkController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $landmarks = Landmark::query()
            ->when($request->input('name'), function ($query, $name) {
                $query->where('name->ar', 'LIKE', "%{$name}%")
                    ->orWhere('name->en', 'LIKE', "%{$name}%");
            })
            ->when($request->input('landmark_id'), function ($query, $landmark_id) {
                $query->where('id', $landmark_id);
            })
            ->latest('id')
            ->paginate(15);

        return view('system_admin.landmarks.index', compact('landmarks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('system_admin.landmarks.create');
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

        // Create a new Landmark record
        $landmark = new Landmark();
        $landmark->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];
        $landmark->title = [
            'ar' => $validatedData['title_ar'],
            'en' => $validatedData['title_en'],
        ];
        $landmark->body = [
            'ar' => $validatedData['body_ar'],
            'en' => $validatedData['body_en'],
        ];
        $landmark->order = $validatedData['order'];
        $landmark->status = $validatedData['status'] ?? true; // Default to active if not provided

        // Handle file uploads if needed (e.g. images, documents)
        if ($request->image) {
            $image = FileHelper::uploadFile($request->image, 'public/landmarks');
            $image = str_replace('public/', '', $image);
            $landmark->image = $image;
        }

        // Save the Landmark
        $landmark->save();

        flash('تم  الاضافة بنجاح');
        return redirect()->route('system.landmarks.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Landmark $landmark
     * @return Response
     */
    public function edit($id)
    {
        $landmark = Landmark::find($id);

        return isset($landmark) ? view('system_admin.landmarks.create', compact('landmark')) : redirect()->back();
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

        $landmark = Landmark::findOrFail($id);

        // Update Landmark attributes
        $landmark->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];
        $landmark->title = [
            'ar' => $validatedData['title_ar'],
            'en' => $validatedData['title_en'],
        ];
        $landmark->body = [
            'ar' => $validatedData['body_ar'],
            'en' => $validatedData['body_en'],
        ];
        $landmark->order = $validatedData['order'];
        $landmark->status = $validatedData['status'] ?? true;

        // Handle file upload if a new image is provided
        if ($request->image) {
            $newImage = FileHelper::updateFile(
                'public/' . $landmark->image,
                $request->image,
                'public/landmarks'
            );
            $landmark->image = str_replace('public/', '', $newImage);
        }

        // Save the updated Landmark
        $landmark->save();

        flash('تم التحديث بنجاح');
        return redirect()->route('system.landmarks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Landmark $landmark
     * @return Response
     */
    public function delete(Request $request)
    {
        if (is_array($request->id)) {
            foreach ($request->id as $id) {
                Landmark::destroy($id);
            }
            return ['done' => 1];
        } else {
            $isDeleted = Landmark::destroy($request->id);
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
            $landmark = Landmark::find($id);
            $landmark->status = 1;
            $landmark->save();
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
            $landmark = Landmark::find($id);
            $landmark->status = 0;
            $landmark->save();
        }
        return ['done' => 1];
    }
}
