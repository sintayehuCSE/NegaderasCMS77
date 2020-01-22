@extends('negad.company.compadmin')

@section('content')
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="#" class="nav-link">
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
            <h1 class="m-0 text-dark">Welcome company</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
            

            <div class="col-12 col-sm-6 col-md-6 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2><b>Order Track</b></h2>
                      <p class="text-muted text-sm"> you can order any track with a single touch </p>
					  <p class="text-muted text-sm"> Tryit !!!!!</p>
                    </div>
                    <div class="col-5 text-center">
                      <img src="/img/track.jpg" alt="" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="#" class="btn btn-sm btn-primary">
                      ordertrack
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2><b>
					  Post a job</b></h2>
                      <p class="text-muted text-sm">Post any job you want without the need of any paper
					  </p>                     
					   <p class="text-muted text-sm"><b>by your phone</b> </p>
                    </div>
                    <div class="col-5 text-center">
                      <img src="/img/c.jpg" alt="" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="/postjob" class="btn btn-sm btn-primary">
						Post a job
                    </a>
                  </div>
                </div>
              </div>
            </div>

            
            
          </div>
        </div>
        <!-- /.card-body -->
        
      </div>
      <!-- /.card -->

    </section>
    
	
 
	<aside class="control-sidebar control-sidebar-dark">
	<div class="p-3">
		<h5>Title</h5>
		<p>Sidebar content</p>
	</div>
	</aside>
@endsection