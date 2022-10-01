@extends('layout.app')

@section('title', 'Lecture')
@section('bodyClass', 'fixed-header menu-pin menu-behind')

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Lecture</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/course">Lecture</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Lecture</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW-1 -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
        <div class="card card-default m-t-20">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="font-montserrat all-caps hint-text">Rangking</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-md-2">
                        Nama
                    </div>
                    <div class="col-6 col-md-10">
                        {{ $lecture->name }}
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-6 col-md-10">
                        <table class="table table-bordered table-sm">


                            <tr>
                              <th>
                                  No
                              </th>
                              <th>
                                  Nama
                              </th>
                              <th>
                                  Nilai
                              </th>
                              <th>
                                  Aksi
                              </th>
                            </tr>


                            @foreach ($user_lecture as $key => $val)
                            <tr>
                              <td>
                                  {{ $key+1 }}
                              </td>
                              <td>
                                  {{ $val->user->name }}
                              </td>
                              <td>
                                  {{ $val->nilai }}
                              </td>
                              <td>
                              <a href="/course/user_lecture/{{ $val->id }}" class="btn btn-primary btn-sm">Cek !!</a>
                              
                              </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="col-6 col-md-2">

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('formValidationScript')
@include('app.cms.course.rank.scripts.form')
@endsection
