<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\DetailBarangkeluar;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        $kode_barang = Barang::generateKode();
        return view('admin.barang.index_barang', compact('barang', 'kode_barang'));
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['stok_awal'] = $data['jumlah'];
        $create = Barang::create($data);
        if ($request->input('serviceLain')) {
            return response()->json($create);
        }
        if ($create) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
    public function destroy($id)
    {
        $barang = Barang::find($id);
        if ($barang) {
            BarangMasuk::where('id_barang', $id)->delete();
            DetailBarangkeluar::where('id_barang', $id)->delete();
            $barang->delete();
            return response()->json(true);
        } else {
            return response()->json(true);
        }
    }
    public function show($id)
    {
        $barang = Barang::find($id);
        return response()->json($barang);
    }
    public function update($id, Request $request)
    {
        $barang = Barang::find($id);
        $data = $request->except('_token');
        if ($barang->stok_awal != $data['stok_awal']) {
            if ($data['stok_awal'] > $barang->stok_awal) {
                $total =  $data['stok_awal'] - $barang->stok_awal;
                $data['jumlah'] = $barang->jumlah + $total;
            } else {
                $total =   $barang->stok_awal - $data['stok_awal'];
                $data['jumlah'] = $barang->jumlah - $total;
            }
        }
        $barang->fill($data);
        if ($barang->save()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
}
