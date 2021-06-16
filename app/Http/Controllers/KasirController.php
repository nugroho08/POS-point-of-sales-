<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Transaksi;
use App\Produk;
use App\detail_transaksi;
use App\transaksis;
use Darryldecode\Cart\CartCondition;




class KasirController extends Controller
{
    public function index()
    {
        return view('kasir.layouts.main');
    } 

    //Transaksi
    public function index_transaksi()
    {
       //$detail_transaksi= detail_transaksi::all();

       //$level = Auth::user()->level;
       
        //$barangs = Produk::all();

        //$kasirs = Transaksi::where('total_harga', '=', 0)->first();


        $data  = Transaksi::orderBy('created_at', 'DESC')->get();

        $transaksib = Transaksi::where('total_bayar', '>', '0')->get();

        $check = Transaksi::where('total_bayar', '=', '0')->first();

        //dd($data);
        //$merek = Merek::all();
        return view('kasir.layouts.transaksi.index', compact('data'));//->withData($data);
 
    } 

    public function create_transaksi()
    {   
        $data  = Produk::where('stok_barang', '>', 0)->get();
        $transaksi = Transaksi::all();

        return view('kasir.layouts.transaksi.create', compact('data', 'transaksi'));
    }
 
    public function store_transaksi(Request $request)
    {
            
            $this->validate($request, [
                'id_transaksi'=>'required|string',
                'id_barang'=>'required',
                'id_user'=>'required',
                'jumlah_beli'=>'required',
                'total_harga'=>'required|min:0',
                'tanggal_beli'=>'required',
                'total_bayar'=>'required',
                'kembalian'=>'required',
                ]);
        $data = Produk::find($request->id_barang);
        $total_harga = $request->jumlah_beli * $data->hargajual;

        $kembalian = $request->total_bayar - $total_harga;

        $sisa_stok = $data->stok_barang - $request->jumlah_beli;
        
        $data->update([
            'stok_barang' => $sisa_stok
        ]);
                Transaksi::create([
                    'id_transaksi' => $request->id_transaksi,
                    'id_barang' => $request->id_barang,
                    'id_user' => $request->id_user,
                    'jumlah_beli' => $request->jumlah_beli,
                    'total_harga' => $request->total_harga,
                    'tanggal_beli' => $request->tanggal_beli,
                    'total_bayar' => $request->total_bayar,
                    'kembalian' => $request->kembalian,
                ]);
    
            return redirect()->route('kasir.transaksi')
                            ->with('success','Transaksi Berhasil Ditambah');
    
        } 
       
}
