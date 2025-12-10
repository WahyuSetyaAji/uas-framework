<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Order::select(
            'nama_cus',
            'no_cus',
            'produk_id',
            'catatan_custom',
            'tanggal_order',
            'booking_method',
            'alamat',
        )->get();
    }

    public function headings(): array
    {
        return [
            'Nama Pelanggan',
            'Nomor HP',
            'ID Produk',
            'Catatan Pelanggan',
            'Tanggal Order',
            'Metode Pemesanan',
            'Alamat Pengiriman',
        ];
    }
}
