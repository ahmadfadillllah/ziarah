<?php

namespace App\Http\Livewire;

use App\Models\Jenazah;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class ZiarahForm extends Component
{

    public $nama, $jenis_kelamin, $email, $no_hp;

    public $jenazah_id, $namaJenazah, $tgl_wafat, $jadwal;

    public $suggestion_name = [];

    public function updatedNamaJenazah($k, $v)
    {
        $this->cariJenazah();
    }

    public function render()
    {
        return view('livewire.ziarah-form')
            ->extends('layouts.form.dashboard')->section('content');
    }

    public function cariJenazah()
    {
        $result = Jenazah::where('nama', 'LIKE', "%$this->namaJenazah%")->get(['id', 'nama', 'tgl_wafat']);

        $this->suggestion_name  = $result;

        // ...
    }

    public function ubahNama(string $nama_lenkap, string $id)
    {

        $id     =   Crypt::decrypt($id);

        $this->namaJenazah  =   $nama_lenkap;
        $this->jenazah_id   =   $id;
        $this->suggestion_name = [];

        // ...
    }

    public function simpan()
    {

        $aturan = [
            'nama'  =>  ['required', 'min:2', 'max:150'],
            'namaJenazah' =>  ['required'],
            'email' =>  ['nullable', 'email'],
            'jadwal' =>  ['required'],
            'no_hp' =>  ['required', 'numeric']
        ];

        // Pesan validasi jika error
        $pesan = [

            // Field nama
            'nama.required' =>  'Harap nama peziarah di isi!',
            'nama.min' =>  'Nama peziarah tidak boleh kurang dari 2 karakter',
            'nama.max' =>  'Nama peziarah tidak boleh lebug dari 150 karakter',

            // Field nama jenazah
            'namaJenazah.required' => 'Harap masukkan nama dari jenazah!',

            // Field email
            'email.email' => "Harap masukan email yang valid/benar.",

            // Field jadwal
            'jadwal.required' => 'Harap masukkan jadwal.',

            // Field no hp
            'no_hp.required' => 'Silahkan masukkan no whatsapp yng aktif.',
            'no_hp.numeric' => 'Kolom nomor hp hanya boleh berisikan anka.',

        ];

        $this->validate($aturan, $pesan);

        $data['peziarah']       =   $this->nama;
        $data['nama_jenazah']   =   $this->namaJenazah;
        $data['jenazah_id']     =   $this->jenazah_id;
        $data['email']          =   $this->email;
        $data['tgl_wafat']      =   $this->tgl_wafat;
        $data['jenis_kelamin']  =   $this->jenis_kelamin;
        $data['jadwal']         =   $this->jadwal;
        $data['no_hp']          =   $this->no_hp;

        dd($data);

        // ...
    }

    // ...
}
