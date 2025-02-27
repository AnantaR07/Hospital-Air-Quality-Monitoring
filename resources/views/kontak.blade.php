<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSUD dr. Soedomo Trenggalek</title>
    <link rel="icon" href="img/logo_RSUD_soedomo_trenggalek.png" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        background-color: #00f2fe; /* Background color on hover */
        color: #333; /* Text color on hover */
        box-shadow: 0 4px 8px rgba(50, 255, 126, 0.3);
        transform: translateY(-2px); /* Slight lift effect */
    }

    /* Styling for the "Muat Ulang Data" Button */
    #menu .reload-btn {
        background-color: #4facfe; /* Different background color */
        color: #ffffff;
        font-weight: bold;
        padding: 10px 25px;
    }

    /* Hover Effect for "Muat Ulang Data" Button */
    #menu .reload-btn:hover {
        background-color: #00f2fe;
        box-shadow: 0 4px 8px rgba(0, 242, 254, 0.3);
        transform: translateY(-2px); /* Slight lift effect */
    }

    /* Toggle Button */
    .toggle-btn {
        display: none;
        width: 30px;
        height: 3px;
        background-color: #fff;
        position: relative;
        cursor: pointer;
    }

    .toggle-btn::before,
    .toggle-btn::after {
        content: "";
        width: 30px;
        height: 3px;
        background-color: #fff;
        position: absolute;
        left: 0;
    }

    .toggle-btn::before {
        top: -8px;
    }

    .toggle-btn::after {
        top: 8px;
    }


/* Menu dalam keadaan tersembunyi pada layar kecil */
#menu.hidden {
    display: none;
    flex-direction: column;
    margin-top: 4%;
    right: 0;
    background-color: white;
    width: 100%;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    opacity: 0;
    transform: translateY(-20px);
    transition: transform 0.3s ease, opacity 0.3s ease;
}

/* Menu Aktif pada layar kecil */
#menu.active {
    display: flex;
    opacity: 1;
    transform: translateY(0);
}

.content {
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .content h1 {
            font-size: 2.8em;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .content p {
            font-size: 1.2em;
            margin-bottom: 30px;
            color: #666;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 30px;
        }

        .contact-info div {
            margin: 10px 0;
        }

        .maps-container {
            position: relative;
            width: 100%;
            /* Ganti 400px dan 300px dengan nilai default yang Anda inginkan */
            height: 0;
            padding-bottom: 56.25%; /* Rasio aspek 16:9 */
            overflow: hidden;
            margin: 20px 0;
        }

        .maps-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
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
<!-- HTML -->
<div class="navbar">
    <div class="logo">
        <img src="{{ asset('img/logo_RSUD_soedomo_trenggalek.png') }}" alt="MyWebsite Logo" style="width: 80px; height: auto;">
        <div class="logo-text">
            <h4>RSUD dr. Soedomo Trenggalek</h4>
            <h6>Airsense Sensor</h6>
        </div>
    </div>
    <span class="toggle-btn" onclick="toggleMenu()"></span>
    <ul id="menu">
        <li><a href="{{ route('homepage') }}">Beranda</a></li>
        <li><a href="{{ route('tentangkami') }}">Tentang Kami</a></li>
        <li><a href="{{ route('kontak') }}">Kontak</a></li>
    </ul>
</div>


<!-- Konten Kontak -->
<div class="content">
    <h1>Kontak Kami</h1>
    <p>Untuk informasi lebih lanjut, hubungi kami melalui kontak di bawah ini:</p>
    
    <div class="contact-info">
        <div>
            <strong>Alamat:</strong> Jl. Raya Soekarno Hatta No. 5, Trenggalek, Jawa Timur
        </div>
        <div>
            <strong>Email:</strong> rsud.soedomo@trenggalek.go.id
        </div>
        <div>
            <strong>Telepon:</strong> (0355) 793345
        </div>
        <div>
            <strong>Jam Operasional:</strong> Senin - Jumat: 08.00 - 16.00 WIB
        </div>
        <div class="maps-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3950.4177557779744!2d111.70126947374675!3d-8.058799291968766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e791ad39a1bbc83%3A0xbbb33c3c8b470aec!2sRSUD%20dr.%20Soedomo%20Trenggalek!5e0!3m2!1sid!2sid!4v1727678996097!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>

    <!-- Footer -->
<footer style="background-color: #f8f9fa; padding: 20px; text-align: center; border-top: 1px solid #e9ecef;">
    <div style="max-width: 1200px; margin: 0 auto;">
        <p style="margin: 0; color: #6c757d;">&copy; 2024 AirSense. Semua Hak Cipta Dilindungi.</p>
        <p style="margin: 10px 0 0; color: #6c757d;">
        <a href="{{ route('homepage') }}" style="text-decoration: none; color: #007bff; margin: 0 10px;">Beranda</a> |
        <a href="{{ route('tentangkami') }}"  style="text-decoration: none; color: #007bff; margin: 0 10px;">Tentang Kami</a>|
        <a href="{{ route('kontak') }}" style="text-decoration: none; color: #007bff; margin: 0 10px;">Kontak</a>
        </p>
    </div>
</footer>

<script>
            function toggleMenu() {
            const menu = document.getElementById('menu');
            const toggleBtn = document.querySelector('.toggle-btn');
            menu.classList.toggle('active');
            toggleBtn.classList.toggle('active');
        }
</script>
</body>
</html>
