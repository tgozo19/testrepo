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
											<a class="nav-link active" data-toggle="tab" href="#timeline" role="tab"> Student Info </a>
										</li>
										<li class="nav-item d-none">
											<a class="nav-link" data-toggle="tab" href="#tasks" role="tab">Tasks</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#setting" role="tab"> Edit Student Info </a>
										</li>
									</ul>
									<div class="tab-content">
										<!-- Timeline Tab start -->
										<div class="tab-pane fade show active" id="timeline" role="tabpanel">
											<div class="pd-20">
												<div class="pd-20 card-box height-100-p">
													<div class="row">
														<div id="studentProfileDetails" class="col-md-3">
															<div id="studentImg" class="profile-photo">
																<a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
																<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
																	<div class="modal-dialog modal-dialog-centered" role="document">
																		<div class="modal-content">
																			<div class="modal-body pd-5">
																				<div class="img-container">
																					<img id="image" src="vendors/images/photo2.jpg" alt="Picture">
																				</div>
																			</div>
																			<div class="modal-footer">
																				<input type="submit" value="Update" class="btn btn-primary">
																				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-md-9">
															<div class="profile-info">
																<h5 class="mb-20 h5 text-blue text-uppercase">Student Information</h5>
																<ul id="studentInfo">
																</ul>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- Timeline Tab End -->
										<!-- Tasks Tab start -->
										<div class="tab-pane fade" id="tasks" role="tabpanel">
											<div class="pd-20 profile-task-wrap">
												<div class="container pd-0">
													<!-- Open Task start -->
													<div class="task-title row align-items-center">
														<div class="col-md-8 col-sm-12">
															<h5>Open Tasks (4 Left)</h5>
														</div>
														<div class="col-md-4 col-sm-12 text-right">
															<a href="task-add" data-toggle="modal" data-target="#task-add" class="bg-light-blue btn text-blue weight-500"><i class="ion-plus-round"></i> Add</a>
														</div>
													</div>
													<div class="profile-task-list pb-30">
														<ul>
															<li>
																<div class="custom-control custom-checkbox mb-5">
																	<input type="checkbox" class="custom-control-input" id="task-1">
																	<label class="custom-control-label" for="task-1"></label>
																</div>
																<div class="task-type">Email</div>
																Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id ea earum.
																<div class="task-assign">Assigned to Ferdinand M. <div class="due-date">due date <span>22 February 2019</span></div></div>
															</li>
															<li>
																<div class="custom-control custom-checkbox mb-5">
																	<input type="checkbox" class="custom-control-input" id="task-2">
																	<label class="custom-control-label" for="task-2"></label>
																</div>
																<div class="task-type">Email</div>
																Lorem ipsum dolor sit amet.
																<div class="task-assign">Assigned to Ferdinand M. <div class="due-date">due date <span>22 February 2019</span></div></div>
															</li>
															<li>
																<div class="custom-control custom-checkbox mb-5">
																	<input type="checkbox" class="custom-control-input" id="task-3">
																	<label class="custom-control-label" for="task-3"></label>
																</div>
																<div class="task-type">Email</div>
																Lorem ipsum dolor sit amet, consectetur adipisicing elit.
																<div class="task-assign">Assigned to Ferdinand M. <div class="due-date">due date <span>22 February 2019</span></div></div>
															</li>
															<li>
																<div class="custom-control custom-checkbox mb-5">
																	<input type="checkbox" class="custom-control-input" id="task-4">
																	<label class="custom-control-label" for="task-4"></label>
																</div>
																<div class="task-type">Email</div>
																Lorem ipsum dolor sit amet. Id ea earum.
																<div class="task-assign">Assigned to Ferdinand M. <div class="due-date">due date <span>22 February 2019</span></div></div>
															</li>
														</ul>
													</div>
													<!-- Open Task End -->
													<!-- Close Task start -->
													<div class="task-title row align-items-center">
														<div class="col-md-12 col-sm-12">
															<h5>Closed Tasks</h5>
														</div>
													</div>
													<div class="profile-task-list close-tasks">
														<ul>
															<li>
																<div class="custom-control custom-checkbox mb-5">
																	<input type="checkbox" class="custom-control-input" id="task-close-1" checked="" disabled="">
																	<label class="custom-control-label" for="task-close-1"></label>
																</div>
																<div class="task-type">Email</div>
																Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id ea earum.
																<div class="task-assign">Assigned to Ferdinand M. <div class="due-date">due date <span>22 February 2018</span></div></div>
															</li>
															<li>
																<div class="custom-control custom-checkbox mb-5">
																	<input type="checkbox" class="custom-control-input" id="task-close-2" checked="" disabled="">
																	<label class="custom-control-label" for="task-close-2"></label>
																</div>
																<div class="task-type">Email</div>
																Lorem ipsum dolor sit amet.
																<div class="task-assign">Assigned to Ferdinand M. <div class="due-date">due date <span>22 February 2018</span></div></div>
															</li>
															<li>
																<div class="custom-control custom-checkbox mb-5">
																	<input type="checkbox" class="custom-control-input" id="task-close-3" checked="" disabled="">
																	<label class="custom-control-label" for="task-close-3"></label>
																</div>
																<div class="task-type">Email</div>
																Lorem ipsum dolor sit amet, consectetur adipisicing elit.
																<div class="task-assign">Assigned to Ferdinand M. <div class="due-date">due date <span>22 February 2018</span></div></div>
															</li>
															<li>
																<div class="custom-control custom-checkbox mb-5">
																	<input type="checkbox" class="custom-control-input" id="task-close-4" checked="" disabled="">
																	<label class="custom-control-label" for="task-close-4"></label>
																</div>
																<div class="task-type">Email</div>
																Lorem ipsum dolor sit amet. Id ea earum.
																<div class="task-assign">Assigned to Ferdinand M. <div class="due-date">due date <span>22 February 2018</span></div></div>
															</li>
														</ul>
													</div>
													<!-- Close Task start -->
													<!-- add task popup start -->
													<div class="modal fade customscroll" id="task-add" tabindex="-1" role="dialog">
														<div class="modal-dialog modal-dialog-centered" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLongTitle">Tasks Add</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Close Modal">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body pd-0">
																	<div class="task-list-form">
																		<ul>
																			<li>
																				<form>
																					<div class="form-group row">
																						<label class="col-md-4">Task Type</label>
																						<div class="col-md-8">
																							<input type="text" class="form-control">
																						</div>
																					</div>
																					<div class="form-group row">
																						<label class="col-md-4">Task Message</label>
																						<div class="col-md-8">
																							<textarea class="form-control"></textarea>
																						</div>
																					</div>
																					<div class="form-group row">
																						<label class="col-md-4">Assigned to</label>
																						<div class="col-md-8">
																							<select class="selectpicker form-control" data-style="btn-outline-primary" title="Not Chosen" multiple="" data-selected-text-format="count" data-count-selected-text= "{0} people selected">
																								<option>Ferdinand M.</option>
																								<option>Don H. Rabon</option>
																								<option>Ann P. Harris</option>
																								<option>Katie D. Verdin</option>
																								<option>Christopher S. Fulghum</option>
																								<option>Matthew C. Porter</option>
																							</select>
																						</div>
																					</div>
																					<div class="form-group row mb-0">
																						<label class="col-md-4">Due Date</label>
																						<div class="col-md-8">
																							<input type="text" class="form-control date-picker">
																						</div>
																					</div>
																				</form>
																			</li>
																			<li>
																				<a href="javascript:;" class="remove-task"  data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Remove Task"><i class="ion-minus-circled"></i></a>
																				<form>
																					<div class="form-group row">
																						<label class="col-md-4">Task Type</label>
																						<div class="col-md-8">
																							<input type="text" class="form-control">
																						</div>
																					</div>
																					<div class="form-group row">
																						<label class="col-md-4">Task Message</label>
																						<div class="col-md-8">
																							<textarea class="form-control"></textarea>
																						</div>
																					</div>
																					<div class="form-group row">
																						<label class="col-md-4">Assigned to</label>
																						<div class="col-md-8">
																							<select class="selectpicker form-control" data-style="btn-outline-primary" title="Not Chosen" multiple="" data-selected-text-format="count" data-count-selected-text= "{0} people selected">
																								<option>Ferdinand M.</option>
																								<option>Don H. Rabon</option>
																								<option>Ann P. Harris</option>
																								<option>Katie D. Verdin</option>
																								<option>Christopher S. Fulghum</option>
																								<option>Matthew C. Porter</option>
																							</select>
																						</div>
																					</div>
																					<div class="form-group row mb-0">
																						<label class="col-md-4">Due Date</label>
																						<div class="col-md-8">
																							<input type="text" class="form-control date-picker">
																						</div>
																					</div>
																				</form>
																			</li>
																		</ul>
																	</div>
																	<div class="add-more-task">
																		<a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add Task"><i class="ion-plus-circled"></i> Add More Task</a>
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-primary">Add</button>
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																</div>
															</div>
														</div>
													</div>
													<!-- add task popup End -->
												</div>
											</div>
										</div>
										<!-- Tasks Tab End -->
										<!-- Setting Tab start -->
										<div class="tab-pane fade height-100-p" id="setting" role="tabpanel">
											<div class="profile-setting">
												<form id="studentInfoForm" method="POST" action="api/edit-student-info.php" enctype="multipart/form-data">
													<ul id="editStudentInfo" class="profile-edit-list row">
														
													</ul>
												</form>
											</div>
										</div>
										<!-- Setting Tab End -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<button class="d-none" type="button" class="btn mb-20 btn-primary btn-block" id="sa-custom-position"></button>
			<a id="fail" href="#" class="btn-block d-none" data-toggle="modal" data-target="#alert-modal" type="button">
				
			</a>
			<div class="modal fade" id="alert-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm modal-dialog-centered">
					<div class="modal-content bg-danger text-white">
						<div class="modal-body text-center">
							<h3 class="text-white mb-15"><i class="fa fa-exclamation-triangle"></i></h3>
							<p>
								Failed to update student information. Please try again
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