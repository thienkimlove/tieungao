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

    <!-- Custom Fonts -->
    <link href="{{ url('/css/admin/admin.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('/css/admin/select2.min.css')}}" rel="stylesheet" />
    <link href="{{ url('/js/admin/datetimepicker/build/jquery.datetimepicker.min.css')}}" rel="stylesheet" />
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

                    <li>
                        <a><i class="fa fa-picture-o fa-fw"></i>Orders<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li>
                                <a href="{{url('admin', 'orders')}}">List</a>
                            </li>

                        </ul>
                    </li>

                    <li>
                        <a><i class="fa fa-picture-o fa-fw"></i>Exports<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li>
                                <a href="{{url('admin', 'exports')}}">List</a>
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
<script src="{{url('js/admin/admin.js')}}"></script>
<script src="{{url('js/admin/ckeditor/ckeditor.js')}}"></script>
<script src="{{url('js/admin/select2.min.js')}}"></script>
<script src="{{url('js/admin/datetimepicker/build/jquery.datetimepicker.full.min.js')}}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=csrf_token]').attr('content') }
    });

</script>
@yield('footer')
</body>
</html>
