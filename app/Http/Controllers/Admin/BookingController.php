<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use App\Helpers\FileHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class BookingController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $bookings = Booking::query()
            ->when($request->user_id, function ($query, $user_id) {
                $query->where('user_id', "{$user_id}");
            })
            ->when($request->input('name'), function ($query, $name) {
                $query->where('title->ar', 'LIKE', "%{$name}%")
                    ->orWhere('title->en', 'LIKE', "%{$name}%");
            })
            ->when($request->input('booking_id'), function ($query, $booking_id) {
                $query->where('id', $booking_id);
            })
            ->latest('id')
            ->paginate(15);

        return view('system_admin.bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('system_admin.bookings.create');
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

        // Create a new Booking record
        $booking = new Booking();
        $booking->title = [
            'ar' => $validatedData['title_ar'],
            'en' => $validatedData['title_en'],
        ];
        $booking->title = [
            'ar' => $validatedData['title_ar'],
            'en' => $validatedData['title_en'],
        ];
        $booking->body = [
            'ar' => $validatedData['body_ar'],
            'en' => $validatedData['body_en'],
        ];
        $booking->status = $validatedData['status'] ?? true; // Default to active if not provided

        // Handle file uploads if needed (e.g. images, documents)
        if ($request->image) {
            $image = FileHelper::uploadFile($request->image, 'public/bookings');
            $image = str_replace('public/', '', $image);
            $booking->image = $image;
        }

        // Save the Booking
        $booking->save();

        flash('تم  الاضافة بنجاح');
        return redirect()->route('system.bookings.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Booking $booking
     * @return Response
     */
    public function edit($id)
    {
        $booking = Booking::find($id);

        return isset($booking) ? view('system_admin.bookings.create', compact('booking')) : redirect()->back();
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

        $booking = Booking::findOrFail($id);

        // Update Booking attributes
        $booking->title = [
            'ar' => $validatedData['title_ar'],
            'en' => $validatedData['title_en'],
        ];
        $booking->title = [
            'ar' => $validatedData['title_ar'],
            'en' => $validatedData['title_en'],
        ];
        $booking->body = [
            'ar' => $validatedData['body_ar'],
            'en' => $validatedData['body_en'],
        ];
        $booking->status = $validatedData['status'] ?? true;

        // Handle file upload if a new image is provided
        if ($request->image) {
            $newImage = FileHelper::updateFile(
                'public/' . $booking->image,
                $request->image,
                'public/bookings'
            );
            $booking->image = str_replace('public/', '', $newImage);
        }

        // Save the updated Booking
        $booking->save();

        flash('تم التحديث بنجاح');
        return redirect()->route('system.bookings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Booking $booking
     * @return Response
     */
    public function delete(Request $request)
    {
        if (is_array($request->id)) {
            foreach ($request->id as $id) {
                Booking::destroy($id);
            }
            return ['done' => 1];
        } else {
            $isDeleted = Booking::destroy($request->id);
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
            $booking = Booking::find($id);
            $booking->status = 1;
            $booking->save();
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
            $booking = Booking::find($id);
            $booking->status = 0;
            $booking->save();
        }
        return ['done' => 1];
    }
}
