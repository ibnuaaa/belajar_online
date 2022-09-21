@extends('layout.app')

@section('title', 'Gallery')
@section('bodyClass', 'fixed-header menu-pin menu-behind')

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Gallery</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/course">Gallery</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Gallery</li>
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
                        <h2 class="font-montserrat all-caps hint-text">Detail Gallery</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-2">
                      <input type="file" onchange="prepareUpload(this, 'gallery', '0', false, ['jpg','png','bmp']);" multiple>
                      <br><br><br>
                      @foreach ($data as $key => $val2)
                      <img src="http://{{getConfig('basepath')}}/api/preview/{{$val2->storage->key}}" style="float:left;width:50px;">
                      @endforeach
                      <div style="clear:both;"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
