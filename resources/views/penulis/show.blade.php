@extends('layout.main')
                              
@section('container')
    <h2>Detail Mahasiswa</h2>
    USERNAME : <b>{{$data_penulis->user->username}}</b><br>
    ID :{{$data_penulis->id}}<br>
     NAMA  :{{$data_penulis->nama}}<br>
    ALAMAT :{{$data_penulis->alamat}}<br>
    TANGGAL LAHIR :{{$data_penulis->tgl_lahir}}<br>
<ol>
     @foreach ($data_penulis->buku as $index => $buku)
      <li>Judul Buku : {{$buku->judul}}</li>
      @endforeach
</ol>     
<a href="{{route("penulis.edit",["id" =>$data_penulis->id])}}" class="btn btn-primary">Edit</a>
@endsection 