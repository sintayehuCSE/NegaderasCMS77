@extends('negad.hotel.hoteladmin')

@section('title', 'customer form')
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
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                post a job
              </p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="/ordertrack" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                order track
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="viewpost" class="nav-link">
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Post a job</h1>
          </div>
        </div>
      </div>
    </div>

<section>
    <div class="col-md-12 col-lg-8 mb-5">
          
		<form action="/postjob" method="post" class="p-5 bg-white">
			@csrf
			@if(session()->has('message'))
				<div class="alert alert-success" role="alert">
					{{session()->get('message')}}
				</div>
			@endif    
      <input type="hidden" name="comp_id" value="{{auth()->user()->id}}"> 
              <div class="row form-group">
				<div class="col-md-12 mb-3 mb-md-0">
				<label class="font-weight-bold" for="fullname">Job Title</label>
				<input type="text" id="fullname" name="title"  value="{{old('title')}}" class="form-control" placeholder="eg. Computer Programmer">
				</div>
				<div>{{$errors -> first('title') }}</div> 
              </div>

              <div class="row form-group mb-5" >
				<div class="col-md-12 mb-3 mb-md-0">
				<label class="font-weight-bold" for="fullname">Company</label>
				<input type="text" id="fullname" name="company" value="{{old('company')}}" class="form-control" placeholder="eg. Icog lab">
				</div>
				<div>{{$errors -> first('company') }}</div> 
		    </div>

              

              <div class="row form-group mb-4">
                <div class="col-md-12"><h3>Location</h3></div>
                <div class="col-md-12 mb-3 mb-md-0">
                  <input type="text"  class="form-control" name="address" value="{{old('address')}}" placeholder="A.A Ethiopia">
                </div>
				<div>{{$errors -> first('address') }}</div> 
			  </div>

			<div class="row form-group-5">
                <div class="col-md-12"><h3>Job Type</h3></div>
                <div class="form-group" style="width:100%;">
					<select name="jobtype" value="{{old('company')}}" class="form-control" >
					<option selected disabled>Select one</option>
					<option>Full Time</option>
					<option>Part Time</option>
					<option>Internship</option>
					<option>Temporary</option>
					</select>
					<div>
						@error('jobtype')
							<span class="error" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
            </div>

              <div class="row form-group">
                <div class="col-md-12"><h3>Job Description</h3></div>
                <div class="col-md-12 mb-3 mb-md-0">
                  <textarea name="description" class="form-control" value="{{old('description')}}" id="" cols="55" rows="5"></textarea>
                </div>
				<div>{{$errors -> first('description') }}</div> 
			  </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Post" class="btn btn-primary  py-2 px-5">
                </div>
              </div>

  
        </form>
	</div>
</section>
@endsection