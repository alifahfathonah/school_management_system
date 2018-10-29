<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="icon" href="../images/favicon.ico">-->

    <title>School Management System</title>

	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="{{ asset("assets/vendor_components/bootstrap/dist/css/bootstrap.css") }}">

	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="{{ asset("assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css") }}">

	<!-- theme style -->
	<link rel="stylesheet" href="{{ asset("css/master_style.css") }}">

	<!-- MinimalLite Admin skins. choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="{{ asset("css/skins/_all-skins.css") }}">

  <!-- toast CSS -->
  <link href="{{ asset("assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.css") }}" rel="stylesheet">

  <link href="{{ asset("assets/vendor_components/sweetalert/sweetalert.css") }}" rel="stylesheet" type="text/css">
  <!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="{{ asset("assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css") }}">

    <!-- Morris.js charts CSS -->
    <link href="{{ asset("assets/vendor_components/morris.js/morris.css") }}" rel="stylesheet" />

    <!-- Vector CSS -->
    <link href="{{ asset("assets/vendor_components/jvectormap/lib2/jquery-jvectormap-2.0.2.css") }}" rel="stylesheet" />

	<!-- date picker -->
	<link rel="stylesheet" href="{{ asset("assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css") }}">

	<!-- daterange picker -->
	<link rel="stylesheet" href="{{ asset("assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css") }}">

  <style media="screen">
    .hidden{
      display: none;
    }
  </style>


	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
  @yield('style')

  </head>

<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
	  <b class="logo-mini">
    </b>

      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
          <b>{{ Auth::user()->name  }}</b>
      </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">



		  <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset("images/doraemon.jpg") }}" class="user-image rounded-circle" alt="User Image">
            </a>
            <ul class="dropdown-menu scale-up">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset("images/doraemon.jpg") }}" class="float-left rounded-circle" alt="User Image">

                <p>
                  {{ Auth::user()->name  }}
                  <small class="mb-5">{{ Auth::user()->username  }}</small>
                  <a href="#" class="btn btn-danger btn-sm btn-rounded">View Profile</a>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row no-gutters">
                  <div class="col-12 text-left">
                    <a href="#"><i class="ion ion-person"></i> My Profile</a>
                  </div>
				<div role="separator" class="divider col-12"></div>
				  <div class="col-12 text-left">
                  <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                    </div>
                </div>
                <!-- /.row -->
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!--<li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-cog fa-spin"></i></a>
          </li>-->
        </ul>
      </div>
    </nav>
  </header>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="user-profile treeview">
          <a href="index.html">
			         <img src="{{ asset("images/doraemon.jpg") }}" alt="user">
            <span>{{ Auth::user()->name  }}</span>
            <!--<span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>-->
          </a>
		 <!-- <ul class="treeview-menu">
            <li><a href="javascript:void()"><i class="fa fa-user mr-5"></i>My Profile </a></li>
			<li><a href="javascript:void()"><i class="fa fa-money mr-5"></i>My Balance</a></li>
			<li><a href="javascript:void()"><i class="fa fa-envelope-open mr-5"></i>Inbox</a></li>
			<li><a href="javascript:void()"><i class="fa fa-cog mr-5"></i>Account Setting</a></li>
			<li><a href="javascript:void()"><i class="fa fa-power-off mr-5"></i>Logout</a></li>
          </ul>-->
        </li>
        @if(Auth::user()->level==1)
        <li >
          <a href="{{ url("/beranda/admin") }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i>
            <span>Placement Test</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!--<li><a href="{{ url("/admin/quiz") }}"><i class="fa fa-circle-thin"></i>Data Quiz</a></li>-->
            <li><a href="{{ url("/admin/kategori") }}"><i class="fa fa-circle-thin"></i>Data Kategori</a></li>
            <li><a href="{{ url("/admin/quiz") }}"><i class="fa fa-circle-thin"></i>Bank Soal</a></li>
            <li><a href="{{ url("/admin/history") }}"><i class="fa fa-circle-thin"></i>History Test</a></li>
            <li><a href="{{ url("/admin/user") }}"><i class="fa fa-circle-thin"></i>Data User</a></li>
          </ul>
        </li>
        @elseif(Auth::user()->level==2)
        <li >
          <a href="{{ url("/beranda/siswa") }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i>
            <span>Placement Test</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url("/siswa/test") }}"><i class="fa fa-circle-thin"></i>Quiz</a></li>
          </ul>
        </li>
        @elseif(Auth::user()->level==3)
        <li >
          <a href="{{ url("/beranda/guru") }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i>
            <span>Data Test</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!--<li><a href="{{ url("/admin/quiz") }}"><i class="fa fa-circle-thin"></i>Data Quiz</a></li>-->
            <li><a href="{{ url("/guru/kategori") }}"><i class="fa fa-circle-thin"></i>Data Kategori</a></li>
            <li><a href="{{ url("/guru/quiz") }}"><i class="fa fa-circle-thin"></i>Bank Soal</a></li>
            <li><a href="{{ url("/guru/history") }}"><i class="fa fa-circle-thin"></i>History Test</a></li>
          </ul>
        </li>
        @endif
      </ul>
    </section>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        @yield('header')
    </section>

    <!-- Main content -->
    <section class="content">
	  <!---//////////////////////--->
    @yield('content')
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

  <!-- /.control-sidebar -->
  <footer class="main-footer">
    &copy; 2018 <a href="#">System Management School</a>.
  </footer>


