<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Models\Destination;
use Carbon\Carbon;
use HELPER;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class DestinationController
{

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $destinations = Destination::query()
            ->withCount('favorites')
            ->withCount('images')
            ->withCount('testimonials')
            ->when($request->input('name'), function ($query, $name) {
                $query->where('name->ar', 'LIKE', "%{$name}%")
                    ->orWhere('name->en', 'LIKE', "%{$name}%");
            })
            ->when($request->input('category_id'), function ($query, $category_id) {
                $query->where('category_id', $category_id);
            })
            ->when($request->input('destination_id'), function ($query, $destination_id) {
                $query->where('id', $destination_id);
            })
            ->latest('id')
            ->paginate(15);

        return view('system_admin.destinations.index', compact('destinations'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('system_admin.destinations.create');
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'weather_description_ar' => 'nullable|string|max:500',
            'weather_description_en' => 'nullable|string|max:500',
            'amenities_ar' => 'nullable|string|max:500',
            'amenities_en' => 'nullable|string|max:500',
            'recommended_visit_season_ar' => 'nullable|string|max:255',
            'recommended_visit_season_en' => 'nullable|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'lat' => 'nullable|numeric',
            'lng' => 'nullable|numeric',
            'annual_visitors_min' => 'nullable|numeric|min:0',
            'annual_visitors_max' => 'nullable|numeric|min:0',
            'body_ar' => 'required|string',
            'body_en' => 'required|string',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
        ]);


        $destination = new Destination();
        $destination->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];
        $destination->slug = str_replace(' ','_',$validatedData['name_en']);

        $destination->weather_description = [
            'ar' => $validatedData['weather_description_ar'],
            'en' => $validatedData['weather_description_en'],
        ];

        $destination->amenities = [
            'ar' => $validatedData['amenities_ar'],
            'en' => $validatedData['amenities_en'],
        ];

        $destination->recommended_visit_season = [
            'ar' => $validatedData['recommended_visit_season_ar'],
            'en' => $validatedData['recommended_visit_season_en'],
        ];

        $destination->body = [
            'ar' => $validatedData['body_ar'],
            'en' => $validatedData['body_en'],
        ];

        $destination->description = [
            'ar' => $validatedData['description_ar'],
            'en' => $validatedData['description_en'],
        ];

        // Update category and location
        $destination->category_id = $validatedData['category_id'];
        $destination->lat = $validatedData['lat'];
        $destination->lng = $validatedData['lng'];

        $destination->annual_visitors_min = $validatedData['annual_visitors_min'];
        $destination->annual_visitors_max = $validatedData['annual_visitors_max'];

        if ($request->image) {
            $image = FileHelper::uploadFile($request->image, 'public/destinations');
            $image = str_replace('public/', '', $image);
            $destination->image = $image;
        }

        if ($request->cover_image) {
            $cover_image = FileHelper::uploadFile($request->cover_image, 'public/destinations');
            $cover_image = str_replace('public/', '', $cover_image);
            $destination->cover_image = $cover_image;
        }

        $destination->save();
        flash('تم  الاضافة بنجاح');
        return redirect()->route('system.destinations.index');
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'weather_description_ar' => 'nullable|string|max:500',
            'weather_description_en' => 'nullable|string|max:500',
            'amenities_ar' => 'nullable|string|max:500',
            'amenities_en' => 'nullable|string|max:500',
            'recommended_visit_season_ar' => 'nullable|string|max:255',
            'recommended_visit_season_en' => 'nullable|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'lat' => 'nullable|numeric',
            'lng' => 'nullable|numeric',
            'annual_visitors_min' => 'nullable|numeric|min:0',
            'annual_visitors_max' => 'nullable|numeric|min:0',
            'body_ar' => 'required|string',
            'body_en' => 'required|string',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
        ]);

        $destination = Destination::findOrFail($id);

        // Update localized fields
        $destination->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];

        $destination->weather_description = [
            'ar' => $validatedData['weather_description_ar'],
            'en' => $validatedData['weather_description_en'],
        ];

        $destination->amenities = [
            'ar' => $validatedData['amenities_ar'],
            'en' => $validatedData['amenities_en'],
        ];

        $destination->recommended_visit_season = [
            'ar' => $validatedData['recommended_visit_season_ar'],
            'en' => $validatedData['recommended_visit_season_en'],
        ];

        $destination->body = [
            'ar' => $validatedData['body_ar'],
            'en' => $validatedData['body_en'],
        ];

        $destination->description = [
            'ar' => $validatedData['description_ar'],
            'en' => $validatedData['description_en'],
        ];

        // Update category and location
        $destination->category_id = $validatedData['category_id'];
        $destination->lat = $validatedData['lat'];
        $destination->lng = $validatedData['lng'];

        $destination->annual_visitors_min = $validatedData['annual_visitors_min'];
        $destination->annual_visitors_max = $validatedData['annual_visitors_max'];

        // Handle image upload if a new image is provided
        if ($request->image) {
            $newImage = FileHelper::updateFile(
                'public/' . $destination->image,
                $request->image,
                'public/destinations'
            );
            $destination->image = str_replace('public/', '', $newImage);
        }

        // Handle cover image upload if provided
        if ($request->cover_image) {
            $newCoverImage = FileHelper::updateFile(
                'public/' . $destination->cover_image,
                $request->cover_image,
                'public/destinations'
            );
            $destination->cover_image = str_replace('public/', '', $newCoverImage);
        }

        $destination->save();
        flash('تم التحديث بنجاح');
        return redirect()->route('system.destinations.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param Destination $testimonial
     * @return Response
     */
    public function edit($id)
    {
        $data['destination'] = Destination::find($id);

        return isset($data['destination']) ? view('system_admin.destinations.create', $data) : redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Destination $destinations
     * @return Response
     */
    public function delete(Request $request)
    {
        if (is_array($request->id)) {
            foreach ($request->id as $id) {
                Destination::destroy($id);
            }
            return ['done' => 1];
        } else {
            $isDeleted = Destination::destroy($request->id);
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
            $o = Destination::find($id);
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
            $o = Destination::find($id);
            $o->status = 2;
            $o->save();
        }
        return ['done' => 1];

    }
}
