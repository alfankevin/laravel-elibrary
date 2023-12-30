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
                    <div class="card card-primary" style="background-color: #F3F2EC">
                        <div class="card-header">
                            <h4>Book List</h4>
                            <div class="card-header-action">
                                <button type="button" class="btn btn-icon icon-left btn-primary">Add Book</button>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md" id="book">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Book Title</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th class="text-right">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->category }}</td>
                                                <td>{{ $item->description }}</td>
                                                <td class="text-right">
                                                    <div class="d-flex justify-content-end">
                                                        <button type="button" data-id="{{ $item->id_kriteria }}" data-kriteria="{{ $item->kriteria }}"
                                                            data-atribut="{{ $item->atribut }}" data-bobot="{{ $item->bobot }}"
                                                            data-toggle="modal" data-target="#exampleModalCenter"
                                                            class="btn btn-sm btn-secondary btn-icon d-flex align-items-center ml-2 edit">
                                                            <span><i class="fas fa-edit"></i></span>&nbsp;Ubah
                                                        </button>
                                                        <a href="#"
                                                            class="btn btn-sm btn-info btn-icon d-flex align-items-center ml-2 disabled">
                                                            <span><i class="fas fa-edit"></i></span>&nbsp;Sub Kriteria
                                                        </a>
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
    <div class="modal fade" id="exampleModalCenter" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="color: #0F2C56">Ubah Kriteria</h5>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="kriteria">Nama Kriteria</label>
                            <input id="id_kriteria" name="id_kriteria" style="display: none">
                            <input type="text" class="form-control @error('kriteria') is-invalid @enderror"
                                id="kriteria" name="kriteria" spellcheck="false" autocomplete="off">
                            @error('kriteria')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Atribut</label>
                            <select id="atribut" class="form-control select2 @error('atribut') is-invalid @enderror" name="atribut">
                                <option value="Benefit">Benefit</option>
                                <option value="Cost">Cost</option>
                            </select>
                            @error('atribut')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group m-0">
                            <label for="bobot">Bobot</label>
                            <input type="number" class="form-control @error('bobot') is-invalid @enderror"
                                id="bobot" name="bobot" spellcheck="false" autocomplete="off">
                            @error('bobot')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('customScript')
    <script>
        // $(document).on("click", ".edit", function() {
        //     var id = $(this).data('id');
        //     var kriteria = $(this).data('kriteria');
        //     var atribut = $(this).data('atribut');
        //     var bobot = $(this).data('bobot');

        //     $("#id_kriteria").val(id);
        //     $("#kriteria").val(kriteria);
        //     $('#atribut').val(atribut).trigger('change');
        //     $("#bobot").val(bobot);
        // });
    </script>
    <script src="/assets/js/select2.min.js"></script>
@endpush

@push('customStyle')
    <link rel="stylesheet" href="/assets/css/select2.min.css">
@endpush