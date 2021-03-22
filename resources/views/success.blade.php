@extends('layouts.form.dashboard')

@section('content')

<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">
                <img src="{{ asset('form/images/logo.png') }}" alt="" srcset="" width="150px"
                    style="display: block; margin: auto;">
                <center>
                    <h2 class="title">PENDAFTARAN ZIARAH KUBUR TPK MACANDA</h2>
                    <h5>Berhasil mendaftarkan peziarah! Kami akan mengirimkan pemberitahuan terkait jadwal
                        anda melalui email. </h5>
                </center>

                <div class="p-t-15" style="text-align:center">
                    <a href="/">
                        <button type="button" class="btn btn--radius-2 btn--blue">
                            Kembali
                        </button>
                    </a>
                </div>

            </div>
        </div>
    </div>

</div>


@endsection
