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
<h2>SuperAdmin Login</h2>
    
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
{{ session('success') }}
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

    <form method="POST" action="{{ route('superadmin.login.post') }}">
        @csrf

        <div class="mb-3">
        <label for="email" class="form-label">Email</label>
         <input type="email" class="form-control" id="email" name="email" required   placeholder=" Enter  Email" required>
         </div>
        
        <div class="mb-3">
        <label for="password" class="form-label">Email</label>
        <input type="password" class="form-control" id="password" name="password" required   placeholder=" Enter Password" required>
        </div>
           

        <button type="submit" class="btn btn-primary">login</button>
    </form>
    </body>
    </html>
