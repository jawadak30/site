@extends('backend.user.index')
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> --}}
@endpush
@section('title', 'Admin Page - User')
@section('content')
    <!-- Hoverable Table rows -->
    <div class="card">
        <div class="card-body">
            <button type="button" class="btn rounded-pill btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">Add
                User</button>

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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Tanggal Buat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($users as $item)
                        <tr>
                            <td>
                                <i class="fab fa-bootstrap fa-lg text-primary me-3"></i>
                                <strong>{{ $loop->iteration }}</strong>
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->role }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-outline-warning bx bx-info-circle "
                                    data-bs-toggle="modal" data-bs-target="#modalCenterShow{{ $item->id }}">
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-success bx bx-edit-alt "
                                    data-bs-toggle="modal" data-bs-target="#modalCenterUpdateUser{{ $item->id }}">
                                </button>
                                @if (auth()->user()->role == 'Admin')
                                    @if ($item->id != auth()->user()->id)
                                        <button type="button" class="btn btn-sm btn-outline-danger bx bx-trash "
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalCenterDeleteUser{{ $item->id }}">
                                        </button>
                                    @endif
                                @endif

                            </td>
                        </tr>
                    @endforeach

                    {{ $users->links() }}
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
