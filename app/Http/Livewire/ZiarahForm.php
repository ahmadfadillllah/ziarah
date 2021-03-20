<?php

namespace App\Http\Livewire;

use App\Models\Jadwal;
use App\Models\Jenazah;
use App\Models\Peziarah;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class ZiarahForm extends Component
{

    public $daftar_jadwal = [];

    public $nama, $jenis_kelamin, $email, $no_hp;

    public $jenazah_id, $namaJenazah, $alamat_jenazah, $jadwal;

    public $suggestion_name = [];

    public function mount()
    {
        $jadwal = Jadwal::where('kuota', '<', '2')->get();

        if (count($jadwal) === 0) {
            $this->daftar_jadwal  = [
                [
                    'id'        =>  null,
                    'jadwal'    =>  "Jadwal tidak tersedia, coba lagi besok."
                ]
            ];
        } else {
            $this->daftar_jadwal = $jadwal;
        }
    }

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
        $result = Jenazah::where('nama', 'LIKE', "%$this->namaJenazah%")->get(['id', 'nama', 'blok']);

        if (count($result) === 0) {
            $result = [[
                'nama'  =>  "Nama jenazah tidak ditemukan.",
                'id'    =>  null,
                'blok'  =>  null,
            ]];
        }

        $this->suggestion_name  = $result;

        // ...
    }

    public function ubahNama(string $id)
    {

        try {

            $id     =   Crypt::decrypt($id);

            $jenazah_data = Jenazah::find($id);

            $this->namaJenazah  =   $jenazah_data->nama;
            $this->jenazah_id   =   $jenazah_data->id;
            $this->alamat_jenazah   = $jenazah_data->alamat;
            $this->suggestion_name = [];

            // ...
        } catch (\Exception $exception) {

            $this->dispatchBrowserEvent('onActionInfo', [
                'type'  =>  'error',
                'title'   => "Error",
                'message' => 'Data tidak ditemukan.',
            ]);

            // ...
        }

        // ...
    }

    public function simpan()
    {

        $aturan = [
            'nama'  =>  ['required', 'min:2', 'max:150'],
            'namaJenazah' =>  ['required'],
            'email' =>  ['required', 'email'],
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
            'email.required' => "Harap masukan email.",
            'email.email' => "Harap masukan email yang valid/benar.",

            // Field jadwal
            'jadwal.required' => 'Harap masukkan jadwal.',

            // Field no hp
            'no_hp.required' => 'Silahkan masukkan no whatsapp yng aktif.',
            'no_hp.numeric' => 'Kolom nomor hp hanya boleh berisikan angka.',

        ];

        $this->validate($aturan, $pesan);

        $data['nama']           =   $this->nama;
        $data['jenazah_id']     =   $this->jenazah_id;
        $data['jenis_kelamin']  =   $this->jenis_kelamin;
        $data['jadwal_id']      =   1;
        $data['email']          =   $this->email;
        $data['no_hp']          =   $this->no_hp;

        try {

            $jenazah = Jenazah::find($this->jenazah_id);

            $result = $jenazah->peziarah()->create($data);

            if (!$result) throw new \Exception("Gagal menambahkan peziarah.");

            return  $this->dispatchBrowserEvent('onActionInfo', [
                'type'    =>    'success',
                'title'   =>    "Berhasil",
                'message' =>    "Berhasil menambahkan data",
            ]);

            // ...
        } catch (\Exception $e) {

            $this->dispatchBrowserEvent('onActionInfo', [
                'type'  =>  'error',
                'title'   =>    "Error",
                'message' => $e->getMessage(),
            ]);

            // ...
        }

        // ...
    }

    // ...
}
