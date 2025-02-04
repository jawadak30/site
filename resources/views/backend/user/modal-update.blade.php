@foreach ($users as $item)
    <div class="modal fade" id="modalCenterUpdateUser{{ $item->id }}" tabindex="-1" aria-hidden="true">
        <form action="{{ url('user/' . $item->id) }}" method="post">
            @method('PUT')
            @csrf
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid                                    
                                @enderror"
                                    value="{{ old('name', $item->name) }}" />

                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <div class="row">
                            <div class=" mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ old('email', $item->email) }}" />
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" />

                            </div>
                            <div class="col mb-0">
                                <label for="password_confirmation" class="form-label">Confirmation Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" name="edit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
    </div>
    </div>

    {{-- <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" id="name" class="form-control" name="name"
                                    value="{{ old('name', $item->name) }}" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control" name="email"
                                    value="{{ old('email', $item->email) }}" />
                            </div>
                        </div>

                        <div class="col mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" class="form-control" name="password"
                                value="{{ old('password', $item->password) }}" />
                        </div>
                        <div class="col mb-3">
                            <label for="confirmation_password" class="form-label">Konfirmasi Password</label>
                            <input type="confirmation_password" id="password" class="form-control"
                                name="confirmation_password"
                                value="{{ old('confirmation_password', $item->password) }}" />
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="modal-footer">
                        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </div>
        </form>
    </div> --}}
    </form>
    </div>
@endforeach
