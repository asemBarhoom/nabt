<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cancellation;
use App\Helpers\FileHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class CancellationController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $cancellations = Cancellation::query()
            ->when($request->input('name'), function ($query, $name) {
                $query->where('name->ar', 'LIKE', "%{$name}%")
                    ->orWhere('name->en', 'LIKE', "%{$name}%");
            })
            ->when($request->input('cancellation_id'), function ($query, $cancellation_id) {
                $query->where('id', $cancellation_id);
            })
            ->latest('id')
            ->paginate(15);

        return view('system_admin.cancellations.index', compact('cancellations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('system_admin.cancellations.create');
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

        // Create a new Cancellation record
        $cancellation = new Cancellation();
        $cancellation->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];
        $cancellation->title = [
            'ar' => $validatedData['title_ar'],
            'en' => $validatedData['title_en'],
        ];
        $cancellation->body = [
            'ar' => $validatedData['body_ar'],
            'en' => $validatedData['body_en'],
        ];
        $cancellation->order = $validatedData['order'];
        $cancellation->status = $validatedData['status'] ?? true; // Default to active if not provided

        // Handle file uploads if needed (e.g. images, documents)
        if ($request->image) {
            $image = FileHelper::uploadFile($request->image, 'public/cancellations');
            $image = str_replace('public/', '', $image);
            $cancellation->image = $image;
        }

        // Save the Cancellation
        $cancellation->save();

        flash('تم  الاضافة بنجاح');
        return redirect()->route('system.cancellations.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Cancellation $cancellation
     * @return Response
     */
    public function edit($id)
    {
        $cancellation = Cancellation::find($id);

        return isset($cancellation) ? view('system_admin.cancellations.create', compact('cancellation')) : redirect()->back();
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

        $cancellation = Cancellation::findOrFail($id);

        // Update Cancellation attributes
        $cancellation->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];
        $cancellation->title = [
            'ar' => $validatedData['title_ar'],
            'en' => $validatedData['title_en'],
        ];
        $cancellation->body = [
            'ar' => $validatedData['body_ar'],
            'en' => $validatedData['body_en'],
        ];
        $cancellation->order = $validatedData['order'];
        $cancellation->status = $validatedData['status'] ?? true;

        // Handle file upload if a new image is provided
        if ($request->image) {
            $newImage = FileHelper::updateFile(
                'public/' . $cancellation->image,
                $request->image,
                'public/cancellations'
            );
            $cancellation->image = str_replace('public/', '', $newImage);
        }

        // Save the updated Cancellation
        $cancellation->save();

        flash('تم التحديث بنجاح');
        return redirect()->route('system.cancellations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Cancellation $cancellation
     * @return Response
     */
    public function delete(Request $request)
    {
        if (is_array($request->id)) {
            foreach ($request->id as $id) {
                Cancellation::destroy($id);
            }
            return ['done' => 1];
        } else {
            $isDeleted = Cancellation::destroy($request->id);
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
            $cancellation = Cancellation::find($id);
            $cancellation->status = 1;
            $cancellation->save();
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
            $cancellation = Cancellation::find($id);
            $cancellation->status = 0;
            $cancellation->save();
        }
        return ['done' => 1];
    }
}
