<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from shreyu.coderthemes.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Apr 2020 12:34:37 GMT -->

<head>
	<meta charset="utf-8" />
	<title>{{ $title }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
	<meta content="Coderthemes" name="author" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- App favicon -->
	<link rel="shortcut icon" href="/images/favicon.ico">

	<link href="/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="/libs/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="/libs/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

	<!-- plugins -->
	<link href="/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

	<!-- App css -->
	<link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="/css/icons.min.css" rel="stylesheet" type="text/css" />
	<link href="/css/app.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>

</head>

<body>
	<!-- Begin page -->
	<div id="wrapper">
        @include('dosen.layouts.topbar')
        @include('dosen.layouts.sidebar')

		<!-- ============================================================== -->
		<!-- Start Page Content here -->
		<!-- ============================================================== -->

		<div class="content-page">
			<div class="content">
				<div class="container-fluid">
					@yield('container')
				</div>
			</div> <!-- content -->
			<!-- Footer Start -->
			<footer class="footer">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							2022 &copy; Sertifikasi Telkom University. All Rights Reserved. Crafted with <i class='uil uil-heart text-danger font-size-12'></i> by <a href="https://igracias.telkomuniversity.ac.id/" target="_blank">Nadila, Rayhan, Ipeh</a>
						</div>
					</div>
				</div>
			</footer>
			<!-- end Footer -->

		</div>

		<!-- ============================================================== -->
		<!-- End Page content -->
		<!-- ============================================================== -->


	</div>
	<!-- END wrapper -->

	<!-- Right Sidebar -->
	<div class="right-bar">
		<div class="rightbar-title">
			<a href="javascript:void(0);" class="right-bar-toggle float-right">
				<i data-feather="x-circle"></i>
			</a>
			<h5 class="m-0">Customization</h5>
		</div>

		<div class="slimscroll-menu">

			<h5 class="font-size-16 pl-3 mt-4">Choose Variation</h5>
			<div class="p-3">
				<h6>Default</h6>
				<a href="index.html"><img src="/images/layouts/vertical.jpg" alt="vertical" class="img-thumbnail demo-img" /></a>
			</div>
			<div class="px-3 py-1">
				<h6>Top Nav</h6>
				<a href="layouts-horizontal.html"><img src="/images/layouts/horizontal.jpg" alt="horizontal" class="img-thumbnail demo-img" /></a>
			</div>
			<div class="px-3 py-1">
				<h6>Dark Side Nav</h6>
				<a href="layouts-dark-sidebar.html"><img src="/images/layouts/vertical-dark-sidebar.jpg" alt="dark sidenav" class="img-thumbnail demo-img" /></a>
			</div>
			<div class="px-3 py-1">
				<h6>Condensed Side Nav</h6>
				<a href="layouts-dark-sidebar.html"><img src="/images/layouts/vertical-condensed.jpg" alt="condensed" class="img-thumbnail demo-img" /></a>
			</div>
			<div class="px-3 py-1">
				<h6>Fixed Width (Boxed)</h6>
				<a href="layouts-boxed.html"><img src="/images/layouts/boxed.jpg" alt="boxed" class="img-thumbnail demo-img" /></a>
			</div>
		</div> <!-- end slimscroll-menu-->
	</div>
	<!-- /Right-bar -->

	<!-- Right bar overlay-->
	<div class="rightbar-overlay"></div>

	
	@include('dosen.layouts.script')
	@yield('script')

</body>

<!-- Mirrored from shreyu.coderthemes.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Apr 2020 12:34:48 GMT -->

</html>