<?php

namespace App\Imports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OrdersImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Order([
            'nama_cus'        => $row['nama_customer'],
            'no_cus'          => $row['no_hp'],
            'produk_id'       => $row['produk_id'],
            'jenis_order'     => $row['jenis_order'],
            'catatan_custom'  => $row['catatan_custom'],
            'tanggal_order'   => $row['tanggal_order'],
            'tanggal_booking' => $row['tanggal_booking'],
            'jam_booking'     => $row['jam_booking'],
        ]);
    }
}
