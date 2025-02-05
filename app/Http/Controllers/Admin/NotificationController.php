<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\ValidationException;

class NotificationController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $notifications = DatabaseNotification::query()
            ->when($request->input('name'), function ($query, $name) {
                $query->whereHas('notifiable', function ($query) use ($name) {
                    $query->where('name', 'LIKE', "%{$name}%");
                });


            })

            ->latest('id')
            ->paginate(15);

        return view('system_admin.notifications.index', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('system_admin.notifications.create');
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

        // Create a new Notification record
        $notification = new Notification();
        $notification->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];
        $notification->title = [
            'ar' => $validatedData['title_ar'],
            'en' => $validatedData['title_en'],
        ];
        $notification->body = [
            'ar' => $validatedData['body_ar'],
            'en' => $validatedData['body_en'],
        ];
        $notification->order = $validatedData['order'];
        $notification->status = $validatedData['status'] ?? true; // Default to active if not provided

        // Handle file uploads if needed (e.g. images, documents)
        if ($request->image) {
            $image = FileHelper::uploadFile($request->image, 'public/notifications');
            $image = str_replace('public/', '', $image);
            $notification->image = $image;
        }

        // Save the Notification
        $notification->save();

        flash('تم  الاضافة بنجاح');
        return redirect()->route('system.notifications.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Notification $notification
     * @return Response
     */
    public function edit($id)
    {
        $notification = Notification::find($id);

        return isset($notification) ? view('system_admin.notifications.create', compact('notification')) : redirect()->back();
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

        $notification = Notification::findOrFail($id);

        // Update Notification attributes
        $notification->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];
        $notification->title = [
            'ar' => $validatedData['title_ar'],
            'en' => $validatedData['title_en'],
        ];
        $notification->body = [
            'ar' => $validatedData['body_ar'],
            'en' => $validatedData['body_en'],
        ];
        $notification->order = $validatedData['order'];
        $notification->status = $validatedData['status'] ?? true;

        // Handle file upload if a new image is provided
        if ($request->image) {
            $newImage = FileHelper::updateFile(
                'public/' . $notification->image,
                $request->image,
                'public/notifications'
            );
            $notification->image = str_replace('public/', '', $newImage);
        }

        // Save the updated Notification
        $notification->save();

        flash('تم التحديث بنجاح');
        return redirect()->route('system.notifications.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Notification $notification
     * @return Response
     */
    public function delete(Request $request)
    {
        if (is_array($request->id)) {
            foreach ($request->id as $id) {
                Notification::destroy($id);
            }
            return ['done' => 1];
        } else {
            $isDeleted = Notification::destroy($request->id);
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
            $notification = Notification::find($id);
            $notification->status = 1;
            $notification->save();
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
            $notification = Notification::find($id);
            $notification->status = 0;
            $notification->save();
        }
        return ['done' => 1];
    }
}
