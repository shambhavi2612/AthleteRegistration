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
     <h1>Athlete Profile</h1>

    @if(session('success'))
        <script>alert('{{ session('success') }}');</script>
    @endif

    <form action="{{ route('athlete.update', ['id' => $athlete->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3"> 
        <label for="first_name" class="form-label">First Name</label>
        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $athlete->first_name) }}"      placeholder=" Enter  First Name" required>
        </div>

        <div class="mb-3">
        <label for="last_name" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $athlete->last_name) }}"
        placeholder=" Enter  Last Name" required> required>
        </div>


        <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $athlete->email) }}" 
        placeholder=" Enter Email" required> 
        </div>

        <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="number" class="form-control" id="phone" name="phone" value="{{ old('phone', $athlete->phone) }}"
        placeholder=" Enter Email"required>
        </div>

        <div class="mb-3">
        <label for="preferred_sport" class="form-label">Preferred Sport</label>
        <br>
        <select class="form-control" id="preferred_sport" name="preferred_sport" required>
        <option value="" disabled {{ old('preferred_sport', $athlete->preferred_sport) === '' ? 'selected' : '' }}>Enter preferred sport</option>
        <option value="Football" {{ old('preferred_sport', $athlete->preferred_sport) === 'Football' ? 'selected' : '' }}>Football</option>
        <option value="Basketball" {{ old('preferred_sport', $athlete->preferred_sport) === 'Basketball' ? 'selected' : '' }}>Basketball</option>
        <option value="Tennis" {{ old('preferred_sport', $athlete->preferred_sport) === 'Tennis' ? 'selected' : '' }}>Tennis</option>
        <option value="Swimming" {{ old('preferred_sport', $athlete->preferred_sport) === 'Swimming' ? 'selected' : '' }}>Swimming</option>
        <option value="Shooting" {{ old('preferred_sport', $athlete->preferred_sport) === 'Shooting' ? 'selected' : '' }}>Shooting</option>
        <option value="Wrestling" {{ old('preferred_sport', $athlete->preferred_sport) === 'Wrestling' ? 'selected' : '' }}>Wrestling</option>
        </select>
        </div>
        

    <button type="submit" class="btn btn-primary">Update</button>
    </form>
</body>
</html>
