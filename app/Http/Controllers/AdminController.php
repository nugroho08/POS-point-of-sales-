<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Produk;
use App\Distri;
use App\Merek;

 
class AdminController extends Controller
{
     public function index()
    {
        return view('admin.layouts.main');
    } 
 
    //produk
    public function index_produk()
    {
       
        $data  = Produk::orderBy('created_at', 'DESC')->get();
        //dd($data);
        //$merek = Merek::all();
        return view('admin.layouts.produk.index', compact('data'));//->withData($data);
 
    } 
 
 
 
    public function create()
    {   
        //$data  = Produk::all();
        $merek = Merek::all();
        $distributor = Distri::all();
        //$page_data['data'] = $data;
       // $page_merek['merek'] = $merek;
        return view('admin.layouts.produk.create' , compact('merek', ('distributor')));//$page_data ,$page_merek 
    }
 
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_barang'=>'required|string',
            'id_merek'=>'required',
            'id_distributor'=>'required',
            'tanggal_masuk'=>'required',
            'harga_barang'=>'required',
            'hargajual'=>'required',
            'stok_barang'=>'required',
            'keterangan'=>'required',
            ]);
            Produk::create([
                'nama_barang' => $request->nama_barang,
                'id_merek' => $request->id_merek,
                'id_distributor' => $request->id_distributor,
                'tanggal_masuk' => $request->tanggal_masuk,
                'harga_barang' => $request->harga_barang,
                'hargajual' => $request->hargajual,
                'stok_barang' => $request->stok_barang,
                'keterangan' => $request->keterangan,
            ]);
 
        return redirect()->route('admin.index')
                        ->with('success','Produk Berhasil Ditambah');
 
    } 
    
    public function edit($id)
    {
        $data = Produk::findorfail($id);
        $merek = Merek::all();
        $distributor = Distri::all();
        //dd($merek);
        return view('admin.layouts.produk.edit', compact('data', 'merek', 'distributor'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_barang'=>'required|string',
            'id_merek'=>'required',
            'id_distributor'=>'required',
            'tanggal_masuk'=>'required',
            'harga_barang'=>'required',
            'hargajual'=>'required',
            'stok_barang'=>'required',
            'keterangan'=>'required',
            ]);
        $data = Produk::findorfail($id);
        $data->update($request->all());
        
 
        return redirect()->route('admin.index')->with('message','Data Berhasil Diupdate');
 
    } 
   
    public function destroy($id)
    {
        $data = Produk::findorfail($id);
        $data->delete();
        return back()->with('delete', 'Data berhasil dihapus');
    }

    //Distributor
    public function index_distributor()
    {
        $data  = Distri::all();
        return view('admin.layouts.distributor.index')->withData($data);
    } 

    public function create_distributor()
    {   
        $data  = Distri::all();
        $page_data['data'] = $data;
        return view('admin.layouts.distributor.create', $page_data);
    }
 
    public function store_distributor(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'nama_distributor'=>'required',
            'alamat'=>'required',
            'no_tlp'=>'required',
        ]);
            Distri::create([
                'nama_distributor' => $request->nama_distributor,
                'alamat' => $request->alamat,
                'no_tlp' => $request->no_tlp,
                
            ]);
 
        return redirect()->route('admin.distributor')
                        ->with('success','Distributor Berhasil Ditambah');
 
    } 
    public function edit_distributor($id)
    {
        $data = Distri::findorfail($id);
        $page_data['data'] = $data;
        return view('admin.layouts.distributor.edit', $page_data);
    }
    public function update_distributor(Request $request, $id)
    {
        $this->validate($request, [
            'nama_distributor'=>'required',
            'alamat'=>'required',
            'no_tlp'=>'required',
            ]);
        $data = Distri::findorfail($id);
        $data->update($request->all());
        
 
        return redirect()->route('admin.distributor')->with('message','Data Berhasil Diupdate');
 
    }
    public function destroy_distributor($id)
    {
        $data = Distri::findorfail($id);
        $data->delete();
        return back()->with('delete', 'Data berhasil dihapus');
    }

    //Merek
    public function index_merek()
    {
        $data  = Merek::all();
        return view('admin.layouts.merek.index')->withData($data);
    } 
    public function create_merek()
    {   
        $data  = Merek::all();
        $page_data['data'] = $data;
        return view('admin.layouts.merek.create', $page_data);
    }
 
    public function store_merek(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'nama_merek'=>'required',
        ]);
            Merek::create([
                'nama_merek' => $request->nama_merek,
                
            ]);
 
        return redirect()->route('admin.merek')
                        ->with('success','Distributor Berhasil Ditambah');
 
    } 
    public function edit_merek($id)
    {
        $data = Merek::findorfail($id);
        $page_data['data'] = $data;
        return view('admin.layouts.merek.edit', $page_data);
    }
    public function update_merek(Request $request, $id)
    {
        $this->validate($request, [
            'nama_merek'=>'required',
            ]);
        $data = Merek::findorfail($id);
        $data->update($request->all());
        
 
        return redirect()->route('admin.merek')->with('message','Data Berhasil Diupdate');
 
    }
    public function destroy_merek($id)
    {
        $data = Merek::findorfail($id);
        $data->delete();
        return back()->with('delete', 'Data berhasil dihapus');
    }

    
 
}