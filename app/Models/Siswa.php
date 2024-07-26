<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'nisn', 'nama', 'email', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'nomor_hp', 'nama_orang_tua', 'nomor_hp_orang_tua', 'admin_id'
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
