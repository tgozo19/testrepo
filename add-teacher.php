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
	<link rel="stylesheet" type="text/css" href="src/plugins/jquery-steps/jquery.steps.css">
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
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page"> Add Teacher </li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="wizard-content">
						<form id="addTeacherForm" class="tab-wizard wizard-circle wizard" method="POST" action="api/addteacher/add-teachers.php" enctype="multipart/form-data">
							<h5>Personal Info</h5>
							<section>
								<div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Card Number: </label>
                                            <input name="cardNumber" type="text" class="form-control">
                                        </div>
                                    </div>
									<div class="col-md-3">
										<div class="form-group">
											<label> ID Number: </label>
											<input name="idNumber" type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label> Full Name: </label>
											<input name="nameOfTeacher" type="text" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label> Address: </label>
											<input name="address" type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label> Email: </label>
											<input name="email" type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label> Phone Number: </label>
											<input name="phoneNumber" type="text" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> Age: </label>
                                            <input name="age" type="text" class="form-control" placeholder="Select Date">
                                        </div>
                                    </div>
									<div class="col-md-6">
										<div class="form-group">
											<label> Title: </label>
											<select name="title" class="custom-select form-control">
												<option value="Mr"> Mr </option>
                                                <option value="Mrs"> Mrs </option>
                                                <option value="Miss"> Miss </option>
											</select>
										</div>
									</div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> Student Picture: </label>
                                            <input name="img" type="file" class="form-control">
                                        </div>
                                    </div>
								</div>
							</section>
						</form>
					</div>
				</div>
			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
				Copyright &copy; <script> document.write(new Date().getFullYear()) </script> Go Card. Powered by <a class="no-decoration" href="https://www.pygentech.com" target="_blank"> PygenTech </a>
			</div>
		</div>
	</div>
    <button type="button" id="success-modal-btn" hidden data-toggle="modal" data-target="#success-modal" data-backdrop="static">Launch modal</button>
	<div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered max-width-400" role="document">
			<div class="modal-content">
				<div class="modal-body text-center font-18">
					<h3 class="mb-20"> Teacher Added! </h3>
					<div class="mb-30 text-center"><img src="vendors/images/success.png"></div>
					    Do you want to add another teacher?
				</div>
				<div class="modal-footer justify-content-center">
					<a href="add-teacher.php" class="btn btn-primary">Yes</a>
                    <a href="index.php" class="btn btn-primary">No</a>
				</div>
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
</body>
</html>