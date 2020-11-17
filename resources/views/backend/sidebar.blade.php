@php
    $segment1 = Request::segment(1);
    $segment2 = Request::segment(2);
    $segment3 = Request::segment(3);
    $segment4 = Request::segment(4);
@endphp
  <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown active">
              <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              
            </li>
            <li class="menu-header">Starter</li>
          
            <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>User Manager</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('users.index') }}">Users</a></li>
                <li><a class="nav-link" href="{{ route('roles.index') }}">Roles</a></li>
                <li><a class="nav-link" href="{{ route('permission.index') }}">Permission</a></li>

                <li><a class="nav-link" href="{{ route('role-has-permission.index') }}">Role Has Permission</a></li>
              </ul>
            </li>
           
             
      
          </ul>
        </aside>