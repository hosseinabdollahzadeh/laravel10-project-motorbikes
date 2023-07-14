<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Motor;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motors = Motor::latest()->paginate(5);
        return view('home.motors.index', compact('motors'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Motor $motor)
    {
        return view('home.motors.show', compact('motor'));
    }
}
