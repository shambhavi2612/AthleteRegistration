<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Centre Admin Dashboard</h1>

        <h4 class="mt-4">Registered Athletes</h4>
        @if($athletes->isEmpty())
            <p>No athletes registered yet.</p>
        @else
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Preferred Sport</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($athletes as $athlete)
                        <tr>
                            <td>{{ $athlete->id }}</td>
                            <td>{{ $athlete->first_name }}</td>
                            <td>{{ $athlete->last_name }}</td>
                            <td>{{ $athlete->email }}</td>
                            <td>{{ $athlete->phone }}</td>
                            <td>{{ $athlete->preferred_sport }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


            <a href="{{ route('centre_admins.logout') }}" class="btn btn-danger">Logout</a>

        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
