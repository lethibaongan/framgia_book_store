<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('page-title') | {{ trans('admin.admin') }}</title>

        <!-- Bootstrap -->
        {{ Html::style('assets/bootstrap/dist/css/bootstrap.min.css') }}
        <!-- Font Awesome -->
        {{ Html::style('assets/font-awesome/css/font-awesome.min.css')}}
        <!-- NProgress -->
        {{ Html::style('assets/nprogress/nprogress.css') }}
        <!-- jQuery custom content scroller -->
        {{ Html::style('assets/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css') }}
        @yield('css')
        <!-- Custom Theme Style -->
        {{ Html::style('css/custom.min.css') }}
        <!-- My Style -->
        {{ Html::style('css/mystyle.css') }}
        @yield('script_header')
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col menu_fixed">
                    <div class="left_col scroll-view">

                        <div class="clearfix"></div>

                        <!-- menu profile quick info -->
                        <div class="profile clearfix">
                            <div class="profile_pic">
                                <img src="{{ asset('images/admin/ava.png') }}" alt="..." class="img-circle profile_img">
                            </div>
                            <div class="profile_info">
                                <span>{{ trans('admin.Welcome') }},</span>
                                <h2>John Doe</h2>
                            </div>
                        </div>
                        <!-- /menu profile quick info -->

                        <br />

                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <h3>{{ trans('admin.panel') }}</h3>
                                <ul class="nav side-menu">
                                    <li><a><i class="fa fa-home"></i> {{ trans('admin.home') }} <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="#">{{ trans('admin.home') }}</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-user-circle-o"></i> {{ trans('admin.manage_user') }} <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="#">{{ trans('admin.view_list_user') }}</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-tasks"></i> {{ trans('admin.manage_slides') }} <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="#">{{ trans('admin.view_list_slide') }}</a></li>
                                            <li><a href="#">{{ trans('admin.add_slide') }}</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-book"></i> {{ trans('admin.manage_book') }} <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="#">{{ trans('admin.view_list_book') }}</a></li>
                                            <li><a href="#">{{ trans('admin.add_book') }}</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-bars"></i> {{ trans('admin.manage_cate') }} <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="#">{{ trans('admin.view_list_cate') }}</a></li>
                                            <li><a href="#">{{ trans('admin.add_cate') }}</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-sticky-note-o"></i>{{ trans('admin.manage_order') }} <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="#">{{ trans('admin.approve_order') }}</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-bar-chart-o"></i>{{ trans('admin.statistic') }} <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="#">{{ trans('admin.daily') }}</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /sidebar menu -->

                        <!-- /menu footer buttons -->
                        <div class="sidebar-footer hidden-small">
                            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>
                        </div>
                        <!-- /menu footer buttons -->
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav>
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <img src="{{ asset('images/admin/ava.png') }}" alt="">John Doe
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <li><a href="javascript:;"> Profile</a></li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="badge bg-red pull-right">50%</span>
                                                <span>Settings</span>
                                            </a>
                                        </li>
                                        <li><a href="javascript:;">Help</a></li>
                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                {{ trans('admin.logout') }}
                                                <i class="fa fa-sign-out pull-right" aria-hidden="true"></i>
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>

                                <li role="presentation" class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-envelope-o"></i>
                                        <span class="badge bg-green">6</span>
                                    </a>
                                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                        <li>
                                            <a>
                                                <span class="image"><img src="{{ asset('images/admin/ava.png') }}" alt="Profile Image" /></span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                <span class="image"><img src="{{ asset('images/admin/ava.png') }}" alt="Profile Image" /></span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                <span class="image"><img src="{{ asset('images/admin/ava.png') }}" alt="Profile Image" /></span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                <span class="image"><img src="{{ asset('images/admin/ava.png') }}" alt="Profile Image" /></span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="text-center">
                                                <a>
                                                    <strong>See All Alerts</strong>
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- page content -->
                <div class="right_col" role="main">
                	@yield('page-content')
                </div>
                <!-- /page content -->

                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>

        <!-- jQuery -->
        {{ Html::script('assets/jquery/dist/jquery.min.js') }}
        <!-- Bootstrap -->
        {{ Html::script('assets/bootstrap/dist/js/bootstrap.min.js') }}
        <!-- FastClick -->
        {{ Html::script('assets/fastclick/lib/fastclick.js') }}
        <!-- NProgress -->
        {{ Html::script('assets/nprogress/nprogress.js') }}
        <!-- jQuery custom content scroller -->
        {{ Html::script('assets/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}

        <!-- Custom Theme Scripts -->
        {{ Html::script('js/custom.min.js') }}
        @yield('script')
    </body>
</html>
