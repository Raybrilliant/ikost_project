@extends('layouts.admin')
@section('content')
                   <!-- Begin Page Content -->
                   <div class="container">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Penghuni Kos</h6>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#customerModal">Tambah Penghuni</button>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Tipe Kamar</th>
                                            <th>Nomor Kamar</th>
                                            <th>Biaya Kamar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($data)
                                        @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->tipe_kamar }}</td>
                                            <td>{{ $item->nomor_kamar }}</td>
                                            <td>Rp.{{ number_format($item->biaya_kamar,0,'.',',') }}</td>
                                            <td><a href="/admin/customer/delete?id={{ $item->id }}"><button class="badge badge-danger">Kick</button></a> | <a href="/admin/customer/send?id={{ $item->id }}&tagihan={{ $item->biaya_kamar }}"><button class="badge badge-dark">Reminder</button></a></td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
@endsection