<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// excel
use Maatwebsite\Excel\Facades\Excel;
// export
use App\Exports\OrdersExport;
// import
use App\Imports\OrdersImport;


class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('produk')->orderBy('tanggal_order', 'desc')->paginate(10);
        return view('admin.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::with('produk')->findOrFail($id);
        return view('admin.order.detail', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = DB::table('order')->where('id', $id)->delete();

        if ($deleted) {
            return redirect()->route('admin.order.index')->with('success', 'Order Produk berhasil dihapus!');
        } else {
            return redirect()->route('admin.order.index')->with('error', 'Order Produk tidak ditemukan!');
        }
    }
    
    /**
     * Export orders to Excel.
     */
    public function export()
    {
        return Excel::download(new OrdersExport, 'data-order.xlsx')->deleteFileAfterSend(true);
    }
}
