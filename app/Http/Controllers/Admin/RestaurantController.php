<?php

namespace App\Http\Controllers\Admin;

use App\Models\Restaurant;
use App\Helpers\FileHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class RestaurantController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $restaurants = Restaurant::query()
            ->when($request->input('name'), function ($query, $name) {
                $query->where('name->ar', 'LIKE', "%{$name}%")
                    ->orWhere('name->en', 'LIKE', "%{$name}%");
            })
            ->when($request->input('restaurant_id'), function ($query, $restaurant_id) {
                $query->where('id', $restaurant_id);
            })
            ->latest('id')
            ->paginate(15);

        return view('system_admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('system_admin.restaurants.create');
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

        // Create a new Restaurant record
        $restaurant = new Restaurant();
        $restaurant->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];
        $restaurant->title = [
            'ar' => $validatedData['title_ar'],
            'en' => $validatedData['title_en'],
        ];
        $restaurant->body = [
            'ar' => $validatedData['body_ar'],
            'en' => $validatedData['body_en'],
        ];
        $restaurant->order = $validatedData['order'];
        $restaurant->status = $validatedData['status'] ?? true; // Default to active if not provided

        // Handle file uploads if needed (e.g. images, documents)
        if ($request->image) {
            $image = FileHelper::uploadFile($request->image, 'public/restaurants');
            $image = str_replace('public/', '', $image);
            $restaurant->image = $image;
        }

        // Save the Restaurant
        $restaurant->save();

        flash('تم  الاضافة بنجاح');
        return redirect()->route('system.restaurants.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Restaurant $restaurant
     * @return Response
     */
    public function edit($id)
    {
        $restaurant = Restaurant::find($id);

        return isset($restaurant) ? view('system_admin.restaurants.create', compact('restaurant')) : redirect()->back();
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

        $restaurant = Restaurant::findOrFail($id);

        // Update Restaurant attributes
        $restaurant->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];
        $restaurant->title = [
            'ar' => $validatedData['title_ar'],
            'en' => $validatedData['title_en'],
        ];
        $restaurant->body = [
            'ar' => $validatedData['body_ar'],
            'en' => $validatedData['body_en'],
        ];
        $restaurant->order = $validatedData['order'];
        $restaurant->status = $validatedData['status'] ?? true;

        // Handle file upload if a new image is provided
        if ($request->image) {
            $newImage = FileHelper::updateFile(
                'public/' . $restaurant->image,
                $request->image,
                'public/restaurants'
            );
            $restaurant->image = str_replace('public/', '', $newImage);
        }

        // Save the updated Restaurant
        $restaurant->save();

        flash('تم التحديث بنجاح');
        return redirect()->route('system.restaurants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Restaurant $restaurant
     * @return Response
     */
    public function delete(Request $request)
    {
        if (is_array($request->id)) {
            foreach ($request->id as $id) {
                Restaurant::destroy($id);
            }
            return ['done' => 1];
        } else {
            $isDeleted = Restaurant::destroy($request->id);
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
            $restaurant = Restaurant::find($id);
            $restaurant->status = 1;
            $restaurant->save();
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
            $restaurant = Restaurant::find($id);
            $restaurant->status = 0;
            $restaurant->save();
        }
        return ['done' => 1];
    }
}
