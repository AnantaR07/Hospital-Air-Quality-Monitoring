<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ChangeController extends Controller
{
    public function adminUpdate(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|min:8',
            'no_telegram' => 'required|numeric|min:12',
            'chat_id' => 'required|numeric',
            'password' => 'nullable|min:8|regex:/[!@#$%]/', 
        ], [
            'username.min' => 'Username harus lebih dari 8 karakter.',
            'no_telegram.min' => 'No.Telegram harus lebih dari 12 angka.',
            'chat_id.required' => 'Chat ID tidak boleh kosong.',
            'password.min' => 'Password harus lebih dari 8 karakter.',
            'password.regex' => 'Password harus mengandung karakter khusus (!@#$%).',
        ]);

        // Siapkan data untuk update
        $data = [
            'username' => $request->username,
            'no_telegram' => $request->no_telegram,
            'chat_id' => $request->chat_id,
            'chat_id_user' => json_encode($request->chat_id_user), // Simpan sebagai JSON di database
        ];

        // Cek apakah password diisi, jika iya, hash password baru
        if (!empty($request->password)) {
            $data['password'] = Hash::make($request->password);
        }

        // Lakukan update admin berdasarkan id 1
        $updateResult = DB::table('admin')->where('id', 1)->update($data);

        // Jika update berhasil
        if ($updateResult) {
            // Token dan URL API Telegram
            $bot_token = "7772584760:AAHyx7F8Ng5c-xTCOB_TrUUYhqBQoDfjjrA";
            $telegram_api_url = "https://api.telegram.org/bot$bot_token/sendMessage";
            
            // Pesan untuk chat_id utama
            $message = "Selamat, chat id = '{$request->chat_id}' berhasil terhubung dengan website";

            // Kirim pesan ke chat_id utama
            $data = [
                'chat_id' => $request->chat_id,
                'text' => $message,
            ];

            $ch = curl_init($telegram_api_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_exec($ch);

            // Loop untuk mengirim pesan ke setiap chat_id_user
            foreach ($request->chat_id_user as $user_id) {
                $user_message = "Selamat, chat id user = '$user_id' berhasil terhubung dengan website";
                $user_data = [
                    'chat_id' => $user_id,
                    'text' => $user_message,
                ];

                curl_setopt($ch, CURLOPT_POSTFIELDS, $user_data);
                curl_exec($ch);
            }

            // Tutup cURL
            curl_close($ch);

            return redirect()->back()->with('success', 'Update Data Admin Berhasil! 🎉');
        } else {
            return redirect()->back()->with('error', 'Gagal mengupdate Data Admin. Silakan coba lagi. ❌');
        }
    }
}
