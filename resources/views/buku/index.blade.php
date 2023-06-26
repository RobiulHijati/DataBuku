@extends('layout.main')
@section('container')
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .btn {
            padding: 6px 12px;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        
        .btn-primary {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }
        
        .btn-primary:hover {
            color: #fff;
            background-color: #0056b3;
            border-color: #0056b3;
        }
        
        .btn-danger {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }
        
        .btn-danger:hover {
            color: #fff;
            background-color: #c82333;
            border-color: #bd2130;
        }
        
        body {
            padding: 20px;
        }
        
        .table {
            width: 100%;
        }
        
        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }
    </style>
<body>
<div class="container">
    <h1>Daftar Buku</h1>
    <a href="{{route("buku.create")}}" class="btn btn-primary">Tambah Buku</a>
    <table class="table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data_buku as $index => $buku)
            <tr>
                <td>{{$buku->judul}}</td>
                <td>{{$buku->penulis->nama}}</td>
                <td>
                    @can('view', $buku)
                    <a href="{{ route("buku.show", ["id" => $buku->id]) }}" class="btn btn-primary">Detail</a>
                    @endcan
                    @can('update', $buku)
                    <a href="{{route("buku.edit",["id" =>$buku->id])}}" class="btn btn-success">Edit</a>
                    @endcan
                    @can('delete', $buku)
                    <a href="{{ route('buku.destroy', ['id' => $buku->id]) }}" onclick="event.preventDefault(); if (confirm('Apakah Anda yakin ingin menghapus?')) { document.getElementById('delete-form-{{$buku->id}}').submit(); }" class="btn btn-danger">Delete</a>
                    <form id="delete-form-{{$buku->id}}" action="{{ route('buku.destroy', ['id' => $buku->id]) }}" method="POST" style="display:none;">
                        @csrf
                        @method('DELETE')
                    </form>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
@endsection
