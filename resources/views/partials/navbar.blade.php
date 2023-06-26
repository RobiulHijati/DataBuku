<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">My Buku</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav flex-row"> 
        <li class="nav-item">
          <a class="nav-link {{ ($title === 'Penulis' ) ? 'active' : '' }}" href="{{ route('penulis.index') }}">Penulis</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === 'Buku' ) ? 'active' : '' }}" href="{{ route('buku.index') }}">Buku</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === 'Mahasiswa' ) ? 'active' : '' }}" href="{{ route('mahasiswa.index') }}">Mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === 'Penerbit' ) ? 'active' : '' }}" href="{{ route('penerbit.index') }}">Penerbit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === 'User' ) ? 'active' : '' }}" href="{{ route('user.index') }}">User</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}">Logout | <i class="fas fa-sign-out-alt"></i></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
