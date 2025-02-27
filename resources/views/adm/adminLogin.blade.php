<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login Admin</title>
    <link rel="icon" href="../img/logo_RSUD_soedomo_trenggalek.png" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }
        .container {
            position: relative;
            width: 100%;
            max-width: 400px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            animation: fadeIn 0.5s ease-in-out;
        }

        .btn-kembali {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff; /* Tetap putih */
            background-color: #f44336;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            outline: none; /* Hilangkan outline */
            border: none; /* Hilangkan border */
        }

        .btn-kembali:hover, .btn-kembali:focus {
            background-color: #d32f2f;
            color: #fff; /* Tetap putih pada hover */
            outline: none; /* Hilangkan outline pada focus */
            text-decoration: none; /* Hilangkan underline */
        }

        .btn-kembali:active {
            background-color: #b71c1c;
            color: #fff; /* Tetap putih saat ditekan */
            outline: none; /* Hilangkan garis biru pada klik */
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .login-form {
            padding: 20px;
            text-align: center;
            margin-top: 50px; /* Added margin-top to create space between the form and the "Kembali" button */
        }

        .logo {
            margin-bottom: 20px;
        }

        .login-form h1 {
            margin-bottom: 20px;
            color: #333;
        }

        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4facfe;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 10px; /* Added margin-top to create space between the buttons */
        }

        button:hover {
            background-color: #4489c7;
        }
        .toggle-password {
            position: absolute;
            top: 70%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 0.9rem;
            color: #007bff;
            user-select: none;
            transition: color 0.3s, font-size 0.3s;
        }

        .toggle-password:hover {
            color: #0056b3;
            font-size: 1rem;
        }

    </style>
</head>
<body>
    <div class="container">
        <!-- Button Kembali -->
        <a class="btn-kembali" href="{{ route('homepage') }}">X</a>

        <div class="login-form">
            <div class="logo">
                <img src="{{ asset('img/logo_RSUD_soedomo_trenggalek.png') }}" alt="MyWebsite Logo" style="width: 80px; height: auto;">
            </div>
            <h2>Login Admin <br> Airsense Sensor</h2>

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <div class="d-flex justify-content-between">
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input-group" style="position: relative;">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                    <span class="toggle-password" onclick="togglePassword()">Tampilkan</span>
                </div>

                <button type="submit">Masuk</button>
            </form>
        </div>
    </div>
<script>
    function togglePassword() {
        const passwordField = document.getElementById('password');
        const toggleText = document.querySelector('.toggle-password');

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            toggleText.textContent = 'Sembunyikan';
        } else {
            passwordField.type = 'password';
            toggleText.textContent = 'Tampilkan';
        }
    }
</script>
</body>
</html>
