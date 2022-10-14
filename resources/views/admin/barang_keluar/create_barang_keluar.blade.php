@extends('admin.layout')
@section('title','Halaman Tambah Barang Masuk')

@section('content')
<div class="container-fluid" id="container-wrapper">

    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between">
            <h5>TAMBAH BARANG KELUAR</h5>
        </div>
        <div class="card-body">
            <form id="formTambah">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_keluar">No Keluar</label>
                                <input type="text" name="no_keluar" readonly value="{{$no_keluar}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="no_surat_jalan">No Surat jalan</label>
                                <input type="text" name="no_surat_jalan" readonly value="{{$no_sj}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tgl_keluar">Tanggal Keluar</label>
                                <input required type="date" name="tgl_keluar"  value="{{date('Y-m-d')}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="yg_mengeluarkan">Yang Mengeluarkan</label>
                                <input required type="text" name="yg_mengeluarkan" id="yg_mengeluarkan"  class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Buat</label>
                        <textarea class="form-control" name="buat" id="buat" cols="30" rows="5"></textarea>
                        {{-- <select required class="custom-select" name="buat" id="buat">
                            <option value="" disabled selected hidden>-- Select Email Customer --</option>
                            @foreach ($customer as $cus)
                            <option value="{{$cus->id}}">{{$cus->nama}}</option>
                           @endforeach
                        </select> --}}
                    </div>
                    <div class="box-barang">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="id_barang">Barang</label>
                                    <select  class="custom-select" id="id_barang">
                                        <option value="" disabled selected hidden>-- Select Barang --</option>
                                        @foreach ($barang as $bar)
                                        <option value="{{$bar->id}}">{{$bar->nama_barang}}</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Jumlah</label>
                                    <input data-index="1"  type="number"  id="jumlah" min="1" value="" class="form-control">
                                    <span class="alert-barang-kosong text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Sebelumnya</label>
                                    <input readonly type="number" id="jumlah_sebelumnya" min="1" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Sisa Stok</label>
                                    <input readonly type="number" id="sisa_stok" min="1" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="satuan">Satuan</label>
                                    <select  class="custom-select"  id="satuan">
                                        <option value="" disabled selected hidden>-- Select Satuan --</option>
                                        <option value="pcs">pcs</option>
                                        <option value="btg">btg</option>
                                        <option value="lb">lb</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <label for="">Add</label>
                                <button type="button" class="btn btn-primary btn-sm btn-add-barang"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Stok Awal</th>
                            <th>Jumlah Masuk</th>
                            <th>Sisa Stok</th>
                        </tr>
                        @if (session()->has('databarang'))
                        @foreach (session()->get('databarang') as $item)
                        <tr class="text-center">
                                    <td>{{$item['kode_barang']}}</td>
                                    <td>{{$item['nama_barang']}}</td>
                                    <td>{{$item['stokSebelumnya']}}</td>
                                    <td>{{$item['jumlahMasuk']}}</td>
                                    <td>{{$item['sisaStok']}}</td>
                        </tr>
                                @endforeach
                            @endif
                    </table>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" href="/barang-keluar">Cancel</a>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection

