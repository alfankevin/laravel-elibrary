<div id="header-wrap">

  <div class="top-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="social-links">
            <ul>
              <li>
                <a href="#"><i class="icon icon-facebook"></i></a>
              </li>
              <li>
                <a href="#"><i class="icon icon-twitter"></i></a>
              </li>
              <li>
                <a href="#"><i class="icon icon-youtube-play"></i></a>
              </li>
              <li>
                <a href="#"><i class="icon icon-behance-square"></i></a>
              </li>
            </ul>
          </div><!--social-links-->
        </div>
        <div class="col-md-6">
          <div class="right-element">
            @if (Auth::check())
                <form id="logout-form" class="d-none" action="{{ route('logout') }}" method="post">@csrf</form>
                <a class="user-account for-buy" href="{{ route('logout') }}"
                  onclick="event.preventDefault(); getElementById('logout-form').submit()"><i class="icon icon-user"></i>
                  <span>{{auth()->user()->name}}</span>
                </a>
            @else
                <a href="{{ route('login') }}" class="user-account for-buy">
                    <i class="icon icon-user"></i>
                    <span>Account</span>
                </a>
            @endif
            <a href="#" class="cart for-buy"><i class="icon icon-clipboard"></i><span> Cart:(0
                $)</span></a>

            <div class="action-menu">

              <div class="search-bar">
                <a href="#" class="search-button search-toggle" data-selector="#header-wrap">
                  <i class="icon icon-search"></i>
                </a>
                <form action="{{ route('booklist') }}" role="search" method="get" class="search-box">
                  <input class="search-field text search-input" placeholder="Search"
                    type="search" name="search" spellcheck="false" autocomplete="off">
                </form>
              </div>
            </div>

          </div><!--top-right-->
        </div>

      </div>
    </div>
  </div><!--top-content-->

  <header id="header">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-2">
          <div class="main-logo">
            <a href="/"><img src="/assets/img/main/main-logo.png" alt="logo"></a>
          </div>

        </div>

        <div class="col-md-10">

          <nav id="navbar">
            <div class="main-menu stellarnav">
              <ul class="menu-list" style="cursor: default">
                <li class="menu-item {{ request()->is('/') ? 'active' : '' }}"><a href="{{ route('index') }}" class="nav-link">Home</a></li>
                <li class="menu-item {{ request()->is('booklist') || request()->is('booklist/*') ? 'active' : '' }}"><a href="{{ route('booklist') }}" class="nav-link">Books</a></li>
                @auth
                  @if(Auth::user()->role === 'user')
                    <li class="menu-item {{ request()->is('mybook') ? 'active' : '' }}"><a href="{{ route('mybook') }}" class="nav-link">My Book</a></li>
                    <li class="menu-item {{ request()->is('wishlist') ? 'active' : '' }}"><a href="{{ route('wishlist') }}" class="nav-link">Wishlist</a></li>
                    <li class="menu-item {{ request()->is('readlist') ? 'active' : '' }}"><a href="{{ route('readlist') }}" class="nav-link">Readlist</a></li>
                  @endif
                @endauth
                @auth
                  @if(Auth::user()->role !== 'user')
                    <li class="menu-item"><a href="/#featured-books" class="nav-link">Featured</a></li>
                    <li class="menu-item"><a href="/#popular-books" class="nav-link">Popular</a></li>
                  @endif
                @endauth
                @guest
                  <li class="menu-item"><a href="/#featured-books" class="nav-link">Featured</a></li>
                  <li class="menu-item"><a href="/#popular-books" class="nav-link">Popular</a></li>
                @endguest
                @guest
                  <li class="menu-item"><a href="#" class="nav-link">Articles</a></li>
                @endguest
                <li class="menu-item"><a href="#download-app" class="nav-link">Download App</a></li>
                @auth
                  @if(Auth::user()->role === 'admin')
                      <li class="menu-item"><a href="{{ route('book.index') }}" class="nav-link btn btn-outline-dark rounded-pill m-0">Manage</a></li>
                  @elseif(Auth::user()->role === 'user')
                      <li class="menu-item"><a href="{{ route('mine-upload') }}" class="nav-link btn btn-outline-dark rounded-pill m-0">Upload</a></li>
                  @endif
                @endauth
              </ul>

              <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
              </div>

            </div>
          </nav>

        </div>

      </div>
    </div>
  </header>

</div><!--header-wrap-->