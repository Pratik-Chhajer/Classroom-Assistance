<!-- To check if user is already logged in or not begins here-->
<?php require_once('include/dbConnect.php');
    $pageUrl = basename($_SERVER['PHP_SELF']);
    $pageName = explode(".",$pageUrl)[0];
    if ($pageName != 'login' && $pageName != 'signup') {
        if (isset($_SESSION['user']) == false) {
            header("LOCATION: login/login.php");  
        }   
    }
    $position = $_SESSION['user']['position'];
?>
<!-- To check if user is already logged in or not ends here-->

<!DOCTYPE html>
<!-- html begins here -->
<html lang="en">
<!-- head begins here -->
<head>
	<!-- title begins here -->
	<title>Classroom Assistant | Home</title>
	<link rel="shortcut icon" href="images/title.png"/>
	<!-- title ends here -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- stylesheets inclusion begins here -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fonts/ubuntu.css">
	<link rel="stylesheet" href="css/google-icons.css">
	<link rel="stylesheet" href="css/index.css">
	<!-- stylesheets inclusion begins here -->

	<!-- javascript inclusion begins here -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/highcharts.js"></script>
	<script src="js/highcharts-3d.js"></script>
	<script src="js/exporting.js"></script>
	<script src="js/index.js"></script>
	<!-- javascript inclusion ends here -->
</head>
<!-- head ends here -->

