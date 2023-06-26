<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = "mahasiswa";

    
    public function buku()
    {
        return $this->belongsToMany(Buku::class, "buku_mahasiswa", "mahasiswa_id", "buku_id");
    }

}