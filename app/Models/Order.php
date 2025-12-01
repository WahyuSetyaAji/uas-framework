<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    public $timestamps = false;

    protected $fillable = [
        'nama_cus',
        'no_cus',
        'produk_id',
        'jenis_order',
        'catatan_custom',
        'tanggal_order',
        'tanggal_booking',
        'jam_booking',
    ];

    // Relasi ke Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
