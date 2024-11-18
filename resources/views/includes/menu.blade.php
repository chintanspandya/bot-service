<div class="menu" id="menu">
    <ul class="menu-inner">
        <li class="menu-item"><a href="{{ route('home') }}" class="menu-link white-text {{ request()->is('/') ? 'active': '' }}">Dashboard</a></li>
        <li class="menu-item"><a href="{{ route('admin.index') }}" class="menu-link white-text {{ request()->is('admin*') ? 'active': '' }}">Administration</a>
        </li>
        @guest
            <li class="menu-item"><a href="{{ route('login') }}" class="menu-link white-text {{ request()->is('login') ? 'active': '' }}">Login</a></li>
        @endguest
        @auth
            <li class="menu-item"><a href="{{ route('my-profile') }}" class="menu-link white-text {{ request()->is('my-profile') ? 'active': '' }}">My Profile</a></li>
        @endauth
    </ul>
</div>
