<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Motor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motors = Motor::latest()->paginate(20);
        return view('admin.motors.index', compact('motors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.motors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'model' => 'required',
            'make' => 'required|numeric',
            'color' => 'required',
            'weight' => 'required|numeric|min:50|max:10000',
            'price' => 'required|numeric|max:10000000000',
            'image' => 'required|mimes:jpg,jpeg,png,svg,webp',
        ]);

        $imageFileName = generateFileName($request->image->getClientOriginalName());

        $request->image->move(public_path(env('MOTORS_IMAGES_UPLOAD_PATH')), $imageFileName);

        Motor::create([
            'model' => $request->model,
            'make' => $request->make,
            'color' => $request->color,
            'weight' => $request->weight,
            'price' => $request->price,
            'image' => $imageFileName,
            'description' => $request->description
        ]);
        Alert::success('با تشکر', 'موتورسیلکت مورد نظر ایجاد شد.');
        return redirect()->route('admin.motors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Motor $motor)
    {
        return view('admin.motors.edit', compact('motor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Motor $motor)
    {
        $request->validate([
            'image' => 'nullable|mimes:jpg,jpeg,png,svg,webp',
            'model' => 'required',
            'make' => 'required|numeric',
            'color' => 'required',
            'weight' => 'required|numeric|min:50|max:10000',
            'price' => 'required|numeric|max:10000000000',
        ]);

        if ($request->has('image')) {
            $imageFileName = generateFileName($request->image->getClientOriginalName());
            $request->image->move(public_path(env('MOTORS_IMAGES_UPLOAD_PATH')), $imageFileName);
            if ($motor->image) {
                $previousImagePath = public_path(env('MOTORS_IMAGES_UPLOAD_PATH')) . $motor->image;
                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                }
            }
        }
        $motor->update([
            'image' => $request->has('image') ? $imageFileName : $motor->image,
            'model' => $request->model,
            'make' => $request->make,
            'color' => $request->color,
            'weight' => $request->weight,
            'price' => $request->price,
            'description' => $request->description
        ]);
        Alert::success('با تشکر', 'موتورسیلکت مورد نظر ویرایش شد.');
        return redirect()->route('admin.motors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Motor $motor)
    {
        if ($motor->image) {
            $previousImagePath = public_path(env('MOTORS_IMAGES_UPLOAD_PATH')) . $motor->image;
            if (file_exists($previousImagePath)) {
                unlink($previousImagePath);
            }
        }
        $motor->delete();

        Alert::success('با تشکر', 'موتورسیلکت مورد نظر حذف شد.');
        return redirect()->route('admin.motors.index');
    }
}
