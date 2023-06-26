<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';

    public function Penulis()
    {
        return $this->belongsTo(Penulis::class, "penulis_id");
    }

    public function mahasiswa()
    {
        return $this->belongsToMany(Mahasiswa::class, "buku_mahasiswa", "mahasiswa_id", "buku_id");
    }

    public function Penerbit()
    {
        return $this->belongsTo(Penerbit::class, "penerbit_id");
    }

}