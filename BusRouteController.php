<?php

namespace App\Http\Controllers;

use App\bus_route;
use Illuminate\Http\Request;

class BusRouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = request()->validate([
        //     'start' => 'required|string',
        //     'end' => 'required|string',
        //     'date' => 'required|date',
        // ]);
        // $bus_r = bus_route::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\bus_route  $bus_route
     * @return \Illuminate\Http\Response
     */
    public function show(bus_route $bus_route)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\bus_route  $bus_route
     * @return \Illuminate\Http\Response
     */
    public function edit(bus_route $bus_route)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\bus_route  $bus_route
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bus_route $bus_route)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\bus_route  $bus_route
     * @return \Illuminate\Http\Response
     */
    public function destroy(bus_route $bus_route)
    {
        //
    }
}
