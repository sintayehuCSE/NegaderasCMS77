<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return back();
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required|min:3',
            'location' => 'required',
            'star' => 'required',
            'room' => 'required',
            'email' => 'required|unique:hotels,email',
        ]);
        
        Hotel::create($data);
        
        return back();
    }
}
