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
                  'name' => 'Development',
                  'category' => [
                    'Web Development',
                    'Mobile Development',
                    'Programming Languages',
                    'xxxxxxxx',
                    'xxxxxxxx',
                    'xxxxxxxx',
                    'xxxxxxxx',

                  ]
                ],
                [
                  'name' => 'IT & Software',
                  'category' => [
                    'xxxxxxxx',
                    'xxxxxxxx',
                    'xxxxxxxx',
                    'xxxxxxxx',
                    'xxxxxxxx',
                    'xxxxxxxx',
                    'xxxxxxxx',

                  ]
                ],
                [
                  'name' => 'Design',
                  'category' => [
                    'xxxxxxxx',
                    'xxxxxxxx',
                    'xxxxxxxx',
                    'xxxxxxxx',
                    'xxxxxxxx',
                    'xxxxxxxx',
                    'xxxxxxxx',

                  ]
                ],
                [
                  'name' => 'Marketing',
                  'category' => [
                    'xxxxxxxx',
                    'xxxxxxxx',
                    'xxxxxxxx',
                    'xxxxxxxx',
                    'xxxxxxxx',
                    'xxxxxxxx',
                    'xxxxxxxx',

                  ]
                ],
                [
                  'name' => 'Photography',
                  'category' => [
                    'xxxxxxxx',
                    'xxxxxxxx',
                    'xxxxxxxx',
                    'xxxxxxxx',
                    'xxxxxxxx',
                    'xxxxxxxx',
                    'xxxxxxxx',

                  ]
                ]
              ];


              ?>

							<ul class="nav-menu">

								<li class="active"><a href="/">Home</a>
								</li>

								<li><a href="#">Courses<span class="submenu-indicator"></span></a>
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



                <li><a href="/contact">Contact</a></li>
                <li><a href="/about_us">About Us</a></li>

							</ul>

							<ul class="nav-menu nav-menu-social align-to-right">
								<li class="login_click search">
									<form class="form-inline addons">
										<input class="form-control" type="search" placeholder="Search Courses" aria-label="Search">
										<button class="btn my-2 my-sm-0" type="submit"><i class="ti-search"></i></button>
									</form>
								</li>
								<li class="login_click bg-red">
                  @if (empty(MyAccount()->id))
                  <a href="/signin" >Sign in</a>
                  @else
                  <a href="/signout">Logout</a>
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
