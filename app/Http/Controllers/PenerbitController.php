<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Penerbit;
use App\Http\Requests\PenerbitRequest;

class PenerbitController extends Controller
{
    public function index()
    {
        $data_penerbit = Penerbit::orderBy("id", "DESC")->get();

        return view("penerbit.index", [
            "title" => "Penerbit",
            "data_penerbit" => $data_penerbit,
        ]);
    }

    public function show($id)
    {
        $data_penerbit = Penerbit::find($id);

        return view("penerbit.show", [
            "title" => "Penerbit",
            "data_penerbit" => $data_penerbit,
        ]);
    }

    public function create()
    {
        $penerbit = new Penerbit();

        $method = "post";
        $action = route("penerbit.store");

        return view("penerbit.create", [
            "penerbit" => $penerbit,
            "method" => $method,
            "action" => $action,
        ]);
    }

    public function store(PenerbitRequest $request)
    {
        $nama = $request->input("nama");
        $alamat = $request->input("alamat");
        $tgl_lahir = $request->input("tgl_lahir");

        $penerbit = new Penerbit();
        $penerbit->nama = $nama;
        $penerbit->alamat = $alamat;
        $penerbit->tgl_lahir = $tgl_lahir;

        $penerbit->save();

        return Redirect::route("penerbit.show", ["id" => $penerbit->id]);
    }

    public function edit($id)
    {
        $penerbit = Penerbit::find($id);

        $method = "put";
        $action = route("penerbit.update", ["id" => $id]);

        return view("penerbit.edit", [
            "penerbit" => $penerbit,
            "method" => $method,
            "action" => $action,
        ]);
    }

    public function update(PenerbitRequest $request, $id)
    {
        $nama = $request->input("nama");
        $alamat = $request->input("alamat");
        $tgl_lahir = $request->input("tgl_lahir");

        $penerbit = Penerbit::find($id);
        $penerbit->nama = $nama;
        $penerbit->alamat = $alamat;
        $penerbit->tgl_lahir = $tgl_lahir;

        $penerbit->save();

        return Redirect::route("penerbit.show", ["id" => $penerbit->id]);
    }

    public function destroy($id)
    {
        $penerbit = Penerbit::find($id);

        if (!$penerbit) {
            return redirect()->route('penerbit.index')->withErrors('Penerbit tidak ditemukan.');
        }

        $buku = $penerbit->buku;
        $jumlah_buku = $buku->count();

        if ($jumlah_buku > 0) {
            return redirect()->route('penerbit.index')->withErrors('Penerbit memiliki buku terkait.');
        }

        Penerbit::destroy($id);
        return redirect()->route('penerbit.index');
    }

}
