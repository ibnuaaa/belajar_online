@extends('layout_frontend.app')

@section('title', 'Home')

@section('content')


<!-- ============================ Course Detail ================================== -->
<section class="pt-5">
  <div class="container">

    <div class="row">
      <div class="col-lg-12 col-md-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb simple">
            <li class="breadcrumb-item"><a href="/home" class="theme-cl">Beranda</a></li>
            <li class="breadcrumb-item"><a href="/f/course/{{ $lecture->section->course->id }}" class="theme-cl">Materi Pembelajaran</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $lecture->section->course->name }}</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">

      <div class="col-lg-8 col-md-8">

        <div class="inline_edu_wraps mb-4">
          <h2>{{ $lecture->section->course->name }}</h2>

        </div>

        <div class="inline_edu_wrap">
          <div class="inline_edu_first">
            <div class="instructor_dark_info">
              <ul>
                <li>
                  <span>Update Terakhir</span>
                  {{ $lecture->created_at }}
                </li>
                <li>
                  <span>Tingkatan</span>
                  Kelas XII
                </li>
                <li>
                  <span>Jumlah Siswa</span>
                  20
                </li>
              </ul>
            </div>
          </div>
          <div class="inline_edu_last">
          </div>
        </div>



        <!-- Overview -->
        <div class="edu_wraper border">

          @if (!empty($lecture->description))
          {!!$lecture->description!!}
          @endif

          @if (!empty($lecture->foto_lecture))
          <br><br>
          <iframe style="width:100%;height:500px;" id="pdf" ></iframe>
          @endif

          @if (!empty($lecture->foto_video))
              <video width="100%" height="440" controls style="background:black;">
                <source src="http://{{ getConfig('basepath') }}/api/preview/{{$lecture->foto_video->storage->key}}" type="video/mp4">
                Your browser does not support the video tag.
              </video>
          @endif


          <div id="soal"></div>
          <ul class="no-ul-list" id="pilihan">
          </ul>

          <br><br>
          <a onclick="return jawab();" id="btn-jawab" href="#" class="btn btn-success text-white"><i class="fas fa-check"></i> Jawab</a>
          <a onclick="return getScore();" id="btn-cek-nilai" style="display:none;" href="#" class="btn btn-success text-white"><i class="fas fa-check"></i> Cek Nilai</a>

          <div id="pembahasan_soal">
          </div>

        </div>

        <div class="edu_wraper border">
          @include('app.course.curriculum')
        </div>

        <!-- Reviews -->


        <!-- instructor -->

        <!-- Reviews -->
        <div class="list-single-main-item fl-wrap border"  style="display:none;">
          <div class="list-single-main-item-title fl-wrap">
            <h3>Item Reviews -  <span> 3 </span></h3>
          </div>
          <div class="reviews-comments-wrap">
            <!-- reviews-comments-item -->
            <div class="reviews-comments-item">
              <div class="review-comments-avatar">
                <img src="assets/img/user-1.jpg" class="img-fluid" alt="">
              </div>
              <div class="reviews-comments-item-text">
                <h4><a href="#">Josaph Manrty</a><span class="reviews-comments-item-date"><i class="ti-calendar theme-cl"></i>27 Oct 2019</span></h4>

                <div class="listing-rating high" data-starrating2="5"><i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star active"></i><span class="review-count">4.9</span> </div>
                <div class="clearfix"></div>
                <p>" Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris. "</p>
                <div class="pull-left reviews-reaction">
                  <a href="#" class="comment-like active"><i class="ti-thumb-up"></i> 12</a>
                  <a href="#" class="comment-dislike active"><i class="ti-thumb-down"></i> 1</a>
                  <a href="#" class="comment-love active"><i class="ti-heart"></i> 07</a>
                </div>
              </div>
            </div>
            <!--reviews-comments-item end-->

            <!-- reviews-comments-item -->
            <div class="reviews-comments-item">
              <div class="review-comments-avatar">
                <img src="assets/img/user-2.jpg" class="img-fluid" alt="">
              </div>
              <div class="reviews-comments-item-text">
                <h4><a href="#">Rita Chawla</a><span class="reviews-comments-item-date"><i class="ti-calendar theme-cl"></i>2 Nov May 2019</span></h4>

                <div class="listing-rating mid" data-starrating2="5"><i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star"></i><span class="review-count">3.7</span> </div>
                <div class="clearfix"></div>
                <p>" Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris. "</p>
                <div class="pull-left reviews-reaction">
                  <a href="#" class="comment-like active"><i class="ti-thumb-up"></i> 12</a>
                  <a href="#" class="comment-dislike active"><i class="ti-thumb-down"></i> 1</a>
                  <a href="#" class="comment-love active"><i class="ti-heart"></i> 07</a>
                </div>
              </div>
            </div>
            <!--reviews-comments-item end-->

            <!-- reviews-comments-item -->
            <div class="reviews-comments-item">
              <div class="review-comments-avatar">
                <img src="assets/img/user-3.jpg" class="img-fluid" alt="">
              </div>
              <div class="reviews-comments-item-text">
                <h4><a href="#">Adam Wilsom</a><span class="reviews-comments-item-date"><i class="ti-calendar theme-cl"></i>10 Nov 2019</span></h4>

                <div class="listing-rating good" data-starrating2="5"><i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star"></i> <span class="review-count">4.2</span> </div>
                <div class="clearfix"></div>
                <p>" Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris. "</p>
                <div class="pull-left reviews-reaction">
                  <a href="#" class="comment-like active"><i class="ti-thumb-up"></i> 12</a>
                  <a href="#" class="comment-dislike active"><i class="ti-thumb-down"></i> 1</a>
                  <a href="#" class="comment-love active"><i class="ti-heart"></i> 07</a>
                </div>
              </div>
            </div>
            <!--reviews-comments-item end-->

          </div>
        </div>

        <!-- Submit Reviews -->
        <div class="edu_wraper border">
          <h4 class="edu_title">Submit Reviews</h4>
          <div class="review-form-box form-submit">
            <form>
              <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" placeholder="Your Name">
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="email" placeholder="Your Email">
                  </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Review</label>
                    <textarea class="form-control ht-140" placeholder="Review"></textarea>
                  </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="form-group">
                    <button type="submit" class="btn btn-theme">Submit Review</button>
                  </div>
                </div>

              </div>
            </form>
          </div>
        </div>

      </div>

      <div class="col-lg-4 col-md-4">

        <!-- Course info -->
        <div class="ed_view_box style_3 border py-3">



          <div class="px-4 pt-4 pb-0 b-t">
            <h5 class="mb-3">Tentang Pengajar</h5>
            <div class="ins_info">

              <div class="ins_info_caption">
                <h4 class="text-dark">Muktiari Ayu Winasis</h4>
                <span class="text-dark">Pengajar Multimedia Kelas XII</span>
              </div>
            </div>
            <div class="inline_edu_wrap mt-4">

            </div>
          </div>

        </div>

      </div>

    </div>

  </div>
</section>
<!-- ============================ Course Detail ================================== -->


@endsection


@section('script')
@include('app.lecture.scripts.form')
@endsection
