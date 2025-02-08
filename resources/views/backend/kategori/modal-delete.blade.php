@foreach ($categories as $item)
<form action="{{ url('kategori/'.$item->id) }}" method="post">
    @method('DELETE')
    @csrf
    <!-- Modal 1-->
    <div
        class="modal fade"
        id="modalCenterDelete{{ $item->id }}"
        aria-labelledby="modalToggleLabel"
        tabindex="-1"
        style="display: none"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalToggleLabel">Delete Category</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">Are you sure you want to delete category {{ $item->kategori }}?</div>
                <div class="modal-footer">
                    <button
                        class="btn btn-primary"
                        data-bs-target="#modalToggle2"
                        data-bs-toggle="modal"
                        data-bs-dismiss="modal"
                    >
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach
