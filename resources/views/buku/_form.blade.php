<!DOCTYPE html>
<html>
<head>
    <title>Form Buku - Buku Theme</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('/images/12643000_5044478.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 200vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            width: 100%;
            max-width: 500px;
            background-color: rgba(255, 255, 255, 0.5); /* Opasitas 0.5 untuk membuatnya transparan */
            margin: auto;
            padding: 20px;
            position: relative;
            z-index: 1; /* Mengatur posisi z-index agar form muncul di atas latar belakang */
        }
        .form-group label {
            font-weight: bold;
        }
        .form-group input[type="text"],
        .form-group textarea,
        .form-group input[type="date"] {
            background-color: rgba(255, 255, 255, 1); 
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
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form Buku</h4>
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
                                <label for="nama">Judul Buku</label>
                                <input type="text" id="judul" name="judul" value="{{ old('judul', $buku->judul ?? '') }}" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <textarea id="kategori" name="kategori">{{ old('kategori', $buku->kategori ?? '') }}</textarea> 
                            </div>
                            <div class="form-group">
                                <label for="tahun_terbit">Tahun Terbit</label>
                                <input type="date" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit ?? '') }}">
                            </div>

                            <div class="form-group">
                                <label for="jumlah_halaman">Jumlah Halaman</label>
                                <input type="text" id="jumlah_halaman" name="jumlah_halaman" value="{{ old('jumlah_halaman', $buku->jumlah_halaman ?? '') }}" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="penulis_id">Penulis</label>
                                @foreach($data_penulis as $penulis)
                                    <div>
                                        <input type="radio" id="penulis_{{ $penulis->id }}" name="penulis_id" value="{{ $penulis->id }}" autofocus {{ isset($buku) && $buku->penulis_id == $penulis->id ? 'checked' : '' }}>
                                        <label for="penulis_{{ $penulis->id }}">{{ $penulis->nama }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="penulis_id">Penerbit</label>
                                @foreach($data_penerbit as $penerbit)
                                    <div>
                                        <input type="radio" id="penerbit_{{ $penerbit->id }}" name="penerbit_id" value="{{ $penerbit->id }}" autofocus {{ isset($buku) && $buku->penulis_id == $penulis->id ? 'checked' : '' }}>
                                        <label for="penerbit_{{ $penerbit->id }}">{{ $penerbit->nama }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <h3>Buku Mahasiswa</h3>
                            <ul>
                                @foreach($data_mahasiswa as $index=> $mahasiswa)
                                    <li><input type="checkbox" 
                                               name="mahasiswa_id[]" 
                                               value="{{$mahasiswa->id}}"
                                               @if ($buku->mahasiswa->pluck("id")->contains($mahasiswa->id))
                                                   checked
                                               @endif
                                        >{{$mahasiswa->nama}}</li>
                                @endforeach
                            </ul>
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
