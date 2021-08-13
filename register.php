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

<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.php">
				<p style="margin: 0; font-size: 32px; text-transform: uppercase; font-weight: bold; text-align: center; color: #0f0faf" class="light-logo">Go Card</p>
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="login.php">Login</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="vendors/images/register-page-img.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="register-box bg-white box-shadow border-radius-10">
						<div class="wizard-content">
							<form id="regForm" method="POST" action="api/registration/reg.php" enctype="multipart/form-data" class="tab-wizard2 wizard-circle wizard">
								<h5>Basic Account Credentials</h5>
								<section>
									<div class="form-wrap max-width-600 mx-auto">
										<div class="form-group row d-none">
											<label class="col-sm-4 col-form-label"> Method*</label>
											<div class="col-sm-8">
												<input name="method" type="hidden" value="web" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Email Address*</label>
											<div class="col-sm-8">
												<input name="email" type="email" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Username*</label>
											<div class="col-sm-8">
												<input name="userName" type="text" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Password*</label>
											<div class="col-sm-8">
												<input name="pass1" type="password" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Confirm Password*</label>
											<div class="col-sm-8">
												<input name="pass2" type="password" class="form-control">
											</div>
										</div>
									</div>
								</section>
								<h5> Head/Principal Information</h5>
								<section>
									<div class="form-wrap max-width-600 mx-auto">
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Full Name*</label>
											<div class="col-sm-8">
												<input name="fullName" type="text" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Title*</label>
											<div class="col-sm-8">
												<select name="title" class="form-control">
													<option value="Mr"> Mr </option>
													<option value="Mrs"> Mrs </option>
													<option value="Miss"> Miss </option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"> Email </label>
											<div class="col-sm-8">
												<input name="headEmail" type="email" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"> Phone Number </label>
											<div class="col-sm-8">
												<input name="phoneNumber" type="text" class="form-control">
											</div>
										</div>
									</div>
								</section>
								<h5> School Information </h5>
								<section>
									<div class="form-wrap max-width-600 mx-auto">
										<div class="form-group row">
											<label class="col-sm-4 col-form-label"> Name of School*</label>
											<div class="col-sm-8">
												<input name="schoolName" type="text" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Level*</label>
											<div class="col-sm-8">
												<select name="level" class="form-control">
													<option value="Primary"> Primary </option>
													<option value="Secondary"> Secondary </option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Address*</label>
											<div class="col-sm-8">
												<input name="address" type="text" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">School Logo</label>
											<div class="col-sm-8">
												<input name="logo" type="file" class="form-control">
											</div>
										</div>
									</div>
								</section>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- success Popup html Start -->
	<button type="button" id="success-modal-btn" hidden data-toggle="modal" data-target="#success-modal" data-backdrop="static"></button>
	<div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered max-width-400" role="document">
			<div class="modal-content">
				<div class="modal-body text-center font-18">
					<h3 class="mb-20"> Registered! </h3>
					<div class="mb-30 text-center"><img src="vendors/images/success.png"></div>
					Thank you for registering on Go Card
				</div>
				<div class="modal-footer justify-content-center">
					<a href="index.php" class="btn btn-primary">Done</a>
				</div> 
			</div>
		</div>
	</div>
	<a id="email-modal" href="#" class="btn-block d-none" data-toggle="modal" data-target="#emails-modal" type="button"></a>
	<div class="modal fade" id="emails-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm modal-dialog-centered">
			<div class="modal-content bg-danger text-white">
				<div class="modal-body text-center">
					<h3 class="text-white mb-15"><i class="fa fa-exclamation-triangle"></i></h3>
					<p>
						Email already in use
					</p>
					<button type="button" class="btn btn-light" data-dismiss="modal">Ok</button>
				</div>
			</div>
		</div>
	</div>
	<a id="username-modal" href="#" class="btn-block d-none" data-toggle="modal" data-target="#usernames-modal" type="button"></a>
	<div class="modal fade" id="usernames-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm modal-dialog-centered">
			<div class="modal-content bg-danger text-white">
				<div class="modal-body text-center">
					<h3 class="text-white mb-15"><i class="fa fa-exclamation-triangle"></i></h3>
					<p>
						Username already in use
					</p>
					<button type="button" class="btn btn-light" data-dismiss="modal">Ok</button>
				</div>
			</div>
		</div>
	</div>
	<a id="password-modal" href="#" class="btn-block d-none" data-toggle="modal" data-target="#passwords-modal" type="button"></a>
	<div class="modal fade" id="passwords-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm modal-dialog-centered">
			<div class="modal-content bg-danger text-white">
				<div class="modal-body text-center">
					<h3 class="text-white mb-15"><i class="fa fa-exclamation-triangle"></i></h3>
					<p>
						Passwords do not match
					</p>
					<button type="button" class="btn btn-light" data-dismiss="modal">Ok</button>
				</div>
			</div>
		</div>
	</div>
	<a id="fail-modal" href="#" class="btn-block d-none" data-toggle="modal" data-target="#failed-modal" type="button"></a>
	<div class="modal fade" id="failed-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm modal-dialog-centered">
			<div class="modal-content bg-danger text-white">
				<div class="modal-body text-center">
					<h3 class="text-white mb-15"><i class="fa fa-exclamation-triangle"></i></h3>
					<p>
						Failed to register. Please try again
					</p>
					<button type="button" class="btn btn-light" data-dismiss="modal">Ok</button>
				</div>
			</div>
		</div>
	</div>
	<!-- success Popup html End -->
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/jquery-steps/jquery.steps.js"></script>
	<script src="vendors/scripts/steps-setting.js"></script>
	<script src="src/plugins/sweetalert2/sweetalert2.all.js"></script>
	<script src="src/plugins/sweetalert2/sweet-alert.init.js"></script>
</body>

</html>