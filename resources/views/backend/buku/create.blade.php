@extends('backend.buku.index')
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> --}}
@endpush
@section('title', 'Admin Page - Tambah Buku')
@section('content')

    @if ($errors->any())
        <div class="alert alert-primary alert-dismissible" role="alert">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- @if (session('success'))
<div class="alert alert-info" role="alert">
  {{ session('success') }}
</div>                    
@endif --}}
    {{-- Form --}}
    <form action="{{ url('buku') }}" method="post" enctype="multipart/form-data">

        @csrf
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    {{-- <div class="card-header d-flex justify-content-between align-items-center">
                          <h5 class="mb-0">Basic Layout</h5>
                        </div> --}}
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label" for="judul">Judul</label>
                                <input type="text" name="judul" class="form-control" id="judul"
                                    placeholder="Insert Title" />
                            </div>
                            <div class="mb-3">
                                <label for="kategori_id" class="form-label">Kategori</label>
                                <select class="form-select" name="kategori_id" id="kategori_id"
                                    aria-label="Default select example">
                                    <option hidden>select these category</option>
                                    @foreach ($kategoris as $item)
                                        {{-- bukus dari bukucontroller create --}}
                                        <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="jumlah">Jumlah</label>
                                <div class="input-group input-group-merge">
                                    <input type="number" id="jumlah" class="form-control" aria-label=""
                                        aria-describedby="jumlah" name="jumlah" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" class="form-select" id="status"
                                    aria-label="Default select example">
                                    <option hidden>Open this select menu</option>
                                    <option value="p">Publish</option>
                                    <option value="nyp">Not Yet Published</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="publish_date" class="col-md-2 col-form-label">Publish Date</label>
                                <div class="col-md-10">
                                    <input class="form-control" name="publish_date" type="date" value="YYYY-MM-DD"
                                        id="publish_date" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="cover" class="form-label">Cover</label>
                                <input class="form-control" name="cover" type="file" id="cover" multiple />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="deskripsi">Deskripsi</label>
                                <textarea id="deskripsi" name="deskripsi" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div>
                </div>
            </div>
    </form>
    {{-- end form --}}
@endsection
{{-- @push('js')
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script>
  $(document).ready(function(){
    $('#dataTables').DataTable();
  });
</script>
    
@endpush --}}
