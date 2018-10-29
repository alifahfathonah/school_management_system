<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>School Management System</title>
    <link type="text/css" rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset("assets/vendor_components/datatables.net-bs/css/dataTables.bootstrap.min.css") }}" />
  </head>
  <body>
    <nav class="navbar navbar-default" >
      <div class="container-fluid">
        <div class="navbar-header">
      <a class="navbar-brand" href="#" style="color:black;">Placement Test</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="{{ url('/placementtest/test') }}">Test</a></li>
        <li><a href="{{ url('/placementtest/history') }}">History</a></li>
        <li><a href="{{ url('/placementtest/rank') }}">Rangking</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Hi, {{ Auth::user()->name  }}</a></li>
      <li><a href="{{ route('logout') }}"
        onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
      </form>
    </ul>
    </div>
  </nav>
<div class="container">
  @yield('content')


</div>


<script src="{{ asset("assets/vendor_components/jquery/dist/jquery.js") }}"></script>
<script src="{{ asset("js/bootstrap.min.js") }}" ></script>
<script src="{{ asset("js/datatables.min.js") }}" ></script>
<script src="{{ asset("js/dataTables.bootstrap.min.js") }}" ></script>

<script>
    $(document).ready(function() {
        @yield('script')
	});
</script>
</body>
</html>
