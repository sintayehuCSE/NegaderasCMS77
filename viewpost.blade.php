@extends('negad.company.compadmin')

@section('content')
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="/company" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
        </li>
		    <li class="nav-item">
            <a href="/postjob" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                post a job
              </p>
            </a>
        </li>
		    <li class="nav-item">
            <a href="ordertrack" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                order track
              </p>
            </a>
        </li>
		    <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                view post
              </p>
            </a>
        </li>
      </ul>
      </nav>
    </div>
  </aside>

<div class="content-wrapper">
 
    <div>
            <div class="card">
              <div class="card-header">
			  <div class="content-header">
					<div class="container-fluid">
						<div class="row mb-2">
						<div class="col-sm-6">
						<h1 class="card-title" align="center" style="color:blue;">Post</h1>
						</div>
						</div>
					</div>
				</div>
               
              </div>
              <div class="card-body">
                <table class="table table-bordered">
					<thead>
              <tr>
                <th>Job title</th>
                <th>Job type</th>
                <th>Location</th>
                <th>Description</th>
                <th>update</th>
              </tr>
					</thead>
                    <tbody>
						@foreach($post as $post)
							<tr>
								<td >{{ $post->title}}</td>
								<td >{{ $post->jobtype}}</td>
								<td >{{ $post->address }}</td>
								<td >{{ $post->description }}</td>
								<td> <a class="btn btn-info btn-sm" 
								data-title="{{$post->title}}"
								data-end="{{$post->jobtype}}"
								data-no="{{$post->address}}"
								data-money="{{$post->description}}"
								data-id="{{$post->id}}"
								data-toggle="modal" data-target="#edit"><i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a></button> /
							<a class="btn btn-danger btn-sm" data-id="{{$post->id}}"
							data-toggle="modal" data-target="#delete"> 
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          	</a>
						@endforeach
					</tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
              </div>
            </div>

	<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5>
					 post information
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form  method="POST"  action="{{route('post.update', 'test')}}">
					@method('PATCH')
					@csrf
                    
                    <div class="modal-body"> 
                    
					<input type="hidden"  name="po_id" value="" id="id" > 
                    <div class="row form-group">
                    <div class="col-md-12 mb-3 mb-md-0">
                    <label class="font-weight-bold" for="fullname">Job Title</label>
                    <input type="text" id="fullname" name="title"  value="{{old('title')}}" class="form-control" placeholder="eg. Computer Programmer">
                    </div>
                    <div>{{$errors -> first('title') }}</div> 
                    </div>

                    <div class="row form-group">
                    <div class="col-md-12"><h3>Job Type</h3></div>
                    <div class="col-md-12 mb-3 mb-md-0">
                        <label for="option-job-type-1">
                        <input type="radio" id="option-job-type-1" name="jobtype"> Full Time
                        </label>
                    </div>
                    <div class="col-md-12 mb-3 mb-md-0">
                        <label for="option-job-type-2">
                            <input type="radio" id="option-job-type-2" name="jobtype"> Part Time
                        </label>
                    </div>
                    <div class="col-md-12 mb-3 mb-md-0">
                        <label for="option-job-type-4">
                            <input type="radio" id="option-job-type-4" name="jobtype"> Internship
                        </label>
                    </div>
                    <div class="col-md-12 mb-3 mb-md-0">
                        <label for="option-job-type-4">
                            <input type="radio" id="option-job-type-4" name="jobtype"> Termporary
                        </label>
                    </div>
                    <div>{{$errors -> first('jobtype') }}</div> 
                    </div>

                    <div class="row form-group mb-4">
                    <div class="col-md-12"><h3>Location</h3></div>
                    <div class="col-md-12 mb-3 mb-md-0">
                    <input type="text"  class="form-control" name="address" value="{{old('address')}}" placeholder="A.A Ethiopia">
                    </div>
                    <div>{{$errors -> first('address') }}</div> 
                    </div>

                    <div class="row form-group">
                    <div class="col-md-12"><h3>Job Description</h3></div>
                    <div class="col-md-12 mb-3 mb-md-0">
                    <textarea name="description" class="form-control" value="{{old('description')}}" id="" cols="30" rows="5"></textarea>
                    </div>
                    <div>{{$errors -> first('description') }}</div> 
                    </div>

                    <div class="row form-group">
                    <div class="col-md-12">
                    <input type="submit" value="Post" class="btn btn-primary  py-2 px-5">
                    </div>
                    </div>					
					</div>      
                 
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-success">Save Changes</button>
					</div>
				</form> 
		    </div>
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
					<form action="{{route('post.delete')}}" method="POST">
						@method('delete')
						@csrf
						<div class="modal-body">  
							<p class="text-center"> 
								Are You Sure You Want To Delete This?
							</p>
						<input type="hidden" name="id" id="id" value="">
						</div>
						<div class="modal-footer">
							<button style="font-family:centery" type="button" class="btn btn-success" data-dismiss="modal">No,Cancel</button>
							<button style="font-family:centery" type="submit" class="btn btn-warning">Yes,Delete</button>
						</div>
					
					</form>
				</div>
    		</div>
    </div>
	
 
@endsection
  