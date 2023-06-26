@extends('layout.main')
                              
@section('container')
<h2>Detail Buku</h2> 
     <strong>{{$data_buku->judul}}</strong><br>
    Penulis : {{$data_buku->penulis->nama}}<br> 
<ol>
     @foreach ($data_buku->mahasiswa as $index => $mahasiswa)
      <li>Nama Mahasiswa : {{$mahasiswa->nama}}</li>
      @endforeach
</ol>
<a href="{{route("buku.edit",["id" =>$data_buku->id])}}" class="btn btn-success">Edit</a>
@endsection 