@extends('layout.app')

@section('title', 'Dashboard')
@section('bodyClass', 'fixed-header dashboard menu-pin menu-behind')

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Dashboard</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Home</a></li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW-1 -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">

                <div class="card overflow-hidden">
                    <div class="card-body text-center" style="font-size: 20px;">
                        <br /><br /><br />
                        <b>
                            <div class="m-b-5">
                                SELAMAT DATANG
                            </div>
                            <div class="m-b-5">
                                di
                            </div>
                            <div class="m-b-5">
                                <span style="font-weight: bold; font-size: 40px;">Admin Belajar Online<i></i></span>
                            </div>
                            Belajar Online
                            <br /><br /><br /><br />
                        </b>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- ROW-1 END -->

@endsection
