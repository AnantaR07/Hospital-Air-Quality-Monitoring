<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SensorData;
use Illuminate\Support\Facades\Log;

class SensorController extends Controller
{
    public function store(Request $request)
    {
        // Tambahkan validasi API Key
        $providedApiKey = $request->header('X-API-KEY');
        $validApiKey = '23145-ECDBA-78609-GIJFH'; // API Key yang valid

        if ($providedApiKey !== $validApiKey) {
            $response = ['status' => 'error', 'message' => 'Invalid API Key'];
            Log::warning('Unauthorized API access attempt', ['api_key' => $providedApiKey, 'response' => $response]);
            return response()->json($response, 403);
        }

        // Validasi input
        $validated = $request->validate([
            'pm25' => 'required|numeric',
            'co' => 'required|numeric',
            'tvoc' => 'required|numeric',
            'suhu' => 'required|numeric',
            'kelembaban' => 'required|numeric',
        ]);

        try {
            // Ambil waktu saat data diterima dengan zona waktu 'Asia/Jakarta'
            $currentTimestamp = now('Asia/Jakarta');
            
            // Jika ingin menyimpan waktu spesifik (misalnya dari request), pastikan ada field 'waktu' pada request
            $waktu = $request->input('waktu', $currentTimestamp->format('H:i:s'));

            // Simpan data ke database
            SensorData::create([
                'tanggal' => $currentTimestamp,
                'waktu' => $waktu,
                'pm25' => $validated['pm25'],
                'co' => $validated['co'],
                'tvoc' => $validated['tvoc'],
                'suhu' => $validated['suhu'],
                'kelembaban' => $validated['kelembaban'],
            ]);

            // Buat response JSON
            $response = [
                'status' => 'success',
                'timestamp' => $currentTimestamp
            ];

            // Simpan data dan response ke log
            Log::info('Sensor data stored', [
                'tanggal' => $currentTimestamp,
                'waktu' => $waktu,
                'pm25' => $validated['pm25'],
                'co' => $validated['co'],
                'tvoc' => $validated['tvoc'],
                'suhu' => $validated['suhu'],
                'kelembaban' => $validated['kelembaban'],
                'response' => $response
            ]);

            return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = ['status' => 'error', 'message' => 'Failed to store data'];
            Log::error('Error storing sensor data', ['error' => $e->getMessage(), 'response' => $response]);
            return response()->json($response, 500);
        }
    }

    public function checkNewData()
    {
        $latestData = SensorData::latest()->first();
        $response = ['timestamp' => $latestData->created_at ?? null];

        // Simpan response ke log
        Log::info('Check new data request', ['response' => $response]);

        return response()->json($response);
    }
}
?>
