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
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $item->name) }}" />
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $item->email) }}" />
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="password" class="form-label">Password (Leave empty if no change)</label>
                                <input type="password" name="password" id="password" class="form-control" />
                            </div>
                            <div class="col mb-0">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select name="role" id="role" class="form-select">
                                    <option value="admin" {{ old('role', $item->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="user" {{ old('role', $item->role) == 'user' ? 'selected' : '' }}>User</option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="edit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endforeach
