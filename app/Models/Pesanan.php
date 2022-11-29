<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $fillable =[
        'username', 'email', 'nama_kamar', 'harga', 'jumlah_pesan'
    ];
}
