<?php

namespace App\Exports;

use App\Transaksis;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TransaksiExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    public function collection()
    {
        return Transaksis::all();
    }
    public function headings(): array
    {
        return [
            'Harga Jual',
            'Nama Barang',
            'Jumlah Beli',
            'Total Harga',
            'Tanggal Beli',
        ];
    }
}
