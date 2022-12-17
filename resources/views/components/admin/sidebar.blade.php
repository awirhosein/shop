@php $route = Str::After(Route::currentRouteName(), '.'); @endphp

<nav class="sidebar col-lg-2 d-lg-block bg-light collapse">
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column mb-5 pr-0 pb-5" id="sidebar">

            {{-- dashboard --}}
            <li class="nav-item">
                <a class="nav-link {{ $route == 'dashboard' ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="fa-duotone fa-house-chimney"></i>
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
                        <i class="fa-duotone fa-users"></i>
                        <span>{{ __('Users') }}</span>
                    </a>
                </li>
                {{-- admins --}}
                <li class="nav-item">
                    <a class="nav-link {{ Str::is('admins.*', $route) ? 'active' : '' }}" href="{{ route('admin.admins.index') }}">
                        <i class="fa-solid fa-users-gear"></i>
                        <span>{{ __('Admins') }}</span>
                    </a>
                </li>
            </div>

            {{-- products --}}
            <li class="nav-item">
                <a class="nav-link {{ Str::is('products.*', $route) ? 'active' : '' }}" href="{{ route('admin.products.index') }}">
                    <i class="fa-duotone fa-cart-shopping"></i>
                    <span>{{ __('Products') }}</span>
                </a>
            </li>

            {{-- categories --}}
            <li class="nav-item">
                <a class="nav-link {{ Str::is('categories.*', $route) ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
                    <i class="fa-duotone fa-list"></i>
                    <span>{{ __('Categories') }}</span>
                </a>
            </li>

            {{-- attributes --}}
            <li class="nav-item">
                <a class="nav-link {{ Str::is('attributes.*', $route) ? 'active' : '' }}" href="{{ route('admin.attributes.index') }}">
                    <i class="fa-duotone fa-stars"></i>
                    <span>{{ __('Attributes') }}</span>
                </a>
            </li>
            
            {{-- colors --}}
            <li class="nav-item">
                <a class="nav-link {{ Str::is('colors.*', $route) ? 'active' : '' }}" href="{{ route('admin.colors.index') }}">
                    <i class="fa-duotone fa-palette"></i>
                    <span>{{ __('Colors') }}</span>
                </a>
            </li>

        </ul>
    </div>
</nav>
