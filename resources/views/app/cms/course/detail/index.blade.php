@extends('layout.app')

@section('title', 'Course '.$data['name'])
@section('bodyClass', 'fixed-header menu-pin menu-behind')

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Course</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/course">Course</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Course</li>
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
                        <h2 class="font-montserrat all-caps hint-text">Detail Course</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-md-2">
                        Nama
                    </div>
                    <div class="col-6 col-md-10">
                        : {{ $data['name'] }}
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="font-montserrat all-caps hint-text">Section</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered table-sm">
                          <tr>
                              <td style="width:5%;">
                                  No
                              </td>
                              <td style="width:80%;">
                                Nama
                              </td>
                              <td style="width:15%;">
                                Aksi
                              </td>
                          </tr>
                          <tr>
                              <td colspan="3" style="text-align:center;">
                                  <div class="input-group">
                                    <input type="text" placeholder="Type a new section..." name="section_name" class="form-control"><br>
                                    <a href="#" class="btn btn-primary" onClick="return saveNewSection();">Simpan</a>
                                  </div>
                              </td>
                          </tr>
                          @foreach ($section as $key => $val)
                          <tr>
                              <td>
                                {{ $key+1 }}
                              </td>
                              <td>
                                  <input type="text" placeholder="Type a section..." value="{{ $val->name }}" class="form-control">
                                  <br>
                                  <table class="table table-bordered table-sm">
                                      <tr>
                                          <td colspan="3" style="text-align:center;">
                                              Lecture
                                          </td>
                                      </tr>
                                      <tr>
                                          <td style="width:10%;">
                                              No
                                          </td>
                                          <td style="width:80%;">
                                              Name
                                          </td>
                                          <td style="width:10%;">
                                              Action
                                          </td>
                                      </tr>

                                      <tr>
                                          <td colspan="3" style="text-align:center;">
                                              <div class="input-group">
                                                <input type="text" placeholder="Type a new section..." name="lecture_name" class="form-control"><br>
                                                <a href="#" class="btn btn-primary" onClick="return saveNewLecture({{ $val->id }});">Simpan</a>
                                              </div>
                                          </td>
                                      </tr>

                                      @foreach ($val->lecture as $key2 => $val2)
                                      <tr>
                                          <td>
                                              {{ $key2+1 }}
                                          </td>
                                          <td>
                                              {{$val2->name}}
                                          </td>
                                          <td>
                                              <div class="btn-group">
                                                  <a href="#" class="btn btn-danger btn-sm" onclick="return deleteLecture('{{$val2->id}}')"><i class="fa fa-trash"></i></a>
                                                  <a href="/course/lecture/{{ $val2->id }}" class="btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>
                                              </div>
                                          </td>
                                      </tr>
                                      @endforeach


                                  </table>
                              </td>
                              <td>
                                  <a href="#" class="btn btn-danger btn-sm" onclick="return deleteSection('{{$val->id}}')"><i class="fa fa-trash"></i></a>
                              </td>
                          </tr>
                          @endforeach
                          <tr>
                              <td colspan="3">
                                <a href="#" class="btn btn-primary btn-sm" onclick="return newSection()"><i class="fa fa-plus"></i> Buat Section Baru</a>
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
@include('app.cms.course.detail.scripts.form')
@endsection
