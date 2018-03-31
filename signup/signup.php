<!DOCTYPE html>
<html lang="en">
<head>
	<title>Classroom Assistant | sign-up</title>
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
	$("#signup_form").show();
	$("#success_form").hide();
	$("#signsub").click(function(e){
		e.preventDefault();
		$("#signup_form").hide();
		var name = document.getElementById("name").value;
		var roll = document.getElementById("roll").value;
		var email = document.getElementById("email").value;
		var password = document.getElementById("password").value;
		var re_password = document.getElementById("re_password").value;
		var position = document.getElementById("position").value;
		var data = {name : name, roll : roll, email : email, password : password, re_password : re_password, position : position, submit: true};
		//console.log(data);
		 $.ajax({
		 	url: "../include/register.php", 
		 	type:"POST",
		 	data: data, 
		 	success: function(result){
	        	// console.log(result);
		 		result = $.parseJSON(result);
		 		//console.log(result);
	        	err = result["err"];
	        	if(err=="true"){
	        		err = "Successfully registered!";
	        		alert(err);
	        		$("#signup_form").hide();
	        		$("#success_form").show();
	        	}
	        	else{
	        		alert(err);
	        		$("#signup_form").show();
	        	}
	    	}
	    });
	});
});
</script>
</head>

<body>
	<div class="container" id="signup_form">
		<div class="row" align="center">
			<div class="col-sm-4">
			</div>
			<div class="col-sm-4" style="margin-left: 15px;margin-right: 15px;">
				<h2> Sign Up</h2>
				<hr>
				<form class="form-horizontal" autocomplete="off">
					<div class="form-group">
						<input type="text" class="form-control" id="name" placeholder="Enter name" required/>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="roll" placeholder="Enter entry number" required/>
					</div>
					<div class="form-group">
						<input type="email" class="form-control" id="email" placeholder="Enter email" required/>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="password" placeholder="Enter password" required/>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="re_password" placeholder="Enter password again" required/>
					</div>
					<div class="form-group">
						<select position="position" id="position" class="form-control" required>
							<option value="" disabled selected>Select your position</option>
							<option value=1>Faculty</option>
							<option value=0>Student</option>
						</select>
					</div>
					<button id="signsub" class="btn btn-info">Sign Up</button>
				</form>
				<hr>
				<p> Already registered? <a href="../index.php">click here</a></p>
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