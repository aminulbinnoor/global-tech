<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @can("viewAny", App\Models\User::class)
            <li class="nav-item">
                <a href="{{route("users.index")}}" class="nav-link {{ $user_menu ?? "" }}">
                    <i class="fas fa-users"></i> 
                    <p>Users</p>
                </a>
            </li>
        @endcan
        @can("viewAny", App\Models\Role::class)
            <li class="nav-item">
                <a href="{{route("roles.index")}}" class="nav-link {{ $role_menu ?? "" }}">
                    <i class="fas fa-user-plus"></i> 
                    <p>Roles</p>
                </a>
            </li>
        @endcan
        @can("viewAny", App\Models\Permission::class)
            <li class="nav-item">
                <a href="{{route("permissions.index")}}" class="nav-link {{ $permission_menu ?? "" }}">
                    <i class="fa fa-user-shield"></i> 
                    <p>Permissions</p>
                </a>
            </li>
        @endcan
        @can("update", App\Models\Setting::class)
            <li class="nav-item">
                <a href="{{route("settings.show")}}" class="nav-link {{ $setting_menu ?? "" }}">
                    <i class="fas fa-cogs"></i> 
                    <p>Settings</p>
                </a>
            </li>
        @endcan

        @can("viewAny", App\Models\Category::class)
            <li class="nav-item">
                <a href="{{route("categories.index")}}" class="nav-link {{ $category_menu ?? "" }}">
                    <i class="fas fa-tree"></i> 
                    <p>Category</p>
                </a>
            </li>
        @endcan

        @can("viewAny", App\Models\Log::class)
            <li class="nav-item">
                <a href="{{route("logs.index")}}" class="nav-link {{ $log_menu ?? "" }}">
                    <i class="fa fa-history"></i> 
                    <p>Logs</p>
                </a>
            </li>
        @endcan
    </ul>
</nav>
