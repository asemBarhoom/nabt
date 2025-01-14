<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Models\Tourevent;
use Carbon\Carbon;
use HELPER;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class ToureventController
{

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tourevents = Tourevent::query()
            ->when($request->input('name'), function ($query, $name) {
                $query->where('name->ar', 'LIKE', "%{$name}%")
                    ->orWhere('name->en', 'LIKE', "%{$name}%");
            })
            ->when($request->input('tourevent_id'), function ($query, $tourevent_id) {
                $query->where('id', $tourevent_id);
            })
            ->latest('id')
            ->paginate(15);

        return view('system_admin.tourevents.index', compact('tourevents'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('system_admin.tourevents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'position_ar' => 'required|string|max:255',
            'position_en' => 'required|string|max:255',
            'body_ar' => 'required|string',
            'body_en' => 'required|string',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'at' => 'nullable|date',
            'rating' => 'nullable|numeric', // Adjust if rating is numeric or a different type
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        // Create a new TourEvent instance
        $tourevent = new TourEvent();

        // Fill the validated data into the model
        $tourevent->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];
        $tourevent->position = [
            'ar' => $validatedData['position_ar'],
            'en' => $validatedData['position_en'],
        ];
        $tourevent->body = [
            'ar' => $validatedData['body_ar'],
            'en' => $validatedData['body_en'],
        ];
        $tourevent->description = [
            'ar' => $validatedData['description_ar'],
            'en' => $validatedData['description_en'],
        ];

        // Convert the 'at' field to a valid date format if it's provided
        if ($request->has('at') && $request->at) {
            $validatedData['at'] = Carbon::createFromFormat('m/d/Y', $validatedData['at'])->format('Y-m-d');
        }

        $tourevent->rating = $validatedData['rating'];
        $tourevent->category_id = $validatedData['category_id'];

        if ($request->image) {
            $image = FileHelper::uploadFile($request->image, 'public/tourevents');
            $image = str_replace('public/', '', $image);
            $tourevent->image = $image;
        }


        if ($request->cover_image) {
            $coverImagePath = $request->file('cover_image')->store('public/tourevents');
            $tourevent->cover_image = str_replace('public/', '', $coverImagePath);
        }

        $tourevent->save();
        flash('تم  الاضافة بنجاح');
        return redirect()->route('system.tourevents.index');
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

        $tourevent = Tourevent::find($id);
        // Update localized names
        $tourevent->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];

        // Handle image upload if a new image is provided
        if ($request->image) {
            $newImage = FileHelper::updateFile(
                'public/' . $tourevent->image,
                $request->image,
                'public/tourevents'
            );
            $tourevent->image = str_replace('public/', '', $newImage);
        }

        $tourevent->save();
        flash('تم التحديث بنجاح');
        return redirect()->route('system.tourevents.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param Tourevent $tourevent
     * @return Response
     */
    public function edit($id)
    {
        $data['tourevent'] = Tourevent::find($id);

        return isset($data['tourevent']) ? view('system_admin.tourevents.create', $data) : redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Tourevent $tourevents
     * @return Response
     */
    public function delete(Request $request)
    {
        if (is_array($request->id)) {
            foreach ($request->id as $id) {
                Tourevent::destroy($id);
            }
            return ['done' => 1];
        } else {
            $isDeleted = Tourevent::destroy($request->id);
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
            $o = Tourevent::find($id);
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
            $o = Tourevent::find($id);
            $o->status = 2;
            $o->save();
        }
        return ['done' => 1];

    }
}
