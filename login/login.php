<!DOCTYPE html>
<html lang="en">
<head>
	<title>Classroom Assistant | Log In</title>
	<link rel="shortcut icon" href="../images/title.png"/>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/fonts/ubuntu.css">
	<link rel="stylesheet" href="../css/google-icons.css">
	<link rel="stylesheet" href="../css/index.css">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
	$("#form_result").hide();
	$("#success_form").hide();
	$("#loginsub").click(function(e){
		e.preventDefault();
		$("#login_form").hide();
		var email_read = document.getElementById("email").value;
		var password_read = document.getElementById("password").value;
		var data = {email : email_read, password : password_read, submit: true};
		//console.log(data);
		//console.log(data);
		 $.ajax({
		 	url: "../include/login.php", 
		 	type:"POST",
		 	data: data, 
		 	success: function(result){
	        	console.log(result);
		 		result = $.parseJSON(result);
		 		console.log(result);
	        	err = result["err"];
	        	if(err=="true"){
	        		err = "";
	        		$("#success_form").show();
	        	}
	        	else{
	        		$("#login_form").show();
	        	}
	        	document.getElementById("message").innerHTML = err;
	    	}
	    });
		$("#form_result").show();
	});
});
</script>
</head>

<body>
	<div class="container" id="form_result">
		<h3 align="center"><span id="message" style="align-content: center;"></span></h3>
	</div>
	<div class="container" id="login_form">
		<div class="row" align="center">
			<div class="col-sm-4">
			</div>
			<div class="col-sm-4" style="margin-left: 15px;margin-right: 15px;">
				<h2> Log In </h2>
				<hr>
				<form class="form-horizontal" autocomplete="off">
					<div class="form-group">
						<input type="email" class="form-control" id="email" placeholder="Enter email" required/>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="password" placeholder="Enter password" required/>
					</div>
					<button id="loginsub" class="btn btn-info">Log In</button>
				</form>
				<hr>
				<p> Not registered yet? <a href="../signup/signup.php">click here</a></p>
			</div>
			<div class="col-sm-4">
			</div>
		</div>
	</div>
	<div class="container" align="center" id="success_form">
		<div class="row">
			<div class="col-sm-4">
			</div>
			<div class="col-sm-4">
				<h3>Welcome</h3>
				<p><a href="../index.php" class="btn btn-info" role="button">Take me to homepage</a></p>
			</div>
			<div class="col-sm-4">
			</div>
		</div>
	</div>
</body>
</html>