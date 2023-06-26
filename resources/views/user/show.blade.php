@extends('layout.main')
                              
@section('container')
    <h2>Detail User</h2>
    USERNAME : <b>{{ $data_user->username }}</b><br>
    LEVEL :{{ $data_user->level }}<br>


    @if ($data_user->level != 'penulis')
    <a href="{{ route('user.edit', ['id' => $data_user->id]) }}" class="btn btn-warning">Edit</a>
    @endif
@endsection 