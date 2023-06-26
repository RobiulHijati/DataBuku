@extends('layout.main')
@section('container')
<h1>Relasi One to Many (Penulis->Buku)!</h1>
<h1> Data Penulis </h1>
        Nama {{$penulis->nama}}<br>
        judul buku:
        @foreach($penulis->buku as $index=>$buku)
        <li>{{$buku->judul}}</li>
        @endforeach
@endsection