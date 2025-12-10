<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    // Izinkan kolom ini diisi oleh formulir
    protected $fillable = [
        'user_id',
        'location',
        'description',
        'image_path',
        'status',
    ];

    // RELASI: Sebuah Laporan "Milik" (Belongs To) Satu User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}