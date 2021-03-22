@extends('layouts.admin.master')
@section('content')
@section('title', 'Data Jenazah')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Tables</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
                        </ol>
                    </nav>
                </div>

                <div class="col-lg-6 col-5 text-right">
                    <a href="{{ route('tambahJenazah') }}" class="btn btn-sm btn-neutral">Tambah Jenazah</a>
                    <a href="{{ route('import-jenazah') }}"
                        onclick="return confirm('Mengimport data baru berarti menghapus data lama, apakah anda ingin melanjutkan. note* waktu yang dibutuhkan untuk mengimport data munkin relative lama tergantung jumlah datanya.')"
                        class="btn btn-sm btn-neutral">Import data jenazah</a>
                </div>
            </div>
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                <strong>Success!</strong> {{ session('success') }}
            </div>
            @endif
        </div>
    </div>
</div>
<!-- Page content -->


<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">List Jenazah</h3>
                    <br>
                    <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main"
                        method="GET" action="/data-jenazah">
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input name="cari" class="form-control" placeholder="Search" type="text">
                            </div>
                        </div>
                        <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main"
                            aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </form>
                </div>

                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">Blok</th>
                                <th scope="col" class="sort" data-sort="budget">Nama Jenazah</th>
                                <th scope="col" class="sort" data-sort="status">Tgl. Lahir</th>
                                <th scope="col" class="sort" data-sort="status">Tgl. Wafat</th>
                                <th scope="col" class="sort" data-sort="status">Agama</th>
                                <th scope="col" class="sort" data-sort="status">Alamat</th>
                                <th scope="col" class="sort" data-sort="status">Rumah Sakit</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($data_jenazah as $jenazah)
                            <tr>
                                <th scope="row">
                                    <div class="media-body">
                                        <span class="name mb-0 text-sm">{{ $jenazah->blok }}</span>
                                    </div>
                                </th>
                                <td class="budget">
                                    {{ $jenazah->nama }}
                                </td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <span class="status">{{ $jenazah->tgl_lahir }}</span>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <span class="status">{{ $jenazah->tgl_wafat }}</span>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <span class="status">{{ $jenazah->agama }}</span>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <span class="status">{{ $jenazah->alamat }}</span>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <span class="status">{{ $jenazah->rumah_sakit }}</span>
                                    </span>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item"
                                                href="/data-jenazah/{{ $jenazah->id }}/ubah">Edit</a>
                                            <a class="dropdown-item" href="/data-jenazah/{{ $jenazah->id }}/hapus"
                                                onclick="return confirm('Yakin ingin menghapus?')">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Card footer -->
                <div class="card-footer py-4">
                    {{ $data_jenazah->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    @endsection
