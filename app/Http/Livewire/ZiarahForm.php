<?php

namespace App\Http\Livewire;

use App\Models\{Jenazah, Peziarah, TanggalZiarah, WaktuZiarah};
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class ZiarahForm extends Component
{
    public $nama, $jenis_kelamin, $email, $no_hp;

    public $jenazah_id, $namaJenazah, $alamat_jenazah;

    public $tanggal_dipilih, $waktu_dipilih;

    public $suggestion_name = [];

    public $waktu_ziarah = [];

    public function mount()
    {
        $this->dapatkanJadwal();
        $this->dapatkanTanggal();

        $this->fakeData();

        $this->resetWaktuZiarah("Masukkan tanggal terlebih dahulu");
    }

    private function fakeData()
    {

        $peziarah = Peziarah::factory()->make();

        $this->nama     =   $peziarah->nama;
        $this->email    =   $peziarah->email;
        $this->jenis_kelamin    =   "pria";
        $this->no_hp    =   $peziarah->no_hp;

        // ...
    }

    private function dapatkanTanggal()
    {

        $tanggal_ziarah = TanggalZiarah::where('aktif', '=', 1)->get();

        if (count($tanggal_ziarah) === 0) {
            return [
                [
                    'id'        =>  null,
                    'pesan'     =>  "Jadwal tidak tersedia"
                ]
            ];
        }

        return $tanggal_ziarah;

        // ...
    }

    /**
     *  Fungsi untuk mendapatkan jadwal yang tersedia
     */
    private function dapatkanJadwal()
    {
        $waktu_ziarah = WaktuZiarah::get();

        if (count($waktu_ziarah) === 0) {
            return $this->resetWaktuZiarah();
        }

        return  $waktu_ziarah;

        // ...
    }

    private function resetWaktuZiarah($msg = "Jadwal tidak tersedia")
    {
        return $this->waktu_ziarah = [
            [
                'id'        =>  null,
                'pesan'    =>  $msg
            ]
        ];
    }

    public function updatedTanggalDipilih($k, $v)
    {
        try {
            $tanggal = TanggalZiarah::find($this->tanggal_dipilih);

            $waktu = $tanggal->waktu()->where('kuota', '<', 2)->get();

            if (count($waktu) === 0) {
                return $this->resetWaktuZiarah('Jadwal tidak tersediah, silahkan cari tanggal lain.');
            }

            return $this->waktu_ziarah = $waktu;

            // ...
        } catch (\Exception $e) {

            return $this->resetWaktuZiarah("Silahkan masukkan tanggal ziarah terlebih dahulu.");

            // ...
        }
    }

    public function updatedNamaJenazah($k, $v)
    {
        $this->cariJenazah();
    }

    public function render()
    {
        $data['tanggal_ziarah'] =   $this->dapatkanTanggal();

        $view = (object) view('livewire.ziarah-form', $data);
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
            'tanggal_dipilih' =>  ['required'],
            'waktu_dipilih' =>  ['required'],
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
            'tanggal_dipilih.required'   => 'Harap masukkan tanggal ziarah.',
            'waktu_dipilih.required'     => 'Silahkan memilih waktu ziarah.',

            // Field jenis kelamin
            'jenis_kelamin.required' =>  "Silahkan masukkan jenis kelamin dari peziarah.",

            // Field no hp
            'no_hp.required'    => 'Silahkan masukkan no whatsapp yang aktif.',
            'no_hp.numeric'     => 'Kolom nomor hp hanya boleh berisikan angka.',
            'no_hp.unique'      => 'Nomor telepon(whatsapp) telah terdaftar!, Silahkan masukkan nomor baru.',

        ];

        // validasi input
        $this->validate($aturan, $pesan);

        try {

            $jenazah = Jenazah::find($this->jenazah_id);

            if (($jenazah instanceof Jenazah) === false) {
                throw new \Exception("Nama jenazah tidak ditemukan.");
            }

            $data['nama']           =   $this->nama;
            $data['jenazah_id']     =   $this->jenazah_id;
            $data['jenis_kelamin']  =   $this->jenis_kelamin;
            $data['email']          =   $this->email;
            $data['no_hp']          =   $this->no_hp;

            $peziarah = $jenazah->peziarah()->create($data);

            if ($peziarah instanceof Peziarah) {
                $peziarah->waktu_ziarah()->attach($this->waktu_dipilih, [
                    'tanggal_id' => $this->tanggal_dipilih,
                ]);

                $tanggal_dipilih    =   TanggalZiarah::find($this->tanggal_dipilih);

                $que_builder      =   $tanggal_dipilih->waktu()->where('waktu_id', $this->waktu_dipilih);

                $kuota  =   $que_builder->first()->pivot->kuota;

                $que_builder->update([
                    'kuota' =>  $kuota + 1,
                ]);

                // ...
            }

            if (!$peziarah) throw new \Exception("Gagal menambahkan peziarah.");

            // reset semua property user
            $this->reset(
                'nama',
                'namaJenazah',
                'jenazah_id',
                'jenis_kelamin',
                'alamat_jenazah',
                'waktu_dipilih',
                'tanggal_dipilih',
                'email',
                'no_hp',
            );

            $this->resetWaktuZiarah();

            $this->dapatkanJadwal();

            return  $this->dispatchBrowserEvent('onActionInfo', [
                'type'    =>    'success',
                'title'   =>    "Berhasil mendaftarkan peziarah!",
                'message' =>    "Kami akan mengirimkan pemberitahuan terkait jadwal
                                anda melalui email atau whatsapp yang telah anda
                                masukkan & harap mematuhi protokol kesehatan.",
            ]);

            // ...
        } catch (\Exception $e) {

            return $this->dispatchBrowserEvent('onActionInfo', [
                'type'      =>  'error',
                'title'     =>  "Error!!",
                'message'   =>  $e->getMessage(),
            ]);

            // ...
        }

        // ...
    }

    // ...
}
