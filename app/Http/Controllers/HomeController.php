<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatId;
use App\Models\SensorData;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil data dari tabel admin di database
        $idchat = ChatId::select('chat_id')->first(); // Ambil chat_id pertama
        
        // Memastikan chat_id adalah integer
        $ChatId = $idchat ? $idchat->chat_id : null; // Jika ada, ambil nilai chat_id

        // Mengambil data dari tabel sensor_data di database
        $dataSensor = SensorData::select('tanggal', 'waktu', 'pm25', 'co', 'tvoc', 'suhu', 'kelembaban')->get();

        // Format data menjadi array untuk setiap sensor
        $sensorData = [
            'tanggal' => $dataSensor->pluck('tanggal')->toArray(),
            'waktu' => $dataSensor->pluck('waktu')->toArray(),
            'pm25' => $dataSensor->pluck('pm25')->toArray(),
            'co' => $dataSensor->pluck('co')->toArray(),
            'tvoc' => $dataSensor->pluck('tvoc')->toArray(),
            'suhu' => $dataSensor->pluck('suhu')->toArray(),
            'kelembaban' => $dataSensor->pluck('kelembaban')->toArray(),
        ];
        
        // Mengirim data ke homepage.blade.php
        return view('homepage', ['ChatId' => $ChatId, 'sensorData' => $sensorData]);
    }
}
