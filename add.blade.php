@extends('negad.hotel.hoteladmin')

@section('content')
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="/hoteldash" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Add Room
              </p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="{{route('hotel.edit')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                View Room
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
 
   <div class="content-wrapper">
    
	<form method="post" action="/addroom" class="p-5 bg-white">
      @if(session()->has('message'))
        <div class="alert alert-success" role="alert">
            success{{session()->get('message')}}
        </div>
      @endif
      <div class="col-sm-6">
            <h1 class="m-0 text-dark">choose hotel</h1>
      </div><br>
		@include('negad.hotel.form') 
        <div class="content">
          <div class="row">
              <div class="col-lg-12">
              	<button type="submit" class="btn btn-primary">Add Room</button>
          </div>
        </div>
        </div>
        
    </div>
  </form>
 
	<aside class="control-sidebar control-sidebar-dark">
	<div class="p-3">
		<h5>Title</h5>
		<p>Sidebar content</p>
	</div>
	</aside>
@endsection