@foreach ($users as $item)
    <div class="modal fade" id="modalCenterShow{{ $item->id }}" tabindex="-1" aria-hidden="true">
        <form action="{{ url('user/' . $item->id) }}" method="post">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Show User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="name">Nama</label>
                            <input type="text" name="name" class="form-control" id="name"
                                value="{{ $item->name }}" disabled />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" id="email" class="form-control" disabled aria-label=""
                                aria-describedby="email" name="email" value="{{ $item->email }}" />
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
    </div>
    </form>

    </div>
@endforeach
