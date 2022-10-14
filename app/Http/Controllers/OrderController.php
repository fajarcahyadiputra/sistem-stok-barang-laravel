<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Barang;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::with('customer', 'barang')->get();
        $invoice = Order::generateInvoice();
        $customer = Customer::all();
        $barang = Barang::all();
        return view('admin.order.index_order', compact('order', 'invoice', 'customer', 'barang'));
    }
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['status'] = 'pending';
        $create = Order::create($data);
        if ($create) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
    public function destroy($id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->delete();
            return response()->json(true);
        } else {
            return response()->json(true);
        }
    }
    public function show($id)
    {
        $order = Order::find($id);
        return response()->json($order);
    }
    public function update($id, Request $request)
    {
        $order = Order::find($id);
        $data = $request->except('_token');
        $order->fill($data);
        if ($order->save()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
    public function stokReady($id)
    {
        $order = Order::find($id);
        $order->fill([
            'keterangan' => 'stok tersedia',
            'status'     => 'stok-tersedia'
        ]);
        if ($order->save()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
    public function stokNotReady($id, Request $request)
    {
        $order = Order::find($id);
        $data = $request->except('_token');
        $data['status'] = 'stok-kosong';
        $order->fill($data);
        if ($order->save()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
    public function closeOrder($id)
    {
        $order = Order::find($id);
        $data = request()->except('_token');
        $data['status'] = 'close';
        $data['keterangan'] = 'order close';
        $order->fill($data);
        if ($order->save()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
}
