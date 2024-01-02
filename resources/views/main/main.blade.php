@extends('main.layouts.app')
@section('content')
    <section id="billboard">

        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <button class="prev slick-arrow">
                        <i class="icon icon-arrow-left"></i>
                    </button>

                    <div class="main-slider pattern-overlay">
                        
                        @foreach ($billboard as $key => $item)
                            <div class="slider-item">
                                <div class="banner-content">
                                    <h2 class="banner-title text-capitalize">{{ $item->title }}</h2>
                                    <p>{{ $item->description }}</p>
                                    <div class="btn-wrap">
                                        <a href="{{ route('book.page', $item->id) }}" class="btn btn-outline-accent btn-accent-arrow">Read More<i
                                                class="icon icon-ns-arrow-right"></i></a>
                                    </div>
                                </div><!--banner-content-->
                                <img src="{{ asset('assets/files/image/' . $item->cover) }}" alt="banner" class="banner-image" style="height: 600px; aspect-ratio: 4/6; border-radius: .5rem 0 0 .5rem;">
                            </div><!--slider-item-->
                        @endforeach

                    </div><!--slider-->

                    <button class="next slick-arrow">
                        <i class="icon icon-arrow-right"></i>
                    </button>

                </div>
            </div>
        </div>

    </section>

    <section id="client-holder" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="inner-content">
                    <div class="logo-wrap">
                        <div class="grid">
                            <a href="#"><img src="assets/img/main/client-image1.png" alt="client"></a>
                            <a href="#"><img src="assets/img/main/client-image2.png" alt="client"></a>
                            <a href="#"><img src="assets/img/main/client-image3.png" alt="client"></a>
                            <a href="#"><img src="assets/img/main/client-image4.png" alt="client"></a>
                            <a href="#"><img src="assets/img/main/client-image5.png" alt="client"></a>
                        </div>
                    </div><!--image-holder-->
                </div>
            </div>
        </div>
    </section>

    <section id="featured-books" class="py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header align-center">
                        <div class="title">
                            <span>Some quality items</span>
                        </div>
                        <h2 class="section-title">Featured Books</h2>
                    </div>

                    <div class="product-list" data-aos="fade-up">
                        <div class="row">

                            @foreach ($featured as $key => $item)
                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <a href="{{ route('book.page', $item->id) }}"><img src="{{ asset('assets/files/image/' . $item->cover) }}" alt="books" class="product-item" style="aspect-ratio: 3/4; border-radius: .25rem 0 0 .25rem"></a>
                                            @auth
                                                @if(Auth::user()->role === 'user')
                                                    @php
                                                        $id_user = Auth::user()->id;
                                                        $exist = App\Models\UserBook::where('id_user', $id_user)
                                                            ->where('id_book', $item->id)
                                                            ->where('wish', true)
                                                            ->first();
                                                    @endphp
                                                    @if (!$exist)
                                                        <a href="{{ route('book.wish', $item->id) }}" type="button" class="add-to-cart" data-product-tile="add-to-cart" data-id="{{ $item->id }}">Add to Wishlist</a>
                                                    @else
                                                        <a href="{{ route('wishlist') }}" type="button" class="add-to-cart" data-product-tile="add-to-cart">Added to Wishlist</a>
                                                    @endif
                                                @endif
                                            @endauth
                                        </figure>
                                        <figcaption>
                                            <h3>{{ $item->title }}</h3>
                                            <span>{{ $item->author }}</span>
                                            <div class="item-price">{{ $item->quantity }} Left</div>
                                        </figcaption>
                                    </div>
                                </div>
                            @endforeach

                        </div><!--ft-books-slider-->
                    </div><!--grid-->


                </div><!--inner-content-->
            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="btn-wrap align-right">
                        <a href="{{ route('booklist') }}" class="btn-accent-arrow">View all books <i
                                class="icon icon-ns-arrow-right"></i></a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section id="best-selling" class="leaf-pattern-overlay">
        <div class="corner-pattern-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-8">

                    <div class="row">

                        @if (!empty($best))
                            <div class="col-md-6">
                                <figure class="products-thumb">
                                    <div style="padding: 12.5px">
                                        <img src="{{ asset('assets/files/image/' . $best->cover) }}" alt="book" class="single-image" style="height: 470px; width 100%; border-radius: .25rem 0 0 .25rem">
                                    </div>
                                </figure>
                            </div>

                            <div class="col-md-6">
                                <div class="product-entry">
                                    <h2 class="section-title divider">Most Popular Book</h2>

                                    <div class="products-content">
                                        <div class="author-name text-capitalize">By {{ $best->author }}</div>
                                        <h3 class="item-title text-capitalize">{{ $best->title }}</h3>
                                        <p>{{ $best->description }}</p>
                                        <div class="btn-wrap">
                                            @guest
                                                <a href="{{ route('login') }}" class="btn-accent-arrow">read it now <i class="icon icon-ns-arrow-right"></i></a>
                                            @else
                                                <a href="{{ route('book.read', $best->id) }}" class="btn-accent-arrow">read it now <i class="icon icon-ns-arrow-right"></i></a>
                                            @endguest
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endif

                    </div>
                    <!-- / row -->

                </div>

            </div>
        </div>
    </section>

    <section id="popular-books" class="bookshelf py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header align-center">
                        <div class="title">
                            <span>Some quality items</span>
                        </div>
                        <h2 class="section-title">Popular Books</h2>
                    </div>

                    <ul class="tabs">
                        <li data-tab-target="#category" class="active tab">All Genre</li>
                        @php
                            $category = \App\Models\Category::orderByRaw("SUBSTRING(category, 1, 1)")
                                ->orderBy('category')
                                ->get();
                        @endphp
                        @foreach ($category as $key => $item)
                            <li class="{{ request()->is('booklist/' . $item->category) ? 'active' : '' }} tab"><a href="{{ url('/booklist', ['id' => $item->category]) }}" style="color: inherit">{{ $item->category }}</a></li>
                        @endforeach
                    </ul>

                    <div class="tab-content">
                        <div id="all-genre" data-tab-content class="active">
                            <div class="row">

                                @foreach ($popular as $key => $item)
                                    <div class="col-md-3">
                                        <div class="product-item">
                                            <figure class="product-style">
                                                <a href="{{ route('book.page', $item->id) }}"><img src="{{ asset('assets/files/image/' . $item->cover) }}"
                                                        alt="books" class="product-item"
                                                        style="aspect-ratio: 3/4; border-radius: .25rem 0 0 .25rem"></a>
                                                @auth
                                                    @if(Auth::user()->role === 'user')
                                                        @php
                                                            $id_user = Auth::user()->id;
                                                            $exist = App\Models\UserBook::where('id_user', $id_user)
                                                                ->where('id_book', $item->id)
                                                                ->where('wish', true)
                                                                ->first();
                                                        @endphp
                                                        @if (!$exist)
                                                            <a href="{{ route('book.wish', $item->id) }}" type="button" class="add-to-cart" data-product-tile="add-to-cart" data-id="{{ $item->id }}">Add to Wishlist</a>
                                                        @else
                                                            <a href="{{ route('wishlist') }}" type="button" class="add-to-cart" data-product-tile="add-to-cart">Added to Wishlist</a>
                                                        @endif
                                                    @endif
                                                @endauth
                                            </figure>
                                            <figcaption>
                                                <h3>{{ $item->title }}</h3>
                                                <span>{{ $item->author }}</span>
                                                <div class="item-price">{{ $item->quantity }} Left</div>
                                            </figcaption>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                </div><!--inner-tabs-->

            </div>
        </div>
    </section>
@endsection

@push('customStyle')
    <style>
        @media (max-width: 600px) {
          .slick-arrow {
            display: none !important;
          }
        }
    </style>
@endpush
