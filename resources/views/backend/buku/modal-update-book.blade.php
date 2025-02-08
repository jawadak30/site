@foreach ($books as $item) <!-- Changed from $bukus to $books -->
    <div class="modal fade" id="modalCenterUpdateBook{{ $item->id }}" tabindex="-1" aria-hidden="true">
        <form action="{{ url('buku/' . $item->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <input type="hidden" name="oldImg" value="{{ $item->image1 }}"> <!-- Changed from 'cover' to 'image1' -->

            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Edit Book</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="titre">Titre</label> <!-- Changed from 'judul' to 'titre' -->
                            <input type="text" name="titre" class="form-control" id="titre"
                                placeholder="Insert Title" value="{{ $item->titre }}" />
                        </div>
                        <div class="mb-3">
                            <label for="categorie_id" class="form-label">Category</label>
                            <select class="form-select" name="categorie_id" id="categorie_id" aria-label="Default select example">
                                @if ($item->categorie)
                                    <option value="{{ $item->categorie->id }}">{{ $item->categorie->name }}</option> <!-- Display existing category -->
                                @else
                                    <option value="">No Category</option> <!-- Handle null category case -->
                                @endif

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="nbr_exemplaire">Number of Copies</label> <!-- Changed 'Jumlah' to 'Number of Copies' -->
                            <div class="input-group input-group-merge">
                                <input type="number" id="nbr_exemplaire" class="form-control" aria-label=""
                                    aria-describedby="nbr_exemplaire" name="nbr_exemplaire" value="{{ $item->nbr_exemplaire }}" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" id="status" class="form-control" aria-label=""
                                aria-describedby="status" name="status" value="{{ $item->status }}" />
                        </div>
                        <div class="mb-3">
                            <label for="date_edition" class="col-md-2 col-form-label">Publish Date</label>
                            <div class="col-md-10">
                                <input class="form-control" name="date_edition" type="date" id="date_edition"
                                    value="{{ \Carbon\Carbon::parse($item->date_edition)->toDateString() }}" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="image1" class="form-label">Cover</label> <br>
                            <img src="{{ asset('storage/' . $item->image1) }}" width="250px" alt="Cover"> <!-- Changed from 'cover' to 'image1' -->
                            <input type="file" name="image1" class="form-control mt-2">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="description">Description</label> <!-- Changed 'deskripsi' to 'description' -->
                            <textarea id="description" name="description" class="form-control">{{ $item->description }}</textarea>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">Update</button> <!-- Changed 'Ubah' to 'Update' -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endforeach
