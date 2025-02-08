@foreach ($books as $item) <!-- Changed from $bukus to $books -->
    <form action="{{ url('buku/' . $item->id) }}" method="post">
        @method('DELETE')
        @csrf
        <!-- Modal 1-->
        <div class="modal fade" id="modalCenterDeleteBook{{ $item->id }}" aria-labelledby="modalToggleLabel"
            tabindex="-1" style="display: none" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalToggleLabel">Delete Book</h5> <!-- Changed 'Hapus Buku' to 'Delete Book' -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">Are you sure you want to delete the book "{{ $item->titre }}"? <!-- Changed 'Buku' to 'Book' and 'judul' to 'titre' -->
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="submit">Delete</button> <!-- Changed button text to 'Delete' -->
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button> <!-- Added Cancel button -->
                    </div>
                </div>
            </div>
        </div>
    </form>
@endforeach
