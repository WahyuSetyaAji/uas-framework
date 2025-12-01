<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $table = 'testimoni';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'nama_testimoni',
        'produk_id',
        'komentar',
        'rating',
        'tanggal_testimoni',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
