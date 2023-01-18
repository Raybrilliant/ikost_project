<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IKost - Make Your Day Amazing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  </head>
  <body data-bs-spy="scroll" data-bs-target="#navbar">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-light sticky-top" id="navbar">
        <div class="container">
          <a class="navbar-brand" href="/">iKost</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active" href="#home">Beranda</a>
              <a class="nav-link" href="#riwayat">Riwayat</a>
            </div>

            <div class="navbar-nav ms-auto">
              <a href="/logout"><button type="button" class="btn btn-dark px-4">Logout</button></a>
            </div>
          </div>
        </div>
      </nav>

      @yield('content')

      @if ($data ?? null)
      @foreach ($data as $item)
      <!-- Modal -->
      <div class="modal fade" id="modalBayar{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Upload bukti pembayaran anda agar dapat diproses oleh admin. Bukti pembayaran dapat berupa jpg/png gunakan maksimal ukuran 2 Mb.</p>
              <div class="my-3">
                <form action="upload" method="post" enctype="multipart/form-data">
                  @csrf
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <label for="formPembayaran" class="form-label">Upload Bukti Pembayaran</label>
                    <input class="form-control" type="file" id="formPembayaran" name="formPembayaran" required>
              </div>
            </div>
            <div class="modal-footer">
                <div class="d-grid">
                    <button type="submit" class="btn btn-dark">Konfirmasi</button>
                </div>
            </form>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      @endif


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>