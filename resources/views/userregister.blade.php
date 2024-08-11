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
    <h2>User Registration Form</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label"> Name</label>
        <input type="text" class="form-control" id="name" name="name"  placeholder=" Enter Name" required >
         </div>
     <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required   placeholder=" Enter  Email" required>
        </div>
    <div class="mb-3">
        <label for="password" class="form-label">Email</label>
        <input type="password" class="form-control" id="password" name="password" required   placeholder=" Enter Password" required>
        </div>
    <div class="mb-3">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
        </div>
    <div class="mb-3">
    <label for="is_super_admin">Is Super Admin  ?</label>
    <input type="checkbox" id="is_super_admin" name="is_super_admin" value="1">
    </div>
    </br>

    <button type="submit" class="btn btn-primary">Login</button>
</form>
</body>
</html>
