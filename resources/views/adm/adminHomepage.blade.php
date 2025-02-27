<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="icon" href="../img/logo_RSUD_soedomo_trenggalek.png" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Styling untuk navbar */
        body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f6f9;
        color: #333;
    }

    /* Navbar modern */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    background: linear-gradient(90deg, #4facfe, #00f2fe);
    position: relative;
    color: #fff;
}

    .logo {
        display: flex;
        align-items: center;
    }

    .logo img {
        margin-right: 10px;
    }

    .logo-text h4,
    .logo-text h6 {
        margin: 0;
        color: #fff;
    }

    /* Desktop Menu */
    #menu {
        list-style-type: none;
        display: flex;
        gap: 15px;
        padding: 0;
        margin: 0;
    }

    #menu li {
        position: relative;
    }

    #menu a {
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        color: #fff;
        text-decoration: none;
        border-radius: 6px;
        transition: color 0.3s ease, background-color 0.3s ease;
    }

    /* Hover Effect for Regular Buttons */
    #menu li a:not(.reload-btn):hover {
        background-color: #00f2fe;
        color: #333;
        box-shadow: 0 4px 8px rgba(50, 255, 126, 0.3);
        transform: translateY(-2px);
    }

    /* Styling for the "Muat Ulang Data" Button */
    #menu .reload-btn {
        background-color: #4facfe;
        color: #ffffff;
        font-weight: bold;
        padding: 10px 25px;
    }

    /* Hover Effect for "Muat Ulang Data" Button */
    #menu .reload-btn:hover {
        background-color: #00f2fe;
        box-shadow: 0 4px 8px rgba(0, 242, 254, 0.3);
        transform: translateY(-2px);
    }

    /* Toggle Button */
.toggle-btn {
    display: none;
    position: absolute;
    top: 15px;
    right: 20px;
    cursor: pointer;
}

.toggle-btn div {
    width: 30px;
    height: 3px;
    background-color: #fff;
    margin: 6px 0;
    transition: 0.4s;
}


.form-container {
    width: 50%;
    margin: 50px auto;
    background-color: #ffffff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    max-width: 600px;
}

.form-container h2 {
    text-align: center;
    color: #4a4a4a;
    margin-bottom: 20px;
    font-size: 24px;
    font-weight: 600;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-size: 14px;
    color: #4a4a4a;
    font-weight: 500;
}

.form-group input[type="text"],
.form-group input[type="number"],
.form-group input[type="password"] {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 14px;
    background-color: #f9f9f9;
    box-sizing: border-box;
    transition: border-color 0.3s ease;
}

.form-group input[type="text"]:focus,
.form-group input[type="number"]:focus,
.form-group input[type="password"]:focus {
    border-color: #4facfe;
    outline: none;
}

.form-group input[type="submit"] {
    width: 100%;
    background-color: #4facfe;
    color: white;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    padding: 14px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    box-sizing: border-box;
}

.form-group input[type="submit"]:hover {
    background-color: #00f2fe;
}

.form-group .optional {
    font-size: 12px;
    font-style: italic;
    color: gray;
}

.alert {
    margin: 10px 0;
    color: green;
    font-size: 14px;
}

.modal {
    transition: all 0.3s ease-in-out;
}

.modal.fade {
    opacity: 0;
}

