<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Models\Testimonial;
use Carbon\Carbon;
use HELPER;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class TestimonialController
{

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $testimonials = Testimonial::query()
            ->when($request->input('name'), function ($query, $name) {
                $query->where('name->ar', 'LIKE', "%{$name}%")
                    ->orWhere('name->en', 'LIKE', "%{$name}%");
            })
            ->when($request->input('testimonial_id'), function ($query, $testimonial_id) {
                $query->where('id', $testimonial_id);
            })
            ->latest('id')
            ->paginate(15);

        return view('system_admin.testimonials.index', compact('testimonials'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('system_admin.testimonials.create');
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
        ]);

        $testimonial = new Testimonial();
        $testimonial->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];

        if ($request->image) {
            $image = FileHelper::uploadFile($request->image, 'public/testimonials');
            $image = str_replace('public/', '', $image);
            $testimonial->image = $image;
        }

        $testimonial->save();
        flash('تم  الاضافة بنجاح');
        return redirect()->route('system.testimonials.index');
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

        $testimonial = Testimonial::find($id);
        // Update localized names
        $testimonial->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];

        // Handle image upload if a new image is provided
        if ($request->image) {
            $newImage = FileHelper::updateFile(
                'public/' . $testimonial->image,
                $request->image,
                'public/testimonials'
            );
            $testimonial->image = str_replace('public/', '', $newImage);
        }

        $testimonial->save();
        flash('تم التحديث بنجاح');
        return redirect()->route('system.testimonials.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param Testimonial $testimonial
     * @return Response
     */
    public function edit($id)
    {
        $data['testimonial'] = Testimonial::find($id);

        return isset($data['testimonial']) ? view('system_admin.testimonials.create', $data) : redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Testimonial $testimonials
     * @return Response
     */
    public function delete(Request $request)
    {
        if (is_array($request->id)) {
            foreach ($request->id as $id) {
                Testimonial::destroy($id);
            }
            return ['done' => 1];
        } else {
            $isDeleted = Testimonial::destroy($request->id);
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
            $o = Testimonial::find($id);
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
            $o = Testimonial::find($id);
            $o->status = 2;
            $o->save();
        }
        return ['done' => 1];

    }
}
