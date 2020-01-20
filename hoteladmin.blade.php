<!DOCTYPE html>
<html lang="en">
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Negadras cms</title>
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-primary navbar-light" >
  <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
</ul>
    <ul class="navbar-nav ml-auto">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
	   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
	   		 
		</a>
		<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
			<a class="dropdown-item" href=""
				onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">
				{{ __('Logout') }}
			</a>

			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>
		</div>
        </li>
        </a>
      </li>
    </ul>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">NEGADRAS</span>
    </a>

    <div class="sidebar">
     
      <main class="py-4">
            @yield('content')
      </main>
      </div>
      <script src="plugins/jquery/jquery.min.js"></script>
      <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="dist/js/adminlte.min.js"></script>
      <footer class="main-footer">
        <div class="float-right d-none d-sm-inline">
          Anything you want
        </div>
        <strong>Copyright</strong> &copy; 2019 All rights reserved.
  	  </footer>
      <!-- delete and edit for bus -->
      <script>
        $('#edit').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
            var start = button.data('start')
            var end = button.data('end')
            var money = button.data('money')
            var plate = button.data('plate')
            var no = button.data('no')
            var date = button.data('date')
            var id  = button.data('id')
            var modal = $(this)

            modal.find('.modal-body #start').val(start)
            modal.find('.modal-body #end').val(end)
            modal.find('.modal-body #no').val(no)
            modal.find('.modal-body #money').val(money)
            modal.find('.modal-body #plate').val(plate)
            modal.find('.modal-body #date').val(date)
            modal.find('.modal-body #id').val(id)
        })

    </script> 
    <script>
        $('#delete').on('show.bs.modal', function (event) {
            console.log("modal opened")
            var button = $(event.relatedTarget)

            var id = button.data('id')

            var modal = $(this)

            modal.find('.modal-body #id').val(id)

        })

    </script>
 
</aside>
</body>
</html>