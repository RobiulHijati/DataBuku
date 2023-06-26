<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Penulis extends Model
{
    use HasFactory;

    protected $table = "penulis";
    public $timestamps = false;

    public function buku()
    {
        return $this->hasMany(Buku::class, "penulis_id");
    }



    public function user()
    {
        return $this->hasOne(User::class, "penulis_id");
    }

}