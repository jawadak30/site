@foreach ($books as $item) <!-- Changed from $bukus to $books -->
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
                            <label class="form-label" for="titre">Titre</label> <!-- Changed from 'judul' to 'titre' -->
                            <input type="text" name="titre" class="form-control" id="titre"
                                placeholder="Insert Title" value="{{ $item->titre }}" disabled />
                        </div>
                        <div class="mb-3">
                            <label for="categorie_id" class="form-label">Category</label> <!-- Changed 'Kategori' to 'Category' -->
                            <input type="text" id="categorie_id" class="form-control" disabled aria-label=""
                                aria-describedby="categorie_id" name="categorie_id"
                                value="{{ $item->categorie ? $item->categorie->name : 'No Category' }}" /> <!-- Check if categorie exists -->
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="nbr_exemplaire">Number of Copies</label> <!-- Changed from 'jumlah' to 'nbr_exemplaire' -->
                            <div class="input-group input-group-merge">
                                <input type="number" id="nbr_exemplaire" class="form-control" disabled aria-label=""
                                    aria-describedby="nbr_exemplaire" name="nbr_exemplaire" value="{{ $item->nbr_exemplaire }}" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" id="status" class="form-control" aria-label=""
                                aria-describedby="status" name="status" value="{{ $item->status }}" disabled />
                        </div>
                        <div class="mb-3">
                            <label for="date_edition" class="col-md-2 col-form-label">Publish Date</label>
                            <div class="col-md-10">
                                <input class="form-control" name="date_edition" type="text" id="date_edition"
                                    value="{{ $item->date_edition }}" disabled /> <!-- Changed from 'publish_date' to 'date_edition' -->
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="cover" class="form-label">Cover</label> <br>
                            <img src="{{ asset('storage/' . $item->image1) }}" width="250px" alt="Cover"> <!-- Changed from 'cover' to 'image1' -->
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="description">Description</label> <!-- Changed 'deskripsi' to 'description' -->
                            <textarea id="description" name="description" class="form-control" disabled>{{ $item->description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endforeach
