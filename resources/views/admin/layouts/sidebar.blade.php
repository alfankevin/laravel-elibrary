<div class="sidebar-brand">
    <a href="#"><img src="/assets/img/main/main-logo.png" alt="" width="100"></a>
</div>
<div class="sidebar-brand sidebar-brand-sm">
    <a href="#"><img src="/assets/img/polinema.png" alt="" width="25"></a>
</div>
<ul class="sidebar-menu">
    <li class="{{ request()->is('admin') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin') }}"><i class="fas fa-chart-pie"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="{{ request()->is('book') ? 'active' : '' }}"><a class="nav-link" href="{{ route('book.index') }}"><i class="fas fa-list"></i>
            <span>Book List</span></a>
    </li>
    <li class="{{ request()->is('category') ? 'active' : '' }}"><a class="nav-link" href="{{ route('category.index') }}"><i class="fas fa-list"></i>
            <span>Category</span></a>
    </li>
    <li class=""><a class="nav-link" href="{{ route('main') }}"><i class="fas fa-arrow-left"></i>
            <span>Back to Library</span></a>
    </li>
</ul>
<form id="logout-form" action="{{ route('logout') }}" method="post">@csrf</form>
