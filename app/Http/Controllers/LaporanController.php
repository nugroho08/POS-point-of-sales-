<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Produk;
use App\Exports\BarangExport;
use App\Exports\TransaksiExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::latest()->paginate(5);
 
        return view('manager.layouts.laporan.transaksi',compact('transaksi'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function barang()
    {
        $barang = Produk::latest()->paginate(5);
 
        return view('manager.layouts.laporan.barang',compact('barang'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function cari(Request $request)
    {
        $request->validate([
            'startDate'=> 'required',
            'endDate'=> 'required',
            ]);
        $from = $request->startDate;
        $to = $request->endDate;
        $title="Laporan From: ".$from."To:".$to;
        $startDate = $from.' 00:00:00';
        $endDate = $to.' 23:59:59';
 
        $transaksi = Transaksi::whereBetween('tanggal_beli', [$startDate,$endDate])->latest()->paginate(5);
 
        return view('manager.layouts.laporan.transaksi', compact('transaksi', 'startDate', 'endDate'))->with('i', (request()->input('page', 1) - 1) * 5);;
    }
    public function exporttransaksi() 
    {
        return Excel::download(new TransaksiExport, 'transaksi.xlsx');
    }

    public function search(Request $request)
    {
        $request->validate([
            'startDate'=> 'required',
            'endDate'=> 'required',
            ]);
        $from = $request->startDate;
        $to = $request->endDate;
        $title="Laporan From: ".$from."To:".$to;
        $startDate = $from.' 00:00:00';
        $endDate = $to.' 23:59:59';
 
        $barang = Produk::whereBetween('tanggal_masuk', [$startDate,$endDate])->latest()->paginate(5);
 
        return view('manager.layouts.laporan.barang', compact('barang', 'startDate', 'endDate'))->with('i', (request()->input('page', 1) - 1) * 5);;
    }
    public function exportbarang() 
    {
        return Excel::download(new BarangExport, 'Produk.xlsx');
    }
}