<!-- body begins here -->
<body>
	<!-- Fixed Top Navbar starts here-->
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">Home</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-left">
					<li><a id="about_button" class="navbar-brand" href="javascript:void(0)">About</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a id="logout_button" href="logout/logout.php"> <?php echo $_SESSION['user']['name'];?></a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Fixed Top Navbar ends here -->



	<!-- To give a vertical margin begins here -->
	<div style="margin-top: 80px;margin-bottom: 40px;">
		<!-- Home begins here -->
		<div class="container" id="options">
			<div class="row" align="center">
				<div class="col-sm-4">
				</div>
				<div class="col-sm-4" align="center">
					<button id="mycourses_button" class="btn btn-info" style="width: 200px;height: 40px;">My Courses</button>
					<br><br>
					<?php
					if($position==0){
					?>
					<button id="enroll_course_button" class="btn btn-info" style="width: 200px;height: 40px;">Enroll into a Course</button>
					<?php
					}
					else{
					?>
					<button id="add_course_button" class="btn btn-info" style="width: 200px;height: 40px;">Add a Course</button>
					<?php
					}
					?>
			    	</div>
		    	<div class="col-sm-4">
		    	</div>
		    </div>
		</div>
		<!-- Home ends here -->

		<div class="container" id="about" align="center">
			<ul class="list-group">
		    <li class="list-group-item">Classroom Assistance is a project which is part of CSP203 aka software system laboratory course of IIT Ropar durring AY 2016/17.</li>
		    </ul>
		    <ul class="list-group">
		    <li class="list-group-item">This project was made under the guidance of Dr. Mukesh Saini and Dr. Neeraj Goel.</li>
		    </ul>
		    <ul class="list-group">
		    <li class="list-group-item">This project was made by a team of four students Keshav Garg, Pratham Gupta, Pratik Chhajer and Thota Venkata Sainath.</li>
		  	</ul>
		</div>




		<!-- Options provided to student begins here -->
		<div class="container" id="student_option">
			<div class="row" align="center">
				<div class="col-sm-4">
				</div>
				<div class="col-sm-4" align="center">
					<button id="mark_attendance_button" class="btn btn-info" style="width: 200px;height: 40px;">Mark Attendance</button>
					<br><br>
					<button id="see_attendance_button" class="btn btn-info" style="width: 200px;height: 40px;">See Attendance</button>
					<br><br>
					<button id="answer_question_button" class="btn btn-info" style="width: 200px;height: 40px;">Answer Question</button>
				</div>
				<div class="col-sm-4">
				</div>
			</div>
		</div>
		<!-- Options provided to student ends here -->

		<!-- Options provided to faculty starts here -->
		<div class="container" id="faculty_option">
			<div class="row" align="center">
				<div class="col-sm-4">
				</div>
				<div class="col-sm-4" align="center">
					<button id="take_attendance_button" class="btn btn-info" style="width: 200px;height: 40px;">Take Attendance</button>
					<br><br>
					<button id="stop_password_submit" class="btn btn-info" style="width: 200px;height: 40px;">Stop Attendance</button>
					<br><br>
					<button id="see_attendance_faculty_button" class="btn btn-info" style="width: 200px;height: 40px;">Attendance csv</button>
					<br><br>
					<button id="list_attendance_button" class="btn btn-info" style="width: 200px;height: 40px;">List Attendance</button>
					<br><br>
					<button id="ask_question_button" class="btn btn-info" style="width: 200px;height: 40px;">Ask a Question</button>
					<br><br>
					<button id="see_question_button" class="btn btn-info" style="width: 200px;height: 40px;">View Response</button>
					<br><br>
					<button id="see_response_button" class="btn btn-info" style="width: 200px;height: 40px;">Responses csv</button>
				</div>
				<div class="col-sm-4">
				</div>
			</div>
		</div>
		<!-- Options provided to faculty ends here -->

		<!-- Common Course View for students and faculty begins here -->
		<div class="container">
			<div class="row" align="center">
				<div class="col-sm-4">
				</div>
				<div class="col-sm-4">
					<div id="my_course_view" align="center"></div>
				</div>
				<div class="col-sm-4">
				</div>
			</div>
		</div>
		<!-- Common Course View for students and faculty ends here -->

		<!-- For student to enroll into a course starts here -->
		<div class="container" id="enroll_course_form">
			<div class="row" align="center">
				<div class="col-sm-4">
				</div>
				<div class="col-sm-4" style="margin-left: 15px;margin-right: 15px;">
				<h3> Course Details </h3>
				<form class="form-horizontal" autocomplete="off">
					<div class="form-group">
						<select id="course_name_enroll" class="form-control" required>
							<option value="" disabled selected>Select a Course</option>
							<?php
								require_once('include/dbConnect.php');
								$sql = "SELECT * FROM course";
								$res = mysqli_query($con,$sql);
								if($res){
									while($row=$res->fetch_assoc()){
										?>
										<option value= <?php echo $row['course_name']; ?> > <?php echo $row['course_name']; ?></option>
										<?php
									}
								}
								else{
									$data->err = 'Invalid query: ' . $con->error;
								}
							?>
						</select>
					</div>
					<button id="course_enroll_submit" class="btn btn-info" style="width: 200px;height: 40px;">Submit</button>
				</form>
		    	</div>
		    	<div class="col-sm-4">
		    	</div>
		    </div>
		</div>
		<!-- For student to enroll into a course ends here -->

		<!-- For faculty to add a course begins here -->
		<div class="container" id="add_course_form">
			<div class="row" align="center">
				<div class="col-sm-4">
				</div>
				<div class="col-sm-4" style="margin-left: 15px;margin-right: 15px;">
				<h3> Course Details </h3>
				<form class="form-horizontal" autocomplete="off">
					<div class="form-group">
						<input type="text" class="form-control" id="course_name" placeholder="Course Name" required/>
					</div>
					<button id="course_add_submit" class="btn btn-info" style="width: 200px;height: 40px;">Submit</button>
				</form>
		    	</div>
		    	<div class="col-sm-4">
		    	</div>
		    </div>
		</div>
		<!-- For faculty to add a course ends here -->

		<!-- For student to mark attendance begins here -->
		<div class="container" id="mark_attendance_form">
			<div class="row" align="center">
				<div class="col-sm-4">
				</div>
				<div class="col-sm-4" style="margin-left: 15px;margin-right: 15px;">
				<h3> Submit Password </h3>
				<form class="form-horizontal" autocomplete="off">
					<div class="form-group">
						<input type="password" class="form-control" id="mark_password" placeholder="Enter password" required/>
					</div>
					<button id="mark_password_submit" class="btn btn-info" style="width: 200px;height: 40px;">Submit</button>
				</form>
		    	</div>
		    	<div class="col-sm-4">
		    	</div>
		    </div>
		</div>
		<!-- For student to mark attendance ends here -->

		<!-- For student to see attendance begins here -->
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
				</div>
				<div class="col-sm-4">
					<div id="attendance_pie" align="center" style="width: 300px"></div>
					<br>
				</div>
				<div class="col-sm-4">
				</div>
			</div>
		</div>	
		<!-- For student to see attendance ends here -->
		
		<!-- For student to see Question and to Answer begins here -->
		<div class="container" id="see_question_content">
			<div class="row" align="center">
				<div class="col-sm-4">
				</div>
				<div class="col-sm-4" style="margin-left: 15px;margin-right: 15px;">
					<h3><span id="question_text"></span></h3>
					<form class="form-horizontal" autocomplete="off">
						<div class="form-group">
							<select student_anser ="student_answer" id="student_answer" class="form-control" required>
								<option value="" disabled selected>Select your answer</option>
								<option value="a" id="a_student"></option>
								<option value="b" id="b_student"></option>
								<option value="c" id="c_student"></option>
								<option value="d" id="d_student"></option>
								<option value="e" id="e_student"></option>
							</select>
						</div>
						<button id="answer_submit" class="btn btn-info" style="width: 200px;height: 40px;">Submit</button>
					</form>
		    	</div>
		    	<div class="col-sm-4">
		    	</div>
		    </div>
		</div>
		<!-- For student to see Question and Answer ends here -->
		
		<!-- For faculty to take attendance begins here -->
		<div class="container" id="take_attendance_form">
			<div class="row" align="center">
				<div class="col-sm-4">
				</div>
				<div class="col-sm-4" style="margin-left: 15px;margin-right: 15px;">
				<h3> Set Password </h3>
				<form class="form-horizontal" autocomplete="off">
					<div class="form-group">
						<input type="password" class="form-control" id="set_password" placeholder="Enter new password" required/>
					</div>
					<button id="set_password_submit" class="btn btn-info" style="width: 200px;height: 40px;">Submit</button>
				</form>
		    	</div>
		    	<div class="col-sm-4">
		    	</div>
		    </div>
		</div>
		<!-- For faculty to take attendance ends here -->

		<!-- For faculty to stop attendance begins here -->
		<div class="container" id="stop_attendance_form">
			<!-- <div class="row" align="center">
				<div class="col-sm-4">
				</div>
				<div class="col-sm-4" style="margin-left: 15px;margin-right: 15px;">
				<h3> Change Password </h3>
				<form class="form-horizontal" autocomplete="off">
					<div class="form-group">
						<input type="password" class="form-control" id="stop_password" placeholder="Enter new password" required/>
					</div>
					<button id="stop_password_submit" class="btn btn-info" style="width: 200px;height: 40px;">Submit</button>
				</form>
		    	</div>
		    	<div class="col-sm-4">
		    	</div>
		    </div> -->
		</div>
		<!-- For faculty to stop attendance ends here -->

		<!-- For faculty to download attendance of whole class begins here -->
		<div class="container" id="download_attendance">
			<p style="text-align:center;"><a href="doc/attendance.csv" target="_blank" class="btn btn-info" style="width: 200px;height: 40px;" role="button">Download csv file</a></p>
		</div>
		<!-- For faculty to download attendance of whole class ends here -->

		<!-- For faculty to ask Question begins here -->
		<div class="container" id="ask_question_form">
			<div class="row" align="center">
				<div class="col-sm-4">
				</div>
				<div class="col-sm-4" style="margin-left: 15px;margin-right: 15px;">
				<h3> Question Details </h3>
				<form class="form-horizontal" autocomplete="off">
					<div class="form-group">
						<textarea class="form-control" rows="5" id="question" placeholder="Enter your question here"></textarea>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="a_option" placeholder="Option A" required/>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="b_option" placeholder="Option B">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="c_option" placeholder="Option C" >
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="d_option" placeholder="Option D" >
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="e_option" placeholder="Option E" >
					</div>
					
					<button id="question_submit" class="btn btn-info" style="width: 200px;height: 40px;">Submit</button>
				</form>
		    	</div>
		    	<div class="col-sm-4">
		    	</div>
		    </div>
		</div>
		<!-- For faculty to ask Question ends here -->

		<!-- For faculty to see Question and Response begins here -->
		<div class="container" id="see_question_resonse_content">
			<div class="row" align="center">
				<div class="col-sm-4">
				</div>
				<div class="col-sm-4" style="margin-left: 15px;margin-right: 15px;">
					<h3><span id="ques"></span></h3>
					<div id="response_pie" align="center" style="width: 300px;"></div>
					<br>
		    	</div>
		    	<div class="col-sm-4">
		    	</div>
		    </div>
		</div>
		<!-- For faculty to see Question and Response ends here -->

		<!-- For faculty to download response of whole class begins here -->
		<div class="container" id="download_response">
			<p style="text-align:center;"><a href="doc/response.csv" target="_blank" class="btn btn-info" style="width: 200px;height: 40px;" role="button">Download csv file</a></p>
		</div>
		<!-- For faculty to download response of whole class ends here -->

		<div class="container" id="list_attendance_content">
			<div class="row">
				<div class="col-sm-3">
				</div>
				<div class="col-sm-6" id="list_attendance">
				</div>
				<div class="col-sm-3">
				</div>
			</div>
		</div>

	</div>
	<!-- To give a vertical margin ends here -->
</body>
<!-- body ends here -->
</html>
<!-- html ends here -->