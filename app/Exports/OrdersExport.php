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
            'jenis_order',
            'catatan_custom',
            'tanggal_order',
            'tanggal_booking',
            'jam_booking'
        )->get();
    }

    public function headings(): array
    {
        return [
            'Nama Customer',
            'No HP',
            'Produk ID',
            'Jenis Order',
            'Catatan Custom',
            'Tanggal Order',
            'Tanggal Booking',
            'Jam Booking'
        ];
    }
}