</div>

<!-- ./wrapper -->

	<!-- jQuery 3 -->
	<script src="{{ asset("assets/vendor_components/jquery/dist/jquery.js") }}"></script>

	<!-- jQuery UI 1.11.4 -->
	<script src="{{ asset("assets/vendor_components/jquery-ui/jquery-ui.js") }}"></script>

	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
	  $.widget.bridge('uibutton', $.ui.button);
	</script>

	<!-- popper -->
	<script src="{{ asset("assets/vendor_components/popper/dist/popper.min.js") }}"></script>

	<!-- Bootstrap 4.0-->
	<script src="{{ asset("assets/vendor_components/bootstrap/dist/js/bootstrap.js") }}"></script>

	<!-- Morris.js charts -->
	<script src="{{ asset("assets/vendor_components/raphael/raphael.min.js") }}"></script>
	<script src="{{ asset("assets/vendor_components/morris.js/morris.min.js") }}"></script>

	<!-- ChartJS -->
	<script src="{{ asset("assets/vendor_components/chart-js/chart.js") }}"></script>

  <!-- DataTables -->
	<script src="{{ asset("assets/vendor_components/datatables.net/js/jquery.dataTables.min.js") }}"></script>
	<script src="{{ asset("assets/vendor_components/datatables.net-bs/js/dataTables.bootstrap.min.js") }}"></script>

  <!-- This is data table -->
    <script src="{{ asset("assets/vendor_plugins/DataTables-1.10.15/media/js/jquery.dataTables.min.js") }}"></script>

    <!-- start - This is for export functionality only -->
    <script src="{{ asset("assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/dataTables.buttons.min.js") }}"></script>
    <script src="{{ asset("assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.flash.min.js") }}"></script>
    <script src="{{ asset("assets/vendor_plugins/DataTables-1.10.15/ex-js/jszip.min.js") }}"></script>
    <script src="{{ asset("assets/vendor_plugins/DataTables-1.10.15/ex-js/pdfmake.min.js") }}"></script>
    <script src="{{ asset("assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.html5.min.js") }}"></script>
    <script src="{{ asset("assets/vendor_plugins/DataTables-1.10.15/ex-js/vfs_fonts.js") }}"></script>
    <script src="{{ asset("assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.print.min.js") }}"></script>
    <!-- end - This is for export functionality only -->

	<!-- MinimalLite Admin for Data Table -->
	<script src="{{ asset("js/pages/data-table.js") }}"></script>
	<!-- Sparkline -->
	<script src="{{ asset("assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.js") }}"></script>

	<!-- Slimscroll -->
	<script src="{{ asset("assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js") }}"></script>

	<!-- FastClick -->
	<script src="{{ asset("assets/vendor_components/fastclick/lib/fastclick.js") }}"></script>

	<!-- peity -->
	<script src=".{{ asset("assets/vendor_components/query.peity/jquery.peity.js") }}"></script>

    <!-- Vector map JavaScript -->
    <script src="{{ asset("assets/vendor_components/jvectormap/lib2/jquery-jvectormap-2.0.2.min.js") }}"></script>
    <script src="{{ asset("assets/vendor_components/jvectormap/lib2/jquery-jvectormap-uk-mill-en.js") }}"></script>

	<!-- MinimalLite Admin App -->
	<script src="{{ asset("js/template.js") }}"></script>

	<!-- MinimalLite Admin dashboard demo (This is only for demo purposes) -->
	<script src="{{ asset("js/pages/dashboard.js") }}"></script>

	<!-- MinimalLite Admin for demo purposes -->
	<script src="{{ asset("js/demo.js") }}"></script>

  <!-- CK Editor -->
	<script src="{{ asset("assets/vendor_components/ckeditor/ckeditor.js") }}"></script>

	<!-- Bootstrap WYSIHTML5 -->
	<script src="{{ asset("assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js") }}"></script>

	<!-- MinimalLite Admin for editor -->
	<script src="{{ asset("js/pages/editor.js") }}"></script>

  <!-- steps  -->
	<script src="{{ asset("assets/vendor_components/jquery-steps-master/build/jquery.steps.js") }}"></script>

   <!-- validate  -->
    <script src="{{ asset("assets/vendor_components/jquery-validation-1.17.0/dist/jquery.validate.min.js") }}"></script>

	<!-- Sweet-Alert  -->
    <script src="{{ asset("assets/vendor_components/sweetalert/sweetalert.min.js") }}"></script>

    <script src="{{ asset("assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js") }}"></script>

    <!-- wizard  -->
  @yield('script')

</body>
</html>
