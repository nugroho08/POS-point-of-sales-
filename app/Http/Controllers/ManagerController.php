<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;


class ManagerController extends Controller
{
    public function index()
    {
        return view('manager.layouts.main');
    } 
    
    //Admin
    public function index_admin()
    {
       
        $data  = User::role('admin')->get();
        //dd($data);
        //$merek = Merek::all();
        return view('manager.layouts.admin.index', compact('data'));//->withData($data);
 
    }
    
    public function create_admin()
    {
        return view('manager.layouts.admin.create');

    }

    public function store_admin(Request $request)
    {
        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $data->assignRole('admin');
            return redirect()->route('manager.admin')
                ->with('success','Produk Berhasil Ditambah');
    }

    public function destroy_admin($id)
    {
        $data = User::findorfail($id);
        $data->delete();
        return back()->with('delete', 'Data berhasil dihapus');
    }

    //Kasir
    public function index_kasir()
    {
       
        $data  = User::role('kasir')->get();
        //dd($data);
        //$merek = Merek::all();
        return view('manager.layouts.kasir.index', compact('data'));//->withData($data);
 
    }
    
    public function create_kasir()
    {
        return view('manager.layouts.kasir.create');

    }

    public function store_kasir(Request $request)
    {
        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $data->assignRole('kasir');
            return redirect()->route('manager.kasir')
                ->with('success','Produk Berhasil Ditambah');
    }

    public function destroy_kasir($id)
    {
        $data = User::findorfail($id);
        $data->delete();
        return back()->with('delete', 'Data berhasil dihapus');
    }

}
