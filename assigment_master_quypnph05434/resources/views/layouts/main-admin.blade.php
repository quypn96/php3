<!DOCTYPE html>
<html>
<head>
  <title>@yield('title')</title>
  @include('_share.admin.assets-css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('_share.admin.header')
  
  @include('_share.admin.aside')
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('pagename')
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">@yield('pagename')</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @yield('content')

    </section>
    <!-- /.content -->
  </div>
 

  @include('_share.admin.footer')

  @include('_share.admin.control-sidebar')


</div>



  @include('_share.admin.assets-js')
@yield('js')
</body>
</html>
