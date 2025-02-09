<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Reservation</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container mt-5">
        <h2>Edit Reservation</h2>

        <form action="{{ route('reservations.update', $reservation) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="livre_id" class="form-label">Book</label>
                <select name="livre_id" id="livre_id" class="form-control" required>
                    @foreach($livres as $livre)
                        <option value="{{ $livre->id }}" {{ $livre->id == $reservation->livre_id ? 'selected' : '' }}>{{ $livre->titre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="dateReservation" class="form-label">Reservation Date</label>
                <input type="date" name="dateReservation" id="dateReservation" class="form-control" value="{{ $reservation->dateReservation }}" required>
            </div>

            <div class="mb-3">
                <label for="etat" class="form-label">Status</label>
                <select name="etat" id="etat" class="form-control" required>
                    <option value="en attente" {{ $reservation->etat == 'en attente' ? 'selected' : '' }}>Pending</option>
                    <option value="confirmée" {{ $reservation->etat == 'confirmée' ? 'selected' : '' }}>Confirmed</option>
                    <option value="annulée" {{ $reservation->etat == 'annulée' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>

            <button type="submit" class="btn btn-warning">Update Reservation</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
