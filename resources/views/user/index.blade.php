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
        <h2>Daftar User</h2>
        <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah User</a><br>
        <table class="table table-bordered">
            <tr>
                <th>Nomor</th>
                <th>Username</th>
                <th>Level</th>
                <th>Tanggal</th>
                <th>Opsi</th>
            </tr>

            @foreach ($data_user as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->level }}</td>
                    <td>{{ $user->created_at }} | {{ $user->updated_at }}</td>
                    <td>
                        <a href="{{ route('user.show', ['id' => $user->id]) }}" class="btn btn-secondary">Detail</a>
                        @if ($user->level != 'penulis')
                            <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('user.destroy', ['id' => $user->id]) }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
@endsection
