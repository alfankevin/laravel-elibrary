@extends('admin.layouts.custom')

@section('body')
    <div class="modal d-block" id="upload" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Upload Book</h5>
                </div>
                <div class="modal-body">
                    <form id="createForm" action="{{ route('store') }}" method="post" enctype="multipart/form-data">
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
                                                    <option value="{{ $item->id }}" {{ old('id') == $item->id ? 'selected' : '' }}>{{ $item->category }}</option>
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
                        <a href="{{ route('mybook') }}" class="btn btn-light">Cancel</a>
                        <button class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('customScript')
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
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
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
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
@endpush