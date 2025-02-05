<?php

namespace App\Http\Controllers\Admin;

use App\Models\Inbox;
use App\Helpers\FileHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class InboxController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $inboxs = Inbox::query()
            ->when($request->input('name'), function ($query, $name) {
                $query->where('name->ar', 'LIKE', "%{$name}%")
                    ->orWhere('name->en', 'LIKE', "%{$name}%");
            })
            ->when($request->input('inbox_id'), function ($query, $inbox_id) {
                $query->where('id', $inbox_id);
            })
            ->latest('id')
            ->paginate(15);

        return view('system_admin.inboxs.index', compact('inboxs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('system_admin.inboxs.create');
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

        // Create a new Inbox record
        $inbox = new Inbox();
        $inbox->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];
        $inbox->title = [
            'ar' => $validatedData['title_ar'],
            'en' => $validatedData['title_en'],
        ];
        $inbox->body = [
            'ar' => $validatedData['body_ar'],
            'en' => $validatedData['body_en'],
        ];
        $inbox->order = $validatedData['order'];
        $inbox->status = $validatedData['status'] ?? true; // Default to active if not provided

        // Handle file uploads if needed (e.g. images, documents)
        if ($request->image) {
            $image = FileHelper::uploadFile($request->image, 'public/inboxs');
            $image = str_replace('public/', '', $image);
            $inbox->image = $image;
        }

        // Save the Inbox
        $inbox->save();

        flash('تم  الاضافة بنجاح');
        return redirect()->route('system.inboxs.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Inbox $inbox
     * @return Response
     */
    public function edit($id)
    {
        $inbox = Inbox::find($id);

        return isset($inbox) ? view('system_admin.inboxs.create', compact('inbox')) : redirect()->back();
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

        $inbox = Inbox::findOrFail($id);

        // Update Inbox attributes
        $inbox->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];
        $inbox->title = [
            'ar' => $validatedData['title_ar'],
            'en' => $validatedData['title_en'],
        ];
        $inbox->body = [
            'ar' => $validatedData['body_ar'],
            'en' => $validatedData['body_en'],
        ];
        $inbox->order = $validatedData['order'];
        $inbox->status = $validatedData['status'] ?? true;

        // Handle file upload if a new image is provided
        if ($request->image) {
            $newImage = FileHelper::updateFile(
                'public/' . $inbox->image,
                $request->image,
                'public/inboxs'
            );
            $inbox->image = str_replace('public/', '', $newImage);
        }

        // Save the updated Inbox
        $inbox->save();

        flash('تم التحديث بنجاح');
        return redirect()->route('system.inboxs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Inbox $inbox
     * @return Response
     */
    public function delete(Request $request)
    {
        if (is_array($request->id)) {
            foreach ($request->id as $id) {
                Inbox::destroy($id);
            }
            return ['done' => 1];
        } else {
            $isDeleted = Inbox::destroy($request->id);
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
            $inbox = Inbox::find($id);
            $inbox->status = 1;
            $inbox->save();
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
            $inbox = Inbox::find($id);
            $inbox->status = 0;
            $inbox->save();
        }
        return ['done' => 1];
    }
}
