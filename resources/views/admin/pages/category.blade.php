@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Category Management</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary" style="background-color: #F3F2EC">
                        <div class="card-header" style="border-bottom-color: #F3F2EC">
                            <h4>Category List</h4>
                            <div class="card-header-action">
                                <button type="button" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#create">Add Category</button>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <thead style="border-bottom: 1px solid #ddd">
                                        <tr>
                                            <th>No</th>
                                            <th>Category</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($category as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->category }}</td>
                                                <td class="text-right">
                                                    <div class="d-flex justify-content-end">
                                                        <button type="button" data-toggle="modal" data-target="#update"
                                                            data-id="{{ $item->id }}" data-name="{{ $item->category }}"
                                                            class="btn btn-sm btn-warning btn-icon d-flex align-items-center ml-2 mr-2 edit">
                                                            <span><i class="fas fa-edit"></i></span>&nbsp;Edit
                                                        </button>
                                                        <form action="{{ route('category.destroy', $item->id) }}"
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
    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Category</h5>
                </div>
                <div class="modal-body">
                    <form id="createForm" action="{{ route('category.store') }}" method="post">
                        @csrf
                        <div class="form-group m-0">
                            <label for="category">Category Name</label>
                            <input type="text" class="form-control @error('category') is-invalid @enderror"
                                id="category" name="category" spellcheck="false" autocomplete="off" autofocus>
                            @error('category')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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
    <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Edit Category</h5>
              </div>
              <div class="modal-body">
                  <form action="{{ route('category-edit') }}" method="post">
                      @csrf
                      <div class="form-group m-0">
                          <label for="category2">Category Name</label>
                          <input id="id" name="id" style="display: none">
                          <input type="text" class="form-control @error('category2') is-invalid @enderror"
                              id="category2" name="category" spellcheck="false" autocomplete="off">
                          @error('category2')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                          @enderror
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
        $(document).on("click", ".edit", function() {
            var id = $(this).data('id');
            var name = $(this).data('name');

            $("#id").val(id);
            $("#category2").val(name);
        });
        function resetForm() {
            document.getElementById("createForm").reset();
        }
    </script>
    <script src="/assets/js/select2.min.js"></script>
@endpush

@push('customStyle')
    <link rel="stylesheet" href="/assets/css/select2.min.css">
@endpush