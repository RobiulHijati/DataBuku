@extends('layout.main')
@section('container')
<h1>Daftar Buku !</h1>
	<ol>
		@foreach ($buku as $buku)
		<li>{{ $buku -> judul}}</li>
		Penulis : {{$buku -> penulis-> nama}} |
		jumlah_halaman : {{$buku -> jumlah_halaman}}
		@endforeach
	</ol>

	
<h1>Relasi One To One (Penulis -> User)</h1>
<h1>Relasi One To Many (Penulis -> Buku)</h1>
	<ol>
		@foreach ($penulis as $penulis)
		<li>{{ $penulis -> nama}} 
			| {{$penulis -> user-> username}}
			<ol>
				@foreach($penulis -> buku as $penulis)
				<li>JUDUL | {{$penulis -> judul}}</li>
				@endforeach
			</ol>
		</li>	
		@endforeach
	</ol>
@endsection
 