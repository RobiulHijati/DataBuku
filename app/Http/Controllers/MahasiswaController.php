<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {  
        $data_mahasiswa = Mahasiswa::orderBy("id", "DESC")->get();

        return view("mahasiswa.index", [
            "title" => "Mahasiswa",
            "data_mahasiswa" => $data_mahasiswa
        ]);
    }

    public function show($id)
    {
        $data_mahasiswa = Mahasiswa::find($id);

        return view("mahasiswa.show", [
            "title" => "Mahasiswa",
            "data_mahasiswa" => $data_mahasiswa
        ]);
    }

    public function create()
    {
        $mahasiswa = new Mahasiswa();
        $method = "post";
        $action = route("mahasiswa.store");

        return view("mahasiswa.create", [
            "mahasiswa" => $mahasiswa,
            "method" => $method,
            "action" => $action
        ]);
    }

    public function store(Request $request)
    {
        $nama = $request->input("nama");
        $nim = $request->input("nim");
        $tempat_lahir = $request->input("tempat_lahir");
        $tgl_lahir = $request->input("tgl_lahir");

        $mahasiswa = new Mahasiswa();
        $mahasiswa->nama = $nama;
        $mahasiswa->nim = $nim;
        $mahasiswa->tempat_lahir = $tempat_lahir;
        $mahasiswa->tgl_lahir = $tgl_lahir;

        $mahasiswa->save();

        return redirect()->route("mahasiswa.show", ["id" => $mahasiswa->id]);
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $method = "put";
        $action = route("mahasiswa.update", ["id" => $id]);

        return view("mahasiswa.edit", [
            "mahasiswa" => $mahasiswa,
            "method" => $method,
            "action" => $action
        ]);
    }

    public function update(Request $request, $id)
    {
        $nama = $request->input("nama");
        $nim = $request->input("nim");
        $tempat_lahir = $request->input("tempat_lahir");
        $tgl_lahir = $request->input("tgl_lahir");

        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->nama = $nama;
        $mahasiswa->nim = $nim;
        $mahasiswa->tempat_lahir = $tempat_lahir;
        $mahasiswa->tgl_lahir = $tgl_lahir;

        $mahasiswa->save();

        return redirect()->route("mahasiswa.show", ["id" => $mahasiswa->id]);
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index');
    }
}
