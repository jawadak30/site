@extends('backend.buku.index')
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> --}}
@endpush
@section('title', 'Admin Page - Buku')
@section('content')
    <!-- Hoverable Table rows -->
    <div class="card">
        {{-- <button type="button" class="btn rounded-pill btn-primary" data-bs-toggle="modal" data-bs-target="#addBookModal">Add
            book</button> --}}
        <div class="card-body">
            @if (auth()->user()->role == 'Admin')
                <a href="{{ url('buku/create') }}" type="button" class="btn rounded-pill btn-primary">Add Book</a>
            @endif
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
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Category</th>
                        <th>Image 1</th>
                        <th>Description</th>
                        <th>Date Added</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($books as $item)
                        <tr>
                            <td>
                                <i class="fab fa-bootstrap fa-lg text-primary me-3"></i>
                                <strong>{{ $loop->iteration }}</strong>
                            </td>
                            <td>{{ $item->titre }}</td> <!-- Titre column -->
                            <td>
                                {{ $item->categorie ? $item->categorie->name : 'No Category' }}
                            </td>

                            <td><img src="{{ asset('storage/' . $item->image1) }}" alt="" width="75"></td> <!-- Image 1 -->
                            <td>{{ $item->description }}</td> <!-- Description field -->
                            <td>{{ $item->created_at }}</td> <!-- Created At (Date Added) -->
                            <td>
                                <button type="button" class="btn btn-sm btn-outline-warning bx bx-info-circle" data-bs-toggle="modal" data-bs-target="#modalCenterShow{{ $item->id }}"></button>
                                @if (auth()->user()->isAdmin())
                                <button type="button" class="btn btn-sm btn-outline-success bx bx-edit-alt" data-bs-toggle="modal" data-bs-target="#modalCenterUpdateBook{{ $item->id }}"></button>
                                @endif
                                <button type="button" class="btn btn-sm btn-outline-danger bx bx-trash" data-bs-toggle="modal" data-bs-target="#modalCenterDeleteBook{{ $item->id }}"></button>
                            </td>
                        </tr>
                    @endforeach
                    @if (auth()->user()->isAdmin())
                    {{ $books->links() }}
                    @endif
                </tbody>
            </table>

        </div>
    </div>
    <!--/ Hoverable Table rows -->
    {{-- @include('backend.modal-create') --}}
@endsection
@push('js')
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTables').DataTable();
        });
    </script>
@endpush
