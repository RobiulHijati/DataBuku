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
</head>
<body>
<div class="container">
        <h1>Daftar Penulis</h1>
        <div class="card-tools mb-3">
            @can('create', App\Models\Penulis::class)
            <a href="{{ route('penulis.create') }}" class="btn btn-primary">Tambah Penulis</a>
            @endcan
            <form action="/penulis/search" class="form-inline float-right" method="GET">
                <div class="input-group">
                    <input type="search" name="search" class="form-control" placeholder="Search">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Penulis</th>
                    <th>Jumlah Buku</th>
                    <th>Tanggal Lahir</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_penulis as $index => $penulis)
                <tr>
                    <td>{{$index + 1}}</td>
                    <td>{{$penulis->nama}}</td>
                    <td>{{$penulis->buku->count()}}</td>
                    <td>{{$penulis->tgl_lahir}}</td>
                    <td>
                        @can('view', $penulis)
                        <a href="{{ route("penulis.show", ["id" => $penulis->id]) }}" class="btn btn-warning">Detail</a>
                        @endcan
                        @can('update', $penulis)
                        <a href="{{route("penulis.edit",["id" =>$penulis->id])}}" class="btn btn-primary">Edit</a>
                        @endcan
                        @can('delete', $penulis)
                        <a href="{{ route('penulis.destroy', ['id' => $penulis->id]) }}" onclick="event.preventDefault(); if (confirm('Apakah Anda yakin ingin menghapus?')) { document.getElementById('delete-form-{{$penulis->id}}').submit(); }" class="btn btn-danger">Delete</a>
                        <form id="delete-form-{{$penulis->id}}" action="{{ route('penulis.destroy', ['id' => $penulis->id]) }}" method="POST" style="display:none;">
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
