<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000;
            font-family: 'Poppins', sans-serif;
            color: #fff;
        }
        .card {
            border: none;
            border-radius: 20px;
            background-color: #fff;
            color: #333;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #218838;
            border-color: #218838;
        }
        .form-label {
            font-weight: bold;
            color: #555;
        }
        .form-control {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            color: #333;
            border-radius: 10px;
        }
        .form-control:focus {
            background-color: #fff;
            box-shadow: none;
            border-color: #28a745;
        }
        .input-group-text {
            background-color: transparent;
            border: none;
            cursor: pointer;
            color: #28a745;
        }
        .input-group-text:hover {
            color: #218838;
        }
        a {
            color: #28a745;
        }
        a:hover {
            color: #218838;
        }
    </style>
</head>
<body>
<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card p-4" style="max-width: 400px; width: 100%;">
        <h3 class="text-center mb-4">Register</h3>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" required autofocus>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" required>
                    <span class="input-group-text" onclick="togglePassword()">
                        <i id="toggleIcon" class="bi bi-eye"></i>
                    </span>
                </div>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    <span class="input-group-text" onclick="togglePassword('password_confirmation', 'toggleIconConfirm')">
                        <i id="toggleIconConfirm" class="bi bi-eye"></i>
                    </span>
                </div>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <p class="text-center mt-3">
                Already have an account? <a href="{{ route('login') }}">Login</a>
            </p>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.js"></script>
<script>
    function togglePassword(fieldId = 'password', iconId = 'toggleIcon') {
        const passwordField = document.getElementById(fieldId);
        const toggleIcon = document.getElementById(iconId);
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            toggleIcon.classList.remove('bi-eye');
            toggleIcon.classList.add('bi-eye-slash');
        } else {
            passwordField.type = 'password';
            toggleIcon.classList.remove('bi-eye-slash');
            toggleIcon.classList.add('bi-eye');
        }
    }
</script>
</body>
</html>
