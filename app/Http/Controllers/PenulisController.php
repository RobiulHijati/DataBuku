<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Penulis;
use App\Http\Requests\PenulisRequest;
class PenulisController extends Controller{
    function index(){
        $data_penulis = Penulis::orderBy("id", "DESC")->get();
        $user = Auth::user(); // Mengambil data user yang sedang login

        return view("penulis.index", [
            "title" => "Penulis",
            "data_penulis" => $data_penulis,
            'user' => $user
        ]);
    }

    function show($id){
        $data_penulis = Penulis::find($id);

        return view("penulis.show", [
            "title" => "Penulis",
            "data_penulis" => $data_penulis
        ]);
    }

    public function create(){
        $penulis = new Penulis();
        $user = new User();
        $method = "post";
        $action = route("penulis.store");
        return view("penulis.create", [
            "penulis" => $penulis,
            "user" => $user, 
            "method"=> $method, 
            "action"=>$action]);
    }

    public function store(PenulisRequest $request){
        $nama = $request->input("nama");
        $alamat = $request->input("alamat");
        $tgl_lahir = $request->input("tgl_lahir");
        $username = $request->input("username");
        $password = $request->input("password");

        $penulis = new Penulis();
        $penulis->nama = $nama;
        $penulis->alamat = $alamat;
        $penulis->tgl_lahir = $tgl_lahir;

        $penulis->save();

        $user = new User();
        $user ->username = $username;
        $user->password = $password;
        $user->level = "penulis";
        $user->penulis_id = $penulis->id;

        $user->save();

        return Redirect::route("penulis.show", ["id" => $penulis->id]);

    }

    public function edit ($id) {
        $penulis = Penulis::find($id);
        $user = $penulis->user;
        $method = "put";
        $action = route("penulis.update", ["id" => $id]);
        return view("penulis.edit", [
            "penulis" => $penulis,
            "user" =>$user,
            "method"=> $method,
            "action"=>$action]);
    }

    public function update(PenulisRequest $request,$id) {
        $nama = $request->input("nama");
        $alamat = $request->input("alamat");
        $tgl_lahir = $request->input("tgl_lahir");
        $username = $request->input("username");
        $password = $request->input("password");

        $penulis = Penulis::find($id);
        $penulis->nama = $nama;
        $penulis->alamat = $alamat;
        $penulis->tgl_lahir = $tgl_lahir;

        $penulis->save();

        $user = $penulis->user;
        $user->username = $username;

        if($password != ""){
            $user->password = $password;
        }

        $user->penulis_id = $penulis->id;
        $user->save();

        

        return Redirect::route("penulis.show", ["id" => $penulis->id]);


    }

    public function destroy($id)
{
    $penulis = Penulis::find($id);

    if (!$penulis) {
        return redirect()->route('penulis.index')->withErrors('Penulis tidak ditemukan.');
    }

    $buku = $penulis->buku;
    $jumlah_buku = $buku->count();
    $user = $penulis->user;

    if ($user) {
        User::destroy($user->id);
    }

    if ($jumlah_buku > 0){
        return redirect()->route('penulis.index');
    }

    Penulis::destroy($id);
    return redirect()->route('penulis.index');
}


    public function search(Request $request)
{
    if($request->has('search')){
            $data_penulis = Penulis::where('nama', 'LIKE', '%' . $request->search . '%') ->get();
    }
    else{
            $data_penulis = Penulis::all();
    }
    return view("penulis.index", [
        "title" => "Penulis",
        "data_penulis" => $data_penulis
    ]);
}

    
}