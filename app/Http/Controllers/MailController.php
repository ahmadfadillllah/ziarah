<?php

namespace App\Http\Controllers;

use App\Mail\JadwalMail;
use App\Mail\TestEmail;
use App\Models\Peziarah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{


    public function kirimEmail($peziarah_token)
    {
        $peziarah = Peziarah::where('peziarah_token', '=', $peziarah_token)->first();
        $data = [
            'title'     =>  'Bukti pendaftaran ziarah ke TPK Macanda',
            'body'      =>  'Body test',
            'token_peziarah'    =>  $peziarah->peziarah_token,
            'nama_peziarah'     =>  $peziarah->nama,
            'email_peziarah'     =>  $peziarah->email,
            'no_hp_peziarah'     =>  $peziarah->no_hp,
            'nama_jenazah'     =>  $peziarah->jenazah->nama,
            'blok_jenazah'     =>  $peziarah->jenazah->blok,
            'alamat_jenazah'     =>  $peziarah->jenazah->alamat,
            'tanggal_ziarah'     =>  "{$peziarah->tanggal_ziarah[0]->tanggal}
                                    - {$peziarah->tanggal_ziarah[0]->bulan}
                                    - {$peziarah->tanggal_ziarah[0]->tahun}",
            'waktu_ziarah'     =>  "{$peziarah->waktu_ziarah[0]->dari}
                                    - {$peziarah->waktu_ziarah[0]->sampai}
                                    - {$peziarah->waktu_ziarah[0]->tipe}",
            'jenis_kelamin_peziarah'     =>  $peziarah->jenis_kelamin,
        ];

        Mail::to($peziarah->email)->send(new JadwalMail($data));

        return view('success');

        // return "Berhasil mendaftarkan peziarah! Kami akan mengirimkan pemberitahuan terkait jadwal anda melalui email. <a href='/'>kembali</a>";

        // ...
    }

    // ...
}
