<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reward;
use App\Helpers\FileHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class RewardController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $rewards = Reward::query()
            ->when($request->input('name'), function ($query, $name) {
                $query->where('name->ar', 'LIKE', "%{$name}%")
                    ->orWhere('name->en', 'LIKE', "%{$name}%");
            })
            ->when($request->input('reward_id'), function ($query, $reward_id) {
                $query->where('id', $reward_id);
            })
            ->latest('id')
            ->paginate(15);

        return view('system_admin.rewards.index', compact('rewards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('system_admin.rewards.create');
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

        // Create a new Reward record
        $reward = new Reward();
        $reward->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];
        $reward->title = [
            'ar' => $validatedData['title_ar'],
            'en' => $validatedData['title_en'],
        ];
        $reward->body = [
            'ar' => $validatedData['body_ar'],
            'en' => $validatedData['body_en'],
        ];
        $reward->order = $validatedData['order'];
        $reward->status = $validatedData['status'] ?? true; // Default to active if not provided

        // Handle file uploads if needed (e.g. images, documents)
        if ($request->image) {
            $image = FileHelper::uploadFile($request->image, 'public/rewards');
            $image = str_replace('public/', '', $image);
            $reward->image = $image;
        }

        // Save the Reward
        $reward->save();

        flash('تم  الاضافة بنجاح');
        return redirect()->route('system.rewards.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Reward $reward
     * @return Response
     */
    public function edit($id)
    {
        $reward = Reward::find($id);

        return isset($reward) ? view('system_admin.rewards.create', compact('reward')) : redirect()->back();
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

        $reward = Reward::findOrFail($id);

        // Update Reward attributes
        $reward->name = [
            'ar' => $validatedData['name_ar'],
            'en' => $validatedData['name_en'],
        ];
        $reward->title = [
            'ar' => $validatedData['title_ar'],
            'en' => $validatedData['title_en'],
        ];
        $reward->body = [
            'ar' => $validatedData['body_ar'],
            'en' => $validatedData['body_en'],
        ];
        $reward->order = $validatedData['order'];
        $reward->status = $validatedData['status'] ?? true;

        // Handle file upload if a new image is provided
        if ($request->image) {
            $newImage = FileHelper::updateFile(
                'public/' . $reward->image,
                $request->image,
                'public/rewards'
            );
            $reward->image = str_replace('public/', '', $newImage);
        }

        // Save the updated Reward
        $reward->save();

        flash('تم التحديث بنجاح');
        return redirect()->route('system.rewards.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Reward $reward
     * @return Response
     */
    public function delete(Request $request)
    {
        if (is_array($request->id)) {
            foreach ($request->id as $id) {
                Reward::destroy($id);
            }
            return ['done' => 1];
        } else {
            $isDeleted = Reward::destroy($request->id);
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
            $reward = Reward::find($id);
            $reward->status = 1;
            $reward->save();
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
            $reward = Reward::find($id);
            $reward->status = 0;
            $reward->save();
        }
        return ['done' => 1];
    }
}
