<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tokenController extends Controller
{
    public function index()
    {
        $data_token = \App\Models\Token::all();
        return view('layouts.admin.token', ['data_token' => $data_token]);
    }

    public function ubah($id)
    {
        $token = \App\Models\Token::find($id);
        return view('layouts.admin.token.ubah', ['token' => $token]);
    }

    public function edit(Request $request, $id)
    {
        $token = \App\Models\Token::find($id);
        $token->update($request->all());
        return redirect('/token')->with('success', 'Berhasil Mengubah Token');
    }
}
