<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>BeautyGuide</title>
    <link rel="icon" type="image/ico" href="{{ asset('/resource/icon.png') }}">

	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('lte/dist/css/AdminLTE.min.css') }}">
	<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="{{ asset('lte/dist/css/skins/_all-skins.min.css') }}">
    
  <link href="{{ asset('lte/plugins/select2/select2.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables/dataTables.bootstrap.css') }}">
  
  <link rel="stylesheet" type="text/css" href="/css/sweetalert.css">

    @yield('header-links')

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  	<!--[if lt IE 9]>
  	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  	<![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
  	<div class="wrapper">
  		<header class="main-header">
  			<!-- Logo -->
  			<a href="../../index2.html" class="logo">
  				<!-- mini logo for sidebar mini 50x50 pixels -->
  				<span class="logo-mini"><b>B</b>GU</span>
  				<!-- logo for regular state and mobile devices -->
  				<span class="logo-lg"><b>Beauty</b>Guide</span>
  			</a>
  			<!-- Header Navbar: style can be found in header.less -->
  			<nav class="navbar navbar-static-top">
  				<!-- Sidebar toggle button-->
  				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
  					<span class="sr-only">Toggle navigation</span>
  					<span class="icon-bar"></span>
  					<span class="icon-bar"></span>
  					<span class="icon-bar"></span>
  				</a>
  				<div class="navbar-custom-menu">

  				</div>
  			</nav>
  		</header>  		
  	</div>
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->

            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                {{-- <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                        <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
                    </ul>
                </li> --}}

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Menu</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/starwars/menu"><i class="fa fa-circle-o"></i> List</a></li>
                        <li><a href="/starwars/menu/create"><i class="fa fa-circle-o"></i> Create</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Category</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/starwars/category"><i class="fa fa-circle-o"></i> List</a></li>
                        <li><a href="/starwars/category/create"><i class="fa fa-circle-o"></i> Create</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Author</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/starwars/author"><i class="fa fa-circle-o"></i> List</a></li>
                        <li><a href="/starwars/author/create"><i class="fa fa-circle-o"></i> Create</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Post</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/starwars/post"><i class="fa fa-circle-o"></i> List</a></li>
                        <li><a href="/starwars/post/create"><i class="fa fa-circle-o"></i> Create</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Tag</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/starwars/tag"><i class="fa fa-circle-o"></i> List</a></li>                        
                    </ul>
                </li>
            </ul>
        </section>
    </aside>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                BeautyGuide
                <small>Version 2.0</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <section class="content">

            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="{{ asset('lte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('lte/plugins/fastclick/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('lte/dist/js/app.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src=""></script>

    <script src="{{ asset('lte/plugins/select2/select2.full.js') }}"></script>
    
    <!-- DataTables -->
    <script src="{{ asset('lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    
    <script src="/js/sweetalert.js"></script>
    
    @include('Alerts::show')

    @yield('footer-scripts')

</body>
</html>