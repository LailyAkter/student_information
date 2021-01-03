<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{asset('storage/avatar/'.Auth::user()->image)}}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div>
            <div class="email">{{ Auth::user()->email }}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    @if(Request::is('admin*'))
                        <li class="{{ Request::is('admin/profile*') ? 'active' : '' }}">
                            <a href="{{ url('admin/profile') }}">
                                <i class="material-icons">settings</i>
                                <span>Settings</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('admin/password*') ? 'active' : '' }}">
                            <a href="{{ url('admin/password') }}">
                                <i class="material-icons">settings</i>
                                <span>Password Change</span>
                            </a>
                        </li>
                    @endif

                    @if(Request::is('student*'))
                        <li class="{{ Request::is('student/profile*') ? 'active' : '' }}">
                            <a href="{{ url('student/profile') }}">
                                <i class="material-icons">settings</i>
                                <span>Settings</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('student/password*') ? 'active' : '' }}">
                            <a href="{{ url('student/password') }}">
                                <i class="material-icons">settings</i>
                                <span>Password Change</span>
                            </a>
                        </li>
                    @endif

                    <li role="seperator" class="divider"></li>

                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i>Sign Out
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>

            @if(Request::is('admin*'))
                <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ url('admin/dashboard') }}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/student*') ? 'active' : '' }}">
                    <a href="{{ url('admin/student') }}">
                        <i class="material-icons">people</i>
                        <span>Students</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/course*') ? 'active' : '' }}">
                    <a href="{{ url('admin/course') }}">
                        <i class="material-icons">people</i>
                        <span>Courses</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/department*') ? 'active' : '' }}">
                    <a href="{{ url('admin/department') }}">
                        <i class="material-icons">settings</i>
                        <span>Department</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/info*') ? 'active' : '' }}">
                    <a href="{{ url('admin/info') }}">
                        <i class="material-icons">settings</i>
                        <span>Student Info </span>
                    </a>
                </li>
                
                <li class='header'>System</li>

                <li class="{{ Request::is('admin/profile*') ? 'active' : '' }}">
                    <a href="{{ url('admin/profile') }}">
                        <i class="material-icons">settings</i>
                        <span>Settings</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/password*') ? 'active' : '' }}">
                    <a href="{{ url('admin/password') }}">
                        <i class="material-icons">settings</i>
                        <span>Password Change</span>
                    </a>
                </li>

                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="material-icons">input</i>
                        <span>Logout</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endif

            @if(Request::is('student*'))
                <li class="{{ Request::is('student/dashboard') ? 'active' : '' }}">
                    <a href="{{ url('student/dashboard') }}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="{{ Request::is('student/information') ? 'active' : '' }}">
                    <a href="{{ url('student/information') }}">
                        <i class="material-icons">dashboard</i>
                        <span>Student Information</span>
                    </a>
                </li>
            
                
                <li class='header'>System</li>

                <li class="{{ Request::is('student/profile*') ? 'active' : '' }}">
                    <a href="{{ url('student/profile') }}">
                        <i class="material-icons">settings</i>
                        <span>Settings</span>
                    </a>
                </li>
                <li class="{{ Request::is('student/password*') ? 'active' : '' }}">
                    <a href="{{ url('student/password') }}">
                        <i class="material-icons">settings</i>
                        <span>Password Change</span>
                    </a>
                </li>

                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="material-icons">input</i>
                        <span>Logout</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endif

        </ul>
    </div>
    <!-- #Menu -->
</aside>