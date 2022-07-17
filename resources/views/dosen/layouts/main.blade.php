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

	<!-- Vendor js -->
	<script src="/js/vendor.min.js"></script>

	<!-- datatable js -->
	<script src="/libs/datatables/jquery.dataTables.min.js"></script>
	<script src="/libs/datatables/dataTables.bootstrap4.min.js"></script>
	<script src="/libs/datatables/dataTables.responsive.min.js"></script>
	<script src="/libs/datatables/responsive.bootstrap4.min.js"></script>

	<script src="/libs/datatables/dataTables.buttons.min.js"></script>
	<script src="/libs/datatables/buttons.bootstrap4.min.js"></script>
	<script src="/libs/datatables/buttons.html5.min.js"></script>
	<script src="/libs/datatables/buttons.flash.min.js"></script>
	<script src="/libs/datatables/buttons.print.min.js"></script>

	<script src="/libs/datatables/dataTables.keyTable.min.js"></script>
	<script src="/libs/datatables/dataTables.select.min.js"></script>

	<!-- Datatables init -->
	<script src="/js/pages/datatables.init.js"></script>

	<!-- optional plugins -->
	<script src="/libs/moment/moment.min.js"></script>
	<script src="/libs/apexcharts/apexcharts.min.js"></script>
	<script src="/libs/flatpickr/flatpickr.min.js"></script>

	<!-- page js -->
	<script src="/js/pages/dashboard.init.js"></script>

	<!-- App js -->
	<script src="/js/app.min.js"></script>
	<script type="text/javascript">
		var rupiah = document.getElementById("rupiah");
		if(rupiah){
			rupiah.addEventListener("keyup", function(e) {
				// tambahkan 'Rp.' pada saat form di ketik
				// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
				rupiah.value = formatRupiah(this.value, "Rp. ");
			});
		}
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix) {
			var number_string = angka.replace(/[^,\d]/g, "").toString(),
			split = number_string.split(","),
			sisa = split[0].length % 3,
			rupiah = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if (ribuan) {
				separator = sisa ? "." : "";
				rupiah += separator + ribuan.join(".");
			}
			rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
			return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
		}
	</script>

</body>

<!-- Mirrored from shreyu.coderthemes.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Apr 2020 12:34:48 GMT -->

</html>