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
                        <li data-tab-target="#all-genre" class="active tab">All Genre</li>
                        <li data-tab-target="#business" class="tab">Business</li>
                        <li data-tab-target="#technology" class="tab">Technology</li>
                        <li data-tab-target="#romantic" class="tab">Romantic</li>
                        <li data-tab-target="#adventure" class="tab">Adventure</li>
                        <li data-tab-target="#fictional" class="tab">Fictional</li>
                    </ul>

                    <div class="tab-content">
                        <div id="all-genre" data-tab-content class="active">
                            <div class="row">
                                
                                @foreach ($popular as $key => $item)
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

                            </div>

                        </div>
                        <div id="business" data-tab-content>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="assets/img/main/tab-item2.jpg" alt="books" class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Wishlist</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Peaceful Enlightment</h3>
                                            <span>Marmik Lama</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="assets/img/main/tab-item4.jpg" alt="books" class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Wishlist</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Great travel at desert</h3>
                                            <span>Sanchit Howdy</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="assets/img/main/tab-item6.jpg" alt="books" class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Wishlist</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Life among the pirates</h3>
                                            <span>Armor Ramsey</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="assets/img/main/tab-item8.jpg" alt="books" class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Wishlist</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Simple way of piece life</h3>
                                            <span>Armor Ramsey</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div id="technology" data-tab-content>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="assets/img/main/tab-item1.jpg" alt="books" class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Wishlist</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Peaceful Enlightment</h3>
                                            <span>Marmik Lama</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="assets/img/main/tab-item3.jpg" alt="books" class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Wishlist</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Great travel at desert</h3>
                                            <span>Sanchit Howdy</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="assets/img/main/tab-item5.jpg" alt="books" class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Wishlist</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Life among the pirates</h3>
                                            <span>Armor Ramsey</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="assets/img/main/tab-item7.jpg" alt="books" class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Wishlist</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Simple way of piece life</h3>
                                            <span>Armor Ramsey</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="romantic" data-tab-content>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="assets/img/main/tab-item1.jpg" alt="books" class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Wishlist</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Peaceful Enlightment</h3>
                                            <span>Marmik Lama</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="assets/img/main/tab-item3.jpg" alt="books" class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Wishlist</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Great travel at desert</h3>
                                            <span>Sanchit Howdy</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="assets/img/main/tab-item5.jpg" alt="books" class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Wishlist</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Life among the pirates</h3>
                                            <span>Armor Ramsey</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="assets/img/main/tab-item7.jpg" alt="books" class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Wishlist</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Simple way of piece life</h3>
                                            <span>Armor Ramsey</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="adventure" data-tab-content>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="assets/img/main/tab-item5.jpg" alt="books" class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Wishlist</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Life among the pirates</h3>
                                            <span>Armor Ramsey</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="assets/img/main/tab-item7.jpg" alt="books" class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Wishlist</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Simple way of piece life</h3>
                                            <span>Armor Ramsey</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="fictional" data-tab-content>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="assets/img/main/tab-item5.jpg" alt="books" class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Wishlist</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Life among the pirates</h3>
                                            <span>Armor Ramsey</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="assets/img/main/tab-item7.jpg" alt="books" class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Wishlist</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Simple way of piece life</h3>
                                            <span>Armor Ramsey</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div><!--inner-tabs-->

            </div>
        </div>
    </section>

    <section id="quotation" class="align-center pb-5 mb-5">
        <div class="inner-content">
            <h2 class="section-title divider">Quote of the day</h2>
            <blockquote data-aos="fade-up">
                <q>The more that you read, the more things you will know. The more that you learn, the more places
                    you’ll go.</q>
                <div class="author-name">Dr. Seuss</div>
            </blockquote>
        </div>
    </section>

    <section id="subscribe">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-8">
                    <div class="row">

                        <div class="col-md-6">

                            <div class="title-element">
                                <h2 class="section-title divider">Subscribe to our newsletter</h2>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="subscribe-content" data-aos="fade-up">
                                <p>Sed eu feugiat amet, libero ipsum enim pharetra hac dolor sit amet, consectetur. Elit
                                    adipiscing enim pharetra hac.</p>
                                <form id="form">
                                    <input type="text" name="email" placeholder="Enter your email addresss here">
                                    <button class="btn-subscribe">
                                        <span>send</span>
                                        <i class="icon icon-send"></i>
                                    </button>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="latest-blog" class="py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header align-center">
                        <div class="title">
                            <span>Read our articles</span>
                        </div>
                        <h2 class="section-title">Latest Articles</h2>
                    </div>

                    <div class="row">

                        <div class="col-md-4">

                            <article class="column" data-aos="fade-up">

                                <figure>
                                    <a href="#" class="image-hvr-effect">
                                        <img src="assets/img/main/post-img1.jpg" alt="post" class="post-image">
                                    </a>
                                </figure>

                                <div class="post-item">
                                    <div class="meta-date">Mar 30, 2021</div>
                                    <h3><a href="#">Reading books always makes the moments happy</a></h3>

                                    <div class="links-element">
                                        <div class="categories">inspiration</div>
                                        <div class="social-links">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="icon icon-facebook"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="icon icon-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="icon icon-behance-square"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!--links-element-->

                                </div>
                            </article>

                        </div>
                        <div class="col-md-4">

                            <article class="column" data-aos="fade-up" data-aos-delay="200">
                                <figure>
                                    <a href="#" class="image-hvr-effect">
                                        <img src="assets/img/main/post-img2.jpg" alt="post" class="post-image">
                                    </a>
                                </figure>
                                <div class="post-item">
                                    <div class="meta-date">Mar 29, 2021</div>
                                    <h3><a href="#">Reading books always makes the moments happy</a></h3>

                                    <div class="links-element">
                                        <div class="categories">inspiration</div>
                                        <div class="social-links">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="icon icon-facebook"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="icon icon-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="icon icon-behance-square"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!--links-element-->

                                </div>
                            </article>

                        </div>
                        <div class="col-md-4">

                            <article class="column" data-aos="fade-up" data-aos-delay="400">
                                <figure>
                                    <a href="#" class="image-hvr-effect">
                                        <img src="assets/img/main/post-img3.jpg" alt="post" class="post-image">
                                    </a>
                                </figure>
                                <div class="post-item">
                                    <div class="meta-date">Feb 27, 2021</div>
                                    <h3><a href="#">Reading books always makes the moments happy</a></h3>

                                    <div class="links-element">
                                        <div class="categories">inspiration</div>
                                        <div class="social-links">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="icon icon-facebook"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="icon icon-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="icon icon-behance-square"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!--links-element-->

                                </div>
                            </article>

                        </div>

                    </div>

                    <div class="row">

                        <div class="btn-wrap align-center">
                            <a href="#" class="btn btn-outline-accent btn-accent-arrow" tabindex="0">Read All
                                Articles<i class="icon icon-ns-arrow-right"></i></a>
                        </div>
                    </div>

                </div>
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

@push('customScript')
    <script>
        // $(document).ready(function() {
            
        //     $('.add-to-cart').click(function() {
        //         var button = $(this);
        //         var id = button.data('id');
        //         var url = "{{ route('book.wish', ':id') }}";
        //         url = url.replace(':id', id);

        //         $.ajax({
        //             url: url,
        //             type: 'PATCH',
        //             data: {
        //                 _token: '{{ csrf_token() }}',
        //                 id: id
        //             },
        //             success: function(response) {
        //                 if (button.hasClass('add-to-cart')) {
        //                     button.text("Added to Wishlist");
        //                 }
        //             },
        //             error: function(xhr) {
        //                 var error = JSON.parse(xhr.responseText);
        //                 alert(error.message);
        //             }
        //         });
        //     });
        // });
    </script>
@endpush