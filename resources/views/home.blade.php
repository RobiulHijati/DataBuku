@extends('layout.main')

@section('container')
    <h1> Data Mahasiswa Relasi Many To Many (Mahasiswa -> Buku)</h1>
                Nama Buku {{$buku->judul}} | Penulis : {{$buku->penulis->nama}}<br>
                Daftar Mahasiswa
                @foreach($buku->mahasiswa as $index=>$mahasiswa)
                <li>{{$mahasiswa->nama}} | {{$mahasiswa->buku}}</li>
                @endforeach
@endsection
