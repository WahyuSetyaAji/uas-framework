<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $fillable = [
        'nama_cus',
        'no_cus',
        'produk_id',
        'catatan_custom',
        'tanggal_order',
        'booking_method',
        'alamat',
        'status_order',
    ];

    // Relasi ke Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
