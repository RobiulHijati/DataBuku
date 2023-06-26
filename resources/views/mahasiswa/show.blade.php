@extends('layout.main')
                              
@section('container')
<h2>Detail Mahasiswa</h2> 
     <strong>{{$data_mahasiswa->nama}}</strong><br> 
<ol>
     @foreach ($data_mahasiswa->buku as $index => $buku)
      <li>Judul Buku : {{$buku->judul}}</li>
      @endforeach
</ol>
<a href="{{route("mahasiswa.edit",["id" =>$data_mahasiswa->id])}}" class="btn btn-success">Edit</a>
@endsection 