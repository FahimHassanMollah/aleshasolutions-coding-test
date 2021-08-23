<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
    <div class="brand-sidebar">
        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="#"><img class="hide-on-med-and-down" src="{{ asset('app-assets/images/logo/materialize-logo-color.png') }}" alt="materialize logo"/><img class="show-on-medium-and-down hide-on-med-and-up" src="{{ asset('app-assets/images/logo/materialize-logo.png') }}" alt="materialize logo"/><span class="logo-text hide-on-med-and-down">{{ config('app.name', "Test Coding") }}</span></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
    </div>
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
        <li class="bold"><a class="waves-effect waves-pink {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="material-icons">dashboard</i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a></li>
        <li class="navigation-header"><a class="navigation-header-text">System</a><i class="navigation-header-icon material-icons">more_horiz</i></li>
        @canany(['user-view-any', 'user-view', 'user-create', 'user-update', 'user-delete', 'user-group-view-any', 'user-group-view', 'user-group-create', 'user-group-Update', 'user-group-delete'])
        <li class="bold
            @if(Route::currentRouteName() == "admin.users.index"
            or Route::currentRouteName() == "admin.users.create"
            or Route::currentRouteName() == "admin.users.show"
            or Route::currentRouteName() == "admin.users.edit"

            or Route::currentRouteName() == "admin.userGroups.index"
            or Route::currentRouteName() == "admin.userGroups.create"
            or Route::currentRouteName() == "admin.userGroups.show"
            or Route::currentRouteName() == "admin.userGroups.edit")
            {{ 'active open' }}
            @endif">
            <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">people</i><span class="menu-title" data-i18n="Menu levels">Users</span></a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    @canany(['user-view-any', 'user-view', 'user-create', 'user-update', 'user-delete'])
                    <li>
                        <a class="waves-effect waves-pink
                        @if(Route::currentRouteName() == "admin.users.index"
                            or Route::currentRouteName() == "admin.users.create"
                            or Route::currentRouteName() == "admin.users.show"
                            or Route::currentRouteName() == "admin.users.edit")
                                {{ 'active' }}
                        @endif" href="{{ route('admin.users.index') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Second level">Users</span>
                        </a>
                    </li>
                    @endcanany
                    @canany(['user-group-view-any', 'user-group-view', 'user-group-create', 'user-group-Update', 'user-group-delete'])
                    <li>
                        <a class="waves-effect waves-pink
                        @if(Route::currentRouteName() == "admin.userGroups.index"
                            or Route::currentRouteName() == "admin.userGroups.create"
                            or Route::currentRouteName() == "admin.userGroups.show"
                            or Route::currentRouteName() == "admin.userGroups.edit")
                                {{ 'active' }}
                        @endif" href="{{ route('admin.userGroups.index') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Second level">User Groups</span>
                        </a>
                    </li>
                    @endcanany
                </ul>
            </div>
        </li>
        @endcanany


        <li class="navigation-header"><a class="navigation-header-text">Catalog</a><i class="navigation-header-icon material-icons">more_horiz</i></li>
        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">style</i><span class="menu-title" data-i18n="Menu levels">Products</span></a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li><a href="JavaScript:void(0)"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Second level">Categories</span></a></li>
                    <li><a href="JavaScript:void(0)"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Second level">Products</span></a></li>
                </ul>
            </div>
        </li>

        <li class="navigation-header"><a class="navigation-header-text">Sales</a><i class="navigation-header-icon material-icons">more_horiz</i></li>
        <li class="bold"><a class="waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">monetization_on</i><span class="menu-title" data-i18n="Menu levels">Sales</span></a></li>

        <li class="navigation-header"><a class="navigation-header-text">Customers</a><i class="navigation-header-icon material-icons">more_horiz</i></li>
        <li class="bold"><a class="waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">assignment_ind</i><span class="menu-title" data-i18n="Menu levels">Customers</span></a></li>

    </ul>
    <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>
