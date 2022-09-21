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
                        <h2 class="font-montserrat all-caps hint-text">Detail Lecture</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-md-2">
                        Nama
                    </div>
                    <div class="col-6 col-md-10">
                        <input name="name" type="text" class="form-control" value="{{ $lecture->name }}" onchange="saveEditLecture(this);">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-6 col-md-2">
                        Deskripsi
                    </div>
                    <div class="col-6 col-md-10">
                        <textarea name="description" class="form-control" style="height:200px;width: 100%;" onchange="saveEditLecture(this);">{{ $lecture->description }}</textarea>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-6 col-md-2">
                        Video
                    </div>
                    <div class="col-6 col-md-10">
                        <input name="video" type="text" class="form-control" value="{{ $lecture->video }}" onchange="saveEditLecture(this);">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-6 col-md-2">
                        Soal
                    </div>
                    <div class="col-6 col-md-10">
                        <table class="table table-bordered table-sm">

                            @foreach ($lecture->exercise as $key => $value)
                            <tr>
                                <td>
                                    Soal :
                                    <textarea name="name" class="form-control" style="height:200px;width: 100%;" onchange="saveEditExcercise(this, {{$value->id}});">{{ $value->name }}</textarea>
                                    <br>
                                    Pilihan
                                    <table class="table table-bordered table-sm">
                                        @foreach ($value->exercise_option as $key2 => $value2)
                                        <tr>
                                            <td>
                                                <input name="name" type="text" class="form-control" value="{{ $value2->name }}" onchange="saveEditExcerciseOption({{ $value2->id }}, this);" >
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-sm" onClick="return saveNewExerciseOption({{$value->id}});">Tambah Pilihan</a>
                                            </td>
                                        </tr>

                                    </table>
                                </td>

                                <td>

                                </td>
                            </tr>
                            @endforeach





                            <tr>
                                <td>
                                    <br>
                                    <a href="#" class="btn btn-primary btn-sm" onClick="return saveNewExercise({{$id}});">Tambah Soal</a>
                                </td>
                            </tr>



                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('formValidationScript')
@include('app.cms.course.lecture.scripts.form')
@endsection
