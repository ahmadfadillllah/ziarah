@extends('layouts.admin.master')
@section('content')
@section('title', 'Ubah Data Jenazah')

<div class="header pb-6 d-flex align-items-center"
    style="min-height: 100px;">
    <!-- Mask -->
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-8 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">@yield('title') </h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/data-jenazah/{{$jenazah->id}}/edit" method="POST">
                        {{ csrf_field() }}
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">Blok</label>
                                        <input type="text" name="blok" class="form-control" value="{{ $jenazah->blok }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Nama</label>
                                        <input type="text" name="nama" class="form-control" value="{{ $jenazah->nama }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">Tanggal Lahir</label>
                                        <input type="date" name="tgl_lahir" class="form-control"
                                        value="{{ $jenazah->tgl_lahir }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">Tanggal Wafat</label>
                                        <input type="date" name="tgl_wafat" class="form-control"
                                        value="{{ $jenazah->tgl_wafat }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">Agama</label>
                                        <input type="text" name="agama" class="form-control" value="{{ $jenazah->agama }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">Rumah Sakit</label>
                                        <input type="text" name="rumah_sakit" class="form-control"
                                        value="{{ $jenazah->rumah_sakit }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-address">Alamat</label>
                                        <input name="alamat" class="form-control" value="{{ $jenazah->alamat }}" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-5 text-left">
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
