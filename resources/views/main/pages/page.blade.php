@extends('main.layouts.app')
@section('content')
    <section id="best-selling" class="leaf-pattern-overlay">
      <div class="corner-pattern-overlay"></div>
      <div class="container">
          <div class="row justify-content-center">

              <div class="col-md-8">

                  <div class="row">

                      <div class="col-md-6">
                          <figure class="products-thumb">
                              <div style="padding: 12.5px">
                                  <img src="{{ asset('assets/files/image/' . $book->cover) }}" alt="book" class="single-image" style="height: 470px; width 100%; border-radius: .25rem 0 0 .25rem">
                              </div>
                          </figure>
                      </div>

                      <div class="col-md-6">
                          <div class="product-entry">
                              <h2 class="section-title divider">Today's Book</h2>

                              <div class="products-content">
                                  <div class="author-name text-capitalize">By {{ $book->author }}</div>
                                  <h3 class="item-title text-capitalize">{{ $book->title }}</h3>
                                  <p>{{ $book->description }}</p>
                                  <div class="btn-wrap">
                                      <a href="{{ route('book.file', $book->id) }}" class="btn-accent-arrow">read it now <i
                                              class="icon icon-ns-arrow-right"></i></a>
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
                                                <button type="button" class="add-to-cart"
                                                    data-product-tile="add-to-cart">Add to
                                                    Wishlist</button>
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
