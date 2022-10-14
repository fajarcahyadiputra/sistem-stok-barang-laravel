@extends('admin.layout')
@section('title', 'Halaman Detail Barang Keluar')
@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">

        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between">
                <h5>DATA DETAIL BARANG KELUAR</h5>
                <a class="btn btn-warning" href="/barang-keluar">Back</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Satuan</th>
                                <th>Jumlah</th>
                                <th>Jumlah Sebelumnya</th>
                                <th>Sisa Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detailKeluar as $no => $dt)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $dt->Barang->kode_barang }}</td>
                                    <td>{{ $dt->Barang->nama_barang }}</td>
                                    <td>{{ $dt->satuan }}</td>
                                    <td>{{ $dt->jumlah }}</td>
                                    <td>{{ $dt->jumlah_sebelumnya }}</td>
                                    <td>{{ $dt->sisa_stok }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!---Container Fluid-->
    </div>
@stop
