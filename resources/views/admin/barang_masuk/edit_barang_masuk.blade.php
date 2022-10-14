@extends('admin.layout')
@section('title', 'Halaman Edit Barang Masuk')

@section('content')
    <div class="container-fluid" id="container-wrapper">

        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between">
                <h5>EDIT BARANG MASUK</h5>
            </div>
            <div class="card-body">
                <form id="formEditData" method="post">
                    @csrf()
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="no_surat_jalan">Nomer Surat Jalan</label>
                            <input type="hidden" value="{{ $barangmasuk->id }}" id="id">
                            <input type="type" required value="{{ $barangmasuk->no_surat_jalan }}" name="no_surat_jalan"
                                id="no_surat_jalan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="id_barang">Barang</label>
                            <select required name="id_barang" id="id_barang" class="form-control">
                                <option value="" disabled selected hidden>-- Pilih Barang --</option>
                                @foreach ($barang as $br)
                                    <option {{ $barangmasuk->id_barang == $br->id ? 'selected' : '' }}
                                        value="{{ $br->id }}">{{ $br->nama_barang }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_supplier">Supplier</label>
                            <select name="id_supplier" id="id_supplier" class="form-control">
                                <option value="" disabled selected hidden>-- Pilih Barang --</option>
                                @foreach ($supplier as $sup)
                                    <option {{ $barangmasuk->id_supplier == $sup->id ? 'selected' : '' }}
                                        value="{{ $sup->id }}">{{ $sup->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="penerima">Penerima</label>
                            <input type="type" name="penerima" id="penerima" value="{{ $barangmasuk->penerima }}"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="satuan">Satuan</label>
                            <select name="satuan" class="form-control" id="satuan">
                                <option value="" disabled hidden selected>-- Pilih Satuan --</option>
                                <option {{ $barangmasuk->satuan === 'pcs' ? 'selected' : '' }} value="pcs">pcs</option>
                                <option {{ $barangmasuk->satuan === 'btg' ? 'selected' : '' }} value="btg">btg</option>
                                <option {{ $barangmasuk->satuan === 'lb' ? 'selected' : '' }} value="lb">lb</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-secondary" href="/barang-masuk">Cancel</a>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            //edit data
            $(document).on('submit', '#formEditData', function(e) {
                e.preventDefault();
                const id = $('#id').val();
                $.ajax({
                    url: '/barang-masuk/' + id,
                    data: $(this).serialize(),
                    dataType: 'json',
                    method: "PUT",
                    success: function(hasil) {
                        if (hasil) {
                            Swal.fire(
                                'sukses',
                                'sukses edit data',
                                'success'
                            ).then(() => {
                                document.location.href = '/barang-masuk';
                            })
                        } else {
                            Swal.fire(
                                'Gagal',
                                'gagal edit data',
                                'error'
                            )
                        }
                    }
                })
            })
        })
    </script>
@endsection
