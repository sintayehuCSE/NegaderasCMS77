<?php

namespace App\Http\Controllers;

use App\models\bus_route;
use App\models\bus_post;
use App\models\bus;
use Illuminate\Http\Request;

class BusTicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {

        $route = bus_route::where(['start' => request()->start, 'end' =>  request()->end,])->get();
            
        if( !$route->isEmpty() ){
            $posts = $route->first()->bus_post_id;
            dd($posts); 
            $post = bus_post::where([
                'id' => $posts,
            ])->get();
            $id = $post->first()->buses_id;
            
            $name = bus::where([
                'id' => $id,
            ])->get();
            $count = $route->first()->count;
            
            $name=$name->first()->name;
            $money=$route->first()->money;
            $plate=$post->first()->plate;

            return view('user.showbus',compact('name', 'money', 'plate'));
        }else{
            return back();
        }
    }


    public function index()
    {
        $bus_route = bus_route::all();
         
        return view('user.bususer', compact('bus_route'));
    }

    public function create()
    {
       
    }
    public function store(Request $request)
    {
        
    }

    public function show()
    {
        
    }

    public function edit()
    {
        //
    }
    
    public function update(Request $request)
    {
        $route = bus_route::where(['start' => request()->start, 'end' =>  request()->end,])->get();
        dd($route);
        if( !$route->isEmpty() ){
            $posts = $route->first()->bus_post_id;
            
            $post = bus_post::where([
                'id' => $posts,
            ])->get();
            $id = $post->first()->buses_id;
            
            $seat = $post->first()->no;
            $route = $route->first();
            $count = $route->count;
            
            if($seat > $count){
                $count = $route->first()->count+1;
                $route->update([
                'count' => $count + 1
            ]);
            dd('2');
            return view('user.showbus',compact('name', 'money', 'plate'));
            }
            else{return back();}
        }
        else{
            return back();
        }
    }

    public function destroy()
    {
        //
    }
}
