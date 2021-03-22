<?php

namespace App\Http\Controllers;

use App\Models\Peziarah;
use Illuminate\Http\Request;

class DataPeziarahController extends Controller
{
    public function index(Request $request)
    {

        if($request->has('cari')){
            $data['peziarah'] = Peziarah::where('nama', 'LIKE', '%' .$request->cari. '%')->latest()->paginate(5);
        }
        else{
            $data['peziarah'] = Peziarah::latest()->paginate(5);
        }
        // dd($data['peziarah'][0]->tanggal_ziarah[0]);
        return view('layouts.admin.data-peziarah', $data);
    }
}
