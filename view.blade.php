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
            <a href="#" class="nav-link">
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

	  <div class="card">
			<div class="card-header">
			<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">room list</h1>
				</div>
				</div>
			</div>
			</div>
		</div>
	
		<div class="card-body">
        <table class="table table-bordered">
		<thead>
			<tr>
				<th>Room no.</th>
				<th>Room type</th>
				<th>Hotel Description</th>
				<th>Hotel Price</th>
				<th>Hotel Active</th>
			</tr>
		</thead>

		<tbody>
			@foreach($hotel as $hotel)
				<tr>
					<td >{{ $hotel ->no}}</td>
					<td >{{ $hotel->type}}</td>
					<td >{{ $hotel ->description }}</td>
					<td >{{ $hotel ->price }}</td>
					<td >{{ $hotel ->status }}</td>
					<td><button class="btn btn-primary"
					data-no="{{$hotel->no}}"
					data-type="{{$hotel->type}}"
					data-description="{{$hotel->description}}"
					data-price="{{$hotel->price}}"
					data-status="{{$hotel->status}}"
					data-id="{{$hotel->id}}"
					data-toggle="modal" data-target="#edit">edit</button></td>
					<td><button class="btn btn-danger" data-id="{{$hotel->id}}" data-toggle="modal" data-target="#delete">
					Delete
					</button></td>
				</tr>
			@endforeach
		</tbody>
		</div>
    </table>

	<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5>
					 hotel room information
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="{{route('hotel.update','test')}}" method="POST">
					@method('PATCH')
					@csrf
					<div class="modal-body">  
							@include('negad.hotel.form')
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-success">save</button>
					</div>
					</div>
				</form>
			</div>
		</div>
    </div>

	   
	{{--modal for delete--}}
                                        
	<div class="modal fade" id="delete" tabindex="-1" role="dialog"
			aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content bg-danger">
					<div class="modal-header bg-heading">
						<h5> Delete Confirmation</h5>						
						<button type="button" class="close" data-dismiss="modal"aria-label="Close"><span aria-hidden="true">&times;</span></button>				
					</div>
					<form action="{{route('hotel.destroy','test')}}" method="POST">
						@method('delete')
						@csrf
						<div class="modal-body">  
							<p class="text-center"> 
								Are You Sure You Want To Delete This?
							</p>
						<input type="hidden" name="id" id="id" value="">
							
						<div class="modal-footer">
							<button style="font-family:centery" type="button" class="btn btn-success" data-dismiss="modal">No,Cancel</button>
							<button style="font-family:centery" type="submit" class="btn btn-warning">Yes,Delete</button>
						</div>
					</div>
					</form>
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
          
