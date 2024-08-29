<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
        .inputpassword {
            border: none;
            background-color: transparent;
        }
        .inputpassword:focus {
            border: none;
            background-color: transparent;
        }
        .inputconfirmpassword {
            border: none;
            background-color: transparent;
        }
        .inputconfirmpassword:focus {
            border: none;
            background-color: transparent;
        }
    </style>
</head>
<body>
<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
        <h3 class="text-center mb-4">Register</h3>
        <form method="POST" action="">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" required autofocus>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3 position-relative">
                <label for="password" class="form-label">Password</label>
                <div class="d-flex flex-row form-control">
                    <input style="width: 100%" class="inputpassword" type="password" id="password" name="password" required>
                    <span class="input-group-text eye-icon" onclick="togglePasswordVisibility('password')">
                        <i class="fa fa-eye" id="eye-icon-password"></i>
                    </span>
                </div>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <div class="d-flex flex-row form-control">
                    <input style="width: 100%" class="inputconfirmpassword" type="password" id="confirm-password" name="confirm-password" required>
                    <span class="input-group-text eye-icon" onclick="togglePasswordVisibility('confirm-password')">
                        <i class="fa fa-eye" id="eye-icon-confirm-password"></i>
                    </span>
                </div>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
            <p class="text-center mt-3">
                Already have an account? <a href="">Login</a>
            </p>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <script>
        function togglePasswordVisibility(id) {
            const passwordField = document.getElementById(id);
            const eyeIcon = document.getElementById(`eye-icon-${id}`);
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>
