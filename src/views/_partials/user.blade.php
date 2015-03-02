<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="/img/photo.jpg" class="user-image" alt="User Image"/>
                <span class="hidden-xs">{{ $user->name ?: 'admin' }}</span>
            </a>
            <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                    <img src="/img/photo.jpg" class="img-circle" alt="User Image" />
                    <p>
                        {{ $user->name ?: 'admin' }} - Web Developer
                        <small>Member since {{ $user->created_at->format('F d, Y') }}</small>
                    </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <div class="pull-left">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                        <a href="{{ Admin::instance()->router->routeToAuth('logout') }}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</div>