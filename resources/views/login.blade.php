      @extends('layouts.main')
      @section('content')
      <!-- Login -->
      <div class="container my-5 d-flex justify-content-center">
        <div class="card" style="width: 30rem;">
          <div class="card-body">
            @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('loginError') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <h3 class="card-title text-center">Login</h3>
            <p class="card-text text-center my-5">Selamat datang kembali dikos ikost silahkan masukan email dan password anda untuk dapat masuk ke halaman pembayaran</p>
            <form class="form-floating" action="" method="post" >
              @csrf
              <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
              </div>
              <div class="d-grid">
                <button type="submit" class="btn btn-dark btn-lg my-5">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      @endsection