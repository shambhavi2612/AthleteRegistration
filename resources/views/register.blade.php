<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Athlete Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Athlete Registration Form</h2>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="/register" method="POST">
            @csrf

            <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name"  placeholder=" Enter  First Name" required >
            </div>

            <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name"    placeholder=" Enter  Last  Name" required>
            </div>

            <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required   placeholder=" Enter  Email" required>
            </div>

            <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="number" class="form-control" id="phone" name="phone"    placeholder=" Enter phone number" required>
            </div>

            <div class="mb-3">
            <label for="preferred_sport" class="form-label">Preferred Sport</label>
            <select class="form-control" id="preferred_sport" name="preferred_sport" placeholder=" Enter preferred sport" required>
            <option value="" disabled selected>Enter preferred sport</option>
            <option value="Football">Football</option>
            <option value="Basketball">Basketball</option>
            <option value="Tennis">Tennis</option>
            <option value="Swimming">Swimming</option>
            <option value="Swimming">Shooting</option>
            <option value="Swimming">Wrestling</option>

            </select>
            </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
    </div>
</body>
</html>
