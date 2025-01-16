<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class CountryController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $countries = Country::query()
            ->withCount('cities')
            ->when($request->country_id, function ($query, $country_id) {
                $query->where('id',  "{$country_id}");
            })
            ->when($request->input('name'), function ($query, $name) {
                $query->where('name->ar', 'LIKE', "%{$name}%")
                    ->orWhere('name->en', 'LIKE', "%{$name}%");
            })
            ->latest('id')
            ->paginate(15);

        return view('system_admin.countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('system_admin.countries.create');
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

        $country = new Country();
        $country->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];
        $country->body = [
            'ar' => $validatedData['body_ar'],
            'en' => $validatedData['body_en'],
        ];

        $country->status = $validatedData['status'] ?? true; // Default to true if not provided

        if ($request->image) {
            $image = FileHelper::uploadFile($request->image, 'public/countries');
            $image = str_replace('public/', '', $image);
            $country->image = $image;
        }

        $country->save();
        flash('تم  الاضافة بنجاح');
        return redirect()->route('system.countries.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Country $country
     * @return Response
     */
    public function edit($id)
    {
        $country = Country::find($id);

        return isset($country) ? view('system_admin.countries.create', compact('country')) : redirect()->back();
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

        $country = Country::findOrFail($id);

        $country->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];
        $country->body = [
            'ar' => $validatedData['body_ar'],
            'en' => $validatedData['body_en'],
        ];

        $country->status = $validatedData['status'] ?? $country->status; // Keep current status if not provided

        // Handle image upload if a new image is provided
        if ($request->image) {
            $newImage = FileHelper::updateFile(
                'public/' . $country->image,
                $request->image,
                'public/countries'
            );
            $country->image = str_replace('public/', '', $newImage);
        }

        $country->save();
        flash('تم التحديث بنجاح');
        return redirect()->route('system.countries.index');
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
                Country::destroy($id);
            }
            return ['done' => 1];
        } else {
            $isDeleted = Country::destroy($request->id);
            return ['done' => $isDeleted];
        }
    }

    /**
     * Activate the specified country(s).
     *
     * @param Request $request
     * @return Response
     */
    public function activate(Request $request)
    {
        $ids = is_array($request->id) ? $request->id : [$request->id];

        foreach ($ids as $id) {
            $country = Country::find($id);
            $country->status = true;
            $country->save();
        }

        return ['done' => 1];
    }

    /**
     * Deactivate the specified country(s).
     *
     * @param Request $request
     * @return Response
     */
    public function deactivate(Request $request)
    {
        $ids = is_array($request->id) ? $request->id : [$request->id];

        foreach ($ids as $id) {
            $country = Country::find($id);
            $country->status = false;
            $country->save();
        }

        return ['done' => 1];
    }
}
