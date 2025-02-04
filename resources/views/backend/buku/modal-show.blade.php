@foreach ($bukus as $item)
    <div class="modal fade" id="modalCenterShow{{ $item->id }}" tabindex="-1" aria-hidden="true">
        <form action="{{ url('buku/' . $item->id) }}" method="post">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Show Book</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="judul">Judul</label>
                            <input type="text" name="judul" class="form-control" id="judul"
                                placeholder="Insert Title" value="{{ $item->judul }}" disabled />
                        </div>
                        <div class="mb-3">
                            <label for="kategori_id" class="form-label">Kategori</label>
                            <input type="text" id="kategori_id" class="form-control" disabled aria-label=""
                                aria-describedby="kategori_id" name="kategori_id"
                                value="{{ $item->kategori->kategori }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="jumlah">Jumlah</label>
                            <div class="input-group input-group-merge">
                                <input type="number" id="jumlah" class="form-control" disabled aria-label=""
                                    aria-describedby="jumlah" name="jumlah" value="{{ $item->jumlah }}" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" id="status" class="form-control" aria-label=""
                                aria-describedby="status" name="status" value="{{ $item->status }}" disabled />
                        </div>
                        <div class="mb-3">
                            <label for="publish_date" class="col-md-2 col-form-label">Publish Date</label>
                            <div class="col-md-10">
                                <input class="form-control" name="publish_date" type="text" id="publish_date"
                                    value="{{ $item->publish_date }}" disabled />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="cover" class="form-label">Cover</label> <br>
                            <img src="{{ asset('storage/backend/' . $item->cover) }}" width="250px" alt="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="deskripsi">Deskripsi</label>
                            <textarea id="deskripsi" name="deskripsi" class="form-control" disabled>{{ $item->deskripsi }}</textarea>
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
