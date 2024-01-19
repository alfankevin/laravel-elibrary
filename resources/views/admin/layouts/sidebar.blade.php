<div class="sidebar-brand">
    <a href="#"><img src="/assets/img/main/main-logo.png" alt="" width="100"></a>
</div>
<div class="sidebar-brand sidebar-brand-sm">
    <a href="#"><img src="/assets/img/polinema.png" alt="" width="25"></a>
</div>
<ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.index') }}"><i class="fas fa-chart-pie"></i><span>Dashboard</span></a>
    </li>
    <li class="menu-header">Master Data</li>
    <li class="{{ request()->is('admin/book') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('book.index') }}"><i class="fas fa-book"></i><span>Book List</span></a>
    </li>
    <li class="{{ request()->is('admin/category') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('category.index') }}"><i class="fas fa-list"></i><span>Category</span></a>
    </li>
    <li class="menu-header">Content Management</li>
    <li class="{{ request()->is('admin/management') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('management.index') }}"><i class="fas fa-home"></i><span>Home Page</span></a>
    </li>
    <li>
        <a class="nav-link" href="{{ route('index') }}"><i class="fas fa-arrow-left"></i><span>Back to Library</span></a>
    </li>
</ul>
<form id="logout-form" action="{{ route('logout') }}" method="post">@csrf</form>
