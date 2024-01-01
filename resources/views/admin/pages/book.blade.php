@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Book Management</h1>
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
                                <button type="button" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#create">Add Book</button>
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
                                                <td class="text-capitalize">{{ $item->title }}</td>
                                                <td class="text-capitalize">{{ $item->author }}</td>
                                                <td class="text-capitalize">{{ $item->category }}</td>
                                                <td>{{ $item->description }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td><a href="{{ route('book.file', $item->id) }}" class="file-item">{{ $item->file }}</a></td>
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
    <!-- Modal -->
    <div class="modal fade" id="create" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Book</h5>
                </div>
                <div class="modal-body">
                    <form id="createForm" action="{{ route('book.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <div class="cover-parent">
                                    <span class="absolute form-control d-flex align-items-center justify-content-center cover-text">Cover</span>
                                    <img id="cover" class="cover-image" src="{{ asset('assets/img/blank.png') }}" alt="cover" style="height: 100%; width: 100%">
                                    <input id="cover-input" name="cover" type="file"
                                        class="cover-input absolute form-control @error('cover') is-invalid @enderror"
                                        value="{{ old('cover') }}">
                                    @error('cover')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                            name="title" spellcheck="false" autocomplete="off" placeholder="Title" value="{{ old('title') }}">
                                            @error('title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6" style="padding-right: 12.5px">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('author') is-invalid @enderror" id="author"
                                            name="author" spellcheck="false" autocomplete="off" placeholder="Author" value="{{ old('author') }}">
                                            @error('author')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6" style="padding-left: 12.5px">
                                        <div class="form-group">
                                            <select id="category" class="form-control select2 @error('id_category') is-invalid @enderror"
                                            name="id_category" value="{{ old('id_category') }}">
                                                <option value="">Category</option>
                                                @foreach ($category as $item)
                                                    <option value="{{ $item->id }}" {{ old('id') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->category }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_category')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea id="description" class="form-control @error('description') is-invalid @enderror"
                                            name="description" placeholder="Description" style="height: 84px" value="{{ old('description') }}">{{ old('description') }}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6" style="padding-right: 12.5px">
                                        <div class="form-group m-0">
                                            <input type="number" class="form-control @error('quantity') is-invalid @enderror"
                                                id="quantity" name="quantity" spellcheck="false" autocomplete="off" placeholder="Quantity" value="{{ old('quantity') }}">
                                            @error('quantity')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6" style="padding-left: 12.5px">
                                        <div class="form-group m-0">
                                            <span class="form-control file-parent">File
                                                <input type="file" class="absolute file-input form-control @error('file') is-invalid @enderror"
                                                    id="file" name="file" spellcheck="false" autocomplete="off" placeholder="File" value="file">
                                            </span>
                                            @error('file')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal" onclick="resetForm()">Cancel</button>
                        <button class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>    
    <!-- Modal -->
    <div class="modal fade" id="update" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Book</h5>
                </div>
                <div class="modal-body">
                    <form id="updateForm" action="{{ route('book-edit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <div class="cover-parent">
                                    <img id="cover2" class="cover-image" src="" alt="cover" style="height: 100%; width: 100%">
                                    <input id="cover-input2" name="cover" class="cover-input absolute" type="file" value="{{ old('cover') }}">
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input id="id" name="id" style="display: none">
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                id="title2" name="title" spellcheck="false" autocomplete="off" placeholder="Title">
                                            @error('title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6" style="padding-right: 12.5px">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('author') is-invalid @enderror"
                                                id="author2" name="author" spellcheck="false" autocomplete="off" placeholder="author">
                                            @error('author')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6" style="padding-left: 12.5px">
                                        <div class="form-group">
                                            <select id="category2" class="form-control select2 @error('id_category') is-invalid @enderror" name="id_category">
                                                @foreach ($category as $item)
                                                    <option value="{{ $item->id }}">{{ $item->category }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_category')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea id="description2" class="form-control @error('description') is-invalid @enderror" name="description" name="description" placeholder="Description" style="height: 84px"></textarea>
                                            @error('description')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6" style="padding-right: 12.5px">
                                        <div class="form-group m-0">
                                            <input type="number" class="form-control @error('quantity') is-invalid @enderror"
                                                id="quantity2" name="quantity" spellcheck="false" autocomplete="off" placeholder="Quantity">
                                            @error('quantity')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6" style="padding-left: 12.5px">
                                        <div class="form-group m-0">
                                            <span class="form-control file-parent">File
                                                <input type="file" class="absolute file-input form-control @error('file') is-invalid @enderror"
                                                    id="file2" name="file" spellcheck="false" autocomplete="off" placeholder="File">
                                            </span>
                                            @error('file')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('customScript')
    <script>
        // Passing data
        $(document).on("click", ".edit", function() {
            var id = $(this).data('id');
            var cover = $(this).data('cover');
            var cover2 = $(this).data('cover');
            var title = $(this).data('title');
            var author = $(this).data('author');
            var category = $(this).data('category');
            var description = $(this).data('description');
            var quantity = $(this).data('quantity');
            var file = $(this).data('file');

            $("#id").val(id);
            $("#cover").val(cover);
            $("#cover2").attr("src", "/assets/files/image/" + cover2);
            $("#title2").val(title);
            $("#author2").val(author);
            $('#category2').val(category).trigger('change');
            $("#description2").val(description);
            $("#quantity2").val(quantity);
            $("#file2").val(file);
        });
    </script>
    <script>
        // Image Preview
        function displayInputImage(input, preview) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.readAsDataURL(input.files[0]);

                reader.onload = function (e) {
                    preview.src = e.target.result;
                };
            }
        }

        const inputImage1 = document.querySelector("#cover-input");
        const previewImage1 = document.querySelector("#cover");

        const inputImage2 = document.querySelector("#cover-input2");
        const previewImage2 = document.querySelector("#cover2");

        inputImage1.addEventListener("change", function () {
            displayInputImage(this, previewImage1);
        });

        inputImage2.addEventListener("change", function () {
            displayInputImage(this, previewImage2);
        });

        if (inputImage1.files[0]) {
            displayInputImage(inputImage1, previewImage1);
        }

        if (inputImage2.files[0]) {
            displayInputImage(inputImage2, previewImage2);
        }
    </script>
    <script>
        // Reset createForm
        function resetForm() {
            document.getElementById("createForm").reset();
            previewImage1.src = "/assets/img/blank.png";
        }
    </script>
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
        .file-item {
            color: inherit;
        }
        .file-item:hover {
            color: inherit;
        }
    </style>
    <link rel="stylesheet" href="/assets/css/select2.min.css">
@endpush