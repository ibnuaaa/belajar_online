@extends('layout.app')

@section('title', 'Course')
@section('bodyClass', 'fixed-header menu-pin menu-behind')

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Edit Course</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/course">Course</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Course</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW-1 -->
<div class="row">
    <div class="col-9">
        <div class="card overflow-hidden">
            <div class="card-body">
                <form autocomplete="off" id="editCourseForm">
                    <div class="form-group form-group-default required ">
                        <label class="form-label">Nama</label>
                        <input name="name" value="{{ $data['name'] }}" class="form-control" type="text" required>
                    </div>
                    <div class="form-group form-group-default required ">
                        <label class="form-label">Tujuan</label>
                        <input name="description" value="{{ $data['description'] }}" class="form-control" type="text" required>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="card card-default card-action">
            <div class="card-body">
                <button id="saveAction" class="btn btn-block btn-success btn-cons m-b-10">
                    <i class="fa fa-save"></i> Save
                </button>
                <a href="{{ UrlPrevious(url('/course')) }}" class="btn btn-block btn-primary btn-cons m-b-10">
                    <i class="fa fa-arrow-left"></i> Cancel
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('formValidationScript')
@include('app.cms.course.edit.scripts.form')
@endsection
