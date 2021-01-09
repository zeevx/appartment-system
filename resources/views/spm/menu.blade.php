<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ url('/') }}/assets/img/sidebar-1.jpg">
        <div class="logo"><a href="{{ route('home') }}" class="simple-text logo-normal">
                {{ env('APP_NAME') }}
            </a></div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item {{request()->routeIs('spm.home*')? 'active' : '' }} ">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('spm.tenant*')? 'active' : '' }} ">
                    <a class="nav-link" href="{{ route('spm.tenant.index') }}">
                        <i class="material-icons">addchart</i>
                        <p>Tenants</p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('spm.client*')? 'active' : '' }} ">
                    <a class="nav-link" href="{{ route('spm.client.index') }}">
                        <i class="material-icons">assignment_ind</i>
                        <p>Clients</p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('spm.messages*')? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('spm.messages') }}">
                        <i class="material-icons">messages</i>
                        <?php $count = Auth::user()->newThreadsCount(); ?>
                        <p>Messages({{ ($count > 0)?$count:'0' }})</p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('request*')? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('request') }}">
                        <i class="material-icons">contact_support</i>
                        <p>Requested Services</p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('spm.service*')? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('spm.service.index') }}">
                        <i class="material-icons">business</i>
                        <p>Services</p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('spm.facility*')? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('spm.facility.index') }}">
                        <i class="material-icons">settings_input_component</i>
                        <p>Assets</p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('spm.property*')? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('spm.property.index') }}">
                        <i class="material-icons">storage</i>
                        <p>Properties</p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('unit*')? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('units') }}">
                        <i class="material-icons">line_style</i>
                        <p>Residential Units</p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('spm.notice*')? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('spm.notice.index') }}">
                        <i class="material-icons">notifications</i>
                        <p>Notices ({{ $count_unread_notices }})</p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('spm.fullcalendar*')? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('spm.fullcalendar') }}">
                        <i class="material-icons">content_paste</i>
                        <p>Events ({{ count($events) }})</p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('enquiry*')? 'active' : '' }}">
                    <a class="nav-link" href="#">
                        <i class="material-icons">receipt</i>
                        <p>Invoices</p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('spm.user*')? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('spm.user.index') }}">
                        <i class="material-icons">perm_identity</i>
                        <p>Profile</p>
                    </a>
                </li>
                <li class="nav-item {{request()->routeIs('spm.faq*')? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('spm.faq.index') }}">
                        <i class="material-icons">wb_incandescent</i>
                        <p>FAQ</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="{{ route('spm.home.index') }}">{{ env('APP_NAME') }} Senior Property Manager</a>
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
                                <a class="dropdown-item" href="{{ route('spm.user.index') }}">Profile</a>
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
