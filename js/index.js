$(document).ready(function(){

	$("#options").show();
	$("#my_course_view").hide(); 
	$('#student_option').hide();
	$('#faculty_option').hide();
	$('#add_course_form').hide();
	$('#enroll_course_form').hide();
	$('#take_attendance_form').hide();
	$('#stop_attendance_form').hide();
	$('#mark_attendance_form').hide();
	$('#attendance_pie').hide();
	$('#response_pie').hide();
	$('#download_attendance').hide();
	$('#ask_question_form').hide();
	$('#see_question_resonse_content').hide();
	$('#see_question_content').hide();
	$('#download_response').hide();
	$('#list_attendance_contnet').hide();
	$('#about').hide();

	$("#about_button").click(function(){
		$("#options").hide();
		$("#my_course_view").hide(); 
		$('#student_option').hide();
		$('#faculty_option').hide();
		$('#add_course_form').hide();
		$('#enroll_course_form').hide();
		$('#take_attendance_form').hide();
		$('#stop_attendance_form').hide();
		$('#mark_attendance_form').hide();
		$('#attendance_pie').hide();
		$('#response_pie').hide();
		$('#download_attendance').hide();
		$('#ask_question_form').hide();
		$('#see_question_resonse_content').hide();
		$('#see_question_content').hide();
		$('#download_response').hide();
		$('#list_attendance_contnet').hide();
		$('#about').show();
	});

	$("#ask_question_button").click(function(){	
		$("#options").hide();
		$("#my_course_view").hide(); 
		$('#student_option').hide();
		$('#faculty_option').hide();
		$('#add_course_form').hide();
		$('#enroll_course_form').hide();
		$('#take_attendance_form').hide();
		$('#stop_attendance_form').hide();
		$('#mark_attendance_form').hide();
		$('#attendance_pie').hide();
		$('#response_pie').hide();
		$('#download_attendance').hide();
		$('#ask_question_form').show();
		$('#see_question_resonse_content').hide();
		$('#see_question_content').hide();
		$('#download_response').hide();
		$('#list_attendance_contnet').hide();
		$('#about').hide();
	});

	$("#mark_attendance_button").click(function(){	
		$("#options").hide();
		$("#my_course_view").hide(); 
		$('#student_option').hide();
		$('#faculty_option').hide();
		$('#add_course_form').hide();
		$('#enroll_course_form').hide();
		$('#take_attendance_form').hide();
		$('#stop_attendance_form').hide();
		$('#mark_attendance_form').show();
		$('#attendance_pie').hide();
		$('#response_pie').hide();
		$('#download_attendance').hide();
		$('#ask_question_form').hide();
		$('#see_question_resonse_content').hide();
		$('#see_question_content').hide();
		$('#download_response').hide();
		$('#list_attendance_contnet').hide();
		$('#about').hide();
	});

	$("#take_attendance_button").click(function(){	
		$("#options").hide();
		$("#my_course_view").hide(); 
		$('#student_option').hide();
		$('#faculty_option').hide();
		$('#add_course_form').hide();
		$('#enroll_course_form').hide();
		$('#take_attendance_form').show();
		$('#stop_attendance_form').hide();
		$('#mark_attendance_form').hide();
		$('#attendance_pie').hide();
		$('#response_pie').hide();
		$('#download_attendance').hide();
		$('#ask_question_form').hide();
		$('#see_question_resonse_content').hide();
		$('#see_question_content').hide();
		$('#download_response').hide();
		$('#list_attendance_contnet').hide();
		$('#about').hide();
	});

	$("#stop_attendance_button").click(function(){	
		$("#options").hide();
		$("#my_course_view").hide(); 
		$('#student_option').hide();
		$('#faculty_option').hide();
		$('#add_course_form').hide();
		$('#enroll_course_form').hide();
		$('#take_attendance_form').hide();
		$('#stop_attendance_form').show();
		$('#mark_attendance_form').hide();
		$('#attendance_pie').hide();
		$('#response_pie').hide();
		$('#download_attendance').hide();
		$('#ask_question_form').hide();
		$('#see_question_resonse_content').hide();
		$('#see_question_content').hide();
		$('#download_response').hide();
		$('#list_attendance_contnet').hide();
		$('#about').hide();
	});

	$("#add_course_button").click(function(){	
		$("#options").hide();
		$("#my_course_view").hide(); 
		$('#student_option').hide();
		$('#faculty_option').hide();
		$('#add_course_form').show();
		$('#enroll_course_form').hide();
		$('#take_attendance_form').hide();
		$('#stop_attendance_form').hide();
		$('#mark_attendance_form').hide();
		$('#attendance_pie').hide();
		$('#response_pie').hide();
		$('#download_attendance').hide();
		$('#ask_question_form').hide();
		$('#see_question_resonse_content').hide();
		$('#see_question_content').hide();
		$('#download_response').hide();
		$('#list_attendance_contnet').hide();
		$('#about').hide();
	});

	$("#enroll_course_button").click(function(){	
		$("#options").hide();
		$("#my_course_view").hide(); 
		$('#student_option').hide();
		$('#faculty_option').hide();
		$('#add_course_form').hide();
		$('#enroll_course_form').show();
		$('#take_attendance_form').hide();
		$('#stop_attendance_form').hide();
		$('#mark_attendance_form').hide();
		$('#attendance_pie').hide();
		$('#response_pie').hide();
		$('#download_attendance').hide();
		$('#ask_question_form').hide();
		$('#see_question_resonse_content').hide();
		$('#see_question_content').hide();
		$('#download_response').hide();
		$('#list_attendance_contnet').hide();
		$('#about').hide();
	});

	$("#course_enroll_submit").click(function(){
		course_name = document.getElementById("course_name_enroll").value;
		data = {course_name : course_name, submit: true};
		////console.log(data);
		$.ajax({
		 	url: "include/course_enroll.php", 
		 	type:"POST",
		 	data: data, 
		 	success: function(result){
	        	////console.log(result);
		 		result = $.parseJSON(result);
		 		////console.log(result);
		 		if(result["err"]=='true'){
		 			alert(course_name + " successfully registered");
		 		}
		 		else{
		 			alert(result["err"]);
		 		}
	    	}
	    });
	    $("#options").show();
		$("#my_course_view").hide(); 
		$('#student_option').hide();
		$('#faculty_option').hide();
		$('#add_course_form').hide();
		$('#enroll_course_form').hide();
		$('#take_attendance_form').hide();
		$('#stop_attendance_form').hide();
		$('#mark_attendance_form').hide();
		$('#attendance_pie').hide();
		$('#response_pie').hide();
		$('#download_attendance').hide();
		$('#ask_question_form').hide();
		$('#see_question_resonse_content').hide();
		$('#see_question_content').hide();
		$('#download_response').hide();
		$('#list_attendance_contnet').hide();
		$('#about').hide();
	});


	$("#course_add_submit").click(function(){
		var course_name = document.getElementById("course_name").value;
		var data = {course_name : course_name, submit: true};
		$.ajax({
		 	url: "include/course_add.php", 
		 	type:"POST",
		 	data: data, 
		 	success: function(result){
	        	// //console.log(result);
		 		result = $.parseJSON(result);
		 		////console.log(result);
		 		if(result["err"]=='true'){
		 			alert(course_name +" successfully offered")
		 		}
		 		else{
		 			alert(result["err"]);
		 		}
	    	}
	    });
	    $("#options").show();
		$("#my_course_view").hide(); 
		$('#student_option').hide();
		$('#faculty_option').hide();
		$('#add_course_form').hide();
		$('#enroll_course_form').hide();
		$('#take_attendance_form').hide();
		$('#stop_attendance_form').hide();
		$('#mark_attendance_form').hide();
		$('#attendance_pie').hide();
		$('#response_pie').hide();
		$('#download_attendance').hide();
		$('#ask_question_form').hide();
		$('#see_question_resonse_content').hide();
		$('#see_question_content').hide();
		$('#download_response').hide();
		$('#list_attendance_contnet').hide();
		$('#about').hide();
	});
	
	$("#mycourses_button").click(function(e){
		e.preventDefault();
		$.ajax({
		 	url: "include/course.php", 
		 	type:"POST",
		 	success: function(result){
		 		////console.log(result);
		 		result = $.parseJSON(result);
		 		// pratik = 7;
		 		// alert(pratik);
		 		////console.log(result);
	        	err = result["err"];
	        	if(err=="true"){
	        		$("#options").hide();
					$("#my_course_view").show(); 
					$('#student_option').hide();
					$('#faculty_option').hide();
					$('#add_course_form').hide();
					$('#enroll_course_form').hide();
					$('#take_attendance_form').hide();
					$('#stop_attendance_form').hide();
					$('#mark_attendance_form').hide();
					$('#attendance_pie').hide();
					$('#response_pie').hide();
					$('#download_attendance').hide();
					$('#ask_question_form').hide();
					$('#see_question_resonse_content').hide();
					$('#see_question_content').hide();
					$('#download_response').hide();
					$('#list_attendance_contnet').hide();
					$('#about').hide();
	        		var n = result["n"];
	        		////console.log(n);
	        		for(i=1;i<=n;i++){
						var btn=document.createElement("button");
						btn.className = "btn btn-info";
						btn.style = "width: 200px;height: 40px;";
						btn.id = i;
						var t = document.createTextNode(result[i]);
						btn.appendChild(t);
						$("#my_course_view").append(btn);
						document.getElementById('my_course_view').innerHTML += '<br><br>';
					}
					$("#"+1).click(function(){
						// alert("new" + pratik);
						i = 1;
						course_name = result[i];
						$.ajax({
					 	url: "include/store_session.php", 
					 	type:"POST",
					 	data: {course_name: result[i]}, 
				        });
						$("#options").hide();
						$("#my_course_view").hide(); 
						$('#student_option').hide();
						$('#faculty_option').hide();
						$('#add_course_form').hide();
						$('#enroll_course_form').hide();
						$('#take_attendance_form').hide();
						$('#stop_attendance_form').hide();
						$('#mark_attendance_form').hide();
						$('#attendance_pie').hide();
						$('#response_pie').hide();
						$('#download_attendance').hide();
						$('#ask_question_form').hide();
						$('#see_question_resonse_content').hide();
						$('#see_question_content').hide();
						$('#download_response').hide();
						$('#list_attendance_contnet').hide();
						$('#about').hide();
						if(result["position"]==0){
							$("#options").hide();
							$("#my_course_view").hide(); 
							$('#student_option').show();
							$('#faculty_option').hide();
							$('#add_course_form').hide();
							$('#enroll_course_form').hide();
							$('#take_attendance_form').hide();
							$('#stop_attendance_form').hide();
							$('#mark_attendance_form').hide();
							$('#attendance_pie').hide();
							$('#response_pie').hide();
							$('#download_attendance').hide();
							$('#ask_question_form').hide();
							$('#see_question_resonse_content').hide();
							$('#see_question_content').hide();
							$('#download_response').hide();
							$('#list_attendance_contnet').hide();
							$('#about').hide();
							$("#answer_question_button").click(function(){
								data = {course_name : course_name, submit: true};
								////console.log(data);
								$.ajax({
								 	url: "include/see_question.php", 
								 	type:"POST",
								 	data: data, 
								 	success: function(result){
							        	////console.log(result);
								 		result = $.parseJSON(result);
								 		////console.log(result);
								 		////console.log(result["question"]);
								 		if(result["err"]=='true'){
								 			document.getElementById("question_text").innerHTML = result["question"];
								 			document.getElementById("a_student").innerHTML = result["a_option"];
								 			document.getElementById("b_student").innerHTML = result["b_option"];
								 			document.getElementById("c_student").innerHTML = result["c_option"];
								 			document.getElementById("d_student").innerHTML = result["d_option"];
								 			document.getElementById("e_student").innerHTML = result["e_option"];
								 			$("#options").hide();
											$("#my_course_view").hide(); 
											$('#student_option').hide();
											$('#faculty_option').hide();
											$('#add_course_form').hide();
											$('#enroll_course_form').hide();
											$('#take_attendance_form').hide();
											$('#stop_attendance_form').hide();
											$('#mark_attendance_form').hide();
											$('#attendance_pie').hide();
											$('#response_pie').hide();
											$('#download_attendance').hide();
											$('#ask_question_form').hide();
											$('#see_question_resonse_content').hide();
											$('#see_question_content').show();
											$('#download_response').hide();
											$('#list_attendance_contnet').hide();
											$('#about').hide();
								 			//alert("yes");
								 			$("#answer_submit").click(function(){
								 				//alert("no");
								 				answer_student = document.getElementById("student_answer").value;
								 				//alert(answer_student);
								 				data = {course_name : course_name,answer : answer_student, submit: true};
								 				////console.log(data);
								 				//alert("nop");
												$.ajax({
												 	url: "include/answer_question.php", 
												 	type:"POST",
												 	data: data, 
												 	success: function(result){
											        	////console.log(result);
											        	//alert("yup");
												 		result = $.parseJSON(result);		
												 		if(result["err"]=='true'){
												 			////console.log(result);
												 			alert(answer_student + " submitted");
												 			$("#options").hide();
															$("#my_course_view").hide(); 
															$('#student_option').show();
															$('#faculty_option').hide();
															$('#add_course_form').hide();
															$('#enroll_course_form').hide();
															$('#take_attendance_form').hide();
															$('#stop_attendance_form').hide();
															$('#mark_attendance_form').hide();
															$('#attendance_pie').hide();
															$('#response_pie').hide();
															$('#download_attendance').hide();
															$('#ask_question_form').hide();
															$('#see_question_resonse_content').hide();
															$('#see_question_content').hide();
															$('#download_response').hide();
															$('#list_attendance_contnet').hide();
															$('#about').hide();
												 		}
												 		else{
								 							alert(result["err"]);
								 						}
								 					}
								 				});
								 			});
								 		}
								 		else{
								 			alert(result["err"]);
								 		}
								 	}
							    });
							});

							$("#see_attendance_button").click(function(){
								//alert(i);
								password = document.getElementById("mark_password").value;
								data = {course_name : course_name, submit: true};
								////console.log(data);
								$.ajax({
								 	url: "include/see_student_attendance.php", 
								 	type:"POST",
								 	data: data, 
								 	success: function(result){
							        	////console.log(result);
								 		result = $.parseJSON(result);
								 		////console.log(result);
								 		absent_stat = result['absent'];
								 		present_stat = result['present'];
								 		if(result["err"]=='true'){
											Highcharts.chart('attendance_pie', {
											    chart: {
											        type: 'pie',
											        options3d: {
											            enabled: true,
											            alpha: 45,
											            beta: 0
											        }
											    },
											    title: {
											        text: 'Attendance Stats'
											    },
											    tooltip: {
											        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
											    },
											    plotOptions: {
											        pie: {
											            allowPointSelect: true,
											            cursor: 'pointer',
											            depth: 35,
											            dataLabels: {
											                enabled: true,
											                format: '{point.name}'
											            }
											        }
											    },
											    series: [{
											        type: 'pie',
											        name: 'Attendance',
											        data: [
											            ['Present', present_stat],
											            {
											                name: 'Absent',
											                y: absent_stat,
											                sliced: true,
											            }
											        ]
											    }]
											});
											$("#options").hide();
											$("#my_course_view").hide(); 
											$('#student_option').hide();
											$('#faculty_option').hide();
											$('#add_course_form').hide();
											$('#enroll_course_form').hide();
											$('#take_attendance_form').hide();
											$('#stop_attendance_form').hide();
											$('#mark_attendance_form').hide();
											$('#attendance_pie').show();
											$('#response_pie').hide();
											$('#download_attendance').hide();
											$('#ask_question_form').hide();
											$('#see_question_resonse_content').hide();
											$('#see_question_content').hide();
											$('#download_response').hide();
											$('#list_attendance_contnet').hide();
											$('#about').hide();
								 		}
								 		else{
								 			alert(result["err"]);
								 		}
								 	}

							    });
							    
							});
							$("#mark_password_submit").click(function(){
								//alert(i);
								password = document.getElementById("mark_password").value;
								data = {password : password,course_name : course_name, submit: true};
								////console.log(data);
								$.ajax({
								 	url: "include/mark_attendance.php", 
								 	type:"POST",
								 	data: data, 
								 	success: function(result){
							        	////console.log(result);
								 		result = $.parseJSON(result);
								 		////console.log(result);
								 		if(result["err"]=='true'){
								 			alert("Attendance marked successfully");
								 		}
								 		else{
								 			alert(result["err"]);
								 		}
								 	}
							    });
							});
						}
						else{
							$('#faculty_option').show();
							//=========================================================
							$("#list_attendance_button").click(function(){
								data = {course_name : course_name, submit: true};
								////console.log(data);
								$.ajax({
								 	url: "include/list_attendance.php", 
								 	type:"POST",
								 	data: data,
								 	success: function(result){
								 		////console.log(result);
								 		result = $.parseJSON(result);
								 		////console.log(result);
								 		
								 		if(result.length>0 && result[0]["err"]=='true'){
								 			$("#options").hide();
											$("#my_course_view").hide(); 
											$('#student_option').hide();
											$('#faculty_option').hide();
											$('#add_course_form').hide();
											$('#enroll_course_form').hide();
											$('#take_attendance_form').hide();
											$('#stop_attendance_form').hide();
											$('#mark_attendance_form').hide();
											$('#attendance_pie').hide();
											$('#response_pie').hide();
											$('#download_attendance').hide();
											$('#ask_question_form').hide();
											$('#see_question_resonse_content').hide();
											$('#see_question_content').hide();
											$('#download_response').hide();
											$('#list_attendance_contnet').show();
											$('#about').hide();
											var table = document.createElement("TABLE");
											table.className = 'table';

											var row = table.insertRow(-1);
											var headerCell = document.createElement("TH");
											headerCell.innerHTML = 'Name';
				        					row.appendChild(headerCell);
				        					headerCell = document.createElement("TH");
											headerCell.innerHTML = 'P';
				        					row.appendChild(headerCell);
				        					headerCell = document.createElement("TH");
											headerCell.innerHTML = 'A';
				        					row.appendChild(headerCell);
				        					headerCell = document.createElement("TH");
											headerCell.innerHTML = 'S';
											row.appendChild(headerCell);

	    									for (var i = 1; i < result.length; i++) {
										        row = table.insertRow(-1);
										        var cell = row.insertCell(-1);
										        cell.innerHTML = result[i]['name'];
										        cell = row.insertCell(-1);
										        cell.innerHTML = result[i]['present'];
										        cell = row.insertCell(-1);
										        cell.innerHTML = result[i]['absent'];
										        cell = row.insertCell(-1);
										        cell.innerHTML = result[i]['status'];
										    }
										    var dvTable = document.getElementById("list_attendance");
										    dvTable.innerHTML = "";
										    dvTable.appendChild(table);
									 	}
									 	else{
									 		alert('No attendance to show');
									 		$("#options").show();
											$("#my_course_view").hide(); 
											$('#student_option').hide();
											$('#faculty_option').hide();
											$('#add_course_form').hide();
											$('#enroll_course_form').hide();
											$('#take_attendance_form').hide();
											$('#stop_attendance_form').hide();
											$('#mark_attendance_form').hide();
											$('#attendance_pie').hide();
											$('#response_pie').hide();
											$('#download_attendance').hide();
											$('#ask_question_form').hide();
											$('#see_question_resonse_content').hide();
											$('#see_question_content').hide();
											$('#download_response').hide();
											$('#list_attendance_contnet').hide();
											$('#about').hide();
									 	}
								 	}
								 	
							    });
							});

							$("#see_question_button").click(function(){
								//alert("yes");
								data = {course_name : course_name, submit: true};
								////console.log(data);
								$.ajax({
								 	url: "include/see_response.php", 
								 	type:"POST",
								 	data: data, 
								 	success: function(result){
							        	////console.log(result);
								 		result = $.parseJSON(result);
								 		////console.log(result);
								 		////console.log(result["question"]);
								 		if(result["err"]=='true'){
								 			a_stats = result["a"];
								 			b_stats = result['b'];
								 			c_stats = result['c'];
								 			d_stats = result['d'];
								 			e_stats = result['e'];
								 			////console.log(a_stats);
								 			document.getElementById("ques").innerHTML = result["question"];
								 			$("#options").hide();
											$("#my_course_view").hide(); 
											$('#student_option').hide();
											$('#faculty_option').hide();
											$('#add_course_form').hide();
											$('#enroll_course_form').hide();
											$('#take_attendance_form').hide();
											$('#stop_attendance_form').hide();
											$('#mark_attendance_form').hide();
											$('#attendance_pie').hide();
											$('#response_pie').hide();
											$('#download_attendance').hide();
											$('#ask_question_form').hide();
											$('#see_question_resonse_content').show();
											$('#see_question_content').hide();
											$('#download_response').hide();
											$('#list_attendance_contnet').hide();
											$('#about').hide();
								 			Highcharts.chart('response_pie', {
											    chart: {
											        type: 'pie',
											        options3d: {
											            enabled: true,
											            alpha: 45,
											            beta: 0
											        }
											    },
											    title: {
											        text: 'Response Stats'
											    },
											    tooltip: {
											        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
											    },
											    plotOptions: {
											        pie: {
											            allowPointSelect: true,
											            cursor: 'pointer',
											            depth: 35,
											            dataLabels: {
											                enabled: true,
											                format: '{point.name}'
											            }
											        }
											    },
											    series: [{
											        type: 'pie',
											        name: 'Respponse',
											        data: [
											            ['A', a_stats],
											            {
											                name: 'B',
											                y: b_stats,
											                sliced: true,
											            },
											            {
											                name: 'C',
											                y: c_stats,
											                sliced: true,
											            },
											            {
											                name: 'D',
											                y: d_stats,
											                sliced: true,
											            },
											            {
											            	name: 'E',
											            	y: e_stats,
											            	sliced: true,
											            }
											        ]
											    }]
											});
											$("#options").hide();
											$("#my_course_view").hide(); 
											$('#student_option').hide();
											$('#faculty_option').hide();
											$('#add_course_form').hide();
											$('#enroll_course_form').hide();
											$('#take_attendance_form').hide();
											$('#stop_attendance_form').hide();
											$('#mark_attendance_form').hide();
											$('#attendance_pie').hide();
											$('#response_pie').show();
											$('#download_attendance').hide();
											$('#ask_question_form').hide();
											$('#see_question_resonse_content').show();
											$('#see_question_content').hide();
											$('#download_response').hide();
											$('#list_attendance_contnet').hide();
											$('#about').hide();
								 		}
								 		else{
								 			alert(result["err"]);
								 		}
								 	}
							    });
							});
							$("#question_submit").click(function(){
								//alert(answer);
								question = document.getElementById("question").value;
								a_option = document.getElementById("a_option").value;
								b_option = document.getElementById("b_option").value;
								c_option = document.getElementById("c_option").value;
								d_option = document.getElementById("d_option").value;
								e_option = document.getElementById("e_option").value;
								data = {course_name : course_name, question : question, a_option : a_option, b_option : b_option, c_option : c_option, d_option : d_option, e_option : e_option, submit: true};
								////console.log(data);
								$.ajax({
								 	url: "include/ask_question.php", 
								 	type:"POST",
								 	data: data, 
								 	success: function(result){
							        	////console.log(result);
								 		result = $.parseJSON(result);
								 		////console.log(result);
								 		if(result["err"]=='true'){
								 			alert("Question asked successfully");
								 			$("#options").show();
											$("#my_course_view").hide(); 
											$('#student_option').hide();
											$('#faculty_option').hide();
											$('#add_course_form').hide();
											$('#enroll_course_form').hide();
											$('#take_attendance_form').hide();
											$('#stop_attendance_form').hide();
											$('#mark_attendance_form').hide();
											$('#attendance_pie').hide();
											$('#response_pie').hide();
											$('#download_attendance').hide();
											$('#ask_question_form').hide();
											$('#see_question_resonse_content').hide();
											$('#see_question_content').hide();
											$('#download_response').hide();
											$('#list_attendance_contnet').hide();
											$('#about').hide();
								 		}
								 		else{
								 			alert(result["err"]);
								 		}
								 	}
							    });
							});
							$("#see_attendance_faculty_button").click(function(){
								data = {course_name : course_name, submit: true};
								//console.log(data);
								//alert("reached");
								$.ajax({
								 	url: "include/all_attendance.php", 
								 	type:"POST",
								 	data: data, 
								 	success: function(result){
							        	//console.log(result);
							        	
								 		result = $.parseJSON(result);

								 		//console.log(result);
								 		if(result["err"]=='true'){
								 			$("#options").hide();
											$("#my_course_view").hide(); 
											$('#student_option').hide();
											$('#faculty_option').hide();
											$('#add_course_form').hide();
											$('#enroll_course_form').hide();
											$('#take_attendance_form').hide();
											$('#stop_attendance_form').hide();
											$('#mark_attendance_form').hide();
											$('#attendance_pie').hide();
											$('#response_pie').hide();
											$('#download_attendance').show();
											$('#ask_question_form').hide();
											$('#see_question_resonse_content').hide();
											$('#see_question_content').hide();
											$('#download_response').hide();
											$('#list_attendance_contnet').hide();
											$('#about').hide();
								 		}
								 		else{
								 			alert(result["err"]);
								 		}
								 	}
							    });
							});
							$("#see_response_button").click(function(){
								data = {course_name : course_name, submit: true};
								////console.log(data);
								$.ajax({
								 	url: "include/all_response.php", 
								 	type:"POST",
								 	data: data, 
								 	success: function(result){
							        	////console.log(result);
								 		result = $.parseJSON(result);
								 		////console.log(result);
								 		if(result["err"]=='true'){
								 			$("#options").hide();
											$("#my_course_view").hide(); 
											$('#student_option').hide();
											$('#faculty_option').hide();
											$('#add_course_form').hide();
											$('#enroll_course_form').hide();
											$('#take_attendance_form').hide();
											$('#stop_attendance_form').hide();
											$('#mark_attendance_form').hide();
											$('#attendance_pie').hide();
											$('#response_pie').hide();
											$('#download_attendance').hide();
											$('#ask_question_form').hide();
											$('#see_question_resonse_content').hide();
											$('#see_question_content').hide();
											$('#download_response').show();
											$('#list_attendance_contnet').hide();
											$('#about').hide();
								 		}
								 		else{
								 			alert(result["err"]);
								 		}
								 	}
							    });
							});
							$("#set_password_submit").click(function(){
								password = document.getElementById("set_password").value;
								data = {password : password,course_name : course_name, submit: true};
								////console.log(data);
								
								$.ajax({
								 	url: "include/set_password.php", 
								 	type:"POST",
								 	data: data, 
								 	success: function(result){
							        	////console.log(result);
								 		result = $.parseJSON(result);
								 		////console.log(result);
								 		if(result["err"]=='true'){
								 			alert("New password is " + password);
								 		}
								 		else{
								 			alert(result["err"]);
								 		}
								 	}
							    });
							});
							$("#stop_password_submit").click(function(){
								//password = document.getElementById("stop_password").value;
								var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
								var password = "";
								for( var i=0; i < 10; i++ )
        							password += possible.charAt(Math.floor(Math.random() * possible.length));
								data = {password : password,course_name : course_name, submit: true};
								//console.log(data);
								$.ajax({
								 	url: "include/change_password.php", 
								 	type:"POST",
								 	data: data, 
								 	success: function(result){
							        	////console.log(result);
							        	
								 		result = $.parseJSON(result);

								 		////console.log(result);
								 		if(result["err"]=='true'){
								 			alert("Password changed to : " + password);
								 		}
								 		else{
								 			alert(result["err"]);
								 		}
								 	}
							    });
							});
						}
					});

	// ============================================= 1 ends here ======================================
					
						
					// *****************************************************

					//*************************************************

						
// **************************************************
	        	}
	        	else{
	        		alert(err);
	        	}
	        	//document.getElementById("message").innerHTML = err;
	    	}
	    });
	});
});

$(document).on('click','.navbar-collapse.in',function(e) {
    if( $(e.target).is('a') ) {
        $(this).collapse('hide');
    }
});
