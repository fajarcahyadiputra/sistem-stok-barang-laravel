<title>laporan Barang Keluar</title>
<div style="line-height: 7px; text-align: center; margin-bottom: 30px">
    <h2 style="font-weight: bold">Gapura Rahayu</h2>
    <p>Jl.kh agussalim</p>
    <p>Rt/Rw 07/010 kel Bekasi jaya,</p>
    <p>Bekasi Timur Kota Bekasi jawa barat</p>
</div>
<hr>

<br>
<center>
    <h3>Laporan Barang Keluar</h3>
</center>
<hr /><br />
<table border="1" width="100%">
    <thead>
        <tr style="text-align: center">
            <th>No</th>
            <th>Barang</th>
            <th>Buat</th>
            <th>Jumlah</th>
            <th>Stok Sebelumnya</th>
            <th>Sisa Stok</th>
            <th>TGL Keluar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($barang_keluar as $no => $dt)
            <tr style="text-align: center">
                <td>{{ $no + 1 }}</td>
                <td>{{ $dt->nama_barang }}</td>
                <td>{{ $dt->buat }}</td>
                <td>{{ $dt->jumlah }}</td>
                <td>{{ $dt->jumlah_sebelumnya }}</td>
                <td>{{ $dt->sisa_stok }}</td>
                <td>{{ $dt->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
