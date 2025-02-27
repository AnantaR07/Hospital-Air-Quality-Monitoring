<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adm;

class AdminController extends Controller
{
    public function index_admin()
    {
        // Mengambil data admin dari model Adm
        $dataAdmin = Adm::select('username', 'password', 'no_telegram', 'chat_id', 'chat_id_user')->get();

        // Pastikan setiap chat_id_user di-decode ke array jika disimpan dalam format JSON
        foreach ($dataAdmin as $admin) {
            $admin->chat_id_user = json_decode($admin->chat_id_user, true);
        }

        // Mengirim data ke adminHomepage.blade.php
        return view('/adm/adminHomepage', ['adminData' => $dataAdmin]);
    }
}
