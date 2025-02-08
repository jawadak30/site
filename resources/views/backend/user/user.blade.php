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
            {{-- <button type="button" class="btn rounded-pill btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">Add
                User</button> --}}

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
                        <th>Number</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->role }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <!-- View Button -->
                                <button type="button" class="btn btn-sm btn-outline-warning bx bx-info-circle" data-bs-toggle="modal" data-bs-target="#modalCenterShow{{ $item->id }}"></button>

                                <!-- Edit Button -->
                                <button type="button" class="btn btn-sm btn-outline-success bx bx-edit-alt" data-bs-toggle="modal" data-bs-target="#modalCenterUpdateUser{{ $item->id }}"></button>

                                <!-- Delete Button (Admins only, excluding current user) -->
                                @if (auth()->user()->role == 'Admin' && $item->id != auth()->user()->id)
                                    <button type="button" class="btn btn-sm btn-outline-danger bx bx-trash" data-bs-toggle="modal" data-bs-target="#modalCenterDeleteUser{{ $item->id }}"></button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $users->links() }}  <!-- Pagination links -->

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
