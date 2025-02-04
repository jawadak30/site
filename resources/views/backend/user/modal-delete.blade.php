@foreach ($users as $item)
    <form action="{{ url('user/' . $item->id) }}" method="post">
        @method('DELETE')
        @csrf
        <!-- Modal 1-->
        <div class="modal fade" id="modalCenterDeleteUser{{ $item->id }}" aria-labelledby="modalToggleLabel"
            tabindex="-1" style="display: none" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalToggleLabel">Hapus User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">Yakin akan menghapus pengguna {{ $item->name }}?</div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-target="#modalToggle2" data-bs-toggle="modal"
                            data-bs-dismiss="modal">
                            Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </form>
@endforeach
