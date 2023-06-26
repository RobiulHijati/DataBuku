@extends('layout.main')
                              
@section('container')
    <h2>Detail Penerbit</h2>
    ID: {{$data_penerbit->id}}<br>
    Nama: {{$data_penerbit->nama}}<br>
    Alamat: {{$data_penerbit->alamat}}<br>
    Tanggal Lahir: {{$data_penerbit->tgl_lahir}}<br>

    <h3>Daftar Buku</h3>
    <ol>
        @foreach ($data_penerbit->buku as $buku)
            <li>Judul Buku: {{$buku->judul}}</li>
        @endforeach
    </ol>

    <a href="{{route("penerbit.edit",["id" =>$data_penerbit->id])}}" class="btn btn-primary">Edit</a>
@endsection
