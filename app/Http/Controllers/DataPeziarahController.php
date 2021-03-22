<?php

namespace App\Http\Controllers;

use App\Models\Peziarah;
use Illuminate\Http\Request;

class DataPeziarahController extends Controller
{
    public function index()
    {

        $data['peziarah']   =   Peziarah::paginate(5);
        // dd($data['peziarah'][0]->tanggal_ziarah[0]);
        return view('layouts.admin.data-peziarah', $data);
    }
}
