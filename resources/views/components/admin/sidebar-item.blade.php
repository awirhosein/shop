@php
    $route = Str::After(Route::currentRouteName(), '.');
@endphp

<li class="nav-item">
    <a class="nav-link @active(Str::is($active, $route))" href="{{ $link }}">
        <i class="{{ $icon }}"></i>
        <span>{{ __($title) }}</span>
    </a>
</li>
