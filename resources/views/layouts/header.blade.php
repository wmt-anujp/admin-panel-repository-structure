<div class="container-fluid">
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <div class="navbar-header">
      @role('admin')
          <p class="navbar-brand">Admin Panel</p>
      @endrole
      @role('customer')
          <a class="navbar-brand">User Panel</a>
      @endrole
  </div>
  <ul class="nav navbar-nav">
      <li><a href="{{route('logout.perform')}}" class="btn btn-outline-danger">Logout</a></li>
  </ul>
</nav>
</div>