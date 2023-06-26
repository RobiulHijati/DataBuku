<!DOCTYPE html>
<html>
<head>
    <title>Form Penulis - MY BUKU</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('/images/man-7734959.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 115vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            max-width: 400px;
            background-color: rgba(255, 255, 255, 0.5);
            padding: 20px;
            margin-left: auto; 
            margin-right: auto;
            position: relative;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-group input[type="text"],
        .form-group textarea,
        .form-group input[type="date"],
        .form-group input[type="password"] {
            background-color: rgba(255, 255, 255, 0.9);
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 8px;
            width: 100%;
            margin-bottom: 10px;
        }
        .form-group button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
        .form-group button[type="submit"]:hover {
            background-color: #0056b3;
        }
        .card::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            filter: blur(10px);
            position: relative;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form Penulis</h4>
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{ $action }}" method="post">
                            @method($method)
                            @csrf

                            <div class="form-group">
                                <label for="nama">Nama Penulis</label>
                                <input type="text" id="nama" name="nama" value="{{ old('nama', $penulis->nama ?? '') }}">
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea id="alamat" name="alamat">{{ old('alamat', $penulis->alamat ?? '') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir', $penulis->tgl_lahir ?? '') }}">
                            </div>

                            <h3>Data User</h3>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" value="{{ old('username', $user->username ?? '') }}">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password">
                            </div>

                            <div class="form-group">
                                <button type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
