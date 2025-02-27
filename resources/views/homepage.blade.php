<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airsense RSUD dr. Soedomo Trenggalek</title>
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
    background: linear-gradient(90deg, #4facfe, #00f2fe);
}


    /* Styling modern untuk konten */
    .content {
        padding: 20px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .content h3 {
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    /* Chart container */
    .chart-container {
        margin-bottom: 40px;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 20px;
    }

    .chart {
        width: 22%;
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .table-container {
        width: 100%;
        overflow-x: auto;
        margin-bottom: 30px;
    }
    
    /* Table styling */
     .sensor-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 16px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    background-color: #ffffff; /* Background putih untuk isi tabel */
    border-radius: 8px; /* Membuat sudut lebih halus */
    overflow: hidden; /* Menjaga elemen dalam tabel tidak keluar */
}

.sensor-table th, .sensor-table td {
    padding: 12px 15px; /* Jarak isi sel tabel */
    text-align: left;
    border-bottom: 1px solid #ddd; /* Garis bawah untuk pemisah antar baris */
}

.sensor-table th {
    background-color: #3ae374; 
    color: #ffffff; /* Warna teks putih untuk header */
    text-transform: uppercase; /* Huruf kapital pada teks header */
    letter-spacing: 1px; /* Memberikan jarak antar huruf */
}

.sensor-table td {
    background-color: #ffffff; /* Isi tabel tetap putih */
    color: #333; /* Warna teks hitam untuk isi tabel */
}

.sensor-table tr:hover td {
    background-color: #f9f9f9; /* Warna saat baris di-hover (tetap putih tapi lebih terang) */
}

.sensor-table tr:nth-child(even) td {
    background-color: #f4f4f4; /* Baris genap dengan warna abu-abu sangat terang */
}

.sensor-table caption {
    font-size: 20px;
    margin-bottom: 10px;
    color: #4caf50; /* Warna hijau untuk teks caption */
}

.sensor-table td:first-child {
    font-weight: bold; /* Penekanan pada kolom pertama */
}


    .sensor-table th, .sensor-table td {
        padding: 12px 15px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    .sensor-table th {
        background-color: #4facfe;
        color: white;
        font-weight: 600;
    }

    .danger-content {
    display: flex;
    justify-content: space-between;
    gap: 15px;
    margin: 20px 0;
    flex-wrap: wrap; /* Agar lebih fleksibel saat layar kecil */
}

.danger-warning, 
.danger-information {
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    font-family: 'Arial', sans-serif;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, background-color 0.3s ease;
    width: 48%; /* Membuat konten memiliki lebar yang sama */
}


.danger-warning.visible {
    display: block;
    animation: fadeIn 0.5s ease-in-out; /* Animasi saat muncul */
}

.danger-warning,
.danger-information {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 18px;
    flex: 1;
    border-radius: 10px;
    text-align: center;
    font-family: 'Arial', sans-serif;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    border-left: 5px solid #4a90e2;
    background:  #b3e5fc;
    color: #2c5374;
    font-weight: bold;
    position: relative;
    overflow: hidden;
}





.danger-information .emoji {
    font-size: 40px;
    margin-right: 10px;
}

.danger-information .conditionText {
    font-size: 20px;
}

.telegram {
            background-color: #0088cc;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            text-align: center;
            transition: all 0.3s ease;
        }

        .telegram:hover {
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
            transform: translateY(-5px);
        }

        .telegram h2 {
            color: #fff;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .telegram p {
            color: #fff;
            font-size: 16px;
        }

        .telegram a {
            display: inline-block;
            background-color: #fff;
            color: #0088cc;
            padding: 12px 24px;
            border-radius: 50px;
            font-size: 16px;
            text-decoration: none;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .telegram a:hover {
            background-color: #005f99;
            color: #fff;
        }

        .telegram img {
            width: 80px;
            height: 80px;
            margin-bottom: 20px;
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
        
        .chart {
        width: 90%;
        margin: 0 auto; /* Pusatkan chart secara horizontal */
        }
        
        .sensor-table {
            font-size: 10px;
        }
        
    .danger-content {
        flex-direction: column;
        gap: 10px;
        align-items: center; /* Pusatkan konten danger-content */
    }

    .danger-warning,
    .danger-information {
        width: 90%;
        margin: 0 auto; /* Pusatkan elemen warning dan information */
    }
        
         .telegram {
        padding: 15px;
        text-align: center; /* Pusatkan teks dalam elemen telegram */
    }

    .telegram h2 {
        font-size: 20px;
    }

    .telegram p {
        font-size: 14px;
    }

    .telegram a {
        padding: 10px 20px;
        font-size: 14px;
    }

    .telegram img {
        width: 60px;
        height: 60px;
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
        <li><a href="#" class="reload-btn" onclick="reloadPage()">Muat Ulang Data</a></li>
    </ul>
</div>


    <!-- Konten Website -->
    <div class="content">
        <h3>Diagram Garis Nilai Kualitas Udara</h3>
        <div class="chart-container">
            <div class="chart">
                <canvas id="chart1"></canvas>
            </div>
            <div class="chart">
                <canvas id="chart2"></canvas>
            </div>
            <div class="chart">
                <canvas id="chart3"></canvas>
            </div>
            <div class="chart">
                <canvas id="chart4"></canvas>
            </div>
            <div class="chart">
                <canvas id="chart5"></canvas>
            </div>
        </div>

   
        <!-- Tabel Data Sensor -->
        <div class="sensor-data">
            <h3>Data Sensor</h3>
            <div class="table-container">
                <table class="sensor-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>PM2.5</th>
                            <th>CO</th>
                            <th>TVOC</th>
                            <th>Suhu</th>
                            <th>Kelembaban</th>
                        </tr>
                    </thead>
                    <tbody id="sensorTableBody">
                        <!-- Data dummy dari chart -->
                    </tbody>
                </table>
            </div>
        </div>

        <div class="danger-content">
            <!-- Danger Warning Content-->
            <div class="danger-warning" id="dangerMessage">
                <h3>Peringatan Kualitas Udara</h3>
                <p id="dangerText"></p>
            </div>

            <!-- Danger Information Content -->
            <div class="danger-information">
                <span class="emoji" id="conditionEmoji"></span>
                <p id="conditionText"></p>
            </div>
        </div>
        <br>
        <div class="telegram">
            <img src="https://upload.wikimedia.org/wikipedia/commons/8/82/Telegram_logo.svg" alt="Telegram Logo">
            <h2>Edit Telegram Bot</h2>
            <p>"Tekan tombol di bawah ini untuk mengubah pengaturan bot Telegram."</p>
            <a href="/adm/adminLogin">Edit Bot</a>
        </div>
    </div>

    <!-- Footer -->
<footer style="background-color: #f8f9fa; padding: 20px; text-align: center; border-top: 1px solid #e9ecef;">
    <div style="max-width: 1200px; margin: 0 auto;">
        <p style="margin: 0; color: #6c757d;">&copy; 2024 AirSense. Semua Hak Cipta Dilindungi.</p>
        <p>ID: <span id="chat-id-value">{{ $ChatId }}</span></li> <!-- Menampilkan ChatId disini --></p>
        <p style="margin: 10px 0 0; color: #6c757d;">
        <a href="{{ route('homepage') }}" style="text-decoration: none; color: #007bff; margin: 0 10px;">Beranda</a> |
        <a href="{{ route('tentangkami') }}"  style="text-decoration: none; color: #007bff; margin: 0 10px;">Tentang Kami</a>|
        <a href="{{ route('kontak') }}" style="text-decoration: none; color: #007bff; margin: 0 10px;">Kontak</a>
        </p>
    </div>
</footer>

    <script>

function reloadPage() {
    window.location.reload(); // Memuat ulang halaman
}
        function toggleMenu() {
            const menu = document.getElementById('menu');
            const toggleBtn = document.querySelector('.toggle-btn');
            menu.classList.toggle('active');
            toggleBtn.classList.toggle('active');
        }

        function createLineChart(canvasId, dataPoints, chartLabel, xAxisLabel) {
            var ctx = document.getElementById(canvasId).getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: dataPoints.map((_, index) => index + 1),
                    datasets: [{
                        label: chartLabel,
                        data: dataPoints,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        fill: true,
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: xAxisLabel
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Nilai'
                            },
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        const sensorData = @json($sensorData);
        console.log(sensorData); // Melihat data di console browser

    // Ambil nilai ChatId dari Blade
    const ChatId = parseInt(@json($ChatId)); // Mengonversi ke integer
    console.log(ChatId); // Melihat data di console browser

    // Tampilkan ChatId di elemen
    document.getElementById('chat-id-value').textContent = ChatId;

    function populateTable(data) {
    const tableBody = document.getElementById('sensorTableBody');
    tableBody.innerHTML = ''; // Clear table

    // Calculate the starting index for the last 6 items
    const startIdx = Math.max(data.pm25.length - 6, 0);

  // Display the last 6 data
for (let i = data.pm25.length - 1, no = 1; i >= startIdx; i--, no++) {
    // Format tanggal ke dd-mm-yy
    const rawDate = new Date(data.tanggal[i]);
    const day = String(rawDate.getDate()).padStart(2, '0');
    const month = String(rawDate.getMonth() + 1).padStart(2, '0'); // Bulan dimulai dari 0 (Januari)
    const year = String(rawDate.getFullYear()).slice(-2); // Mengambil 2 digit terakhir tahun
    const formattedDate = `${day}-${month}-${year}`;


    // Menambahkan baris ke tabel
    const row = `
        <tr>
            <td>${no}</td>
            <td>${formattedDate}</td>
            <td>${data.waktu[i]}</td>
            <td>${data.pm25[i]}</td>
            <td>${data.co[i]}</td>
            <td>${data.tvoc[i]}</td>
            <td>${data.suhu[i]}</td>
            <td>${data.kelembaban[i]}</td>
        </tr>
    `;
    tableBody.innerHTML += row;
}


}

    // Call the function to populate the table with data
    populateTable(sensorData, ChatId);
        let lastTimestamp = localStorage.getItem("lastTimestamp") || null;
    
        function checkForNewData() {
            fetch("https://airsense.airquality.my.id/api/sensor/check")
                .then(response => response.json())
                .then(data => {
                    if (data.timestamp && data.timestamp !== lastTimestamp) {
                        localStorage.setItem("lastTimestamp", data.timestamp);
                        updatePageData(); // Perbarui tampilan tanpa reload
                    }
                })
                .catch(error => console.error("Gagal mengecek data:", error));
        }
    
        function updatePageData() {
            fetch("https://airsense.airquality.my.id/api/sensor/latest")
                .then(response => response.json())
                .then(sensorData => {
                    populateTable(sensorData, ChatId);
                    checkDangerWarning(sensorData);
                })
                .catch(error => console.error("Gagal mengambil data sensor terbaru:", error));
        }
    
        // Check jika ada kondisi tidak normal
        function checkDangerWarning(data) {
            const limitPM25 = 60; 
            const limitCO = 2.0; 
            const limitTVOC = 0.66; 
            const limitSuhu = 36; 
            const limitKelembaban = 99;
                        
            const dangerMessage = document.getElementById('dangerMessage');
            const dangerText = document.getElementById('dangerText');
            const conditionText = document.getElementById('conditionText');
            var conditionEmoji = document.getElementById('conditionEmoji');

            let warningMessages = [];
            let condition = [];

               // Tentukan kondisi berdasarkan data terakhir
            const lastData = {
                pm25: data.pm25[data.pm25.length - 1],
                co: data.co[data.co.length - 1],
                tvoc: data.tvoc[data.tvoc.length - 1],
                suhu: data.suhu[data.suhu.length - 1],
                kelembaban: data.kelembaban[data.kelembaban.length - 1]
            };

                if (lastData.pm25 <= 30) {
                    warningMessages.push("Kadar PM2.5: Baik.");
                } else if (lastData.pm25 <= 60) {
                    warningMessages.push("Kadar PM2.5: Cukup Baik.");
                } else if (lastData.pm25 <= 90) {
                    warningMessages.push("Kadar PM2.5: Tercemar Sedang.");
                } else if (lastData.pm25 <= 120) {
                    warningMessages.push("Kadar PM2.5: Buruk.");
                } else if (lastData.pm25 <= 250) {
                    warningMessages.push("Kadar PM2.5: Sangat Buruk.");
                } else {
                    warningMessages.push("Kadar PM2.5: Berbahaya.");
                }
                
                if (lastData.co <= 1.0) {
                    warningMessages.push("Kadar CO: Baik.");
                } else if (lastData.co <= 2.0) {
                    warningMessages.push("Kadar CO: Cukup Baik.");
                } else if (lastData.co <= 10.0) {
                    warningMessages.push("Kadar CO: Tercemar Sedang.");
                } else if (lastData.co <= 17.0) {
                    warningMessages.push("Kadar CO: Buruk.");
                } else if (lastData.co <= 34.0) {
                    warningMessages.push("Kadar CO: Sangat Buruk.");
                } else {
                    warningMessages.push("Kadar CO: Berbahaya.");
                }
                
                if (lastData.tvoc <= 0.065) {
                    warningMessages.push("Kadar TVOC: Sempurna.");
                } else if (lastData.tvoc <= 0.22) {
                    warningMessages.push("Kadar TVOC: Baik.");
                } else if (lastData.tvoc <= 0.66) {
                    warningMessages.push("Kadar TVOC: Cukup Baik.");
                } else if (lastData.tvoc <= 2.2) {
                    warningMessages.push("Kadar TVOC: Buruk.");
                } else if (lastData.tvoc <= 5.5) {
                    warningMessages.push("Kadar TVOC: Tidak Sehat.");
                } else {
                    warningMessages.push("Kadar TVOC: Berbahaya.");
                }
                
                if (lastData.suhu <= 36) {
                    warningMessages.push("Kadar Suhu: Baik.");
                } else {
                    warningMessages.push("Kadar Suhu: Tidak Sehat.");
                }
                
                if (lastData.kelembaban <= 99) {
                    warningMessages.push("Kadar Kelembaban: Baik.");
                } else {
                    warningMessages.push("Kadar Kelembaban: Tidak Sehat.");
                }

                if (
                    lastData.pm25 > 250 || 
                    lastData.co > 35 || 
                    lastData.tvoc > 5.6 || 
                    lastData.suhu > 36 || 
                    lastData.kelembaban > 99
                ) {
                    condition.push("Kondisi Bahaya");
                }else if (
                    lastData.pm25 > 120 || 
                    lastData.co > 17 || 
                    lastData.tvoc > 2.2 || 
                    lastData.suhu > 36 || 
                    lastData.kelembaban > 99
                ) {
                    condition.push("Kondisi Sangat Buruk");
                } else if (
                    lastData.pm25 > 90 || 
                    lastData.co > 10 || 
                    lastData.tvoc > 0.66 || 
                    lastData.suhu > 36 || 
                    lastData.kelembaban > 99
                ) {
                    condition.push("Kondisi Buruk");
                } else if (
                    lastData.pm25 > 61 || 
                    lastData.co > 2.0 || 
                    lastData.tvoc > 0.66 || 
                    lastData.suhu > 33 || 
                    lastData.kelembaban > 99
                ) {
                    condition.push("Kondisi Tercemar Sedang");
                } else if (
                    lastData.pm25 > 31 || 
                    lastData.co > 1.1 || 
                    lastData.tvoc > 0.22 || 
                    lastData.suhu > 33 || 
                    lastData.kelembaban > 99
                ) {
                    condition.push("Kondisi Cukup Baik");
                } else {
                    condition.push("Kondisi Baik");
                }


                // Tambahkan warna pada nilai di tabel berdasarkan kondisi normal atau bahaya
const tableRows = document.querySelectorAll("#sensorTableBody tr");
tableRows.forEach(row => {
    const cells = row.querySelectorAll("td");
    const pm25 = parseFloat(cells[3].textContent);
    const co = parseFloat(cells[4].textContent);
    const tvoc = parseFloat(cells[5].textContent);
    const suhu = parseFloat(cells[6].textContent);
    const kelembaban = parseFloat(cells[7].textContent);

// Fungsi untuk menentukan warna berdasarkan nilai ambang batas
const getColor = (value, limits, customColors = null) => {
    if (isNaN(value)) return "#000000"; // Warna hitam jika nilai tidak valid

    // Jika ada warna khusus, gunakan warna tersebut
    const colors = customColors || ["#90EE90", "#008000", "#FFD700", "#FFA500", "#FF0000", "#8B0000"];

    if (value < limits[0]) return colors[0]; // Level 1
    if (value < limits[1]) return colors[1]; // Level 2
    if (value < limits[2]) return colors[2]; // Level 3
    if (value < limits[3]) return colors[3]; // Level 4
    if (value < limits[4]) return colors[4]; // Level 5
    return colors[5]; // Level 6 (Terburuk)
};

// Debugging: Cetak nilai untuk memastikan data yang diterima benar
console.log("PM2.5:", pm25, "CO:", co, "TVOC:", tvoc);

// Warna khusus untuk TVOC (Tambahan hijau lebih terang)
const tvocColors = ["#90EE90", "#32CD32", "#008000", "#FFD700", "#FFA500", "#FF0000"];

// Mengubah warna teks berdasarkan nilai
cells[3].style.color = getColor(pm25, [30, 60, 90, 120, 250]); // PM2.5
cells[4].style.color = getColor(co, [1.0, 2.0, 10.0, 17.0, 34.0]); // CO
cells[5].style.color = getColor(tvoc, [0.065, 0.22, 0.66, 2.2, 5.5], tvocColors); // TVOC (dengan warna hijau tambahan)


    
    // Untuk suhu dan kelembaban hanya menggunakan hijau (baik) dan merah (tidak sehat)
    cells[6].style.color = suhu <= 36 ? "#008000" : "#FF0000";
    cells[7].style.color = kelembaban <= 99 ? "#008000" : "#FF0000";
});

            // Tampilkan pesan peringatan
            if (warningMessages.length > 0) {
                    dangerText.innerHTML = warningMessages.join("<br>");
                    dangerMessage.classList.add('visible');
                } else {
                    dangerMessage.classList.remove('visible');
                }

                // Tampilkan kondisi
            if (condition.length > 0) {
                    conditionText.innerHTML = condition.join("<br>");
                }


     if (condition[0] === "Kondisi Baik"|| condition[0] === "Kondisi Cukup Baik") {
       conditionText.innerText = `Kondisi udara: ${condition[0]}`;
        conditionEmoji.innerText = "✅"; // Emoji untuk kondisi sehat
    
        // Reload halaman setiap 10 menit
        setTimeout(function() {
            location.reload();
        }, 600000);
    } else if (
        condition[0] === "Kondisi Tercemar Sedang" ||
        condition[0] === "Kondisi Buruk" ||
        condition[0] === "Kondisi Sangat Buruk" ||
        condition[0] === "Kondisi Berbahaya"
    ) {
        conditionText.innerText = `Kondisi udara: ${condition[0]}`;
        conditionEmoji.innerText = "⚠️"; // Emoji untuk kondisi tidak sehat
    
        // Masukkan nilai sensor ke dalam pesan dan tambahkan tanda jika di atas batas normal
        const pm25Text = lastData.pm25 > limitPM25 ? `PM2.5: ${lastData.pm25} µg/m³ 🚨` : `PM2.5: ${lastData.pm25} µg/m³`;
        const coText = lastData.co > limitCO ? `CO: ${lastData.co} ppm 🚨` : `CO: ${lastData.co} µg/m³`;
        const tvocText = lastData.tvoc > limitTVOC ? `TVOC: ${lastData.tvoc} ppb 🚨` : `TVOC: ${lastData.tvoc} ppb`;
        const suhuText = lastData.suhu > limitSuhu ? `Suhu: ${lastData.suhu} °C 🚨` : `Suhu: ${lastData.suhu} °C`;
        const kelembabanText = lastData.kelembaban > limitKelembaban ? `Kelembaban: ${lastData.kelembaban} % 🚨` : `Kelembaban: ${lastData.kelembaban} %`;
    
        let message = `🚨 ${condition[0]} Terdeteksi! \n${pm25Text}\n${coText}\n${tvocText}\n${suhuText}\n${kelembabanText}`;
    
        // Kirim pesan ke bot Telegram
        let chat_id = ChatId; // Ganti dengan chat_id yang sesuai
        let bot_token = "7772584760:AAHyx7F8Ng5c-xTCOB_TrUUYhqBQoDfjjrA"; 
        let telegram_api_url = `https://api.telegram.org/bot${bot_token}/sendMessage?chat_id=${chat_id}&text=${encodeURIComponent(message)}`;
    
        fetch(telegram_api_url)
            .then(response => response.json())
            .then(data => {
                console.log("Pesan berhasil dikirim:", data);
                setTimeout(() => {
                    window.location.reload();
                }, 600000); // Refresh halaman setelah 10 menit
            })
            .catch(error => console.error("Gagal mengirim pesan:", error));
    }


        }
        
        

document.addEventListener("DOMContentLoaded", function () {
    // Ambil 6 data terakhir dari setiap atribut sensor
    const last6Pm25 = sensorData.pm25.slice(-6);
    const last6Co = sensorData.co.slice(-6);
    const last6Tvoc = sensorData.tvoc.slice(-6);
    const last6Suhu = sensorData.suhu.slice(-6);
    const last6Kelembaban = sensorData.kelembaban.slice(-6);

    // Inisiasi chart berdasarkan 6 data terakhir sensor
    createLineChart('chart1', last6Pm25, 'PM2.5', 'Waktu');
    createLineChart('chart2', last6Co, 'CO', 'Waktu');
    createLineChart('chart3', last6Tvoc, 'TVOC', 'Waktu');
    createLineChart('chart4', last6Suhu, 'Suhu', 'Waktu');
    createLineChart('chart5', last6Kelembaban, 'Kelembaban', 'Waktu');

    // Populasi tabel sensor berdasarkan 6 data terakhir
    const last6Data = {
        pm25: last6Pm25,
        co: last6Co,
        tvoc: last6Tvoc,
        suhu: last6Suhu,
        kelembaban: last6Kelembaban
    };
    populateTable(sensorData);

    // Cek peringatan kondisi udara berdasarkan 6 data terakhir
    checkDangerWarning(sensorData);
    
    // Cek setiap 10 detik
    setInterval(checkForNewData, 10000);

    // Cek pertama kali saat halaman dimuat
    updatePageData();
});

    </script>
</body>
</html>
