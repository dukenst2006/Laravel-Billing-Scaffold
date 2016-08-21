<ul class="nav navbar-top-links navbar-right">
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            @if ( Auth::user()->image )
                <img src="{{url('images/person-images/'.Auth::user()->image)}}" class="avatar img-circle img-thumbnail" width="20" alt="avatar" > <i class="fa fa-caret-down"></i>
            @else
                <img src="{{url('images/avatar-blank.png')}}" class="avatar img-circle img-thumbnail" width="20" alt="avatar" > <i class="fa fa-caret-down"></i>
            @endif
            
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li><a href="{{ route('user-profile.index') }}"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
            <li><a href="{{ url('user-profile#subscription') }}"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
            <li class="divider"></li>
            <li><a href="{{ url('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
        </ul>
    </li>
</ul>