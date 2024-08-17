<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{route('home')}}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('/assets/images/logo-dark.png') }}" alt="" height="20">
            </span>
        </a>

        <a href="{{route('home')}}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('/assets/images/logo-light.png') }}" alt="" height="20">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="{{ route('dashboard.' . Auth::user()->role) }}" class="waves-effect"> 
                        <i class="uil-home-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="menu-title">{{ Auth::user()->role }}</li>

                <li>
                    <a href="{{ route('prediksi-nama.index') }}" class=" waves-effect">
                        <i class="mdi mdi-account-box-multiple"></i>
                        <span>Prediksi Nama</span>
                    </a>
                </li>

                <li>
                    <form id="logout-form-sidebar" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    
                    <a href="#" class="waves-effect" onclick="event.preventDefault(); document.getElementById('logout-form-sidebar').submit();">
                        <i class="mdi mdi-logout"></i>
                        <span>Logout</span>
                    </a>
                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
