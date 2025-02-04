@foreach ($bukus as $item)
    <div class="modal fade" id="modalCenterUpdateBook{{ $item->id }}" tabindex="-1" aria-hidden="true">
        <form action="{{ url('buku/' . $item->id) }}" method="post">
            @method('PUT')
            @csrf

            <input type="hidden" name="oldImg" value="{{ $item->cover }}">

            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Edit Book</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="judul">Judul</label>
                            <input type="text" name="judul" class="form-control" id="judul"
                                placeholder="Insert Title" value="{{ $item->judul }}" />
                        </div>
                        <div class="mb-3">
                            <label for="kategori_id" class="form-label">Kategori</label>
                            <select class="form-select" name="kategori_id" id="kategori_id"
                                aria-label="Default select example">
                                <option value="{{ $item->id }}">{{ $item->kategori->kategori }}</option>
                                @foreach ($kategoris as $k)
                                    <option>{{ $k->kategori }}</option>
                                @endforeach
                                {{-- bukus dari bukucontroller create --}}

                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="jumlah">Jumlah</label>
                            <div class="input-group input-group-merge">
                                <input type="number" id="jumlah" class="form-control" aria-label=""
                                    aria-describedby="jumlah" name="jumlah" value="{{ $item->jumlah }}" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" id="status" class="form-control" aria-label=""
                                aria-describedby="status" name="status" value="{{ $item->status }}" />
                        </div>
                        <div class="mb-3">
                            <label for="publish_date" class="col-md-2 col-form-label">Publish Date</label>
                            <div class="col-md-10">
                                <input class="form-control" name="publish_date" type="text" id="publish_date"
                                    value="{{ $item->publish_date }}" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="cover" class="form-label">Cover</label> <br>
                            <img src="{{ asset('storage/backend/' . $item->cover) }}" width="250px" alt="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="deskripsi">Deskripsi</label>
                            <textarea id="deskripsi" name="deskripsi" class="form-control">{{ $item->deskripsi }}</textarea>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" data-bs-target="#modalToggle2" data-bs-toggle="modal"
                                data-bs-dismiss="modal">
                                Ubah
                            </button>
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
