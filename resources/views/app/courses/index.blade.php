@extends('layout_frontend.app')

@section('title', 'Home')

@section('content')

<!-- ============================ Page Title Start================================== -->
<section class="page-title">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">

				<div class="breadcrumbs-wrap">
					<h1 class="breadcrumb-title">Teknik Pengolahan Audio dan Video</h1>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Beranda</a></li>
							<li class="breadcrumb-item active" aria-current="page">Teknik Pengolahan Audio dan Video</li>
						</ol>
					</nav>
				</div>

			</div>
		</div>
	</div>
</section>
<!-- ============================ Page Title End ================================== -->


<!-- ============================ Full Width Courses  ================================== -->
<section class="pt-0">
	<div class="container">

		<!-- Onclick Sidebar -->
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<div id="filter-sidebar" class="filter-sidebar">
					<div class="filt-head">
						<h4 class="filt-first">Advance Options</h4>
						<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">Close <i class="ti-close"></i></a>
					</div>
					<div class="show-hide-sidebar">

						<!-- Find New Property -->
						<div class="sidebar-widgets">

							<!-- Search Form -->
							<form class="form-inline addons mb-3">
								<input class="form-control" type="search" placeholder="Search Courses" aria-label="Search">
								<button class="btn my-2 my-sm-0" type="submit"><i class="ti-search"></i></button>
							</form>

							<h4 class="side_title">Course categories</h4>
							<ul class="no-ul-list mb-3">
								<li>
									<input id="a-4" class="checkbox-custom" name="a-4" type="checkbox">
									<label for="a-4" class="checkbox-custom-label">Backend (3)</label>
								</li>
								<li>
									<input id="a-5" class="checkbox-custom" name="a-5" type="checkbox">
									<label for="a-5" class="checkbox-custom-label">Frontend (2)</label>
								</li>
								<li>
									<input id="a-6" class="checkbox-custom" name="a-6" type="checkbox">
									<label for="a-6" class="checkbox-custom-label">General (2)</label>
								</li>
								<li>
									<input id="a-7" class="checkbox-custom" name="a-7" type="checkbox">
									<label for="a-7" class="checkbox-custom-label">IT & Software (2)</label>
								</li>
								<li>
									<input id="a-8" class="checkbox-custom" name="a-8" type="checkbox">
									<label for="a-8" class="checkbox-custom-label">Photography (2)</label>
								</li>
								<li>
									<input id="a-9" class="checkbox-custom" name="a-9" type="checkbox">
									<label for="a-9" class="checkbox-custom-label">Technology (2)</label>
								</li>
							</ul>

							<h4 class="side_title">Instructors</h4>
							<ul class="no-ul-list mb-3">
								<li>
									<input id="a-1" class="checkbox-custom" name="a-1" type="checkbox">
									<label for="a-1" class="checkbox-custom-label">Keny White (4)</label>
								</li>
								<li>
									<input id="a-2" class="checkbox-custom" name="a-2" type="checkbox">
									<label for="a-2" class="checkbox-custom-label">Hinata Hyuga (11)</label>
								</li>
								<li>
									<input id="a-6" class="checkbox-custom" name="a-6" type="checkbox">
									<label for="a-6" class="checkbox-custom-label">Mike hussy (4)</label>
								</li>
								<li>
									<input id="a-7" class="checkbox-custom" name="a-7" type="checkbox">
									<label for="a-7" class="checkbox-custom-label">Adam Riky (7)</label>
								</li>
								<li>
									<input id="a-8" class="checkbox-custom" name="a-8" type="checkbox">
									<label for="a-8" class="checkbox-custom-label">Balcony</label>
								</li>
								<li>
									<input id="a-9" class="checkbox-custom" name="a-9" type="checkbox">
									<label for="a-9" class="checkbox-custom-label">Icon</label>
								</li>
							</ul>

							<h4 class="side_title">Price</h4>
							<ul class="no-ul-list mb-3">
								<li>
									<input id="a-10" class="checkbox-custom" name="a-10" type="checkbox">
									<label for="a-10" class="checkbox-custom-label">All (75)</label>
								</li>
								<li>
									<input id="a-11" class="checkbox-custom" name="a-11" type="checkbox">
									<label for="a-11" class="checkbox-custom-label">Free (15)</label>
								</li>
								<li>
									<input id="a-12" class="checkbox-custom" name="a-12" type="checkbox">
									<label for="a-12" class="checkbox-custom-label">Paid (60)</label>
								</li>
							</ul>

							<button class="btn btn-theme full-width mb-2">Filter Result</button>

						</div>

					</div>
				</div>
			</div>
		</div>

		<!-- Row -->
		<div class="row">

			<div class="col-lg-12 col-md-12 col-sm-12">

				<!-- Row -->
				<div class="row align-items-center mb-3">
					<div class="col-lg-6 col-md-6 col-sm-12">
						We found <strong>{{ count($course) }}</strong> courses for you
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 ordering">

					</div>
				</div>
				<!-- /Row -->

				<div class="row">


					@foreach ($course as $key => $val)
					<!-- Cource Grid 1 -->
					<div class="col-lg-4 col-md-6">
						<div class="education_block_grid style_2">
							<div class="education_block_thumb">
								<a href="/f/course/{{ $val->id }}"><img src="/frontend/assets/img/co-1.jpg" class="img-fluid" alt=""></a>
								<div class="education_ratting"><i class="fa fa-star"></i>4.8 (70)</div>
							</div>
							<div class="education_block_body">
								<h4 class="bl-title"><a href="/f/course/{{ $val->id }}">{{ $val->name }}</a></h4>
							</div>
							<div class="cources_info_style3">
								<ul>
									<li><i class="ti-eye mr-2"></i>Dilihat 32 Kali</li>
									<li><i class="ti-control-skip-forward mr-2"></i>63 Sub Bab</li>
								</ul>
							</div>
						</div>
					</div>
					@endforeach







				</div>

				<!-- Row -->

				<!-- /Row -->

			</div>

		</div>
		<!-- Row -->

	</div>
</section>
<!-- ============================ Full Width Courses End ================================== -->

@endsection
