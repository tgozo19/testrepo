<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Go Card</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/sweetalert2/sweetalert2.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body class="header-dark">
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="vendors/images/DeskApp-logo.svg" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>

	<?php
		include("inc/header.php");
		include("inc/left-side-bar.php");
	?>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4"> Create A New Term </h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 col-sm-12 text-center">
                        <form id="createTermForm" method="POST" action="api/setdates/dates.php" enctype="multipart/form-data">
							<div class="form-group">
                                <label> Term </label>
                                <select name="term" class="form-control" type="text">
									<option value="First Term"> First Term </option>
									<option value="Second Term"> Second Term </option>
									<option value="Third Term"> Third Term </option>
								</select>
                            </div>
							<div class="form-group">
                                <label> Year </label>
                                <select name="year" class="form-control" type="text">
									<option value="2020"> 2020 </option>
									<option value="2021"> 2021 </option>
									<option value="2022"> 2022 </option>
								</select>
                            </div>
                            <div class="form-group">
                                <label> Term Begins On </label>
                                <input name="begins" class="form-control date-picker" placeholder="Select Date" type="text">
                            </div>
                            <div class="form-group">
                                <label> Term Ends On </label>
                                <input name="ends" class="form-control date-picker" placeholder="Select Date" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control btn btn-primary text-white font-weight-bold" placeholder="Select Date" type="submit" value="Confirm">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
			<button type="button" class="btn mb-20 btn-primary btn-block d-none" id="custom-padding-width-alert2"></button>
			<a id="fail" href="#" class="btn-block d-none" data-toggle="modal" data-target="#alert-modal" type="button"></a>
			<div class="modal fade" id="alert-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm modal-dialog-centered">
					<div class="modal-content bg-danger text-white">
						<div class="modal-body text-center">
							<h3 class="text-white mb-15"><i class="fa fa-exclamation-triangle"></i></h3>
							<p>
								Failed to start new Term. Please try again
							</p>
							<button type="button" class="btn btn-light" data-dismiss="modal"> OK </button>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
				Copyright &copy; <script> document.write(new Date().getFullYear()) </script> Go Card. Powered by <a class="no-decoration" href="https://www.pygentech.com" target="_blank"> PygenTech </a>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="vendors/scripts/dashboard.js"></script>
	<script src="src/scripts/custom.js"></script>
	<script src="src/plugins/jquery-steps/jquery.steps.js"></script>
	<script src="vendors/scripts/steps-setting.js"></script>
	<script src="src/plugins/sweetalert2/sweetalert2.all.js"></script>
	<script src="src/plugins/sweetalert2/sweet-alert.init.js"></script>
</body>
</html>