@section('javascript')
<script>
// let index = 2;
// document.querySelector('.btn-add-barang').addEventListener('click', function(){
//         let boxBarang = document.querySelector('.box-barang');
//         let subBox = document.createElement('div');
//         subBox.classList.add("row");
//         subBox.innerHTML = formBarang(index++);
//         boxBarang.appendChild(subBox);
//     })


    // function formBarang(index){
    //     return ` <div class="row">
    //                         <div class="col-md-3">
    //                             <div class="form-group">
    //                                 <label for="id_barang">Barang</label>
    //                                 <select required class="custom-select" name="databarang[${index}]" id="id_barang${index}">
    //                                     <option value="" disabled selected hidden>-- Select Barang --</option>
    //                                     @foreach ($barang as $bar)
    //                                     <option value="{{$bar->id}}">{{$bar->nama_barang}}</option>
    //                                    @endforeach
    //                                 </select>
    //                             </div>
    //                         </div>
    //                         <div class="col-md-2">
    //                             <div class="form-group">
    //                                 <label>Jumlah</label>
    //                                 <input data-index="${index}" required type="number" name="databarang[${index}]" id="jumlah" min="1" value="" class="form-control">
    //                                 <span class="alert-barang-kosong text-danger"></span>
    //                             </div>
    //                         </div>
    //                         <div class="col-md-2">
    //                             <div class="form-group">
    //                                 <label>Sebelumnya</label>
    //                                 <input readonly type="number" name="databarang[${index}]" id="jumlah_sebelumnya${index}" min="1" class="form-control">
    //                             </div>
    //                         </div>
    //                         <div class="col-md-2">
    //                             <div class="form-group">
    //                                 <label>Sisa Stok</label>
    //                                 <input readonly type="number" name="databarang[${index}]" id="sisa_stok${index}" min="1" class="form-control">
    //                             </div>
    //                         </div>
    //                         <div class="col-md-2">
    //                             <div class="form-group">
    //                                 <label id="satuan">Satuan</label>
    //                                 <select required class="custom-select" name="databarang[${index}]" id="satuan">
    //                                     <option value="" disabled selected hidden>-- Select Satuan --</option>
    //                                     <option value="pcs">pcs</option>
    //                                     <option value="btg">btg</option>
    //                                     <option value="lb">lb</option>
    //                                 </select>
    //                             </div>
    //                         </div>
    //                         <div class="col-md-1">
    //                             <label for="">Add</label>
    //                             <button type="button" class="btn btn-primary btn-sm btn-add-barang"><i class="fa fa-plus"></i></button>
    //                         </div>
    //                     </div>`
    // }

    $(document).ready(function(){
        //add barang to session
        $(document).on('click', '.btn-add-barang', function(){
            const id_barang = $('#id_barang').val();
            const jumlahMasuk = $('#jumlah').val();
            const stokSebelumnya = $('#jumlah_sebelumnya').val();
            const satuan = $('#satuan').val();
            const sisaStok = $('#sisa_stok').val();
            if(id_barang === '' || jumlahMasuk === '' || stokSebelumnya === '' || sisaStok === '' || satuan === null){
                Swal.fire(
                        'Gagal',
                        'Tidak Boleh Kosong',
                        'error'
                    )
                    return false;
            }
            $.ajax({
            url: "{{route('addCartKeluar')}}",
            data: {
                id_barang, jumlahMasuk, stokSebelumnya, satuan, sisaStok,
                _token: "{{csrf_token()}}"
            },
            dataType: 'json',
            type: "POST",
            success: function(hasil) {
                if (hasil) {
                    Swal.fire(
                        'sukses',
                        'sukses menambah data ke keranjang',
                        'success'
                    ).then(()=>{
                        location.reload();
                    })
                } else {
                    Swal.fire(
                        'Gagal',
                        'gagal menambah data ke keranjang',
                        'error'
                    ).then(()=>{
                        location.reload();
                    })
                }
            }
        })
        })
        //check stok
$(document).on('keyup change', '#jumlah', function(){
        const id_barang = $(`#id_barang`).val();
        var jumlah_keluar = $(this).val();

        $('.alert-barang-kosong').html(``);
        if(id_barang === undefined || id_barang === '' || id_barang === null){
            $('.alert-barang-kosong').html(`Barang Harus Di Pilih Dahulu`);
            $('#btn-add').attr('disabled','disabled');
            return false;
        }
        $.ajax({
            url: '/barang-keluar',
            data: {
                checkStok: true,
                id_barang,
                _token: "{{csrf_token()}}"
            },
            dataType: 'json',
            type: 'post',
            success: function (result){
                let jumlah = result.jumlah;
                $(`#jumlah_sebelumnya`).val(jumlah);
                $(`#jumlah`).attr('max',`${jumlah}`);
                const total = parseInt(jumlah) - parseInt(jumlah_keluar);
                console.log(total);
                $(`#sisa_stok`).val(total);
            }
        })
    })

    $(document).on('submit', '#formTambah',  function(e) {
        e.preventDefault();
        const data = $(this).serialize();

        $.ajax({
            url: '/barang-keluar',
            data: data,
            dataType: 'json',
            type: 'post',
            success: function(hasil) {
                // console.log(hasil);
                // return false;
                if (hasil) {
                    Swal.fire(
                        'sukses',
                        'sukses menambah data',
                        'success'
                    ).then(()=>{
                        document.location.href = '/barang-keluar';
                    })
                } else {
                    Swal.fire(
                        'Gagal',
                        'gagal menambah data',
                        'error'
                    )
                }
            }
        })
    })
    //end

    })
</script>
@endsection
