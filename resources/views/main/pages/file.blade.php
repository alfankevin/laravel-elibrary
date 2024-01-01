@extends('main.layouts.app')
@section('content')
    <section id="best-selling" class="leaf-pattern-overlay pt-5">
      <div class="corner-pattern-overlay"></div>
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-12">
                  <div class="section-header align-center">
                      <h2 class="section-title">{{ $book->title }}</h2>
                  </div>
                  <iframe class="align-center file-frame" src="{{ asset('assets/files/pdf/' . $book->file) }}"></iframe>
              </div>
          </div>
      </div>
    </section>

    <section id="quotation" class="align-center py-5 my-5">
        <div class="inner-content">
            <h2 class="section-title divider">Quote of the day</h2>
            <blockquote data-aos="fade-up">
                <q>“The more that you read, the more things you will know. The more that you learn, the more places
                    you’ll go.”</q>
                <div class="author-name">Dr. Seuss</div>
            </blockquote>
        </div>
    </section>
@endsection

@push('customStyle')
    <style>
        .file-frame {
          width: 75%;
          aspect-ratio: 3/4;
        }
        @media (max-width: 600px) {
          .file-frame {
            width: 100%;
          }
        }
    </style>
@endpush