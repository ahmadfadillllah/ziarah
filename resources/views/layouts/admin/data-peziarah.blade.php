@extends('layouts.admin.master')
@section('content')
@section('title', 'Data Peziarah')

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
                {{-- <div class="col-lg-6 col-5 text-right">
                    <a href="#" class="btn btn-sm btn-neutral">New</a>
                    <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                </div> --}}
            </div>
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
                    <h3 class="mb-0">List Peziarah</h3>
                    <br>
                    <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main"
                            method="GET" action="/data-peziarah">
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
                                <th scope="col" class="sort" data-sort="budget">Nama Peziarah</th>
                                <th scope="col" class="sort" data-sort="status">Email</th>
                                <th scope="col" class="sort" data-sort="status">Jenis Kelamin</th>
                                <th scope="col" class="sort" data-sort="status">No. Handphone</th>
                                <th scope="col" class="sort" data-sort="status">Nama Jenazah</th>
                                <th scope="col" class="sort" data-sort="status">Alamat</th>
                                <th scope="col" class="sort" data-sort="status">Waktu ziarah</th>
                                <th scope="col" class="sort" data-sort="status">Tanggal ziarah</th>
                                {{-- <th scope="col">Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($peziarah as $_peziarah)

                            <tr>
                                {{-- <th scope="row">
                                    <div class="media-body">
                                        <span class="name mb-0 text-sm">{{ $_peziarah['blok'] }}</span>
                </div>
                </th> --}}
                <td class="budget">
                    {{ $_peziarah->nama }}
                </td>
                <td>
                    <span class="badge badge-dot mr-4">
                        <span class="status">{{ $_peziarah->email }}</span>
                    </span>
                </td>
                <td>
                    <span class="badge badge-dot mr-4">
                        <span class="status">{{ $_peziarah->jenis_kelamin }}</span>
                    </span>
                </td>
                <td>
                    <span class="badge badge-dot mr-4">
                        <span class="status">{{ $_peziarah->no_hp }}</span>
                    </span>
                </td>
                <td>
                    <span class="badge badge-dot mr-4">
                        <span class="status">{{ $_peziarah->jenazah->nama }}</span>
                    </span>
                </td>
                <td>
                    <span class="badge badge-dot mr-4">
                        <span class="status">{{ $_peziarah->jenazah->alamat }}</span>
                    </span>
                </td>
                <td>
                    <span class="badge badge-dot mr-4">
                        <span class="status">
                            {{ $_peziarah->waktu_ziarah[0]->dari }} -
                            {{ $_peziarah->waktu_ziarah[0]->sampai }} :
                            {{ $_peziarah->waktu_ziarah[0]->tipe }}
                        </span>
                    </span>
                </td>
                <td>
                    <span class="badge badge-dot mr-4">
                        <span class="status">
                            {{ $_peziarah->tanggal_ziarah[0]->tanggal }} -
                            {{ $_peziarah->tanggal_ziarah[0]->bulan }} -
                            {{ $_peziarah->tanggal_ziarah[0]->tahun }}
                        </span>
                    </span>
                </td>
                {{-- <td class="text-right">
                    <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </div>
                </td> --}}
                </tr>
                @endforeach
                </tbody>
                </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">

                {{ $peziarah->links('pagination::bootstrap-4') }}

            </div>
        </div>
    </div>
</div>
@endsection
