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
            <a href="/addroom" class="nav-link">
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Welcome Admin</h1>
          </div>
        </div>
      </div>
    </div>
    
	
 
	<aside class="control-sidebar control-sidebar-dark">
	<div class="p-3">
		<h5>Title</h5>
		<p>Sidebar content</p>
	</div>
	</aside>
@endsection