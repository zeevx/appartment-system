<div class="wrapper ">



    <div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ url('/') }}/assets/img/sidebar-1.jpg">
        <div class="logo"><a href="{{ route('home') }}" class="simple-text logo-normal">
                {{ env('APP_NAME') }}
            </a></div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item {{request()->routeIs('client.home*')? 'active' : '' }} ">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('client.messages*')? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('client.messages') }}">
                        <i class="material-icons">messages</i>
                        <?php $count = Auth::user()->newThreadsCount(); ?>
                        <p>Messages ({{ ($count > 0)?$count:'0' }})</p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('client.notice*')? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('client.notice.index') }}">
                        <i class="material-icons">notifications</i>
                        <p>Notices ({{ $count_unread_notices }})</p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('client.fullcalendar*')? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('client.fullcalendar') }}">
                        <i class="material-icons">content_paste</i>
                        <p>Events ({{ count($events) }})</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#" onclick="md.showNotification('top','center', 'sorry, you have to be a tenant to make a complaint','danger')">
                        <i class="material-icons">assignment_late</i>
                        <p>Complaint</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#" onclick="md.showNotification('top','center', 'sorry, you have to be a tenant to request a service','danger')">
                        <i class="material-icons">contact_support</i>
                        <p>Request Service</p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('enquiry*')? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('enquiry') }}">
                        <i class="material-icons">perm_phone_msg</i>
                        <p>Make Enquiry</p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('client.user*')? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('client.user.index') }}">
                        <i class="material-icons">perm_identity</i>
                        <p>Profile</p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('client.faq*')? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('client.faq.index') }}">
                        <i class="material-icons">wb_incandescent</i>
                        <p>FAQ</p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('client.kyc*')? 'active' : '' }}">
                    <a class="nav-link" data-toggle="collapse" href="#KYC">
                        <i class="material-icons">folder_shared</i>
                        <p>KYC Forms
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="KYC">
                        <ul class="nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('client.kyc.index','id=1') }}">
                                    <span class="sidebar-mini"> CT </span>
                                    <span class="sidebar-normal"> Corporate Tenant </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('client.kyc.index','id=2') }}">
                                    <span class="sidebar-mini"> IT </span>
                                    <span class="sidebar-normal"> Individual Tenant </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('client.kyc.index','id=3') }}">
                                    <span class="sidebar-mini"> OW </span>
                                    <span class="sidebar-normal"> Owner </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="{{ route('client.home.index') }}">{{ env('APP_NAME') }} Client</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">person</i>
                                <p class="d-lg-none d-md-block">
                                    Account
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                <a class="dropdown-item" href="{{ route('client.user.index') }}">Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
