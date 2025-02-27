<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorData extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak mengikuti konvensi Laravel
    protected $table = 'data_sensor';

    // Tentukan kolom yang dapat diisi massal (jika diperlukan)
    protected $fillable = ['tanggal', 'waktu', 'pm25', 'co', 'tvoc', 'suhu', 'kelembaban'];
    
    public $timestamps = false; // Nonaktifkan timestamps

}
