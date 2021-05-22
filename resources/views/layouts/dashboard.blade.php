<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords"
        content="ngVoices, Patrotic Citizen of Nigeria, Voters Education, Legislator Profiles, Civic Education, Latest News about Legislators, PVC Registration Units." />
    <meta name="description"
        content="Get latest information about - the electoral process, your legislators in Nigeria" />
    <meta name="author" content="ngvoices.com" />
    <meta name="ngVoices" content="blog" />
    <meta property="og:image" content="{{ asset('favicon.ico') }}" />
    <meta property="og:description"
        content="ngVoices - Get latest information about - the electoral process, your legislators in Nigeria" />
    <meta property="og:keywords"
        content="ngVoices, Patrotic Citizen of Nigeria, Voters Education, Legislator Profiles, Civic Education, Latest News about Legislators, PVC Registration Units." />
    <meta property="og:url" content="ngvoices.com" />
    <meta property="og:title" content="ngVoices - Voters & Civic Education" />
    <title>@yield('page_title', 'ngVoices - Voters & Civic Education')</title>
    <link href="{{ asset('favicon.ico') }}" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" href="{{ asset('adminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminLTE/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('adminLTE/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/skins/skin-blue.min.css') }}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('adminLTE/bower_components/morris.js/morris.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('adminLTE/bower_components/jvectormap/jquery-jvectormap.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet"
        href="{{ asset('adminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet"
        href="{{ asset('adminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="{{ route('dashboard') }}" class="logo" style="background-color: #fff;"><img
                    src="{{ asset('images/ngVoices_header.png') }}" width="210" alt="ngVoices" /></a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="{{ asset('adminLTE/dist/img/user2-160x160.jpg') }}" class="user-image"
                                    alt="User Image">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{{ Auth()->user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="{{ asset('adminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle"
                                        alt="User Image">

                                    <p>
                                        {{ Auth()->user()->name }}
                                    </p>
                                </li>

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{ route('changePassword') }}" class="btn btn-default btn-flat">Change
                                            Password</a>
                                    </div>
                                    <div class="pull-right">
                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}" id="logoutForm"
                                            style="display: hidden;">
                                            @csrf
                                        </form>
                                        <a href="route('logout')" onclick="event.preventDefault();
                                                                  document.getElementById('logoutForm').submit();"
                                            class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ asset('adminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle"
                            alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{ Auth()->user()->name }}</p>
                        <!-- Status -->
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <!-- search form (Optional) -->
                <form action="#" method="get" class="sidebar-form">
                    @csrf
                    @method('GET')
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                    class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <!-- /.search form -->

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <!-- Optionally, you can add icons to the links -->
                    <li class="active"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>
                            <span>Dashboard</span></a></li>
                    <li class="treeview">
                        <a href="javascript:void(0);">
                            <i class="fa fa-flag-o"></i> <span>Languages</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('languageAdd') }}"><i class="fa fa-circle-o"></i> Add</a></li>
                            <li><a href="{{ route('languageIndex') }}"><i class="fa fa-circle-o"></i> View</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="javascript:void(0);">
                            <i class="fa fa-file-text"></i> <span>Articles</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('postAdd') }}"><i class="fa fa-circle-o"></i> Add</a></li>
                            <li><a href="{{ route('postIndex') }}"><i class="fa fa-circle-o"></i> View</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="javascript:void(0);">
                            <i class="fa fa-microphone"></i> <span>Voice Notes</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('voiceAdd') }}"><i class="fa fa-circle-o"></i> Add</a></li>
                            <li><a href="{{ route('voiceIndex') }}"><i class="fa fa-circle-o"></i> View</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="javascript:void(0);">
                            <i class="fa fa-video-camera"></i> <span>Videos</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('videoAdd') }}"><i class="fa fa-circle-o"></i> Add</a></li>
                            <li><a href="{{ route('videoIndex') }}"><i class="fa fa-circle-o"></i> View</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="javascript:void(0);">
                            <i class="fa fa-photo"></i> <span>Posters</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('photoAdd') }}"><i class="fa fa-circle-o"></i> Add</a></li>
                            <li><a href="{{ route('photoIndex') }}"><i class="fa fa-circle-o"></i> View</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="javascript:void(0);">
                            <i class="fa fa-share"></i> <span>BroadCasts</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('broadcastAdd') }}"><i class="fa fa-circle-o"></i> Add</a></li>
                            <li><a href="{{ route('broadcastIndex') }}"><i class="fa fa-circle-o"></i> View</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="javascript:void(0);">
                            <i class="fa fa-comment-o"></i> <span>Comments</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('commentAdd') }}"><i class="fa fa-circle-o"></i> Add</a></li>
                            <li><a href="{{ route('commentIndex') }}"><i class="fa fa-circle-o"></i> View</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="javascript:void(0);">
                            <i class="fa fa-suitcase"></i> <span>Categories</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('categoriesAdd') }}"><i class="fa fa-circle-o"></i> Add</a></li>
                            <li><a href="{{ route('categoriesIndex') }}"><i class="fa fa-circle-o"></i> View</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>

        @yield('content')

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.0.0
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; <script type="text/javascript">
                    document.write(new Date().getFullYear());
                </script> <a href="{{ route('index') }}">ngVoices.</a></strong> All rights reserved.
        </footer>


    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 3 -->
    <script src="{{ asset('adminLTE/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('adminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminLTE/dist/js/adminlte.min.js') }}"></script>
    <!-- jQuery 3 -->
    <script src="{{ asset('adminLTE/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('adminLTE/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
        
        $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
        }).then(function(value) {
        if (value) {
        window.location.href = url;
        }
        });
        });
    </script>
    <!-- Sweet Alert -->
    <script src="{{ asset('adminLTE/bower_components/sweetalert/sweetalert.min.js') }}"></script>
    @include('sweetalert::alert')

    <!-- Morris.js charts -->
    <script src="{{ asset('adminLTE/bower_components/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('adminLTE/bower_components/morris.js/morris.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('adminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <!-- jvectormap -->
    <script src="{{ asset('adminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('adminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('adminLTE/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('adminLTE/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('adminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ asset('adminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}">
    </script>
    <!-- Bootstrap WYSIHTML5 -->
    <!-- Slimscroll -->
    <script src="{{ asset('adminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('adminLTE/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('adminLTE/dist/js/pages/dashboard.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('adminLTE/dist/js/demo.js') }}"></script>

    <script src="{{ asset('adminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <!-- CK Editor -->
    <script type="text/javascript">
        CKEDITOR.replace('editor1', {
        filebrowserUploadUrl: "{{route('storeCkeditorImage', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    </script>
</body>

</html>