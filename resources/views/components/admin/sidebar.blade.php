<nav class="sidebar col-lg-2 d-lg-block bg-light collapse">
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column mb-5 pr-0 pb-5" id="sidebar">

            {{-- dashboard --}}
            <x-admin.sidebar-item title="Dashboard" :link="route('admin.dashboard')" icon="fad fa-house-chimney" active="dashboard" />

            {{-- members --}}
            <li class="nav-item collapsed" data-toggle="collapse" data-target="#members">
                <a class="nav-link pointer">
                    <i class="fa fa-chevron-left"></i>
                    <span>{{ __('Members') }}</span>
                </a>
            </li>

            <div id="members" class="collapse" data-parent="#sidebar">
                <x-admin.sidebar-item title="Users" :link="route('admin.users.index')" icon="fad fa-users" active="users.*" />

                <x-admin.sidebar-item title="Admins" :link="route('admin.admins.index')" icon="fas fa-users-gear" active="admins.*" />
            </div>

            <x-admin.sidebar-item title="Products" :link="route('admin.products.index')" icon="fad fa-cart-shopping" active="products.*" />

            <x-admin.sidebar-item title="Categories" :link="route('admin.categories.index')" icon="fad fa-list" active="categories.*" />

            <x-admin.sidebar-item title="Attributes" :link="route('admin.attributes.index')" icon="fad fa-stars" active="attributes.*" />

            <x-admin.sidebar-item title="Colors" :link="route('admin.colors.index')" icon="fad fa-palette" active="colors.*" />

        </ul>
    </div>
</nav>
