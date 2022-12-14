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
					<div class="ed_rate_info">
						<span class="mr-2 text-danger bg-light-danger px-2 py-1 rounded">Programming</span>
						<div class="review_counter mr-2">
							<strong class="good">4.5</strong>
						</div>
						<div class="star_info">
							<i class="fas fa-star filled"></i>
							<i class="fas fa-star filled"></i>
							<i class="fas fa-star filled"></i>
							<i class="fas fa-star filled"></i>
							<i class="fas fa-star"></i>
						</div>
					</div>
				</div>

				<div class="inline_edu_wrap">
					<div class="inline_edu_first">
						<div class="instructor_dark_info">
							<ul>
								<li>
									<span>Last Update</span>
									10 Jan 2022
								</li>
								<li>
									<span>Level</span>
									Basic
								</li>
								<li>
									<span>Students</span>
									742,614
								</li>
								<li>
									<span>Language</span>
									Hindi
								</li>
							</ul>
						</div>
					</div>
					<div class="inline_edu_last">
						<a href="#" class="btn btn-light"><i class="fa fa-heart mr-2"></i>Wishlist</a>
					</div>
				</div>

				<div class="property_video xl mb-4">
					<div class="thumb">
						<img class="pro_img img-fluid w100" src="https://via.placeholder.com/1200x900" alt="7.jpg">
						<div class="overlay_icon">
							<div class="bb-video-box">
								<div class="bb-video-box-inner">
									<div class="bb-video-box-innerup">
										<a href="https://www.youtube.com/watch?v=A8EI6JaFbv4" data-toggle="modal" data-target="#popup-video" class="theme-cl"><i class="ti-control-play"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>

				<!-- Overview -->
				<div class="edu_wraper border">
					<h4 class="edu_title">Course Overview</h4>
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

				<div class="edu_wraper border">
					<h4 class="edu_title">Course Circullum</h4>
					<div id="accordionExample" class="accordion shadow circullum">

						<!-- Part 1 -->
						<div class="card">
							<div id="headingOne" class="card-header bg-white shadow-sm border-0">
							<h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="d-block position-relative text-dark collapsible-link py-2">Part 01: How To Learn Web Designing Step by Step</a></h6>
							</div>
							<div id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse show">
							<div class="card-body pl-3 pr-3">
								<ul class="lectures_lists">
									<li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 01</div>Web Designing Beginner</li>
									<li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 02</div>Startup Designing with HTML5 & CSS3</li>
									<li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 03</div>How To Call Google Map iFrame</li>
									<li class="unview"><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 04</div>Create Drop Down Navigation Using CSS3</li>
									<li class="unview"><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 05</div>How to Create Sticky Navigation Using JS</li>
								</ul>
							</div>
							</div>
						</div>

						<!-- Part 2 -->
						<div class="card">
							<div id="headingTwo" class="card-header bg-white shadow-sm border-0">
							<h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="d-block position-relative collapsed text-dark collapsible-link py-2">Part 02: Learn Web Designing in Basic Level</a></h6>
							</div>
							<div id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordionExample" class="collapse">
							<div class="card-body pl-3 pr-3">
								<ul class="lectures_lists">
									<li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 01</div>Web Designing Beginner</li>
									<li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 02</div>Startup Designing with HTML5 & CSS3</li>
									<li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 03</div>How To Call Google Map iFrame</li>
									<li class="unview"><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 04</div>Create Drop Down Navigation Using CSS3</li>
									<li class="unview"><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 05</div>How to Create Sticky Navigation Using JS</li>
								</ul>
							</div>
							</div>
						</div>

						<!-- Part 3 -->
						<div class="card">
							<div id="headingThree" class="card-header bg-white shadow-sm border-0">
							<h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" class="d-block position-relative collapsed text-dark collapsible-link py-2">Part 03: Learn Web Designing in Advance Level</a></h6>
							</div>
							<div id="collapseThree" aria-labelledby="headingThree" data-parent="#accordionExample" class="collapse">
							<div class="card-body pl-3 pr-3">
								<ul class="lectures_lists">
									<li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 01</div>Web Designing Beginner</li>
									<li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 02</div>Startup Designing with HTML5 & CSS3</li>
									<li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 03</div>How To Call Google Map iFrame</li>
									<li class="unview"><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 04</div>Create Drop Down Navigation Using CSS3</li>
									<li class="unview"><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 05</div>How to Create Sticky Navigation Using JS</li>
								</ul>
							</div>
							</div>
						</div>

						<!-- Part 04 -->
						<div class="card">
							<div id="headingFour" class="card-header bg-white shadow-sm border-0">
							<h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" class="d-block position-relative collapsed text-dark collapsible-link py-2">Part 04: How To Become Succes in Designing & Development?</a></h6>
							</div>
							<div id="collapseFour" aria-labelledby="headingFour" data-parent="#accordionExample" class="collapse">
							<div class="card-body pl-3 pr-3">
								<ul class="lectures_lists">
									<li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 01</div>Web Designing Beginner</li>
									<li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 02</div>Startup Designing with HTML5 & CSS3</li>
									<li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 03</div>How To Call Google Map iFrame</li>
									<li class="unview"><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 04</div>Create Drop Down Navigation Using CSS3</li>
									<li class="unview"><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 05</div>How to Create Sticky Navigation Using JS</li>
								</ul>
							</div>
							</div>
						</div>

					</div>
				</div>

				<!-- Reviews -->
				<div class="rating-overview border">
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
				<div class="single_instructor border">
					<div class="single_instructor_thumb">
						<a href="#"><img src="assets/img/user-3.jpg" class="img-fluid" alt=""></a>
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
				<div class="edu_wraper border"  style="display:none;">
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

			<div class="col-lg-4 col-md-4" style="display:none;">

				<!-- Course info -->
				<div class="ed_view_box style_3 border py-3">

					<div class="ed_view_price pl-4">
						<span>Acctual Price</span>
						<h2 class="theme-cl mb-0">$149.200</h2>
						<div class="offer-box"><span class="old-prc">$199.20</span><span class="offer-box">25% Off</span></div>
					</div>

					<div class="ed_view_short pl-4 pr-4 pb-2 b-b">
						<p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
					</div>

					<div class="p-4">
						<h5>Course Features Include</h5>
						<ul class="edu_list right">
							<li><i class="ti-user"></i>Student Enrolled:<strong>1740</strong></li>
							<li><i class="ti-files"></i>lectures:<strong>10</strong></li>
							<li><i class="ti-game"></i>Quizzes:<strong>4</strong></li>
							<li><i class="ti-time"></i>Duration:<strong>60 hours</strong></li>
							<li><i class="ti-tag"></i>Skill Level:<strong>Beginner</strong></li>
							<li><i class="ti-flag-alt"></i>Language:<strong>English</strong></li>
							<li><i class="ti-shine"></i>Assessment:<strong>Yes</strong></li>
						</ul>
					</div>
					<div class="ed_view_link pb-3">
						<a href="#" class="btn btn-theme enroll-btn">Enroll Now<i class="ti-angle-right"></i></a>
						<a href="#" class="btn btn-outline-theme enroll-btn">Enroll Now<i class="ti-angle-right"></i></a>
					</div>

					<div class="px-4 pt-4 pb-0 b-t">
						<h5 class="mb-3">About The instructor</h5>
						<div class="ins_info">
							<div class="ins_info_thumb">
								<img src="assets/img/user-8.jpg" class="img-fluid" alt="">
							</div>
							<div class="ins_info_caption">
								<h4 class="text-dark">Dr. Mahimpurra Ville</h4>
								<span class="text-dark">Founder of LearnUp</span>
							</div>
						</div>
						<div class="inline_edu_wrap mt-4">
							<div class="inline_edu_first">
								<div class="ed_rate_info">
									<div class="review_counter mr-2">
										<strong class="good">4.5</strong>
									</div>
									<div class="star_info">
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star"></i>
									</div>
								</div>
							</div>
							<div class="inline_edu_last">
								<i class="fa fa-file mr-2"></i>42 Lectures
							</div>
						</div>
					</div>

				</div>

			</div>

		</div>

	</div>
</section>
<!-- ============================ Course Detail ================================== -->


@endsection
