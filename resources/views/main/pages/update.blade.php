@extends('admin.layouts.custom')

@section('body')
    <div class="modal d-block" id="update" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Book</h5>
                </div>
                <div class="modal-body">
                    <form id="updateForm" action="{{ route('mine-update', $book) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <div class="cover-parent">
                                    <img id="cover" class="cover-image" src="{{ asset('assets/files/image/' . $book->cover) }}" alt="cover" style="height: 100%; width: 100%">
                                    <input id="cover-input" name="cover" class="cover-input absolute" type="file" value="{{ old('cover') }}">
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input id="id" name="id" style="display: none">
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                id="title" name="title" spellcheck="false" autocomplete="off" placeholder="Title"
                                                value="{{ old('title', $book->title) }}">
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
                                                id="author" name="author" spellcheck="false" autocomplete="off" placeholder="author"
                                                value="{{ old('author', $book->author) }}">
                                            @error('author')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6" style="padding-left: 12.5px">
                                        <div class="form-group">
                                            <select id="category" class="form-control select2 @error('id_category') is-invalid @enderror" name="id_category">
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
                                            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description"
                                                placeholder="Description" style="height: 84px">{{ old('author', $book->description) }}</textarea>
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
                                                id="quantity" name="quantity" spellcheck="false" autocomplete="off" placeholder="Quantity"
                                                value="{{ old('author', $book->quantity) }}">
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
                                                    id="file" name="file" spellcheck="false" autocomplete="off" placeholder="File">
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
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('customScript')
    <script>
        // Image Preview
        const inputImage = document.querySelector("#cover-input");
		const previewImage = document.querySelector("#cover");

		const displayInputImage = () => {	
			const oFReader = new FileReader();
			oFReader.readAsDataURL(inputImage.files[0]);

			oFReader.onload = function (oFREvent) {
				previewImage.src = oFREvent.target.result;
			}
		}

		if (inputImage.files[0] != null) {	
			displayInputImage()
		}

		inputImage.addEventListener("change", displayInputImage)
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