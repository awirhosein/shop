@php $route = Str::After(Route::currentRouteName(), '.'); @endphp

<nav class="sidebar col-lg-2 d-lg-block bg-light collapse">
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column mb-5 pr-0 pb-5" id="sidebar">

            {{-- Home --}}
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa fa-home"></i>
                    <span>{{ __('Dashboard') }}</span>
                </a>
            </li>

            {{-- members --}}
            <li class="nav-item collapsed" data-toggle="collapse" data-target="#members">
                <a class="nav-link pointer">
                    <i class="fa fa-chevron-left"></i>
                    <span>{{ __('Members') }}</span>
                </a>
            </li>

            <div id="members" class="collapse" data-parent="#sidebar">
                {{-- users --}}
                <li class="nav-item">
                    <a class="nav-link {{ Str::is('users.*', $route) ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                        <i class="fa fa-users"></i>
                        <span>{{ __('Users') }}</span>
                    </a>
                </li>
                {{-- admins --}}
                <li class="nav-item">
                    <a class="nav-link {{ Str::is('admins.*', $route) ? 'active' : '' }}" href="{{ route('admin.admins.index') }}">
                        <i class="fa fa-users"></i>
                        <span>{{ __('Admins') }}</span>
                    </a>
                </li>
            </div>

        </ul>
    </div>
</nav>
