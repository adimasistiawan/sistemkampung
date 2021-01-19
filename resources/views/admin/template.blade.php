<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shortcut icon" href="{{asset('logo.png')}}">
  <link rel="stylesheet" href="{{asset('admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin_asset/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin_asset/bower_components/Ionicons/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin_asset/dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin_asset/dist/css/skins/_all-skins.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin_asset/plugins/jquery-confirm/css/jquery-confirm.css')}}">
  <link rel="stylesheet" href="{{asset('admin_asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin_asset/plugins/toastr/toastr.min.css')}}">
  @yield('css')
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a class="logo">
      <span class="logo-mini"><b>Admin</b></span>
      <span class="logo-lg"><b>Admin</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('user.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::guard('admin')->user()->nama}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href="{{route('penduduk.index')}}"><i class="fa fa-users"></i> <span>Penduduk</span></a></li>
        <li><a href="{{route('berita.index')}}"><i class="fa fa-newspaper-o"></i> <span>Berita</span></a></li>
        @if (Auth::guard('admin')->user()->role == "superadmin")
        <li><a href="{{route('admin.index')}}"><i class="fa fa-user-secret"></i> <span>Akun Admin</span></a></li>
        @endif
        @php
            $wargabaru = App\Warga::where('status','Belum Diverifikasi')->count();
        @endphp
        <li>
          <a href="{{route('warga.index')}}"><i class="fa fa-user-circle-o"></i>
           <span>Akun Warga</span>
           @if ($wargabaru > 0)
            <span class="pull-right-container">
              <span class="label label-danger pull-right">{{$wargabaru}}</span>
            </span>
           @endif
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gear"></i> <span>Pengaturan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('profil.index')}}"><i class="fa fa-circle-o"></i>Profil</a></li>
            <li><a href="{{route('web.index')}}"><i class="fa fa-circle-o"></i>Web</a></li>
            <li><a href="{{route('pekerjaan.index')}}"><i class="fa fa-circle-o"></i>Pekerjaan</a></li>
            <li><a href="{{route('ubahakun.index')}}"><i class="fa fa-circle-o"></i>Ubah Akun</a></li>
          </ul>
        </li>
        <li><a href="{{route('logout')}}"><i class="fa fa-sign-out text-red"></i> <span>Logout</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('content')

  <footer class="main-footer">
    
    <strong>Copyright &copy; 2020 <a>Kampung Notoharjo</a>.</strong>
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('admin_asset/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('admin_asset/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin_asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('admin_asset/dist/js/demo.js')}}"></script>
<script src="{{asset('admin_asset/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('admin_asset/plugins/jquery-confirm/js/jquery-confirm.js')}}"></script>
<script src="{{asset('admin_asset/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin_asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('admin_asset/dist/js/pages/dashboard2.js')}}"></script>
<script src="{{asset('admin_asset/dist/js/demo.js')}}"></script>
<script>
  $(function () {
    
    $('#datatable').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
@yield('js')
</body>
</html>
