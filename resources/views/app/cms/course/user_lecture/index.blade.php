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
                <div class="row mt-4">
                    <div class="col-12">
                        <table class="table table-bordered table-sm">


                            <tr>
                              <th style="width: 5%;">
                                  No
                              </th>
                              <th style="width: 20%;">
                                  Soal
                              </th>
                              <th style="width: 5%;">
                                  Bobot
                              </th>
                              <th style="width: 20%;">
                                  Pembahasan
                              </th>
                              <th style="width: 30%;">
                                  Jawaban Siswa
                              </th>
                              <th style="width: 6%;">
                                  Nilai
                              </th>
                            </tr>


                            @foreach ($user_lecture->user_exercise as $key => $val)
                            <tr>
                              <td>
                                  {{ $key+1 }}
                              </td>
                              <td>
                                  {{ $val->exercise->name }}
                              </td>
                              <td>
                                  {{ $val->exercise->bobot }}
                              </td>
                              <td>
                                  {{ $val->exercise->decription }}
                              </td>
                              <td>
                                  {{ $val->user_exercise_answer->description }}
                                  {{ !empty($val->user_exercise_answer->exercise_option->name) ? $val->user_exercise_answer->exercise_option->name : '' }}
                                  
                              </td>
                              <td>
                                  <input name="nilai" class="form-control" type="text" data-id="{{ $val->id }}" value="{{ round($val->nilai) }}" onChange="saveUserExercise(this)" />
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
@include('app.cms.course.user_lecture.scripts.form')
@endsection
