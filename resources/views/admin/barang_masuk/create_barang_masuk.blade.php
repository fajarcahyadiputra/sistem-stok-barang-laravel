@extends('admin.layout')
@section('title', 'Halaman Tambah Barang Masuk')

@section('content')
    <div class="container-fluid" id="container-wrapper">

        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between">
                <h5>TAMBAH BARANG MASUK</h5>
            </div>
            <div class="card-body">
                <form id="formTambah" method="post">
                    @csrf()
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="no_surat_jalan">Nomer Surat Jalan</label>
                            <input required type="type" autocomplete="off" value="" name="no_surat_jalan"
                                id="no_surat_jalan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="id_barang">Barang</label>
                            <select required name="id_barang" id="id_barang" class="form-control">
                                <option value="" disabled selected hidden>-- Pilih Barang --</option>
                                @foreach ($barang as $br)
                                    <option value="{{ $br->id }}">{{ $br->nama_barang }}</option>
                                @endforeach
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_supplier">Supplier</label>
                            <select required name="id_supplier" id="id_supplier" class="form-control">
                                <option value="" disabled selected hidden>-- Pilih Barang --</option>
                                @foreach ($supplier as $sup)
                                    <option value="{{ $sup->id }}">{{ $sup->nama }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input required type="number" min="1" name="jumlah" id="jumlah" value="1"
                                class="form-control">
                            <span class="alert-barang-kosong text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_sebelumnya">Jumlah Sebelumnya</label>
                            <input readonly type="number" required name="jumlah_sebelumnya" id="jumlah_sebelumnya"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="total_stok">Total</label>
                            <input readonly type="number" required name="total_stok" id="total_stok" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="penerima">Penerima</label>
                            <input type="text" required name="penerima" id="penerima" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="satuan">Satuan</label>
                            <select required name="satuan" class="form-control" id="satuan">
                                <option value="" disabled hidden selected>-- Pilih Satuan --</option>
                                <option value="pcs">pcs</option>
                                <option value="btg">btg</option>
                                <option value="lb">lb</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-secondary" href="/barang-masuk">Cancel</a>
                        <button id="btn-add" type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


@section('modal')
    <!-- Modal tambah -->
    <div class="modal fade" id="modalTambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formTambahBarang" method="post">
                    @csrf()
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="kode_barang">Kode Barang</label>
                            <input type="type" readonly value="{{ $kode_barang }}" name="kode_barang" id="kode_barang"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="type" name="nama_barang" id="nama" class="form-control">
                            <!-- </div>
                                                                                                                        <div class="form-group">
                                                                                                                            <label for="jumlah">Jumlah</label> -->
                            <input type="hidden" name="jumlah" id="jumlah" value="0" class="form-control">
                            <!-- </div> -->
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="satuan">Satuan</label>
                                <select name="satuan" class="form-control" id="satuan">
                                    <option value="" disabled hidden selected>-- Pilih Satuan --</option>
                                    <option value="pcs">pcs</option>
                                    <option value="btg">btg</option>
                                    <option value="lb">lb</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {

            //check if barang jika tidak ada di data barang
            $(document).on('change', '#id_barang', function() {
                const value = $(this).val();
                if (value === 'lainnya') {
                    $('#modalTambahData').modal('show');
                }
            })
            //end

            //add data barang
            $(document).on('submit', '#formTambahBarang', function(e) {
                e.preventDefault();
                const data = $(this).serialize() + "&serviceLain=" + true;
                $.ajax({
                    url: '/barang',
                    data: data,
                    dataType: 'json',
                    type: 'post',
                    success: function(hasil) {
                        $('#id_barang').html(
                            `<option value="${hasil.id}">${hasil.nama_barang}</option>`);
                        $('#modalTambahData').modal('hide');
                    }
                })
            })
            //end

            $(document).on('submit', '#formTambah', function(e) {
                e.preventDefault();
                const data = $(this).serialize();

                $.ajax({
                    url: '/barang-masuk',
                    data: data,
                    dataType: 'json',
                    type: 'post',
                    success: function(hasil) {
                        if (hasil) {
                            $('#modalTambah').modal('hide')
                            Swal.fire(
                                'sukses',
                                'sukses menambah data',
                                'success'
                            ).then(() => {
                                document.location.href = '/barang-masuk';
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

            //check stok
            $(document).on('keyup change', '#jumlah', function() {
                const id_barang = $('#id_barang').val();
                var jumlah_masuk = $('#jumlah').val();
                $('.alert-barang-kosong').html(``);
                if (id_barang === undefined || id_barang === '' || id_barang === null) {
                    $('.alert-barang-kosong').html(`Barang Harus Di Pilih Dahulu`);
                    $('#btn-add').attr('disabled', 'disabled');
                    return false;
                }
                $.ajax({
                    url: '/barang-masuk',
                    data: {
                        checkStok: true,
                        id_barang,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    type: 'post',
                    success: function(result) {
                        let jumlah = result.jumlah;
                        $('#jumlah_sebelumnya').val(jumlah);
                        const total = parseInt(jumlah) + parseInt(jumlah_masuk);
                        $('#total_stok').val(total);
                    }
                })
            })
        })
    </script>
@endsection
