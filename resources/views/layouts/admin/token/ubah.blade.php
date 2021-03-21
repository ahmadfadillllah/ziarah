@extends('layouts.admin.master')
@section('content')
@section('title', 'Ubah Token')

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
                    <form action="/token/{{$token->id}}/edit" method="POST">
                        {{ csrf_field() }}
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">Token</label>
                                        <input type="text" name="token" class="form-control" value="{{ $token->token }}">
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
