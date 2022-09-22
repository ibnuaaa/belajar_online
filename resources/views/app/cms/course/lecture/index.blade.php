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
                        Upload PDF
                    </div>
                    <div class="col-6 col-md-10">
                        <input type="file" onchange="prepareUpload(this, 'lecture', '{{ $lecture->id }}', false, ['pdf']);" multiple>
                        @if (!empty($lecture->foto_lecture))
                        <a href="#" onClick="deletePdf({{$lecture->foto_lecture->id}})">Hapus PDF</a>
                        <iframe style="width:100%;height:500px;" id="pdf" ></iframe>
                        @endif
                    </div>
                </div>



                <div class="row mt-4">
                    <div class="col-6 col-md-2">
                        Video
                    </div>
                    <div class="col-6 col-md-10">
                        <input type="file" onchange="prepareUpload(this, 'video', '{{ $lecture->id }}', false, ['mkv','flv','mp4','mov','avi']);" multiple>
                        <br><br>
                        @if (!empty($lecture->foto_video))
                            <video width="100%" height="440" controls style="background:black;">
                              <source src="http://{{ getConfig('basepath') }}/api/preview/{{$lecture->foto_video->storage->key}}" type="video/mp4">
                              Your browser does not support the video tag.
                            </video>
                        @endif
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
                                    <textarea name="name" class="form-control" style="height:200px;width: 100%;" onchange="saveEditExcercise({{$value->id}}, this);">{{ $value->name }}</textarea>
                                    <br>
                                    <br>
                                    Pembahasan :
                                    <textarea name="description" class="form-control" style="height:200px;width: 100%;" onchange="saveEditExcercise({{$value->id}}, this);">{{ $value->decription }}</textarea>
                                    <br>
                                    <br>
                                    Pilihan
                                    <table class="table table-bordered table-sm">
                                        @foreach ($value->exercise_option as $key2 => $value2)
                                        <tr>
                                            <td style="width: 80%;">
                                                <input name="name" type="text" class="form-control" value="{{ $value2->name }}" onchange="saveEditExcerciseOption({{ $value2->id }}, this);" >
                                            </td>
                                            <td style="width: 10%;">
                                                <input name="is_answer" type="text" class="form-control" value="{{ $value2->is_answer }}" onchange="saveEditExcerciseOption({{ $value2->id }}, this);" >
                                            </td>
                                            <td style="width: 10%;">
                                                <a href="#" class="btn btn-danger btn-sm" onclick="return deleteExerciseOption('{{$value2->id}}');"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="3">
                                                <a href="#" class="btn btn-primary btn-sm" onClick="return saveNewExerciseOption({{$value->id}});">Tambah Pilihan</a>
                                            </td>
                                        </tr>

                                    </table>
                                </td>

                                <td>
                                    <a href="#" class="btn btn-danger btn-sm" onclick="return deleteExercise('{{$value->id}}');"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach





                            <tr>
                                <td colspan="2">
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
