@extends('layout_frontend.app')

@section('title', 'Home')

@section('content')


			<!-- ============================ Hero Banner  Start================================== -->
			<div class="image-cover hero_banner shadow rlt bg-light">
				<div class="container">
					<!-- Type -->
					<div class="row align-items-center">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="banner-search-2 transparent">
								<h1 class="big-header-capt cl_2 mb-2 f_2">Bersama Kami<br>Tingkatkan Kemampuan Mengembangkan Diri</h1>
								<p>Belajar berbagai topik dimanapun, kapanpun. Pilih modul yang kamu sukai.</p>
								<div class="mt-4">
								</div>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="flixio">
                  <img class="img-fluid" src="/frontend/assets/img/edu_1.png" alt="">
              </div>
						</div>

					</div>
				</div>
			</div>
			<!-- ============================ Hero Banner End ================================== -->

			<!-- ============================ Featured Courses Start ================================== -->
			<section>
				<div class="container">

					<div class="row justify-content-center">
						<div class="col-lg-5 col-md-6 col-sm-12">
							<div class="sec-heading center">
								<p>Modul Terbaru </p>
								<h2><span class="theme-cl">Disajikan oleh</span> Para guru yang berkompeten</h2>
							</div>
						</div>
					</div>

					<div class="row">



						@foreach ($course as $key => $val)

						<!-- Cource Grid 1 -->
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="education_block_grid style_2">

								<div class="education_block_thumb n-shadow">
									<a href="/f/course/1"><img src="/frontend/assets/img/co-1.jpg" class="img-fluid" alt=""></a>
								</div>

								<div class="education_block_body">
									<h4 class="bl-title"><a href="/f/course/{{ $val->id }}">{{ $val->name }}</a></h4>
								</div>


								<div class="education_block_footer">
									<div class="education_block_author">
										<div class="path-img"><a href="instructor-detail.html"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
										<h5><a href="#">Muktiari Ayu Winasis</a></h5>
									</div>
									<span class="education_block_time"><i class="ti-calendar mr-1"></i>1 Jam yang lalu</span>
								</div>

							</div>
						</div>

						@endforeach






					</div>


				</div>
			</section>
			<!-- ============================ Featured Courses End ================================== -->


@endsection
