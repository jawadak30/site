<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Reservations</h2>

        <!-- Success Message -->
        @if(session('success'))
            <script>
                Swal.fire({
                    title: 'Success!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            </script>
        @endif

        <!-- Create Reservation Button -->
        {{-- <a href="{{ route('reservations.create') }}" class="btn btn-primary mb-3">Create New Reservation</a> --}}

        <!-- Reservations Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Book</th>
                    <th>Reservation Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            @foreach($reservations as $reservation)
            <tr>
                <td>{{ $reservation->id }}</td>

                <!-- Access livres (books) in the reservation -->
                <td>
                    @foreach($reservation->livres as $livre)
                        {{ $livre->titre }} <br>
                        <!-- Access category through the livre -->
                        {{ $livre->categorie ? $livre->categorie->name : 'No Category' }} <br>
                    @endforeach
                </td>

                <td>{{ $reservation->dateReservation }}</td>
                <td>{{ ucfirst($reservation->etat) }}</td>

                <td>
                    <a href="{{ route('reservations.edit', $reservation) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('reservations.destroy', $reservation) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach


            </tbody>
        </table>

        <!-- Pagination -->
        {{ $reservations->links() }}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "Success!",
                text: "{{ session('success') }}",
                icon: "success",
                confirmButtonText: "OK"
            });
        });
    </script>
@endif


<script>
    setTimeout(function () {
        let alert = document.querySelector(".alert");
        if (alert) {
            alert.remove();
        }
    }, 5000); // Alert disappears after 5 seconds
</script>

    <!-- Bootstrap and SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</body>

</html>
