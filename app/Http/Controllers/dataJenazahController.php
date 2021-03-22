<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class dataJenazahController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_jenazah = \App\Models\dataJenazah::where('nama', 'LIKE', '%' .$request->cari. '%')->paginate(5);
        }
        else{
            $data_jenazah = \App\Models\dataJenazah::paginate(5);
        }
        return view('layouts.admin.data-jenazah',['data_jenazah' => $data_jenazah]);
    }

    public function create()
    {
        return view('layouts.admin.jenazah.tambah');
    }

    public function post(Request $request)
    {
        $request->validate([
            'nama'  =>  ['required'],
            'blok'  =>  ['nullable'],
            'alamat'    =>  ['required'],
            'agama' =>  ['nullable'],
            'rumah_sakit'   =>  ['nullable'],
            'tpk'   =>  ['nullable'],
            'tgl_lahir' =>  ['nullable'],
            'tgl_wafat' =>  ['nullable'],
            'rumah_sakit'   =>  ['nullable'],
        ]);
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
