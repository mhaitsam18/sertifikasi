<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from shreyu.coderthemes.com/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Apr 2020 12:34:59 GMT -->

<head>
	<meta charset="utf-8" />
	<title>{{ $title }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
	<meta content="Coderthemes" name="author" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- App favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">

	<!-- App css -->
	<link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
	<link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" />
	<link href="/fontawesome-free-6.1.1-web/css/all.css" rel="stylesheet" type="text/css" />

</head>

<body class="authentication-bg">

	<div class="account-pages my-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-10">
					<div class="card">
						<div class="card-body p-0">
							<div class="row">
								<div class="col-md-6 p-5">
									<div class="mx-auto mb-5">
										<a href="index.html">
											<img src="assets/images/logo.png" alt="" height="24" />
											<h3 class="d-inline align-middle ml-1 text-logo">Shreyu</h3>
										</a>
									</div>

									<h6 class="h5 mb-0 mt-4">Welcome back!</h6>
									<p class="text-muted mt-1 mb-4">Enter your email address and password to
										access admin panel.</p>

									<form action="#" class="authentication-form">
										<div class="form-group">
											<label class="form-control-label">Email Address</label>
											<div class="input-group input-group-merge">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="icon-dual" data-feather="mail"></i>
													</span>
												</div>
												<input type="email" class="form-control" id="email" placeholder="hello@coderthemes.com">
											</div>
										</div>

										<div class="form-group mt-4">
											<label class="form-control-label">Password</label>
											<a href="pages-recoverpw.html" class="float-right text-muted text-unline-dashed ml-1">Forgot your password?</a>
											<div class="input-group input-group-merge">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="icon-dual" data-feather="lock"></i>
													</span>
												</div>
												<input type="password" class="form-control" id="password" placeholder="Enter your password">
											</div>
										</div>

										<div class="form-group mb-4">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
												<label class="custom-control-label" for="checkbox-signin">Remember
													me</label>
											</div>
										</div>

										<div class="form-group mb-0 text-center">
											<button class="btn btn-primary btn-block" type="submit"> Log In
											</button>
										</div>
									</form>
									<div class="py-3 text-center"><span class="font-size-16 font-weight-bold">Or</span></div>
									<div class="row">
										<div class="col-6">
											<a href="#" class="btn btn-white"><i class='uil uil-google icon-google mr-2'></i>With Google</a>
										</div>
										<div class="col-6 text-right">
											<a href="#" class="btn btn-white"><i class='uil uil-facebook mr-2 icon-fb'></i>With Facebook</a>
										</div>
									</div>
								</div>
								<div class="col-lg-6 d-none d-md-inline-block">
									<div class="auth-page-sidebar">
										<div class="overlay"></div>
										<div class="auth-user-testimonial">
											<p class="font-size-24 font-weight-bold text-white mb-1">I simply love it!</p>
											<p class="lead">"It's a elegent templete. I love it very much!"</p>
											<p>- Admin User</p>
										</div>
									</div>
								</div>
							</div>

						</div> <!-- end card-body -->
					</div>
					<!-- end card -->

					<div class="row mt-3">
						<div class="col-12 text-center">
							<p class="text-muted">Don't have an account? <a href="pages-register.html" class="text-primary font-weight-bold ml-1">Sign Up</a></p>
						</div> <!-- end col -->
					</div>
					<!-- end row -->

				</div> <!-- end col -->
			</div>
			<!-- end row -->
		</div>
		<!-- end container -->
	</div>
	<!-- end page -->

	<!-- Vendor js -->
	<script src="assets/js/vendor.min.js"></script>

	<!-- App js -->
	<script src="assets/js/app.min.js"></script>

</body>

<!-- Mirrored from shreyu.coderthemes.com/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Apr 2020 12:34:59 GMT -->

</html>