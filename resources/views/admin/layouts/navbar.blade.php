<form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
    </ul>
    <div class="search-element">
      <input class="form-control input-search" type="search" placeholder="Search" aria-label="Search"
          data-width="292.25" id="search" name="search" spellcheck="false" autocomplete="off">
      <button class="btn btn-search" type="submit"><i class="fas fa-search"></i></button>
    </div>
  </form>
  <ul class="navbar-nav navbar-right">
    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a></li>
    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a></li>
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
      <img alt="image" src="../assets/img/avatar/avatar-4.png" class="rounded-circle mr-1">
      <div class="d-sm-none d-lg-inline-block">Hi, {{auth()->user()->name}}</div></a>
      <div class="dropdown-menu dropdown-menu-right mt-2" style="background-color: #F3F2EC">
        <a href="#" class="dropdown-item has-icon">
          <i class="far fa-user"></i> Profile
        </a>
        <a href="#" class="dropdown-item has-icon">
          <i class="fas fa-bolt"></i> Activities
        </a>
        <a href="#" class="dropdown-item has-icon">
          <i class="fas fa-cog"></i> Settings
        </a>
        <div class="dropdown-divider" style="border-top-color: #EDEBE4"></div>
        <a href="#" class="dropdown-item has-icon text-danger" onclick="event.preventDefault(); getElementById('logout-form').submit()">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
        <form id="logout-form" action="{{route('logout')}}" method="post">@csrf</form>
      </div>
    </li>
  </ul>
