<style>
    .dropdown-menu li {
      position: relative;
    }
    .dropdown-menu .dropdown-submenu {
      display: none;
      position: absolute;
      right: 100%;
      top: -2px;
    }
    .dropdown-menu > li:hover > .dropdown-submenu {
      display: block;
    }
</style>
<nav class="main-header navbar navbar-expand navbar-white navbar-light sticky-top">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto">
    @if (Auth::guard('admins')->check())
      <li class="nav-item">
        <a href="{{route('chatPage')}}" class="nav-link {{(request()->is('admin/chat*')) ? 'active' : ''}}" title="Chat">
        <i class="nav-icon fas fa-comments mx-2" style="font-size: 20px"></i></a>
      </li>
    @endif
      <li class="nav-item dropdown">
        @if (Auth::guard('admins')->check())
          @if (Auth::guard('admins')->user()->getRawOriginal('profile_pic')===null)
            <img src="https://raw.githubusercontent.com/wmt-anujp/html5-demo/master/contact.webp" alt="Profile photo" style="height: 40px;width: 40px;cursor: pointer;" class="img-circle mr-3 dropdown-toggle" data-toggle="dropdown">    
          @else
            <img src="{{url(Auth::guard('admins')->user()->profile_pic)}}" alt="Profile photo" style="height: 40px;width: 40px;cursor: pointer;" class="img-circle mr-3 dropdown-toggle" data-toggle="dropdown">
          @endif
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right dropleft" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="{{route('get.Admin.Profile')}}">My Profile</a></li>
              <li><a class="dropdown-item" href="{{route('getSubscriptionPage')}}">Subscription</a></li>
              <li><a class="dropdown-item" href="{{route('admin.Logout')}}">Logout</a></li>
            </ul>
          @else
            <img src="https://raw.githubusercontent.com/wmt-anujp/html5-demo/master/contact.webp" alt="Profile photo" style="height: 40px;width: 40px;cursor: pointer;" class="img-circle mr-3 dropdown-toggle" data-toggle="dropdown">
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right dropleft" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item">&laquo; Settings</a>
                <ul class="dropdown-menu dropdown-submenu">
                  <li>
                    <a class="dropdown-item" href="{{route('manageRolePage')}}">Manage Role</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="">Payment</a>
                  </li> 
                </ul>
              </li>
              <li><a class="dropdown-item" href="{{route('superAdmin.Logout')}}">Log Out</a></li>
            </ul>
          @endif
      </li>
  </ul>
</nav>
