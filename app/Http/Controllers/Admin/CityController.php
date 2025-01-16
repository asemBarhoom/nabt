<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class CityController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $cities = City::query()
            ->when($request->country_id, function ($query, $country_id) {
                $query->where('country_id',  "{$country_id}");
            })
            ->when($request->input('name'), function ($query, $name) {
                $query->where('name->ar', 'LIKE', "%{$name}%")
                    ->orWhere('name->en', 'LIKE', "%{$name}%");
            })
            ->latest('id')
            ->paginate(15);

        return view('system_admin.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('system_admin.cities.create');
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
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'body_ar' => 'required|string',
            'body_en' => 'required|string',
            'status'  => 'nullable|boolean',
        ]);

        $city = new City();
        $city->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];
        $city->body = [
            'ar' => $validatedData['body_ar'],
            'en' => $validatedData['body_en'],
        ];

        $city->status = $validatedData['status'] ?? true; // Default to true if not provided

        if ($request->image) {
            $image = FileHelper::uploadFile($request->image, 'public/cities');
            $image = str_replace('public/', '', $image);
            $city->image = $image;
        }

        $city->save();
        flash('تم  الاضافة بنجاح');
        return redirect()->route('system.cities.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param City $city
     * @return Response
     */
    public function edit($id)
    {
        $city = City::find($id);

        return isset($city) ? view('system_admin.cities.create', compact('city')) : redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'body_ar' => 'required|string',
            'body_en' => 'required|string',
            'status'  => 'nullable|boolean',
        ]);

        $city = City::findOrFail($id);

        $city->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];
        $city->body = [
            'ar' => $validatedData['body_ar'],
            'en' => $validatedData['body_en'],
        ];

        $city->status = $validatedData['status'] ?? $city->status; // Keep current status if not provided

        // Handle image upload if a new image is provided
        if ($request->image) {
            $newImage = FileHelper::updateFile(
                'public/' . $city->image,
                $request->image,
                'public/cities'
            );
            $city->image = str_replace('public/', '', $newImage);
        }

        $city->save();
        flash('تم التحديث بنجاح');
        return redirect()->route('system.cities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return Response
     */
    public function delete(Request $request)
    {
        if (is_array($request->id)) {
            foreach ($request->id as $id) {
                City::destroy($id);
            }
            return ['done' => 1];
        } else {
            $isDeleted = City::destroy($request->id);
            return ['done' => $isDeleted];
        }
    }

    /**
     * Activate the specified city(s).
     *
     * @param Request $request
     * @return Response
     */
    public function activate(Request $request)
    {
        $ids = is_array($request->id) ? $request->id : [$request->id];

        foreach ($ids as $id) {
            $city = City::find($id);
            $city->status = true;
            $city->save();
        }

        return ['done' => 1];
    }

    /**
     * Deactivate the specified city(s).
     *
     * @param Request $request
     * @return Response
     */
    public function deactivate(Request $request)
    {
        $ids = is_array($request->id) ? $request->id : [$request->id];

        foreach ($ids as $id) {
            $city = City::find($id);
            $city->status = false;
            $city->save();
        }

        return ['done' => 1];
    }
}
