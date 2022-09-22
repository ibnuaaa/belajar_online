@extends('layout_frontend.app')

@section('title', 'Home')

@section('content')


<!-- ============================ Page Title Start================================== -->
<div class="ed_detail_head">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-4 col-md-5">

				<div class="property_video">
					<div class="thumb">
						<img class="pro_img img-fluid w100" src="/frontend/assets/img/foto2.jpg" alt="7.jpg">

					</div>
				</div>

			</div>

			<div class="col-lg-8 col-md-7">
				<div class="ed_detail_wrap">
					<ul class="cources_facts_list">
						<li class="facts-1">Kelas XII</li>
					</ul>
					<div class="ed_header_caption">
						<h2 class="ed_title">{{ $course->name }}</h2>
						<ul>
							<li><i class="ti-calendar"></i>{{ $course->created_at }}</li>
							<li><i class="ti-user"></i> Oleh Admin</li>
						</ul>
					</div>
					<div class="ed_header_short">
						<p>{{ $course->description }}</p>
					</div>


				</div>
			</div>
		</div>
	</div>
</div>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ Course Detail ================================== -->
<section class="bg-light">
	<div class="container">
		<div class="row">

			<div class="col-lg-8 col-md-8">

				<div class="edu_wraper">
					@include('app.course.curriculum')
				</div>

				<!-- Reviews -->
				<div class="rating-overview" style="display:none;">
					<div class="rating-overview-box">
						<span class="rating-overview-box-total">4.2</span>
						<span class="rating-overview-box-percent">out of 5.0</span>
						<div class="star-rating" data-rating="5"><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i>
						</div>
					</div>

					<div class="rating-bars">
						<div class="rating-bars-item">
							<span class="rating-bars-name">5 Star</span>
							<span class="rating-bars-inner">
								<span class="rating-bars-rating high" data-rating="4.7">
									<span class="rating-bars-rating-inner" style="width: 85%;"></span>
								</span>
								<strong>85%</strong>
							</span>
						</div>
						<div class="rating-bars-item">
							<span class="rating-bars-name">4 Star</span>
							<span class="rating-bars-inner">
								<span class="rating-bars-rating good" data-rating="3.9">
									<span class="rating-bars-rating-inner" style="width: 75%;"></span>
								</span>
								<strong>75%</strong>
							</span>
						</div>
						<div class="rating-bars-item">
							<span class="rating-bars-name">3 Star</span>
							<span class="rating-bars-inner">
								<span class="rating-bars-rating mid" data-rating="3.2">
									<span class="rating-bars-rating-inner" style="width: 52.2%;"></span>
								</span>
								<strong>53%</strong>
							</span>
						</div>
						<div class="rating-bars-item">
							<span class="rating-bars-name">1 Star</span>
							<span class="rating-bars-inner">
								<span class="rating-bars-rating poor" data-rating="2.0">
									<span class="rating-bars-rating-inner" style="width:20%;"></span>
								</span>
								<strong>20%</strong>
							</span>
						</div>
					</div>
				</div>

				<!-- instructor -->
				<div class="single_instructor" style="display:none;">
					<div class="single_instructor_thumb">
						<a href="#"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a>
					</div>
					<div class="single_instructor_caption">
						<h4><a href="#">Jonathan Campbell</a></h4>
						<ul class="instructor_info">
							<li><i class="ti-video-camera"></i>72 Videos</li>
							<li><i class="ti-control-forward"></i>102 Lectures</li>
							<li><i class="ti-user"></i>Exp. 4 Year</li>
						</ul>
						<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi.</p>
						<ul class="social_info">
							<li><a href="#"><i class="ti-facebook"></i></a></li>
							<li><a href="#"><i class="ti-twitter"></i></a></li>
							<li><a href="#"><i class="ti-linkedin"></i></a></li>
							<li><a href="#"><i class="ti-instagram"></i></a></li>
						</ul>
					</div>
				</div>

				<!-- Reviews -->
				<div class="list-single-main-item fl-wrap">
					<div class="list-single-main-item-title fl-wrap">
						<h3>Item Reviews -  <span> 3 </span></h3>
					</div>
					<div class="reviews-comments-wrap">
						<!-- reviews-comments-item -->
						<div class="reviews-comments-item">
							<div class="review-comments-avatar">
								<img src="https://via.placeholder.com/500x500" class="img-fluid" alt="">
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
								<img src="https://via.placeholder.com/500x500" class="img-fluid" alt="">
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
								<img src="https://via.placeholder.com/500x500" class="img-fluid" alt="">
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
				<div class="edu_wraper">
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

			<!-- Sidebar -->
			<div class="col-lg-4 col-md-4">
				<div class="ed_view_box style_2">

					<div class="p-4">
							<h5>Course Features Include</h5>
							<ul class="edu_list right">
									<li><i class="ti-tag"></i>Kelas:<strong>XII</strong></li>
									<li><i class="ti-user"></i>Jumlah Siswa:<strong>20</strong></li>
									<li><i class="ti-files"></i>Pengajar:<strong>1</strong></li>
									<li><i class="ti-game"></i>Kuis:<strong>20</strong></li>
									<li><i class="ti-time"></i>Durasi Mengajar:<strong>90 Menit</strong></li>
									<li><i class="ti-flag-alt"></i>Bahasa:<strong>Indonesia</strong></li>
									<li><i class="ti-shine"></i>Assessment:<strong>Ya</strong></li>
							</ul>
					</div>


				</div>
			</div>
		</div>
	</div>
</section>
<!-- ============================ Course Detail ================================== -->


@endsection
