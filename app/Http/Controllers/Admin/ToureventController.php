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
        $validatedData = $request->validate([
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
        ]);

        $tourevent = new Tourevent();
        $tourevent->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];

        if ($request->image) {
            $image = FileHelper::uploadFile($request->image, 'public/tourevents');
            $image = str_replace('public/', '', $image);
            $tourevent->image = $image;
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
