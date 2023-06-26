<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Mahasiswa;
use App\Models\Penulis;

use Illuminate\Http\Request;

class ContohController extends Controller
{
    function welcome()
    {
        return view('welcome', [
            "title" => "Welcome"
        ]);
    }
    function home()
    {
        $mahasiswa = Mahasiswa::find(1);
        $buku = Buku::find(1);
        return view('home', [
            "title" => "Home",
            "buku" => $buku,
            "mahasiwa" => $mahasiswa
        ]);
    }
    function postingan()
    {
        $buku = Buku::get();
        $penulis = Penulis::all();


        return view('blog', [
            "title" => "Blog",
            "buku" => $buku,
            "penulis" => $penulis
        ]);
    }
    function about()
    {
        $penulis = Penulis::find(1);
        return view('about', [
            "title" => "about",
            "penulis" => $penulis
        ]);
    }


}