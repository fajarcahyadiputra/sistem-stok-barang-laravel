@extends('admin.layout')
@section('title', 'Home Page')
@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">

        <div class="card">
            <div class="card-header" style="background-color: mintcream">
                {{-- <h3 class="text-dark">DASHBOARD</h3> --}}
            </div>
            <div class="card-body">
                {{-- <div class="container-fluid">
                    <div class="card mb-5">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="box"
                                        style="border: 1px solid red ;box-shadow: 3px 3px 1px 1px rgba(0, 0, 0, 0.2); padding: 30px">
                                        <span>Barang :</span>
                                        <span>00</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="box"
                                        style="border: 1px solid red ;box-shadow: 3px 3px 1px 1px rgba(0, 0, 0, 0.2); padding: 30px">
                                        <span>Pengguna :</span>
                                        <span>99</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="box"
                                        style="border: 1px solid red ;box-shadow: 3px 3px 1px 1px rgba(0, 0, 0, 0.2); padding: 30px">
                                        <span>Transaksi :</span>
                                        <span>00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Grafik Barang Masuk </div>
                                    <canvas id="myChart" width="50" height="20"></canvas>
                                </div>

                            </div>
                        </div>
                    </div>
                    <hr>
                    <hr>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Grafik Barang Keluar</div>
                                    <canvas id="myChart2" width="50" height="20"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="jumbotron">
                    <h1 class="display-4">
                        <h1 align="center" style="font-weight: bold">Selamat Datang {{ auth()->user()->nama }}</h1>
                    </h1>
                    <hr>
                    <h3 align="center">Aplikasi Persediaan Barang<br /></h3>
                    <h3 align="center">Gapura Rahayu<br /></h3>
                    <hr class="my-4">
                </div>
            </div>
        </div>

    </div>
    <!---Container Fluid-->
    </div>
@stop

@section('javascript')

@stop
