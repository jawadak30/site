@foreach ($kategoris as $item)
    <div class="modal fade" id="modalCenterUpdate{{ $item->id }}" tabindex="-1" aria-hidden="true">
        <form action="{{ url('kategori/' . $item->id) }}" method="post">
            @method('PUT')
            @csrf
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Edit Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <input type="text" id="kategori" class="form-control" placeholder="Enter Category"
                                    name="kategori" value="{{ old('kategori', $item->kategori) }}" />
                            </div>
                        </div>
                        <div class="row g-2">
                            {{-- <div class="col mb-0">
                <label for="emailWithTitle" class="form-label">Email</label>
                <input
                  type="text"
                  id="emailWithTitle"
                  class="form-control"
                  placeholder="xxxx@xxx.xx"
                />
              </div>
              <div class="col mb-0">
                <label for="dobWithTitle" class="form-label">DOB</label>
                <input
                  type="text"
                  id="dobWithTitle"
                  class="form-control"
                  placeholder="DD / MM / YY"
                />
              </div> --}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </div>
    </div>
    </div>
    </form>

    </div>
@endforeach
