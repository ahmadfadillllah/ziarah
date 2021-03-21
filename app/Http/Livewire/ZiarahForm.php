<?php

namespace App\Http\Livewire;

use App\Models\{Jadwal, Jenazah, Peziarah};
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class ZiarahForm extends Component
{
    public $daftar_jadwal = [];

    public $nama, $jenis_kelamin, $email, $no_hp, $jadwal;

    public $jenazah_id, $namaJenazah, $alamat_jenazah;

    public $suggestion_name = [];

    public function mount()
    {
        $this->dapatkanJadwal();
    }

    /**
     *  Fungsi untuk mendapatkan jadwal yang tersedia
     */
    private function dapatkanJadwal()
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
        $view = (object) view('livewire.ziarah-form');
        return $view->extends('layouts.form.dashboard')->section('content');
    }

    /**
     *  Fungsi untuk mencari jenazah berdasarkan nama jenazah
     */
    public function cariJenazah(): void
    {
        $result = Jenazah::where('nama', 'LIKE', "%$this->namaJenazah%")
            ->get(['id', 'nama', 'blok']);

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

    /**
     *  Fungsi untuk mendapatkan data lenkap dari jenazah
     *  berdasarkan nama yang di masukkan peziarah
     */
    public function dapatkanDataLenkap(string $id): void
    {
        try {

            $id     =   Crypt::decrypt($id);
            $jenazah_data = Jenazah::find($id);

            $this->namaJenazah      =   $jenazah_data->nama;
            $this->jenazah_id       =   $jenazah_data->id;
            $this->alamat_jenazah   =   $jenazah_data->alamat;
            $this->suggestion_name  =   [];

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

    /**
     *  Fungsi untuk menyimpan data yang telah diinput
     */
    public function simpan()
    {

        $aturan = [
            'nama'          =>  ['required', 'min:2', 'max:150'],
            'namaJenazah'   =>  ['required'],
            'email'         =>  ['required', 'email', 'unique:peziarah,email'],
            'jadwal'        =>  ['required'],
            'jenis_kelamin' =>  ['required'],
            'no_hp'         =>  ['required', 'numeric', 'unique:peziarah,no_hp'],
        ];

        // Pesan validasi jika error
        $pesan = [

            // Field nama
            'nama.required' =>  'Harap masukan nama peziarah!',
            'nama.min'      =>  'Nama peziarah tidak boleh kurang dari 2 karakter',
            'nama.max'      =>  'Nama peziarah tidak boleh lebug dari 150 karakter',

            // Field nama jenazah
            'namaJenazah.required' => 'Harap masukkan nama dari jenazah!',

            // Field email
            'email.required'    => "Harap masukan email.",
            'email.email'       => "Harap masukan email yang valid/benar.",
            'email.unique'      => "Email ini telah terdaftar!, silahkan masukkan email baru.",

            // Field jadwal
            'jadwal.required'   => 'Harap masukkan jadwal.',

            // Field jenis kelamin
            'jenis_kelamin.required' =>  "Silahkan masukkan jenis kelamin dari pezirah.",

            // Field no hp
            'no_hp.required'    => 'Silahkan masukkan no whatsapp yang aktif.',
            'no_hp.numeric'     => 'Kolom nomor hp hanya boleh berisikan angka.',
            'no_hp.unique'      => 'Nomor telepon(whatsapp) telah terdaftar!, Silahkan masukkan nomor baru.',

        ];

        // validasi input
        $this->validate($aturan, $pesan);

        try {

            $jadwal_id  =   $this->jadwal;

            $jadwal     =   Jadwal::find($jadwal_id);

            if ($jadwal->peziarah->count() > 2)
                throw new \Exception("Jadwal yang anda masukkan telah mencapai kuota yg telah ditentukan.");

            $kuota  = $jadwal->kuota;

            $data['nama']           =   $this->nama;
            $data['jenazah_id']     =   $this->jenazah_id;
            $data['jenis_kelamin']  =   $this->jenis_kelamin;
            $data['jadwal_id']      =   $this->jadwal;
            $data['email']          =   $this->email;
            $data['no_hp']          =   $this->no_hp;

            $jenazah = Jenazah::find($this->jenazah_id);

            $result = $jenazah->peziarah()->create($data);

            if (!$result) throw new \Exception("Gagal menambahkan peziarah.");

            $jadwal->update([
                'kuota' =>  $kuota + 1,
            ]);

            // reset semua property user
            $this->reset(
                'nama',
                'namaJenazah',
                'jenazah_id',
                'jenis_kelamin',
                'alamat_jenazah',
                'jadwal',
                'email',
                'no_hp',
            );

            $this->dapatkanJadwal();

            return  $this->dispatchBrowserEvent('onActionInfo', [
                'type'    =>    'success',
                'title'   =>    "Berhasil mendaftarkan peziarah!",
                'message' =>    "Kami akan mengirimkan pemberitahuan terkait jadwal
                                anda melalui email atau whatsapp yang telah anda masukkan",
            ]);

            // ...
        } catch (\Exception $e) {

            $this->dispatchBrowserEvent('onActionInfo', [
                'type'      =>  'error',
                'title'     =>  "Error",
                'message'   =>  $e->getMessage(),
            ]);

            // ...
        }

        // ...
    }

    // ...
}
