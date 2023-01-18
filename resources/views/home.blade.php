     @extends('layouts.main')
     
     @section('content')
     <!-- Home -->
      <div class="container" id="home">
        <div class="row align-items-center" style="margin-top:25vh;margin-bottom:25vh;">
            <div class="col">
                <h1>Selamat Datang <u>{{ $data[0]->nama }}</u>, Terimakasih sudah memilih IKost untuk tempat bersandarmu</h1> 
            </div>
            <div class="col">
                <div class="d-flex justify-content-center">
                    <div class="card" style="width: 25rem;">
                        <div class="card-body">
                          <div class="row">
                            <div class="col">
                                <h5 class="card-title">No. {{ $data[0]->nomor_kamar }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $data[0]->tipe_kamar }}</h6>
                            </div>
                            <div class="col">
                                <h5><span class="badge bg-secondary float-end">{{ date_format(date_create($data[0]->jatuh_tempo),'F') }}</span></h5>
                            </div>
                          </div>  
                          <h1 class="card-text text-center">Rp.<b>{{ number_format($data[0]->tagihan,0,'.',',') }}</b> </h1>
                          <p class="card-text">Untuk pembayaran kos dapat dilakukan melaluai transfer bank BRI ke nomor rekening <b>000101011822534</b></p>
                          <div class="d-grid">
                            @if ($data[0]->status == 'Lunas')
                            <button type="button" class="btn btn-success btn-lg disabled" data-bs-toggle="modal" data-bs-target="#">{{ $data[0]->status }}</button> 
                            @else
                            <button type="button" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#modalBayar{{ $data[0]->id }}">{{ $data[0]->status }}</button>
                            @endif
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
        <p class="my-4 text-center justify-content-center"> <i class="bi bi-geo-alt-fill"></i> Jl .Margojoyo no.61 RT 02 RW 02 Dukuh Jetis Desa Mulyoagung Kec.Dau Kab.Malang Jatim kode pos 65151</p>
      </div>

      <hr>

      <!-- Riwayat -->
      <div class="container d-flex d-grid my-5 justify-content-around align-content-between flex-wrap" id="riwayat">
        @if ($data)
        @foreach ($data as $item)
        <div class="card mt-3" style="width: 18rem;">
            <div class="card-body">
              <div class="row">
                <div class="col">
                    <h5 class="card-title">No. {{ $item->nomor_kamar }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $item->tipe_kamar }}</h6>
                </div>
                <div class="col">
                    <h5><span class="badge bg-secondary float-end">{{ date_format(date_create($item->jatuh_tempo),'F') }}</span></h5>
                </div>
              </div>  
              <h1 class="card-text text-center">Rp.<b>{{ number_format($item->tagihan,0,'.',',') }}</b> </h1>
              <p class="card-text">Untuk pembayaran kos dapat dilakukan melaluai transfer bank BRI ke nomor rekening <b>000101011822534</b></p>
              <div class="d-grid">
                @if ($item->status == 'Lunas')
                <button type="button" class="btn btn-success btn-lg disabled">{{ $item->status }}</button>
                @else
                <button type="button" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#modalBayar{{ $item->id }}">{{ $item->status }}</button>
                @endif
              </div>
            </div>
          </div>
        @endforeach
        @endif
      </div>
     @endsection