.modal.fade.show {
    opacity: 1;
}
        .logout-button {
            background: linear-gradient(135deg, #ff4757, #ff6b81);
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.3s;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
  
        }

        .logout-button:hover {
            background-color: #ff6b81;
            transform: scale(1.05);
        }
    
@media (max-width: 768px) {
    #menu {
        display: none;
        flex-direction: column;
        position: absolute;
        top: 90px;
        right: 0;
        background: linear-gradient(90deg, #4facfe, #00f2fe);
        width: 100%;
        padding: 10px 0;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    #menu li {
        text-align: center;
        padding: 10px 0;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .toggle-btn {
        display: block;
    }

    .navbar.expanded #menu {
        display: flex;
    }
    .form-container {
        width:90%;
    }
}



    /* Footer modern */
    footer {
        background-color: #333;
        color: #ccc;
        padding: 40px 20px;
        text-align: center;
        border-top: 5px solid #4facfe;
    }

    footer a {
        color: #4facfe;
        margin: 0 15px;
        text-decoration: none;
        transition: color 0.3s;
    }

    footer a:hover {
        color: #fff;
    }

    footer p {
        margin: 10px 0;
        font-size: 14px;
    }
    </style>
</head>
<body>
@if (session('hashed_password') === '$2y$10$Kb1.NDId2/2U/5Wq7QpLZujbZCt4ts8I/VQwhjO6tO1zvScEwe.M1lr')
    <!-- Navbar -->
<div class="navbar" id="navbar">
    <div class="logo">
        <img src="{{ asset('img/logo_RSUD_soedomo_trenggalek.png') }}" alt="MyWebsite Logo" style="width: 80px; height: auto;">
        <div class="logo-text">
            <h4>RSUD dr. Soedomo Trenggalek</h4>
            <h6>Airsense Sensor</h6>
        </div>
    </div>
    <div class="toggle-btn" onclick="toggleMenu()">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <ul id="menu">
        <li><p>Admin ID: <span id="chat-id-value">{{ $adminData[0]->chat_id }}</span></p></li>
        <li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="logout-button">Log Out</button>
            </form>
        </li>
    </ul>
</div>


    <div class="form-container">
    <h2>Edit Bot Telegram</h2>
    <form action="{{ route('adminUpdate') }}" method="POST" onsubmit="return validatePasswords()">
    @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="{{ $adminData[0]->username }}" required>
                <small class="form-text text-muted">
                </small>
                <div id="username-warning" style="color: red; display: none; font-size: 12px;">
                    Username harus lebih dari 8 karakter.
                </div>
            </div>


            <div class="form-group">
                <label for="no_telegram">No.Telegram Admin</label>
                <input type="text" id="no_telegram" name="no_telegram" value="{{  $adminData[0]->no_telegram }}" required>
                <small class="form-text text-muted">
                </small>
                <div id="telegram-warning" style="color: red; display: none; font-size: 12px;">
                    No.Telegram minimal 12 angka.
                </div>
            </div>

            <div class="form-group">
                <label for="chat_id">Chat ID Admin</label>
                <input type="number" id="chat_id" name="chat_id" value="{{ $adminData[0]->chat_id }}" required>
                <small class="form-text text-muted">
                    Sebelum mengisi Chat ID, pastikan Anda telah mengecek Chat ID di <a href="https://t.me/username_to_id_bot" target="_blank">@idbot</a>  pada Telegram. Anda bisa copy-paste ID tersebut ke dalam input Chat ID.
                </small>
                <small class="form-text text-muted">
                    Disarankan untuk membuka <a href="https://t.me/air_sense_bot" target="_blank">@air_sense_bot</a> di Telegram untuk pengecekan pesan yang akan dikirimkan dari website.
                </small>
                <small class="form-text text-muted">
                </small>
                <div id="chatid-warning" style="color: red; display: none; font-size: 12px;">
                    Chat ID berupa angka.
                </div>
            </div>
            
            <div class="form-group">
                <label for="chat_id_user_1">Chat ID User 1</label>
                <input type="number" id="chat_id_user_1" name="chat_id_user[]" value="{{ $adminData[0]->chat_id_user[0]}}">
            </div>

            <div class="form-group">
                <label for="chat_id_user_2">Chat ID User 2</label>
                <input type="number" id="chat_id_user_2" name="chat_id_user[]" value="{{ $adminData[0]->chat_id_user[1]}}">
            </div>

            <div class="form-group">
                <label for="chat_id_user_3">Chat ID User 3</label>
                <input type="number" id="chat_id_user_3" name="chat_id_user[]" value="{{ $adminData[0]->chat_id_user[2]}}">
            </div>

            <div class="form-group">
                <label for="chat_id_user_4">Chat ID User 4</label>
                <input type="number" id="chat_id_user_4" name="chat_id_user[]" value="{{ $adminData[0]->chat_id_user[3]}}">
            </div>
            
        <div class="form-group">
            <label for="password">Password Baru <span class="optional">(optional)</span></label>
            <input type="password" id="password" name="password" autocomplete="new-password">
            <small class="form-text text-muted">
                Password minimal 8 karakter & memiliki karakter khusus (!@#$%).
            </small>
            <div id="password-warning" style="color: red; display: none; font-size: 12px;">
                Password harus lebih dari 8 karakter dan mengandung karakter khusus (!@#$%).
            </div>
            <button type="button" id="toggle-password" style="background: none; border: none; color: #007bff; cursor: pointer;">Lihat Password</button>
        </div>


        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password Baru <span class="optional">(optional)</span></label>
            <input type="password" id="password_confirmation" name="password_confirmation">
            <button type="button" id="toggle-password-confirmation" style="background: none; border: none; color: #007bff; cursor: pointer;">Lihat Password</button>
        </div>

            <div class="form-group">
                <input type="submit" value="Update Admin">
            </div>

<!-- Modal for Success and Error Messages -->
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="messageModalLabel">Notification</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
        </form>
        </div>


    <!-- Footer -->
<footer style="background-color: #f8f9fa; padding: 20px; text-align: center; border-top: 1px solid #e9ecef;">
    <div style="max-width: 1200px; margin: 0 auto;">
        <p style="margin: 0; color: #6c757d;">&copy; 2024 AirSense. Semua Hak Cipta Dilindungi.</p>
        <p style="margin: 10px 0 0; color: #6c757d;">
        <p>Admin ID: <span id="chat-id-value">{{ $adminData[0]->chat_id}}</span></p>
        </p>
    </div>
</footer>

<script>
    document.getElementById('username').addEventListener('input', function() {
        const username = this.value;
        const warning = document.getElementById('username-warning');
        if (username.length < 8) {
            warning.style.display = 'block';  // Tampilkan peringatan
        } else {
            warning.style.display = 'none';   // Sembunyikan peringatan
        }
    });
    
    document.getElementById('no_telegram').addEventListener('input', function() {
        const no_telegram = this.value;
        const warning = document.getElementById('telegram-warning');
        if (no_telegram.length < 12) {
            warning.style.display = 'block';  // Tampilkan peringatan
        } else {
            warning.style.display = 'none';   // Sembunyikan peringatan
        }
    });
    
    document.getElementById('chat_id').addEventListener('input', function() {
        const chat_id = this.value;
        const warning = document.getElementById('chatid-warning');
        if (chat_id.trim() === '') {
            warning.style.display = 'block';  // Tampilkan peringatan
        } else {
            warning.style.display = 'none';   // Sembunyikan peringatan
        }
    });
    
    document.getElementById('password').addEventListener('input', function() {
        const password = this.value;
        const warning = document.getElementById('password-warning');
        const regexSpecialChar = /[!@#$%]/;  // Regular expression untuk karakter khusus

        // Memeriksa apakah panjang password lebih dari 8 dan mengandung karakter khusus
        if (password.length < 8 || !regexSpecialChar.test(password)) {
            warning.style.display = 'block';  // Tampilkan peringatan
        } else {
            warning.style.display = 'none';   // Sembunyikan peringatan
        }
    });

    // Toggle password visibility
    document.getElementById('toggle-password').addEventListener('click', function() {
        const passwordField = document.getElementById('password');
        const currentType = passwordField.type;
        
        // Mengubah tipe input password menjadi text dan sebaliknya
        if (currentType === 'password') {
            passwordField.type = 'text';
            this.textContent = 'Sembunyikan Password';  // Ubah teks tombol
        } else {
            passwordField.type = 'password';
            this.textContent = 'Lihat Password';  // Kembalikan teks tombol
        }
    });
    
    document.getElementById('toggle-password-confirmation').addEventListener('click', function() {
        const passwordField = document.getElementById('password_confirmation');
        const currentType = passwordField.type;
        
        // Mengubah tipe input password menjadi text dan sebaliknya
        if (currentType === 'password') {
            passwordField.type = 'text';
            this.textContent = 'Sembunyikan Password';  // Ubah teks tombol
        } else {
            passwordField.type = 'password';
            this.textContent = 'Lihat Password';  // Kembalikan teks tombol
        }
    });

    function reloadPage() {
        window.location.reload(); // Memuat ulang halaman
    }
    function toggleMenu() {
        const navbar = document.getElementById('navbar');
        navbar.classList.toggle('expanded');
    }

    function validatePasswords() {
    const password = document.getElementById('password').value;
    const passwordConfirmation = document.getElementById('password_confirmation').value;

    if (password !== passwordConfirmation) {
        alert('Password Tidak Match.');
        return false; // Prevent form submission
    }
    return true; // Allow form submission
}

$(document).ready(function() {
        @if(session('success') || session('error'))
            $('#messageModal').modal('show');
        @endif
    });
    const adminData = parseInt(@json($adminData)); // Mengonversi ke integer
    console.log(adminData); // Melihat data di console browser
</script>

@else
<script>
window.location.href = "/adm/adminLogin";
</script>
@endif

</body>
</html>
