<?php

namespace App\Http\Controllers;

use App\models\hotel_book;
use App\models\hotel;
use Illuminate\Http\Request;

class HotelBookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {
        $hotel = hotel::all();
         
        return view('negad.hotel.add', compact('hotel'));
    }

    public function create(Request $request)
    {
        $data = $this->validateRequest($request);
        if($this->fill_hotel_table($data, $request))
        {
            return back();
        }
        abort(500, error);
    }

    public function store(Request $request)
    {
        $hotel = hotel_book::all();
        return view('user.hoteluser', compact('hotel'));
    }

    public function show(hotel_book $hotel_book)
    {
        $hotel = hotel_book::where(['type' => request()->type])->get();
              
        if( !$hotel->isEmpty() ){
            $book = $hotel->first()->hotels_id;
        
            $bo = hotel::where([$book =>request()->type ])->get();
            
            return view('user.showhotel',compact('post'));
        }
        else{
            return back();
        }
    }

    public function edit(hotel_book $hotel_book)
    {
        $hotel = hotel_book::all();
        
        return view ('negad.hotel.view', compact('hotel'));
    }

    public function update(Request $request)
    {
        $data = $this->balidateRequest($request);
        dd('32');
        $currentHotel = hotel_book::find($data['hotel_id']);

        $currentHotel->update($data);

        return redirect('/hotelview')->with('message', ' information updated!!!');
    }

    public function destroy(hotel_book $hotel_book)
    {
        $a = hotel_book::find(request()->id)->delete();
        return redirect('/hoteldash');
    }

    private function validateRequest()
    {
        return request()->validate([
            'type' => 'required',
            'no' => 'required|integer',
            'description' => 'required',
            'price' => 'required|integer',
            'status' => 'required',
        ]);
    }

    private function balidateRequest()
    {
        return request()->validate([
            'hotel_id' => 'required',
            'type' => 'required',
            'no' => 'required|integer',
            'description' => 'required',
            'price' => 'required|integer',
            'status' => 'required',
        ]);dd('one');
    }

    private function fill_hotel_table($data, $request)
    {
        $hotel = new hotel_book();
        
        $hotel->type = $data['type'];
        $hotel->hotels_id = auth()->user()->hotel->id;
        $hotel->no = $data['no'];
        $hotel->description = $data['description'];
        $hotel->price = $data['price'];
        $hotel->status = $request->status;
        $hotel->save();
        return $hotel;
    }
}
