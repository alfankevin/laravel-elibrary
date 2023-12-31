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
                                                <td><img class="cover-image" src="{{ asset($item->cover) }}" alt="cover" height="150"></td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->author }}</td>
                                                <td>{{ $item->category }}</td>
                                                <td>{{ $item->description }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ $item->file }}</td>
                                                <td class="text-right">
                                                    <div class="d-flex justify-content-end">
                                                        <button type="button" data-toggle="modal" data-target="#update" data-id="{{ $item->id }}"
                                                            data-cover="{{ $item->cover }}" data-title="{{ $item->title }}" data-author="{{ $item->author }}"
                                                            data-category="{{ $item->id_category }}" data-description="{{ $item->description }}"
                                                            data-quantity="{{ $item->quantity }}" data-file="{{ $item->file }}"
                                                            class="btn btn-sm btn-warning btn-icon d-flex align-items-center ml-2 mr-2 edit">
                                                            <span><i class="fas fa-edit"></i></span>&nbsp;Edit
                                                        </button>
                                                        <form action="{{ route('book.destroy', $item->id) }}"
                                                            method="POST">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete d-flex align-items-center">
                                                            <span><i class="fas fa-times"></i></span>&nbsp;Delete</button>      
                                                        </form>
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
    <script src="/assets/js/select2.min.js"></script>
@endpush

@push('customStyle')
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type=number] {
            -moz-appearance: textfield;
        }
        textarea {
            resize: none;
        }
        .absolute {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }
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
        .modal-dialog {
            max-width: 750px;
        }
        .cover-parent {
            height: 100%;
            width: 100%;
            position: relative;
        }
        .cover-parent > * {
            width: 100%;
            border-radius: .25rem;
        }
        .cover-text {
            height: inherit !important;
            color: inherit;
            z-index: 1;
        }
        .cover-input, .file-input {
            height: inherit !important;
            opacity: 0;
            cursor: pointer;
            z-index: 3;
        }
        .file-parent {
            position: relative;
            color: inherit;
        }
    </style>
    <link rel="stylesheet" href="/assets/css/select2.min.css">
@endpush