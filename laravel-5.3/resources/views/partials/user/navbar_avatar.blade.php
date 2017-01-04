<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{ url('/images/user2-160x160.jpg') }}"
                     class="user-image" alt="User Image">
                <span class="hidden-xs">{{ Auth::check() ? Auth::user()->username : 'login' }}</span>
            </a>
            <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                    <img src="{{ url('/images/user2-160x160.jpg') }}"
                         class="img-circle" alt="User Image">
                    <p>{{Auth::user()->username}}</p>
                </li>
                <!-- Menu Body -->
                <!-- Menu Footer-->
                <li class="user-footer">
                    <div class="pull-left">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-default btn-flat"
                           href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();"
                        >
                           Logout
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</div>