@extends('negad.hotel.hoteladmin')


@section('title', 'customer form')
@section('content')
    <div class="container">
       
        <h2>list</h2>
        <div class="form-group">
        <form action="{{route('customers.update', ['cust' => $customer])}}" method = "post" enctype="multipart/form-data">
            @method('PATCH')
            @if(session()->has('message'))
        <div class="alert alert-success" role="alert">
            success{{session()->get('message')}}
        </div>
      @endif
            @include('negad.hotel.form')

            <button type = "submit" class="btn btn-primary">save</button>
        </form>
        </div>     
    </div>
@endsection   
