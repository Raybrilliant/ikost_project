@extends('layouts.admin')
@section('content')
<!-- Begin Page Content -->
<div class="container">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Card Example -->
        @if ($data)
        @foreach ($data as $item)
        <div class="col-xl-3 col-md-10 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                No.{{ $item->nomor_kamar }} ({{date_format( date_create($item->jatuh_tempo),'F')}})</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{ number_format($item->tagihan,0,".",",") }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary btn-sm mt-2" data-toggle="modal" data-target="#cardModal{{ $item->id }}">Check</button>
                </div>
            </div>
        </div>

            <!-- Card Modal-->
    <div class="modal fade" id="cardModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bukti pembayaran</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                @if (!$item->image)
                    <p>Penghuni kos ini belum melakukan pembayaran</p>
                @else
                <img class="img-fluid" src="{{ asset("storage/$item->image") }}">
                @endif
            </div>
            <div class="modal-footer">
                <a class="btn btn-success" href="/admin/update?id={{ $item->id }}">Approve</a>
                <button class="btn btn-danger" type="button" data-dismiss="modal">Reject</button>
            </div>
            </div>
        </div>
    </div>
        @endforeach
        @endif

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-10 mb-4">

            <!-- Progress Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Progress</h6>
                </div>
                <div class="card-body">
                    <h4 class="small font-weight-bold">Waiting<span
                            class="float-right">60%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 60%"
                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Approve<span
                            class="float-right">30%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 30%"
                            aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Reject<span
                            class="float-right">10%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 10%"
                            aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>

            <!-- About Us -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">About Us</h6>
                </div>
                <div class="card-body">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, ab debitis nostrum dolorem ullam voluptatibus vero sapiente voluptate accusantium totam, officia iure quidem, natus minus dolorum a maxime fuga vitae expedita quas sunt magni. Libero expedita velit repudiandae, vel eum repellat cum recusandae laudantium accusamus soluta culpa laboriosam autem fugiat!</p>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection