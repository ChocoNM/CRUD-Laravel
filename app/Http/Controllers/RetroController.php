<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Retro;
 
class RetroController extends Controller
{
    public function index()
    {
        $retros = Retro::orderBy('id', 'desc')->get();
        $total = Retro::count();
        return view('admin.retro.home', compact(['retros', 'total']));
    }
 
    public function create()
    {
        return view('admin.retro.create');
    }
 
    public function save(Request $request)
    {
        $validation = $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'tahun' => 'required',
            'harga' => 'required',
        ]);
        $data = Retro::create($validation);
        if ($data) {
            session()->flash('success', 'Product Add Successfully');
            return redirect(route('dashboard/retro'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin.retro/create'));
        }
    }
    public function edit($id)
    {
        $retros = Retro::findOrFail($id);
        return view('admin.retro.update', compact('retros'));
    }
 
    public function delete($id)
    {
        $retros = Retro::findOrFail($id)->delete();
        if ($retros) {
            session()->flash('success', 'Products Deleted Successfully');
            return redirect(route('dashboard/retro'));
        } else {
            session()->flash('error', 'Products Not Delete successfully');
            return redirect(route('dashboard/retro'));
        }
    }
 
    public function update(Request $request, $id)
    {
        $retros = Retro::findOrFail($id);
        $nama = $request->nama;
        $jenis = $request->jenis;
        $tahun = $request->tahun;
        $harga = $request->harga;
 
        $retros->nama = $nama;
        $retros->jenis = $jenis;
        $retros->tahun = $tahun;
        $retros->harga = $harga;
        $data = $retros->save();
        if ($data) {
            session()->flash('success', 'Retro Update Successfully');
            return redirect(route('dashboard/retro'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('dashboard/retro/update'));
        }
    }
}