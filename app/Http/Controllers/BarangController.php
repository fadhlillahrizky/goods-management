<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Good;
use Illuminate\Support\Facades\DB;
class BarangController extends Controller
{
    //
    public function index()
    {
        $data = DB::table('goods')->paginate(10);
        return view('goods.index',['data' => $data]);
    }

    public function search(Request $request)
	{
		// menangkap data pencarian
		$search = $request->search;
 
    		// mengambil data dari table sesuai pencarian data
		$data = DB::table('goods')
		->where('NamaBarang','like',"%".$search."%")
		->paginate();
 
    		// mengirim data pegawai ke view index
        return view('goods.index',['data' => $data]);
    }

    public function store(Request $request)
    {
        // \App\Good::create($request->all());
        // return redirect('/barang')->with('success','Data Berhasil Diinput');
        $this->validate($request, [
			'FotoBarang' => 'required|file|image|mimes:jpeg,png,jpg|max:100',
			'NamaBarang' => 'required|unique:goods,NamaBarang',
			'HargaBeli' => 'required|numeric',
			'HargaJual' => 'required|numeric',
			'Stok' => 'required|numeric',
        ]);
        
        $good = new Good();
        $good->NamaBarang = $request->input('NamaBarang');
        $good->HargaBeli = $request->input('HargaBeli');
        $good->HargaJual = $request->input('HargaJual');
        $good->Stok = $request->input('Stok');

        if ($request->hasFile('FotoBarang')) {
            $file = $request->file('FotoBarang');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/FotoBarang/', $filename);
            $good->FotoBarang = $filename;
        } else {
            // return $request;
            $good->FotoBarang = '';
        }

        $good->save();
        return redirect('/barang')->with('success','Data Berhasil Diinput');
        
    }
    public function edit($id)
    {
        $barang = \App\Good::find($id);
        return view('goods.edit',['barang' => $barang]);
    }
    public function update(Request $request, $id)
    {
        $barang = \App\Good::find($id);
        // $barang->update($request->all());
        $this->validate($request, [
			'FotoBarang' => 'required|file|image|mimes:jpeg,png,jpg|max:100',
			//'NamaBarang' => 'required|unique:goods,NamaBarang',
			'HargaBeli' => 'required|numeric',
			'HargaJual' => 'required|numeric',
			'Stok' => 'required|numeric',
        ]);
        
        // $barang = new Good();
        $barang->NamaBarang = $request->input('NamaBarang');
        $barang->HargaBeli = $request->input('HargaBeli');
        $barang->HargaJual = $request->input('HargaJual');
        $barang->Stok = $request->input('Stok');

        if ($request->hasFile('FotoBarang')) {
            $file = $request->file('FotoBarang');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/FotoBarang/', $filename);
            $barang->FotoBarang = $filename;
        } else {
            // return $request;
            $barang->FotoBarang = '';
        }

        $barang->save();
        
        return redirect('/barang')->with('success','Data berhasil Diupdate');
    }

    public function delete($id)     
    {
        $barang = \App\Good::find($id);
        $barang->delete($barang);
        return redirect('/barang')->with('success','Data berhasil dihapus');
    }
}
