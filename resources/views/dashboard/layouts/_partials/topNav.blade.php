<ul class="nav navbar-top-links navbar-right">
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <img src="{{ isset($user->image) ? url('images/avatars/'.$user->image) : url('images/avatar-blank.png') }}" class="avatar img-circle img-thumbnail" width="20" alt="avatar" > <i class="fa fa-caret-down"></i>            
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li><a href="{{ route('user-profile.index') }}"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
            <li><a href="{{ url('user-profile#subscription') }}"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
            <li class="divider"></li>
            <li><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </ul>
    </li>
</ul>