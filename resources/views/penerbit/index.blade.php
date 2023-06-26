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
    <h1>Daftar Penerbit</h1>
    <div class="card-tools mb-3">
        <a href="{{ route('penerbit.create') }}" class="btn btn-primary">Tambah Penerbit</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data_penerbit as $index => $penerbit)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $penerbit->nama }}</td>
                    <td>{{ $penerbit->alamat }}</td>
                    <td>{{ $penerbit->tgl_lahir }}</td>
                    <td>
                        <a href="{{ route('penerbit.show', ['id' => $penerbit->id]) }}" class="btn btn-warning">Detail</a>
                        <a href="{{ route('penerbit.edit', ['id' => $penerbit->id]) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('penerbit.destroy', ['id' => $penerbit->id]) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
@endsection
