$(".tab-wizard").steps({
	headerTag: "h5",
	bodyTag: "section",
	transitionEffect: "fade",
	titleTemplate: '<span class="step">#index#</span> #title#',
	labels: {
		finish: "Submit"
	},
	onStepChanged: function (event, currentIndex, priorIndex) {
		$('.steps .current').prevAll().addClass('disabled');
	},
	onFinished: function (event, currentIndex) {
		$('#success-modal').modal('show');
	}
});

$(".tab-wizard2").steps({
	headerTag: "h5",
	bodyTag: "section",
	transitionEffect: "fade",
	titleTemplate: '<span class="step">#index#</span> <span class="info">#title#</span>',
	labels: {
		finish: "Submit",
		next: "Next",
		previous: "Previous",
	},
	onStepChanged: function(event, currentIndex, priorIndex) {
		$('.steps .current').prevAll().addClass('disabled');
	},
	onFinished: function(event, currentIndex) {
		$('#success-modal-btn').trigger('click');
	}
});

$("#regForm").submit(function (event){
	event.preventDefault()
	var a = $("#regForm").attr('action');
    $.ajax({
        type: "POST",
        url: a,
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success : function(text){
			if (text.result == "Registered") {
				$('#success-modal-btn').trigger('click');
			}else if (text.result == "Email already in use") {
				$('#email-modal').trigger('click');
			}else if (text.result == "Username already in use") {
				$('#username-modal').trigger('click');
			}else if (text.result == "Passwords do not match") {
				$('#password-modal').trigger('click');
			}else{
				$('#fail-modal').trigger('click');
			}
        }
    });
})

$("#logForm").submit(function (event){
	event.preventDefault()
	var a = $("#logForm").attr('action');
    $.ajax({
        type: "POST",
        url: a,
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success : function(text){
			if (text.result == "Logged") {
				window.open('index.php', '_self')
			}else{
				$('#fail').trigger('click');
			}
        }
    });
})

$("#addLevelForm").submit(function (event){
	event.preventDefault()
	var a = $("#addLevelForm").attr('action');
	$.ajax({
	type: "POST",
	url: a,
	data: new FormData(this),
		contentType: false,
		cache: false,
		processData: false,
		success : function(text){
			if (text.result == "success") {
				$('#success-modal-btn').trigger('click');
			}
		}
	});
})

$("#addClassForm").submit(function (event){
	event.preventDefault()
	var a = $("#addClassForm").attr('action');
	$.ajax({
	type: "POST",
	url: a,
	data: new FormData(this),
		contentType: false,
		cache: false,
		processData: false,
		success : function(text){
			console.log(text)
			if (text.result == "success") {
				$('#success-modal-btn').trigger('click');
			}
		}
	});
})

$("#addStudentForm").submit(function (event){
	event.preventDefault()
	var a = $("#addStudentForm").attr('action');
	$.ajax({
	type: "POST",
	url: a,
	data: new FormData(this),
		contentType: false,
		cache: false,
		processData: false,
		success : function(text){
			console.log(text)
			if (text.result == "success") {
				$('#success-modal-btn').trigger('click');
			}
		}
	});
})

$("#addTeacherForm").submit(function (event){
	event.preventDefault()
	var a = $("#addTeacherForm").attr('action');
	$.ajax({
	type: "POST",
	url: a,
	data: new FormData(this),
		contentType: false,
		cache: false,
		processData: false,
		success : function(text){
			if (text.result == "success") {
				$('#success-modal-btn').trigger('click');
			}
		}
	});
})

$("#studentInfoForm").submit(function (event){
	event.preventDefault()
	var a = $("#studentInfoForm").attr('action');
	$.ajax({
        type: "POST",
		url: a,
		data: new FormData(this),
		contentType: false,
		cache: false,
		processData: false,
		success : function(text){
			if(text.result == "success"){
				$('#sa-custom-position').trigger('click');
			}else if(text.result == "fail"){
				$('#fail').trigger('click');
			}
		}
	});
})

$("#teacherInfoForm").submit(function (event){
	event.preventDefault()
	var a = $("#teacherInfoForm").attr('action');
	$.ajax({
        type: "POST",
		url: a,
		data: new FormData(this),
		contentType: false,
		cache: false,
		processData: false,
		success : function(text){
			if(text.result == "success"){
				$('#sa-custom-position4').trigger('click');
			}else if(text.result == "fail"){
				$('#fail').trigger('click');
			}
		}
	});
})

$("#schoolInfoForm").submit(function (event){
	event.preventDefault()
	var a = $("#schoolInfoForm").attr('action');
	$.ajax({
        type: "POST",
		url: a,
		data: new FormData(this),
		contentType: false,
		cache: false,
		processData: false,
		success : function(text){
			if(text.result == "success"){
				$('#sa-custom-position2').trigger('click');
			}else if(text.result == "fail"){
				$('#fail').trigger('click');
			}
		}
	});
})

$("#schoolPasswordForm").submit(function (event){
	event.preventDefault()
	var a = $("#schoolPasswordForm").attr('action');
	$.ajax({
        type: "POST",
		url: a,
		data: new FormData(this),
		contentType: false,
		cache: false,
		processData: false,
		success : function(text){
			if(text.result == "passwords do not match"){
				$('#unmatch').trigger('click');
			}else if(text.result == "wrong current password"){
				$('#wrong-pass').trigger('click');
			}else if(text.result == "success"){
				$('#sa-custom-position3').trigger('click');
			}else if(text.result == "fail"){
				$('#pass-fail').trigger('click');
			}
		}
	});
})

$("#createTermForm").submit(function (event){
	event.preventDefault()
	var a = $("#createTermForm").attr('action');
	$.ajax({
        type: "POST",
		url: a,
		data: new FormData(this),
		contentType: false,
		cache: false,
		processData: false,
		success : function(text){
			if(text.result == "done"){
				$('#custom-padding-width-alert2').trigger('click');
			}else{
				$('#fail').trigger('click');
			}
		}
	});
})

$("#endTermForm").submit(function (event){
	event.preventDefault()
	var a = $("#endTermForm").attr('action');
	$.ajax({
        type: "POST",
		url: a,
		data: new FormData(this),
		contentType: false,
		cache: false,
		processData: false,
		success : function(text){
			if(text.result == "done"){
				$('#custom-padding-width-alert').trigger('click');
			}else if(text.result == "fail"){
				$('#fail').trigger('click');
			}
		}
	});
})

$("#import").click(function (params) {
	$("#log-modal").trigger('click');
	return false
})

$("#importForm").submit(function (event){
	event.preventDefault()
	var a = $("#importForm").attr('action');
	$.ajax({
        type: "POST",
		url: a,
		data: new FormData(this),
		contentType: false,
		cache: false,
		processData: false,
		success : function(text){
			if(text.result == "not logged in"){
				window.open('index.php', '_self');
				//$('#custom-padding-width-alert').trigger('click');
			}else if(text.result == "wrong format"){
				$('#close-this').trigger('click');
				$('#wrong-format').trigger('click');
			}else if(text.result == "success"){
				$('#close-this').trigger('click');
				$('#import-success-modal-btn').trigger('click');
			}else{
				document.getElementById("warning-text").innerHTML = text.result;
				$('#close-this').trigger('click');
				$('#warning').trigger('click');
			}
		}
	});
})