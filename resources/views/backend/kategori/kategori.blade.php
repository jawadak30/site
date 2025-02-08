@extends('backend.kategori.index')

@section('title', 'Admin Page - Kategori')
@section('content')
    <!-- Hoverable Table rows -->
    <div class="card">
        <div class="card-body">

            <button type="button" class="btn rounded-pill btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">Add
                Category</button>
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
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>number</th>
                        <th>Category Name</th> <!-- Changed 'Kategori' to 'Category Name' -->
                        <th>Description</th> <!-- Added Description column -->
                        <th>Date Added</th> <!-- Changed 'Date Add' to 'Date Added' -->
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($categories as $item)
                        <tr>
                            <td>
                                <i class="fab fa-bootstrap fa-lg text-primary me-3"></i>
                                <strong>{{ $loop->iteration }}</strong>
                            </td>
                            <td>{{ $item->name }}</td> <!-- Displaying the 'name' field -->
                            <td>{{ $item->description }}</td> <!-- Displaying the 'description' field -->
                            <td><span class="">{{ $item->created_at }}</span></td> <!-- Displaying the 'created_at' field -->
                            <td>
                                <button type="button" class="btn btn-sm btn-outline-success bx bx-edit-alt"
                                    data-bs-toggle="modal" data-bs-target="#modalCenterUpdate{{ $item->id }}">
                                    Edit
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-danger bx bx-trash"
                                    data-bs-toggle="modal" data-bs-target="#modalCenterDelete{{ $item->id }}">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Add pagination controls -->
            <div class="pagination">
                {{ $categories->links() }}
            </div>

        </div>
    </div>
    <!--/ Hoverable Table rows -->
    {{-- @include('backend.modal-create') --}}
@endsection
