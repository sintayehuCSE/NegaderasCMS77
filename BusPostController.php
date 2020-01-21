<?php

namespace App\Http\Controllers;

use App\models\bus_post;
use App\models\bus;
use App\models\bus_route;
use Illuminate\Http\Request;

class BusPostController extends Controller
{
    
    public function index()
    {
        //
    }

    public function create(Request $request)
    {
        $data = $this->balidateRequest($request);
        $busPostID = $this->fill_bus_post_table($data);
        if( $busPostID  ){
            if( $this->fill_bus_route_table($data, $busPostID ) ){
                return redirect('/addbus')->with('message', 'Bus added Succesfully!!!');
            }
        }
        abort(500, error);
    }

    public function edit(bus_route $bus_route)
    {
        $bus = bus_route::all(); 
        return view ('negad.bus.viewbus', compact('bus'));
    }

    public function destroy(bus_route $bus_route)
    {
        $a = bus_route::find(request()->id)->delete();
        
        return back();
    }

    public function update(Request $request)
    {
        $data = $this->validateRequest($request);

        $busin = bus_route::find($data['bu_id']);

        $busin ->update($data);

        return back();
    }

    private function fill_bus_route_table($data, $busPostID)
    {
        if(preg_match_all('/AM/', $data['date'])){
            $data['date']=trim( $data['date'],"AM");
        }
        if(preg_match_all('/PM/', $data['date'])){
            $data['date']=trim( $data['date'],"PM");
        }
        $busRoute = new bus_route();
        $busRoute->bus_post_id = $busPostID;
        $busRoute->start = $data['start'];
        $busRoute->end = $data['end'];
        $busRoute->date = $data['date'];
        $busRoute->money = $data['money'];
        $busRoute->save();
        return $busRoute;
    }

    private function fill_bus_post_table($data)
    {
        $busPost = new bus_post();
        $busPost->buses_id = auth()->user()->bus->id;
        $busPost->no = $data['no'];
        $busPost->plate = $data['plate'];
        $busPost->save();
        return $busPost->id;
    }

    private function validateRequest(Request $request)
    {
        return request()->validate([
            'bu_id' => 'required',
            'start' => 'required|min:3',
            'end' => 'required|min:3',
            'no' => 'required|integer',
            'date' => 'required',
            'money' => 'required|integer',
            'plate' => 'required|integer|min:10000|max:99999',
        ]);
    }

    private function balidateRequest(Request $request)
    {
        return request()->validate([
            'start' => 'required|min:3',
            'end' => 'required|min:3',
            'no' => 'required|integer',
            'date' => 'required',
            'money' => 'required|integer',
            'plate' => 'required|integer|min:10000|max:99999',
        ]);
    }
}