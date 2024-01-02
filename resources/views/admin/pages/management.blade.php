@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Page Management</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    @include('admin.layouts.alert')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Book List</h4>
                            <div class="card-header-action">
                                <a href="{{ route('book.export') }}" type="button" class="btn btn-icon icon-left btn-primary">Export Books</a>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md" id="book">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Cover</th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            <th>File</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($book as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td><img class="cover-image" src="{{ asset('assets/files/image/' . $item->cover) }}" alt="cover" height="150"></td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->author }}</td>
                                                <td>{{ $item->category }}</td>
                                                <td>{{ $item->description }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td><a href="{{ route('book.read', $item->id) }}" class="file-item">{{ $item->file }}</a></td>
                                                <td class="text-right">
                                                    <div class="d-flex justify-content-end">
                                                        @if ($item->hero)
                                                            <button class="unhero-btn btn btn-sm btn-info btn-icon d-flex align-items-center mr-2" data-id="{{ $item->id }}">
                                                            <span><i class="fas fa-eye"></i></span>&nbsp;Hero</button>
                                                        @else
                                                            <button class="hero-btn btn btn-sm btn-secondary btn-icon d-flex align-items-center mr-2" data-id="{{ $item->id }}">
                                                            <span><i class="fas fa-eye"></i></span>&nbsp;Hero</button>
                                                        @endif
                                                        @if ($item->feat)
                                                            <button class="unfeat-btn btn btn-sm btn-success btn-icon d-flex align-items-center" data-id="{{ $item->id }}">
                                                            <span><i class="fas fa-eye"></i></span>&nbsp;Feat</button>
                                                        @else
                                                            <button class="feat-btn btn btn-sm btn-secondary btn-icon d-flex align-items-center" data-id="{{ $item->id }}">
                                                            <span><i class="fas fa-eye"></i></span>&nbsp;Feat</button>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('customScript')
    <script>
        $(document).ready(function() {
            $('.hero-btn, .unhero-btn').click(function() {
                var button = $(this);
                var id = button.data('id');
                var url = "{{ route('book.hero', ':id') }}";
                url = url.replace(':id', id);

                $.ajax({
                    url: url,
                    type: 'PATCH',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id
                    },
                    success: function(response) {
                        if (button.hasClass('hero-btn')) {
                            button.removeClass('hero-btn btn btn-sm btn-secondary btn-icon d-flex align-items-center').addClass('unhero-btn btn btn-sm btn-info btn-icon d-flex align-items-center');
                        } else {
                            button.removeClass('unhero-btn btn btn-sm btn-info btn-icon d-flex align-items-center').addClass('hero-btn btn btn-sm btn-secondary btn-icon d-flex align-items-center');
                        }
                    },
                    error: function(xhr) {
                        var error = JSON.parse(xhr.responseText);
                        alert(error.message);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.feat-btn, .unfeat-btn').click(function() {
                var button = $(this);
                var id = button.data('id');
                var url = "{{ route('book.feat', ':id') }}";
                url = url.replace(':id', id);

                $.ajax({
                    url: url,
                    type: 'PATCH',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id
                    },
                    success: function(response) {
                        if (button.hasClass('feat-btn')) {
                            button.removeClass('feat-btn btn btn-sm btn-secondary btn-icon d-flex align-items-center').addClass('unfeat-btn btn btn-sm btn-success btn-icon d-flex align-items-center');
                        } else {
                            button.removeClass('unfeat-btn btn btn-sm btn-success btn-icon d-flex align-items-center').addClass('feat-btn btn btn-sm btn-secondary btn-icon d-flex align-items-center');
                        }
                    },
                    error: function(xhr) {
                        var error = JSON.parse(xhr.responseText);
                        alert(error.message);
                    }
                });
            });
        });
    </script>
    <script src="/assets/js/select2.min.js"></script>
@endpush

@push('customStyle')
    <style>
        .card-primary {
            background-color: #F3F2EC !important;
        }
        .card-header {
            border-bottom-color: #F3F2EC !important;
        }
        .cover-image {
            position: relative;
            aspect-ratio: 3/4;
            border-radius: .25rem 0 0 .25rem;
            z-index: 2;
        }
        .file-item {
            color: inherit;
        }
        .file-item:hover {
            color: inherit;
        }
    </style>
    <link rel="stylesheet" href="/assets/css/select2.min.css">
@endpush