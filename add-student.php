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
	<link rel="stylesheet" type="text/css" href="src/plugins/sweetalert2/sweetalert2.css">
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
									<li class="breadcrumb-item active" aria-current="page"> Add Student </li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									Other ways
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a id="import" class="dropdown-item" href="#"> Import From Excel Sheet </a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="wizard-content">
						<form id="addStudentForm" class="tab-wizard wizard-circle wizard" method="POST" action="api/addstudent/add-students.php" enctype="multipart/form-data">
							<h5>Personal Info</h5> 
							<section>
								<div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Card Number:</label>
                                            <input name="cardNumber" type="text" class="form-control">
                                        </div>
                                    </div>
									<div class="col-md-3">
										<div class="form-group">
											<label>ID Number:</label>
											<input name="idNumber" type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label> Full Name :</label>
											<input name="nameOfStudent" type="text" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Phone Number :</label>
											<input name="phoneNumber" type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
                                        <div class="form-group">
                                            <label> D.O.B :</label>
                                            <input name="age" type="text" class="form-control date-picker" placeholder="Select Date">
                                        </div> 
                                    </div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label> Gender :</label>
											<select name="gender" class="custom-select form-control">
												<option value="male"> Male </option>
                                                <option value="female"> Female </option>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label> Class :</label>
											<select id="studentClass" name="className" type="text" class="form-control"><select>
										</div>
									</div>
									<div class="col-md-6">
                                        <div class="form-group">
                                            <label> Student Picture :</label>
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
					<h3 class="mb-20"> Student Added! </h3>
					<div class="mb-30 text-center"><img src="vendors/images/success.png"></div>
					    Do you want to add another student?
				</div>
				<div class="modal-footer justify-content-center">
					<a href="add-student.php" class="btn btn-primary">Yes</a>
                    <a href="index.php" class="btn btn-primary">No</a>
				</div>
			</div>
		</div>
	</div>
	<button type="button" id="import-success-modal-btn" hidden data-toggle="modal" data-target="#import-success-modal" data-backdrop="static">Launch modal</button>
	<div class="modal fade" id="import-success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered max-width-400" role="document">
			<div class="modal-content">
				<div class="modal-body text-center font-18">
					<h3 class="mb-20"> Student(s) Added! </h3>
					<div class="mb-30 text-center"><img src="vendors/images/success.png"></div>
					    Your information has been imported successfully. Do you want to add some more information?
				</div>
				<div class="modal-footer justify-content-center">
					<a href="add-student.php" class="btn btn-primary">Yes</a>
                    <a href="index.php" class="btn btn-primary">No</a>
				</div>
			</div>
		</div>
	</div>
	<a id="log-modal" href="#" class="btn-block d-none" data-backdrop="static" data-toggle="modal" data-target="#bd-example-modal-lg" type="button"></a>
	<div class="modal fade" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="login-box bg-white box-shadow border-radius-10" style="margin-left: 0; margin-right: 0; max-width: 100%">
					<div class="login-title">
						<h6 class="text-center text-primary"> Import Information from Excel </h6>
						<p>
							Before importing your information please ensure that your excel sheet only the following columns
							and they are in the order as specified below <br>
							ID Number, Card Number, Full Name, Phone Number, D.O.B, Gender, Class, Address, Parent/Guardian Name,
							Parent/Guardian Phone Number, Relationship To Parent/Guardian
						</p>
					</div>
					<form id="importForm" method="POST" action="api/PHPExcel/import.php" enctype="multipart/form-data">
						<div class="input-group custom">
							<input name="excelfile" type="file" class="form-control form-control-lg">
							<div class="input-group-append custom">
								<span class="input-group-text"><i class="icon-copy dw dw-picure"></i></span>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="input-group mb-0">
									<input class="btn btn-primary btn-lg btn-block" type="submit" value="Procees">
								</div>
							</div>
						</div>
					</form>
					<button id="close-this" type="button" class="btn btn-secondary d-none" data-dismiss="modal"></button>
				</div>
			</div>
		</div>
	</div>
	<a id="wrong-format" href="#" class="btn-block d-none" data-toggle="modal" data-target="#wrong-format-modal" type="button"></a>
	<div class="modal fade" id="wrong-format-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm modal-dialog-centered">
			<div class="modal-content bg-danger text-white">
				<div class="modal-body text-center">
					<h3 class="text-white mb-15"><i class="fa fa-exclamation-triangle"></i></h3>
					<p>
						Your file has been rejected because it does not meet the required format
					</p>
					<button type="button" class="btn btn-light" data-dismiss="modal">Ok</button>
				</div>
			</div>
		</div>
	</div>
	<a id="warning" href="#" class="btn-block d-none" data-toggle="modal" data-target="#warning-modal" type="button"></a>
	<div class="modal fade" id="warning-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm modal-dialog-centered">
			<div class="modal-content bg-warning">
				<div class="modal-body text-center">
					<h3 class="mb-15"><i class="fa fa-exclamation-triangle"></i></h3>
					<p id="warning-text">
					</p>
					<button type="button" class="btn btn-dark" data-dismiss="modal">Ok</button>
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
	<script src="src/plugins/sweetalert2/sweetalert2.all.js"></script>
	<script src="src/plugins/sweetalert2/sweet-alert.init.js"></script>
</body>
</html>