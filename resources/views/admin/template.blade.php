<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf_token" content="{{ csrf_token() }}">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{url('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{url('frontend/vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ url('frontend/dist/css/sb-admin-2.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Morris Charts CSS -->
    <link href="{{url('frontend/vendor/morrisjs/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{url('frontend/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">


    <link href="{{ url('js/select2/dist/css/select2.css')}}" rel="stylesheet" />

    <link href="{{ url('js/datetimepicker/build/jquery.datetimepicker.min.css')}}" rel="stylesheet" />
    <link href="{{ url('js/ckeditor/contents.css')}}" rel="stylesheet" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <!-- /.navbar-header -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">Admin</a>
        </div>

        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown-user -->
            <!-- /.dropdown -->

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="{{url('admin/logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
        </ul>

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="{{url('admin')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>

                    <li>
                        <a><i class="fa fa-files-o fa-fw"></i>Users<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li>
                                <a href="{{url('admin', 'users')}}">List</a>
                            </li>

                            <li>
                                <a href="{{url('admin/users/create')}}">Create</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a><i class="fa fa-folder-o fa-fw"></i>Categories<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li>
                                <a href="{{url('admin', 'categories')}}">List</a>
                            </li>

                            <li>
                                <a href="{{url('admin/categories/create')}}">Create</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a><i class="fa fa-floppy-o fa-fw"></i>Suppliers<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li>
                                <a href="{{url('admin', 'suppliers')}}">List</a>
                            </li>

                            <li>
                                <a href="{{url('admin/suppliers/create')}}">Create</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a><i class="fa fa-newspaper-o fa-fw"></i>Products<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li>
                                <a href="{{url('admin', 'products')}}">List</a>
                            </li>

                            <li>
                                <a href="{{url('admin/products/create')}}">Create</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a><i class="fa fa-picture-o fa-fw"></i>Imports<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li>
                                <a href="{{url('admin', 'imports')}}">List</a>
                            </li>

                            <li>
                                <a href="{{url('admin/imports/create')}}">Create</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>


    <div id="page-wrapper">
        @include('flash::message')
        @yield('content')
    </div>

</div>
<script>
    window.baseUrl = '{{url('/')}}';
</script>
<script src="{{url('frontend/vendor/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{url('frontend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{url('frontend/vendor/metisMenu/metisMenu.min.js')}}"></script>

<!-- Morris Charts JavaScript -->
<script src="{{url('frontend/vendor/raphael/raphael.min.js')}}"></script>
<script src="{{url('frontend/vendor/morrisjs/morris.min.js')}}"></script>
<script src="{{url('frontend/data/morris-data.js')}}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{url('frontend/dist/js/sb-admin-2.js')}}"></script>

<script src="{{url('js/ckeditor/ckeditor.js')}}"></script>
<script src="{{url('js/select2/dist/js/select2.js')}}"></script>
<script src="{{url('js/datetimepicker/build/jquery.datetimepicker.min.js')}}"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=csrf_token]').attr('content') }
    });

</script>
@yield('footer')
</body>
</html>