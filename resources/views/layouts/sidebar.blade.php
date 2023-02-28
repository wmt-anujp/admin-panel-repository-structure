<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/" class="brand-link">
        <img src="{{ url('src/img/dustbin.webp') }}" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Valet Trash</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @if (Auth::guard('admins')->check())
                    <li class="nav-item">
                        <a href="{{route('admin.Dashboard')}}" class="nav-link {{(request()->is('admin/dashoard')) ? 'active' : ''}}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('admin.Community')}}" class="nav-link {{(request()->is('admin/communities*')) ? 'active' : ''}}">
                            <i class="nav-icon fa-sharp fa-solid fa-street-view"></i>
                            <p>Communities</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('admin.Property')}}" class="nav-link {{(request()->is('admin/properties*')) ? 'active' : ''}}">
                            <i class="nav-icon fa-sharp fa-solid fa-building"></i>
                            <p>Properties</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('getManageUserPage')}}" class="nav-link {{(request()->is('admin/manage/user*')) ? 'active' : ''}}">
                            <i class="nav-icon fa-sharp fa-solid fa-person"></i>
                            <p>Manage Users</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('admin.payroll.page')}}" class="nav-link {{(request()->is('admin/payroll*')) ? 'active' : ''}}">
                            <i class="nav-icon fa-solid fa-sack-dollar"></i>
                            <p>Payroll</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('admin.schedule.page')}}" class="nav-link {{(request()->is('admin/schedule*')) ? 'active' : ''}}">
                            <i class="nav-icon bi bi-calendar-day"></i>
                            <p>Scheduling</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('admin.Observation')}}" class="nav-link {{(request()->is('admin/observation*')) ? 'active' : ''}}">
                            <i class="nav-icon bi bi-eye-fill"></i>
                            <p>Observations</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('admin.dayOff.Page')}}" class="nav-link {{(request()->is('admin/dayoff*')) ? 'active' : ''}}">
                            <i class="nav-icon bi bi-calendar4-week"></i>
                            <p>Day-off</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('admin.roles.page')}}" class="nav-link {{(request()->is('admin/roles*')) ? 'active' : ''}}">
                            <i class="nav-icon fa-sharp fa-solid fa-person-circle-minus"></i>
                            <p>Roles</p>
                        </a>
                    </li>
                @elseif(Auth::guard('web')->check())
                    <li class="nav-item">
                        <a href="{{route('superAdmin.Dashboard')}}" class="nav-link {{(request()->is('superAdmin/dashboard')) ? "active" : ""}}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('get.business')}}" class="nav-link {{(request()->is('superAdmin/business*')) ? 'active' : ''}}">
                            <i class="nav-icon fa-solid fa-business-time"></i>
                            <p>All Business</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('get.package')}}" class="nav-link {{(request()->is('superAdmin/package*')) ? 'active' : ''}}">
                            <i class="nav-icon fa-sharp fa-solid fa-cart-shopping"></i>
                            <p>Packages</p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
    <!-- /.Sidebar -->
</aside>
<script>
    $('.sidebar').click(function(event){
        event.stopPropagation();
    });
</script>