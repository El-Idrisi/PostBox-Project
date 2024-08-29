<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            background-color: #1e90ff;
            border-color: #1e90ff;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #1c86ee;
            border-color: #1c86ee;
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
            border-color: #1e90ff;
        }
        .form-group .eye-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
        .input-group-text {
            background-color: transparent;
            border: none;
            cursor: pointer;
            color: #1e90ff;
        }
        .input-group-text:hover {
            color: #1c86ee;
        }
        a {
            color: #1e90ff;
        }
        a:hover {
            color: #1c86ee;
        }
        .inputpassword {
            border: none;
            background-color: transparent;
        }
        .inputpassword:focus {
            border: none;
            background-color: transparent;
        }
    </style>
</head>
<body>
<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
        <h3 class="text-center mb-4">Login</h3>
        <form method="POST" action="">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Username</label>
                <input style="width: 100%" input type="name" class="form-control" id="name" name="name" required autofocus>
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
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
            <p class="text-center mt-3">
                Don't have an account? <a href="">Register</a>
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
</body>
</html>
</html>
