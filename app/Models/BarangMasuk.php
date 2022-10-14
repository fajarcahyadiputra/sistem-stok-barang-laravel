<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BarangMasuk extends Model
{
    use HasFactory;
    protected $table = 'barang_masuk';
    protected $fillable = ['id_barang', 'id_supplier', 'satuan', 'jumlah', 'jumlah_sebelumnya', 'total_stok', 'no_surat_jalan', 'penerima'];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier');
    }
    public static function laporan($dari, $sampai)
    {
        return DB::table('barang_masuk')
            ->select("barang_masuk.*", "barang.nama_barang", "supplier.nama")
            ->join('barang', "barang_masuk.id_barang", "=", "barang.id")
            ->join('supplier', "barang_masuk.id_supplier", "=", "supplier.id")
            ->whereBetween('barang_masuk.created_at', [$dari, $sampai])
            ->get();
    }
}
