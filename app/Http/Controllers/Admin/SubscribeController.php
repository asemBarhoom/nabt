<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class SubscribeController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $subscribes = Subscribe::query()
            ->when($request->input('email'), function ($query, $email) {
                $query->where('email', 'LIKE', "%{$email}%");
            })
            ->latest('id')
            ->paginate(15);

        return view('system_admin.subscribes.index', compact('subscribes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('system_admin.subscribes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'email' => 'required|email|max:255|unique:subscribes,email',
            'status' => 'nullable|boolean',
        ]);

        // Create the new subscriber
        $subscriber = new Subscribe();
        $subscriber->email = $validatedData['email'];
        $subscriber->status = $validatedData['status'] ?? true; // Default to active if no status is provided

        // Save the subscriber to the database
        $subscriber->save();

        flash('تم  الاضافة بنجاح');
        return redirect()->route('system.subscribes.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Subscribe $subscribe
     * @return Response
     */
    public function edit($id)
    {
        $data['subscribe'] = Subscribe::find($id);

        return isset($data['subscribe']) ? view('system_admin.subscribes.create', $data) : redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|max:255|unique:subscribes,email,' . $id,
            'status' => 'nullable|boolean',
        ]);

        $subscriber = Subscribe::findOrFail($id);
        $subscriber->email = $validatedData['email'];
        $subscriber->status = $validatedData['status'] ?? true;

        $subscriber->save();

        flash('تم التحديث بنجاح');
        return redirect()->route('system.subscribes.index');
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
                Subscribe::destroy($id);
            }
            return ['done' => 1];
        } else {
            $isDeleted = Subscribe::destroy($request->id);
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
            $o = Subscribe::find($id);
            $o->status = true;
            $o->save();
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
            $o = Subscribe::find($id);
            $o->status = false;
            $o->save();
        }
        return ['done' => 1];
    }
}
