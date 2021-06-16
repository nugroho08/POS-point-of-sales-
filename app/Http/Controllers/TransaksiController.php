<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Transaction;
use App\detail_transaksi;
use App\User;
use Illuminate\Support\Carbon;

class TransaksiController extends Controller
{
    public function index()
    {
        $detail_transaksi= detail_transaksi::all();
        // $transaksis = Transaksi::latest()->paginate(5);
        $level = Auth::user()->level;

        $barangs = Produk::all();

        $kasirs = Transaction::where('total_harga', '=', 0)->first();

        $idTransaksi = Transaction::orderBy('id_transaksi', 'DESC')->first();

        $transaksib = Transaction::where('total_bayar', '>', '0')->get();

        $check = Transaction::where('total_bayar', '=', '0')->first();

        $totalHargaBarang = detail_transaksi::where('id_transaksi', '=', $idTransaksi->id_transaksi)->sum('harga_jual');

        if ($check == null) {
        Transaction::create([
        'total_bayar' => 0,
        'total_harga' => 0,
        'total_barang' => 0,
        'kembalian' => 0,
        // 'tanggal_beli' => Carbon::now()
        ]);

        $check = Transaction::where('total_bayar', '=', '0')->first();
    }

    $transaksis = View_detail_transaksi::where('id_transaksi', '=', $check->id_transaksi)
    ->get();

    $total = View_detail_transaksi::where('id_transaksi', '=', $check->id_transaksi)
    ->sum('harga_jual');

        return view('transaksis.index',compact('transaksis','level','barangs','detail_transaksi','idTransaksi', 'total', 'check'))
            ->with('i', (request()->input('page', 1) - 1) * 5);


    }
    public function create()
    {
        return view('transaksis.create',compact('barangs',$barangs));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            'id_user' => 'required',
            'qty' => 'required',
            // 'harga_jual' =>'required',

            
        ]);

        $barang_harga=Produk::where('id_barang',$request->id_barang)->first();

        if ($barang_harga->stok_barang < $request->qty) {
            return redirect('/transaksis')->with('error', 'stok barang kurang dari persediaan');
        }
        Produk::where('id_barang',$request->id_barang)
        ->first()
        ->update([
            'stok_barang' => $barang_harga->stok_barang - $request->qty,
        ]);

        $data = $request->all();

        $data['harga_jual'] = $barang_harga->harga_jual * $request->qty;
            detail_transaksi::create($data);
   
    
        return redirect()->route('transaksis.index')
                        ->with('success','Transaksi created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        return view('transaksis.show',compact('transaksis'));
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        // // $level = Auth::user()->level;
        // // $barangs = Barang::all();
        // // $detail_transaksi= detail_transaksi::all();
        // // return view('transaksis.edit',compact('transaksi', 'level','barangs',$barangs,'detail_transaksi',$detail_transaksi));

        // $totalHargaBarang = detail_transaksi::where('id_transaksi', '=', $transaksi->id_transaksi)->sum('harga_jual');
        // $jumlahQty = detail_transaksi::where('id_transaksi', '=', $transaksi->id_transaksi)->sum('qty');
        // $barangBeli = detail_transaksi::where('id_transaksi', '=', $transaksi->id_transaksi)->get();
        // // dd($barangBeli);
        // $barangs = Barang::all();
        // // $userSelect = User::all();
        // $level = Auth::user()->level;
        // $stok =  Barang::sum('stok_barang');
        // return view('transaksis.edit', compact('transaksi', 'barangs', 'level', 'stok', 'totalHargaBarang', 'jumlahQty', 'barangBeli'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        // 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail_transaksi = detail_transaksi::where('id_detail_transaksi', $id);
        $detail_transaksi->delete();
  
        return redirect()->route('transaksis.index')
                        ->with('success','Transaksi deleted successfully');
    }

    public function bayar(Request $request, $id)
    {
        if ($request->money < $request->total) {
            return redirect('/transaksis')->with('error', 'Uang kurang dari jumlah yang harus dibayar');
        }else{
        $a = Transaction::where('id_transaksi', $id)
        ->update([
            'total_bayar' => $request->money,
            'total_harga' => $request->total,
            'kembalian' => $request->money - $request->total
        ]);


        return redirect('/transaksis');
        }
    }
}