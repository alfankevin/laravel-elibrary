@extends('main.layouts.app')
@section('content')
    <section id="wishlist" class="bookshelf pb-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

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
                        <div id="category" data-tab-content class="active">
                            <div class="row">

                                @foreach ($book as $key => $item)
                                    <div class="col-md-3">
                                        <div class="product-item">
                                            <figure class="product-style">
                                                <a href="{{ route('book.page', $item->id) }}"><img src="{{ asset('assets/files/image/' . $item->cover) }}"
                                                        alt="books" class="product-item"
                                                        style="aspect-ratio: 3/4; border-radius: .25rem 0 0 .25rem"></a>
                                                <a href="{{ route('delete.wish', $item->id) }}" type="button" class="add-to-cart"
                                                    data-product-tile="add-to-cart">Remove from Wishlist</a>
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
