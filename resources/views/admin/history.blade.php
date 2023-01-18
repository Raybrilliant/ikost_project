@extends('layouts.admin')
@section('content')
                 <!-- Begin Page Content -->
                 <div class="container">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">History</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Nomor Kamar</th>
                                            <th>Tagihan</th>
                                            <th>Tanggal Bayar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($data)
                                        @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->nomor_kamar }}</td>
                                            <td>Rp.{{ number_format($item->tagihan,0,'.',',') }}</td>
                                            <td>{{ $item->updated_at }}</td>
                                            <td><a href="/admin/history/delete?id={{ $item->id }}"><button class="badge badge-danger">Delete</button></a></td>
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