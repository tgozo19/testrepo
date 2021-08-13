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
	<link rel="stylesheet" type="text/css" href="src/plugins/cropperjs/dist/cropper.css">
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
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4>Profile</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profile</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-30">
						<div class="card-box height-100-p overflow-hidden">
							<div class="profile-tab height-100-p">
								<div class="tab height-100-p">
									<ul class="nav nav-tabs customtab" role="tablist">
                                        <li class="nav-item">
											<a class="nav-link active" data-toggle="tab" href="#setting" role="tab"> Edit School Info </a>
										</li>
                                        <li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#passwords" role="tab"> Passwords </a>
										</li>
									</ul>
									<div class="tab-content">
                                        <div class="tab-pane fade show active height-100-p" id="setting" role="tabpanel">
											<div class="profile-setting">
												<form id="schoolInfoForm" method="POST" action="api/edit-school-info.php" enctype="multipart/form-data">
													<ul id="editSchoolInfo" class="profile-edit-list row">
														
													</ul>
												</form>
											</div>
										</div>
										<div class="tab-pane fade" id="passwords" role="tabpanel">
											<div class="">
                                                <div class="profile-setting">
                                                    <form id="schoolPasswordForm" method="POST" action="api/change-password.php" enctype="multipart/form-data">
                                                        <ul id="editSchoolPass" class="profile-edit-list row">
                                                            
                                                        </ul>
                                                    </form>
                                                </div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<button class="d-none" type="button" class="btn mb-20 btn-primary btn-block" id="sa-custom-position2"></button>
			<button class="d-none" type="button" class="btn mb-20 btn-primary btn-block" id="sa-custom-position3"></button>
			<a id="fail" href="#" class="btn-block d-none" data-toggle="modal" data-target="#alert-modal" type="button"></a>
			<div class="modal fade" id="alert-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm modal-dialog-centered">
					<div class="modal-content bg-danger text-white">
						<div class="modal-body text-center">
							<h3 class="text-white mb-15"><i class="fa fa-exclamation-triangle"></i></h3>
							<p>
								Failed to update school information. Please try again
							</p>
							<button type="button" class="btn btn-light" data-dismiss="modal"> OK </button>
						</div>
					</div>
				</div>
			</div>
			<a id="unmatch" href="#" class="btn-block d-none" data-toggle="modal" data-target="#unmatch-modal" type="button"></a>
			<div class="modal fade" id="unmatch-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm modal-dialog-centered">
					<div class="modal-content bg-danger text-white">
						<div class="modal-body text-center">
							<h3 class="text-white mb-15"><i class="fa fa-exclamation-triangle"></i></h3>
							<p>
								Passwords do not match
							</p>
							<button type="button" class="btn btn-light" data-dismiss="modal"> OK </button>
						</div>
					</div>
				</div>
			</div>
			<a id="wrong-pass" href="#" class="btn-block d-none" data-toggle="modal" data-target="#wrong-pass-modal" type="button"></a>
			<div class="modal fade" id="wrong-pass-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm modal-dialog-centered">
					<div class="modal-content bg-danger text-white">
						<div class="modal-body text-center">
							<h3 class="text-white mb-15"><i class="fa fa-exclamation-triangle"></i></h3>
							<p>
								Incorrect Current Password
							</p>
							<button type="button" class="btn btn-light" data-dismiss="modal"> OK </button>
						</div>
					</div>
				</div>
			</div>
			<a id="pass-fail" href="#" class="btn-block d-none" data-toggle="modal" data-target="#pass-fail-modal" type="button"></a>
			<div class="modal fade" id="pass-fail-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm modal-dialog-centered">
					<div class="modal-content bg-danger text-white">
						<div class="modal-body text-center">
							<h3 class="text-white mb-15"><i class="fa fa-exclamation-triangle"></i></h3>
							<p>
								Failed to update password. Please try again
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
	<script src="src/plugins/cropperjs/dist/cropper.js"></script>
	<script src="src/plugins/jquery-steps/jquery.steps.js"></script>
	<script src="vendors/scripts/steps-setting.js"></script>
	<script src="src/scripts/custom.js"></script>
	<script src="src/plugins/sweetalert2/sweetalert2.all.js"></script>
	<script src="src/plugins/sweetalert2/sweet-alert.init.js"></script>
	<script>
		window.addEventListener('DOMContentLoaded', function () {
			var image = document.getElementById('image');
			var cropBoxData;
			var canvasData;
			var cropper;

			$('#modal').on('shown.bs.modal', function () {
				cropper = new Cropper(image, {
					autoCropArea: 0.5,
					dragMode: 'move',
					aspectRatio: 3 / 3,
					restore: false,
					guides: false,
					center: false,
					highlight: false,
					cropBoxMovable: false,
					cropBoxResizable: false,
					toggleDragModeOnDblclick: false,
					ready: function () {
						cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
					}
				});
			}).on('hidden.bs.modal', function () {
				cropBoxData = cropper.getCropBoxData();
				canvasData = cropper.getCanvasData();
				cropper.destroy();
			});
		});
	</script>
</body>
</html>