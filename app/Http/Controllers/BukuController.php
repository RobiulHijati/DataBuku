<?php

namespace App\Http\Controllers;

use App\Http\Requests\BukuRequest;
use App\Models\Mahasiswa;
use App\Models\Penerbit;
use App\Models\Penulis;
use Illuminate\Http\Request;
use App\Models\Buku;
use Redirect;
class BukuController extends Controller
{
    function index(){
        $data_buku = Buku::all();

        return view("buku.index", [
            "title" => "Buku",
            "data_buku" => $data_buku]);
    }

    function show($id){
        $data_buku = Buku::find($id);
        return view("buku.show", [
            "title" => "Buku",
            "data_buku" => $data_buku
        ]);
    }

    public function create(){
        $buku = new Buku();
        $data_penulis = Penulis::get();
        $data_mahasiswa = Mahasiswa::get();
        $data_penerbit = Penerbit::all();
        $method = "post";
        $action = route("buku.store");
        return view("buku.create", [
            "buku" => $buku,
             "method"=> $method, 
             "action"=>$action,
             "data_penulis" =>$data_penulis,
             "data_mahasiswa" =>$data_mahasiswa,
             "data_penerbit" => $data_penerbit
            ]);
    }

    public function store(BukuRequest $request){
        $judul = $request->input("judul");
        $kategori= $request->input("kategori");
        $tahun_terbit = $request->input("tahun_terbit");
        $jumlah_halaman = $request->input("jumlah_halaman");
        $penulis_id = $request->input("penulis_id");
        $penerbit_id = $request->input("penerbit_id");
        $mahasiswa_id = $request->input("mahasiswa_id"); 

        $data_buku = new Buku();
        $data_buku->judul = $judul;
        $data_buku->kategori = $kategori;
        $data_buku->tahun_terbit = $tahun_terbit;
        $data_buku->jumlah_halaman = $jumlah_halaman;
        $data_buku->penulis_id = $penulis_id;
        $data_buku->penerbit_id = $penerbit_id;

        $data_buku->save();
        //Simpan data Buku dan Mahasiswanya yang banyak
        $data_buku->mahasiswa()->sync($mahasiswa_id);

        return Redirect::route("buku.show", ["id" => $data_buku->id]);

    }
    public function edit ($id) {
        $buku = Buku::find($id);
        $data_penulis = Penulis::get();
        $data_penerbit = Penerbit::get();
        $data_mahasiswa = Mahasiswa::get();
        $method = "put";
        $action = route("buku.update", ["id" => $id]);
        return view("buku.edit", [
            "buku" => $buku,
            "method"=> $method, 
            "action"=>$action,
            "data_penulis"=>$data_penulis,
            "data_penerbit" => $data_penerbit,
            "data_mahasiswa"=>$data_mahasiswa
        ]);
    }

    public function update(BukuRequest $request, $id){
        $judul = $request->input("judul");
        $kategori= $request->input("kategori");
        $tahun_terbit = $request->input("tahun_terbit");
        $jumlah_halaman = $request->input("jumlah_halaman");
        $penulis_id = $request->input("penulis_id");
        $penerbit_id = $request->input("penerbit_id");
        $mahasiswa_id = $request->input("mahasiswa_id"); 

        $data_buku = Buku::find($id);
        $data_buku->judul = $judul;
        $data_buku->kategori = $kategori;
        $data_buku->tahun_terbit = $tahun_terbit;
        $data_buku->jumlah_halaman = $jumlah_halaman;
        $data_buku->penulis_id = $penulis_id;
        $data_buku->penerbit_id = $penerbit_id;

        $data_buku->save();

        //Simpan data Buku dan Mahasiswanya yang banyak
        $data_buku->mahasiswa()->sync($mahasiswa_id);
        return Redirect::route("buku.show", ["id" => $data_buku->id]);


    }

    public function destroy($id)
{
    $buku = Buku::find($id);
        $buku->mahasiswa()->sync(array());
        Buku::destroy($id);

    return redirect()->route('buku.index');
}

    
    //
}
