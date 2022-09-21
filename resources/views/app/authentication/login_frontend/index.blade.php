<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="www.frebsite.nl" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <title>LearnUp - Belajar Kapanpun dan Dimanapun</title>

        <!-- Custom CSS -->
        <link href="/frontend/assets/css/styles.css" rel="stylesheet">

		<!-- Custom Color Option -->
		<link href="/frontend/assets/css/colors.css" rel="stylesheet">

    </head>

    <body class="log-bg">

        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div id="preloader"><div class="preloader"><span></span><span></span></div></div>


        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">

            <!-- ========================== SignUp Elements ============================= -->
			<section class="log-space">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-11 col-md-11">

							<div class="row no-gutters position-relative log_rads">
								<div class="col-lg-6 col-md-5 bg-cover" style="background:#1f2431 url(/frontend/assets/img/log.png)no-repeat;">
									<div class="lui_9okt6">
										<div class="_loh_revu97">
											<div id="reviews-login">

												<!-- Single Reviews -->
												<div class="_loh_r96">
													<div class="_bloi_quote"><i class="fa fa-quote-left"></i></div>
													<div class="_loh_r92">
														<h4>Cara mengajar yang baik</h4>
													</div>
													<div class="_loh_r93">
														<p>Modul yang disajikan lengkap. Dapat dibuka kapan saja dan dimana saja</p>
													</div>
													<div class="_loh_foot_r93">
														<h4>Shilpa D. Setty</h4>
														<span>Team Leader</span>
													</div>
												</div>

												<!-- Single Reviews -->
												<div class="_loh_r96">
													<div class="_bloi_quote"><i class="fa fa-quote-left"></i></div>
													<div class="_loh_r92">
														<h4>Teknologi Terkini</h4>
													</div>
													<div class="_loh_r93">
														<p>Pengetahuan saya menjadi lebih berwawasan setelah belajar menggunakan website ini.</p>
													</div>
													<div class="_loh_foot_r93">
														<h4>Adam Wilsom</h4>
														<span>Mak Founder</span>
													</div>
												</div>

												<!-- Single Reviews -->
												<div class="_loh_r96">
													<div class="_bloi_quote"><i class="fa fa-quote-left"></i></div>
													<div class="_loh_r92">
														<h4>Struktur yang rapi</h4>
													</div>
													<div class="_loh_r93">
														<p>metode pembelajaran yang sangat nyaman dan dapat diikuti oleh siswa.</p>
													</div>
													<div class="_loh_foot_r93">
														<h4>Kunal M. Wilsom</h4>
														<span>CEO & Founder</span>
													</div>
												</div>


											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-6 col-md-7 position-static p-4">
									<div class="log_wraps">
										<a href="/" class="log-logo_head"><img src="/frontend/assets/img/logo.png" class="img-fluid" width="80" alt="" /></a>
										<div class="log__heads">
											<h4 class="mt-0 logs_title">Masuk <span class="theme-cl">Situs</span></h4>
										</div>

										<form id="loginForm" class="p-t-15" role="form" style="opacity: 1 !important;">
											<div class="form-group">
												<label>Alamat Email / Username*</label>
												<input type="text" class="form-control" value="root" name="username">
											</div>

											<div class="form-group">
												<label>Kata Sandi*<a href="#" class="elio_right">Lupa Password?</a></label>
												<input type="password" class="form-control" value="Asdasd123!!" name="password">
											</div>

											<div class="form-group">
												<a href="#" onclick="return login();" class="btn btn_apply w-100">Masuk</a>
											</div>
										</form>


									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</section>
			<!-- ========================== Login Elements ============================= -->


		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
		<script src="/frontend/assets/js/jquery.min.js"></script>
		<script src="/frontend/assets/js/popper.min.js"></script>
		<script src="/frontend/assets/js/bootstrap.min.js"></script>
		<script src="/frontend/assets/js/select2.min.js"></script>
		<script src="/frontend/assets/js/slick.js"></script>
		<script src="/frontend/assets/js/jquery.counterup.min.js"></script>
		<script src="/frontend/assets/js/counterup.min.js"></script>
		<script src="/frontend/assets/js/custom.js"></script>

		<script src="/assets/plugins/axios/dist/axios.min.js"></script>

		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->


		<script>


				window.axios = axios.create({
						baseURL: window.apiUrl,
						timeout: 600000,
						headers: {}
				})

				window.showLoading = function() {
						$.LoadingOverlay("show");
				}
				window.hideLoading = function() {
						$.LoadingOverlay("hide");
				}

				axios.interceptors.response.use(
						response => response,
						error => {
								if (error.response && error.response.data) {
										console.log(
												'REQUEST API ERROR :',
												error.response.data,
												'ON -> ',
												error.response.request._url,
												error.config && error.config.data ? JSON.parse(error.config.data) : null
										)
										console.log(error.response)
								}

								if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
										console.log('aa ss dd ')
										swal({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
								}

								if (Boolean(error) && Boolean(error.response) && Boolean(error.response.status) && error.response.status) {
										swal({ title: 'Opps! [Error ' + error.response.status + ']', text: 'Error Server', type: 'error', confirmButtonText: 'Ok' })
								}

								if (error.response && error.response.data && error.response.data.errors) {
										let errors = ''
										for (let i = 0; i < Object.keys(error.response.data.errors).length; i++) {
												const key = Object.keys(error.response.data.errors)[i]
												for (let j = 0; j < error.response.data.errors[key].length; j++) {
														const message = error.response.data.errors[key][j]
														let prefix = ', '
														if (i === 0 && j === 0) {
																prefix = ''
														}
														errors += `${prefix}${message}`
												}
										}
										if (error.response && error.response.status === 401) {
										} else {
												swal({ title: 'Opps...', text: errors, type: 'error', confirmButtonText: 'Ok' })
										}
								}
								return Promise.reject(error)
						}
				)

				if (getCookie('TokenType') != "" && getCookie('AccessToken')) {
						window.axios.defaults.headers['Authorization'] = `${getCookie('TokenType')} ${getCookie('AccessToken')}`
				}




				function login() {
						const username = $('input[name="username"]')
						const password = $('input[name="password"]')
						// showLoading();
						axios.post('/api/login', {
								username: username.val(),
								password: password.val()
						}).then((response) => {
								// hideLoading();
								const { oauth } = response.data.data
								document.cookie = `TokenType=${oauth.token_type}`
								document.cookie = `AccessToken=${oauth.access_token}`
								window.location = `/home`
						}).catch(() => {
								// hideLoading();
						});

						return false;
				}
		</script>

	</body>
</html>
