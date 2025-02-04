@extends('backend.buku.index')
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> --}}
@endpush
@section('title', 'Admin Page - Tampilkan Buku')
@section('content')
    <!-- Hoverable Table rows -->
    <div class="card">
        <h5 class="card-header">Hoverable rows</h5>
        <div class="card-body">
            {{-- <a href="{{ url('buku/create') }}"> --}}
            <a href="{{ url('buku/create') }}" type="button" class="btn rounded-pill btn-primary">Add Book</a>
            {{-- </a> --}}
            @if ($errors->any())
                <div class="alert alert-primary alert-dismissible" role="alert">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-info" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table table-hover" id="dataTables">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Cover</th>
                        <th>Deskripsi</th>
                        <th>Date Add</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($bukus as $item)
                        <tr>
                            <td>
                                <i class="fab fa-bootstrap fa-lg text-primary me-3"></i>
                                <strong>{{ $loop->iteration }}</strong>
                            </td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->Kategori->kategori }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->cover }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-outline-success bx bx-edit-alt "
                                    data-bs-toggle="modal" data-bs-target="#modalCenterUpdate{{ $item->id }}">
                                    Edit
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-danger bx bx-trash "
                                    data-bs-toggle="modal" data-bs-target="#modalCenterDelete{{ $item->id }}">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Hoverable Table rows -->
    {{-- @include('backend.modal-create') --}}
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
