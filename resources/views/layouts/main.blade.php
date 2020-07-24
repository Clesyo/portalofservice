<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

   <!-- Title -->
		<title>{{__('My Portal Sevice - Admin Dashboard')}}</title>


		<!-- *************
			************ Common Css Files *************
		************ -->
		<!-- Bootstrap css -->
		<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
		<!-- Icomoon Font Icons css -->
		<link rel="stylesheet" href="{{asset('fonts/style.css')}}">
		<!-- Main css -->
		<link rel="stylesheet" href="{{asset('css/main.css')}}">
        <link rel="stylesheet" href="{{asset('css/script.css')}}">

        <!-- *************
			************ Vendor Css Files *************
		************ -->
		<!-- DateRange css -->
		<link rel="stylesheet" href="{{asset('plugins/daterange/daterange.css')}}" />

		<!-- Data Tables -->
		<link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bs4.css')}}" />
		<link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bs4-custom.css')}}" />
        <link href="{{asset('plugins/datatables/buttons.bs.css')}}" rel="stylesheet" />
        <!-- Bootstrap Select CSS -->
        <link rel="stylesheet" href="{{asset('plugins/bs-select/bs-select.css')}}"/>
         <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">

        <script src="{{asset('js/jquery.min.js')}}"></script>

</head>
<body>

    <!--Page wrapper start -->
    <div class="page-wrapper">
        <!--Nav sidabar wrapper start -->
        <nav class="sidebar-wrapper">
            <!-- Sidebar band start-->
            <div class="sidebar-brand">
                <a href="index.html" class="logo">
                    <img src="{{asset('img/logo.png')}}" alt="Le Rouge Admin Dashboard">
                </a>
            </div>
            <!-- Sidebar band end-->

            <div class="custom-scroll">
            <!-- Sidebar content start-->
            <div class="sideber-content ">
                <!-- Sidebar menu start-->
                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">General</li>
                        <li class="sidebar-dropdown active">
                            <a href="#">
                                <i class="icon-devices_other"></i>
                                <span class="menu-text">Dashboards</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="index.html" class="current-page">Admin Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="sales-dashboard.html">Sales Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="crm-dashboard.html">CRM Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="ecommerce-dashboard.html">Ecommerce Dashboard</a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="chat.html">
                                <i class="icon-message-circle"></i>
                                <span class="menu-text">Chat</span>
                            </a>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="icon-calendar1"></i>
                                <span class="menu-text">Calendars</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="calendar.html">Daygrid View</a>
                                    </li>
                                    <li>
                                        <a href="calendar-external-draggable.html">External Draggable</a>
                                    </li>
                                    <li>
                                        <a href="calendar-google.html">Google Calendar</a>
                                    </li>
                                    <li>
                                        <a href="calendar-list-view.html">List View</a>
                                    </li>
                                    <li>
                                        <a href="calendar-selectable.html">Selectable</a>
                                    </li>
                                    <li>
                                        <a href="calendar-week-numbers.html">Week Numbers</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="icon-save2"></i>
                                <span class="menu-text">Cadastro</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="{{ url('empresa') }}">Empresa</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('endereco', []) }}">Endereço</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('servico', []) }}">Serviços</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="header-menu">Gerenciamento</li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="icon-settings1"></i>
                                <span class="menu-text">Acessos</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="{{ url('settings/module', []) }}">Módulos</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('settings/role', []) }}">Funções</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('settings/permission', []) }}">Permissões</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>
                <!-- Sidebar menu end-->
            </div>
            <!-- Sidebar content end-->
        </div>
        </nav>
        <!--Nav sidabar wrapper end -->

        <!--Page content start -->
        <div class="page-content">

            <!--Header start -->
            <header class="header">
                <div class="toggle-btns">
                    <a id="toggle-sidebar" href="#">
                        <i class="icon-list"></i>
                    </a>
                    <a id="pin-sidebar" href="#">
                        <i class="icon-list"></i>
                    </a>
                </div>
                <div class="header-items">
                    <!-- Custom search start -->
                    <div class="custom-search">
                        <input type="text" class="search-query" placeholder="Search here ...">
                        <i class="icon-search1"></i>
                    </div>
                    <!-- Custom search end -->

                    <!-- Header actions start -->
                    <ul class="header-actions">
                        <li class="dropdown">
                            <a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
                                <i class="icon-box"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
                                <i class="icon-bell"></i>
                                <span class="count-label">8</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                                <span class="user-name">{{Auth::user()->name}}</span>
                                <span class="avatar">
                                    <img src="{{asset('img/user24.png')}}" alt="avatar">
                                    <span class="status busy"></span>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
                                <div class="header-profile-actions">
                                    <div class="header-user-profile">
                                        <div class="header-user">
                                            <img src="{{asset('img/user24.png')}}" alt="Admin Template">
                                        </div>
                                        <h5 class="text-center">{{Auth::user()->name}}</h5>
                                        <p>Admin</p>
                                    </div>
                                    <a href="user-profile.html"><i class="icon-user1"></i> My Profile</a>
                                    <a href="account-settings.html"><i class="icon-settings1"></i> Account Settings</a>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="icon-log-out1"></i> Sign Out</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!-- Header actions end -->

                </div>
            </header>
            <!--Header end -->




            <!--Main container start -->
            <div class="main-container">
                @yield('content')
            </div>
            <!--Main container end -->

        </div>
        <!--Page content end -->
    </div>
    <!--Page wrapper end -->






    <!--**************************
			**************************
				**************************
							Required JavaScript Files
				**************************
			**************************
		**************************-->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->

		<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('js/moment.js')}}"></script>


		 <!-- *************
			************ Vendor Js Files *************
		************* -->
		<!-- Slimscroll JS -->
		<script src="{{asset('plugins/slimscroll/slimscroll.min.js')}}"></script>
		<script src="{{asset('plugins/slimscroll/custom-scrollbar.js')}}"></script>

		<!-- Daterange -->
		<script src="{{asset('plugins/daterange/daterange.js')}}"></script>
		<script src="{{asset('plugins/daterange/custom-daterange.js')}}"></script>

		<!-- Polyfill JS -->
        <script src="{{asset('plugins/polyfill/polyfill.min.js')}}"></script>

        <!-- Data Tables -->
		<script src="{{asset('plugins/datatables/dataTables.min.js')}}"></script>
		<script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

		<!-- Custom Data tables -->
		<script src="{{asset('plugins/datatables/custom/custom-datatables.js')}}"></script>
		<script src="{{asset('plugins/datatables/custom/fixedHeader.js')}}"></script>

		{{-- <!-- Apex Charts -->
		<script src="{{asset('plugins/apex/apexcharts.min.js')}}"></script>
		<script src="{{asset('plugins/apex/admin/visitors.js')}}"></script>
		<script src="{{asset('plugins/apex/admin/deals.js')}}"></script>
		<script src="{{asset('plugins/apex/admin/income.j')}}s"></script>
        <script src="{{asset('plugins/apex/admin/customers.js')}}"></script> --}}

        <!-- Bootstrap Select JS -->
		<script src="{{asset('plugins/bs-select/bs-select.min.js')}}"></script>

		<!-- Main JS -->
        <script src="{{asset('js/main.js')}}"></script>
        <!-- Toastr -->
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>

@if (Session::has('message'))
    <script>
        var type = "{{ Session::get('alert-type') }}";
        var title = "{{ Session::get('title') }}";

        switch (type) {
            case 'success':
                $(document).Toasts('create', {e
                    title: title,
                    class: 'bg-'+type,
                    autohide: true,
                    delay: 4000,
                    body: "{{ Session::get('message') }}"
                });
            break;
            case 'error':
                $(document).Toasts('create', {
                    title: title,
                    class: 'bg-'+type,
                    autohide: true,
                    delay: 4000,
                    body: "{{ Session::get('message') }}"
                });

            break;

            default:
                break;
        }
    </script>
@endif
</body>
</html>
