@extends('backend.buku.index')
{{-- @push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endpush --}}

@section('title', 'Admin Page - Add Book')
@section('content')

    @if ($errors->any())
        <div class="alert alert-primary alert-dismissible" role="alert">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Button to Trigger Modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBookModal">
        Add Book
    </button>

    <!-- Modal -->
    <div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="addBookModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBookModalLabel">Add New Book</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form -->
                    <form action="{{ url('buku') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="judul">Title</label>
                            <input type="text" name="judul" class="form-control" id="judul" placeholder="Insert Title" />
                        </div>

                        <div class="mb-3">
                            <label for="kategori_id" class="form-label">Category</label>
                            <select class="form-select" name="kategori_id" id="kategori_id" aria-label="Default select example">
                                <option hidden>Select a Category</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="jumlah">Quantity</label>
                            <input type="number" name="jumlah" class="form-control" id="jumlah" />
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" class="form-select" id="status">
                                <option hidden>Select Status</option>
                                <option value="p">Publish</option>
                                <option value="nyp">Not Yet Published</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="publish_date" class="col-md-2 col-form-label">Publish Date</label>
                            <input class="form-control" name="publish_date" type="date" id="publish_date" />
                        </div>

                        <div class="mb-3">
                            <label for="cover" class="form-label">Cover Image</label>
                            <input class="form-control" name="cover" type="file" id="cover" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="deskripsi">Description</label>
                            <textarea id="deskripsi" name="deskripsi" class="form-control"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Book</button>
                    </form>
                    <!-- End of Form -->
                </div>
            </div>
        </div>
    </div>

@endsection
