<?php

namespace App\Exports;

use App\Produk;
use App\Detailproduk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BarangExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    public function collection()
    {
        return Detailproduk::all();
    }
    public function headings(): array
    {
        return [
            'ID',
            'Nama Barang',
            'Tanggal Masuk',
            'Harga Barang',
            'Harga Jual',
            'Stok Barang',
            'Nama Merek',
            'Nama Distributor',
        ];
    }
}
