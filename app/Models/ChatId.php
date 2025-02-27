<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatId extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak mengikuti konvensi Laravel
    protected $table = 'admin'; // Pastikan ini sesuai dengan nama tabel Anda

    // Tentukan kolom yang dapat diisi massal (jika diperlukan)
    protected $fillable = ['chat_id'];
}
