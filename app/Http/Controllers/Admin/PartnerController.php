<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class PartnerController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $partners = Partner::query()
            ->when($request->input('name'), function ($query, $name) {
                $query->where('name->ar', 'LIKE', "%{$name}%")
                    ->orWhere('name->en', 'LIKE', "%{$name}%");
            })
            ->latest('id')
            ->paginate(15);

        return view('system_admin.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('system_admin.partners.create');
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

        $partner = new Partner();
        $partner->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];
        $partner->body = [
            'ar' => $validatedData['body_ar'],
            'en' => $validatedData['body_en'],
        ];

        $partner->status = $validatedData['status'] ?? true; // Default to true if not provided

        if ($request->image) {
            $image = FileHelper::uploadFile($request->image, 'public/partners');
            $image = str_replace('public/', '', $image);
            $partner->image = $image;
        }

        $partner->save();
        flash('تم  الاضافة بنجاح');
        return redirect()->route('system.partners.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Partner $partner
     * @return Response
     */
    public function edit($id)
    {
        $partner = Partner::find($id);

        return isset($partner) ? view('system_admin.partners.create', compact('partner')) : redirect()->back();
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

        $partner = Partner::findOrFail($id);

        $partner->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];
        $partner->body = [
            'ar' => $validatedData['body_ar'],
            'en' => $validatedData['body_en'],
        ];

        $partner->status = $validatedData['status'] ?? $partner->status; // Keep current status if not provided

        // Handle image upload if a new image is provided
        if ($request->image) {
            $newImage = FileHelper::updateFile(
                'public/' . $partner->image,
                $request->image,
                'public/partners'
            );
            $partner->image = str_replace('public/', '', $newImage);
        }

        $partner->save();
        flash('تم التحديث بنجاح');
        return redirect()->route('system.partners.index');
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
                Partner::destroy($id);
            }
            return ['done' => 1];
        } else {
            $isDeleted = Partner::destroy($request->id);
            return ['done' => $isDeleted];
        }
    }

    /**
     * Activate the specified partner(s).
     *
     * @param Request $request
     * @return Response
     */
    public function activate(Request $request)
    {
        $ids = is_array($request->id) ? $request->id : [$request->id];

        foreach ($ids as $id) {
            $partner = Partner::find($id);
            $partner->status = true;
            $partner->save();
        }

        return ['done' => 1];
    }

    /**
     * Deactivate the specified partner(s).
     *
     * @param Request $request
     * @return Response
     */
    public function deactivate(Request $request)
    {
        $ids = is_array($request->id) ? $request->id : [$request->id];

        foreach ($ids as $id) {
            $partner = Partner::find($id);
            $partner->status = false;
            $partner->save();
        }

        return ['done' => 1];
    }
}
