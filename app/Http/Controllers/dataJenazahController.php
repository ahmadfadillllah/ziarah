<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class dataJenazahController extends Controller
{
    public function index()
    {
        $data_jenazah = \App\Models\dataJenazah::paginate(5);
        return view('layouts.admin.data-jenazah',['data_jenazah' => $data_jenazah]);
    }

    public function create(Request $request)
    {
        if($request->has('cari')){
            $data_jenazah = \App\Models\dataJenazah::where('nama', 'LIKE', '%' .$request->cari. '%')->get();
        }
        else{
            $data_jenazah = \App\Models\dataJenazah::all();
        }
        return view('layouts.admin.jenazah.tambah');
    }

    public function post(Request $request)
    {
        \App\Models\dataJenazah::create($request->all());
        return redirect('/data-jenazah')->with('success', 'Berhasil Menambahkan Jenazah');
    }

    public function ubah($id)
    {
        $jenazah = \App\Models\dataJenazah::find($id);
        return view('layouts.admin.jenazah.ubah', ['jenazah' => $jenazah]);
    }

    public function edit(Request $request, $id)
    {
        $jenazah = \App\Models\dataJenazah::find($id);
        $jenazah->update($request->all());
        return redirect('/data-jenazah')->with('success', 'Berhasil Mengubah Jenazah');
    }

    public function hapus($id)
    {
        $jenazah = \App\Models\dataJenazah::find($id);
        $jenazah->delete($jenazah);
        return redirect('/data-jenazah')->with('success', 'Berhasil Menghapus Jenazah');
    }
}
