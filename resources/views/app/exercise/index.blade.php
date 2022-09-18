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
            <li class="breadcrumb-item"><a href="#" class="theme-cl">Home</a></li>
            <li class="breadcrumb-item"><a href="#" class="theme-cl">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Programming with Laravel: HandsOn introduction for beginners</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">

      <div class="col-lg-8 col-md-8">

        <div class="inline_edu_wraps mb-4">
          <h2>Programming with Advance Laravel: HandsOn Introduction for beginners</h2>

        </div>



        <!-- Overview -->
        <div class="edu_wraper border">
          <h4 class="edu_title">HTML digunakan untuk</h4>

            <ul class="no-ul-list">
                <li>
                  <input id="a-p" class="checkbox-custom" name="a-c" type="radio">
                  <label for="a-p" class="checkbox-custom-label">menggambar</label>
                </li>
                <li>
                  <input id="a-c" class="checkbox-custom" name="a-c" type="radio">
                  <label for="a-c" class="checkbox-custom-label">Men-strukturkan konten dalam sebuah website</label>
                </li>
                <li>
                  <input id="a-d" class="checkbox-custom" name="a-c" type="radio">
                  <label for="a-d" class="checkbox-custom-label">Menghubungkan dengan database</label>
                </li>
            </ul>

            @if ($id == 3)
            <br><br>
            <a href="/lecture/4" class="btn btn-success text-white">Jawab</a>
            @endif
        </div>

        @if ($id == 4)
        <div class="edu_wraper border">

          <h4 class="edu_title">Jawaban: </h4>
          Men-strukturkan konten dalam sebuah website

          <br><br><br>
          <h4 class="edu_title">Pembahasan</h4>
          <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
          <h6>Requirements</h6>
          <ul class="lists-3">
            <li>At vero eos et accusamus et iusto odio dignissimos ducimus</li>
            <li>At vero eos et accusamus et iusto odio dignissimos ducimus</li>
            <li>At vero eos et accusamus et iusto odio dignissimos ducimus</li>
            <li>At vero eos et accusamus et iusto odio dignissimos ducimus</li>
            <li>At vero eos et accusamus et iusto odio dignissimos ducimus</li>
          </ul>
        </div>
        @endif


        <div class="edu_wraper border">
          @include('app.course.curriculum')
        </div>


        <!-- instructor -->

        <!-- Reviews -->
        <div class="list-single-main-item fl-wrap border">
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


    </div>

  </div>
</section>
<!-- ============================ Course Detail ================================== -->


@endsection
