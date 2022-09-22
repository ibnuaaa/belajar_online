<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="www.frebsite.nl" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <title>LearnUp - Online Course & Education HTML Template</title>

        <!-- Custom CSS -->
        <link href="/frontend/assets/css/styles.css" rel="stylesheet">

		<!-- Custom Color Option -->
		<link href="/frontend/assets/css/colors.css" rel="stylesheet">

    </head>

    <body class="red-skin">

        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div id="preloader"><div class="preloader"><span></span><span></span></div></div>


        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">

            <!-- ============================================================== -->
            <!-- Top header  -->
            <!-- ============================================================== -->

            <!-- Start Navigation -->
			<div class="header header-light head-shadow">
				<div class="container">
					<nav id="navigation" class="navigation navigation-landscape">
						<div class="nav-header">
							<a class="nav-brand" href="/">
								<img src="/frontend/assets/img/logo.png" class="logo" alt="" />
							</a>
							<div class="nav-toggle"></div>
						</div>
						<div class="nav-menus-wrapper" style="transition-property: none;">

              <?php

              $category = [
                [
                  'name' => 'Kelas X',
                  'category' => []
                ],
                [
                  'name' => 'Kelas XI',
                  'category' => []
                ],
                [
                  'name' => 'Kelas XII',
                  'category' => [
                    'Teknik Pengolahan Audio dan Video',
                    'Desain Media Interaktif'
                  ]
                ]
              ];


              ?>

							<ul class="nav-menu">

								<li class="active"><a href="/">Beranda</a>
								</li>

								<li><a href="#">Modul Belajar<span class="submenu-indicator"></span></a>
									<ul class="nav-dropdown nav-submenu">

                    @foreach ($category as $key => $val)
                    <li><a href="#">{{ $val['name'] }}<span class="submenu-indicator"></span></a>
											<ul class="nav-dropdown nav-submenu">
                        @foreach ($val['category'] as $key2 => $val2)
												<li><a href="/f/courses/category/1">{{ $val2 }}</a></li>
                        @endforeach
											</ul>
										</li>
                    @endforeach

									</ul>
								</li>



                <li><a href="/contact">Kontak</a></li>
                <li><a href="/about_us">Tentang Kami</a></li>

							</ul>

							<ul class="nav-menu nav-menu-social align-to-right">
								@if (!empty(MyAccount()->name))
								<li class="login_click" style="background: none;">
										<a style="color:black !important;">Selamat datang, {{ MyAccount()->name }}</a>
								</li>
								@endif
								<li class="login_click bg-red">
                  @if (empty(MyAccount()->id))
                  <a href="/signin" >Masuk</a>
                  @else
                  <a href="/signout">Keluar</a>
                  @endif
								</li>
							</ul>

						</div>
					</nav>
				</div>
			</div>
			<!-- End Navigation -->
			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->
