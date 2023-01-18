<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="CSS/style.css">
		<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

		<!--<nav class="navbar navbar-fixed-top" id="top-nav">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand"  href="#">Campus Recruitment System</a>
				</div>
				<ul id="list1" class="nav navbar-nav">
					<li class="active"><a href="index.html">Home</a></li>
					<li class="active"><a href="index.html">Logout</a></li>
					<li class="active"><a href="delete_student.php">Delete Account</a></li>
				</ul>
			</div>
		</nav> -->
		
		<script>
		
			function trclick(value,nme,object){
				//alert("tr clicked "+value);
				
				document.getElementById("nouse").innerHTML = "";
				
				if (value == "") {
					return;
				} else { 
					if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp1 = new XMLHttpRequest();
						xmlhttp2 = new XMLHttpRequest();
					} else {
						// code for IE6, IE5
						xmlhttp1 = new ActiveXObject("Microsoft.XMLHTTP");
						xmlhttp2 = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp1.onreadystatechange = function() {
						if (xmlhttp1.readyState == 4 && xmlhttp1.status == 200) {
							document.getElementById("display").innerHTML = xmlhttp1.responseText;
						}
					};
					xmlhttp2.onreadystatechange = function() {
						if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
							document.getElementById("dispv").innerHTML = xmlhttp2.responseText;
						}
					};
					xmlhttp1.open("GET","getcompany.php?email="+value,true);
					xmlhttp2.open("GET","getvacancies.php?name="+nme,true);
					xmlhttp1.send();
					xmlhttp2.send();
				}
			};
			
			function msg(job_id,s_mail,object){
			//	alert("Checking!");
				if (job_id == "") {
					return;
				} else { 
					if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp1 = new XMLHttpRequest();
						
					} else {
						// code for IE6, IE5
						xmlhttp1 = new ActiveXObject("Microsoft.XMLHTTP");
						
					}
					xmlhttp1.onreadystatechange = function() {
						if (xmlhttp1.readyState == 4 && xmlhttp1.status == 200) {
							document.getElementById("nouse").innerHTML = xmlhttp1.responseText;
						}
					};
					xmlhttp1.open("GET","check.php?job_id="+job_id+"&s_mail="+s_mail,true);
					xmlhttp1.send();
				}
			};
			
			function apply_fun(job_id,s_mail,c_name,object){
				//alert("Applied!!");
				if (job_id == "") {
					return;
				} else { 
					if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp1 = new XMLHttpRequest();
						
					} else {
						// code for IE6, IE5
						xmlhttp1 = new ActiveXObject("Microsoft.XMLHTTP");
						
					}
					xmlhttp1.onreadystatechange = function() {
						if (xmlhttp1.readyState == 4 && xmlhttp1.status == 200) {
							document.getElementById("nouse").innerHTML = xmlhttp1.responseText;
						}
					};
					xmlhttp1.open("GET","apply.php?job_id="+job_id+"&s_mail="+s_mail+"&c_name="+c_name,true);
					xmlhttp1.send();
				}
			}
		</script>
		
	</head>
	


	<body>
	
			<?php
			  session_start();
				$servername="localhost";
					$username="root";
					$password="";
					$dbname="newdb";
					
					$conn = new mysqli($servername,$username,$password,$dbname);

					if($conn->connect_error){
						die("Connection failed: ".$conn->connect_error);
					}
					 $sql="Select * from student where email=\"".$_SESSION['email']."\"";
					//	$sql="Select * from company where email=\"".$_SESSION['email']."\"";
					$result = $conn->query($sql);
					$row=$result->fetch_assoc();
					
					echo "<style>

                    th:not(.nohover):hover{
                    background: rgba(0,0,0,0.2);
                    color: black;
                    }

                    th:hover{
                    color: black;
                    }

                    td:hover{
                    background-color: white;
                    color: brown;
                    }

                    tr:hover{
                    color: black;
                    }
                    </style>";
					
               echo " <div class=\"full-page\" id=\"dash1\">
			          <div class=\"navbar\">
                        <div>
                     <a href=\"\" class=\"logo\">JSS Noida</a>
                     </div>
                      <nav>
                     <ul id=\"MenuItems\">
                     <li><a href=\"#\">Home</a></li>
                     <li><a href=\"#\">About Us</a></li>
                     <li><a href=\"#\">Contact</a></li>
                      <li class=\"active\"><a href=\"index.html\">Logout</a></li>
                     </ul>
                     </nav> 
                     </div>
                     <h3 align=\"center\" >STUDENT DASHBOARD</h3>
			         <div class=\" container-fluid\" id=\"dash1\">
				      <div class=\"row\">
			
				      <div class=\"well col-sm-4\" style=\"background: rgba(0,0,0,0.4); border-radius: 30px; height:auto; margin:10px;\">
					 
				   <h2 align=\"center\" style=\"color:white;\">Student Details</h2>
				   <img class=\"img-responsive\"  src=\"CSS/Image/recruitment.png\" align=\"center\" style=\"border-radius:50%\"></img> 
			
			         <div class=\"table-responsive table-bordered\" >"  ;          
			   echo	"  <table class=\"table table-hover\">";
				      echo "<tr>
				        <th>Name</th>
						<td>".$row['name']."</td>
				        </tr>
				      <tr>
					    <th>Email</th>
				        <td>".$row['email']."</td>

				      </tr>
					  <tr>
					    <th>Date of Birth</th>
				        <td>".$row['dob']."</td>

				      </tr>
					  <tr>
				        <th>Branch</th>
						<td>".$row['branch']."</td>
				        </tr>
				      <tr>
					    <th>Year of Passing</th>
				        <td>".$row['year']."</td>

				      </tr>
					  <tr>
					    <th>Degree</th>
				        <td>".$row['degree']."</td>

				      </tr>
					  
				      <tr>
				        <th>Contact No.</th>
						<td>".$row['phone']."</td>
				        </tr>";
				echo"
				    </tbody>
				  </table>
				</div>
				";
				?> 
			<br>
			  <br>
			
			</div>
			<div class="well col-sm-4" style="background: rgba(0,0,0,0.4); border-radius: 30px; height:auto; margin:10px;">
		      <h3>DETAILS ABOUT THE COMPANY</h3>
			  <div id="display">
			  <img class="img-responsive " src="CSS/Image/recruitment.png" align="center" style="border-radius:50%"></img>
			  <div class="table-responsive table-bordered" >            
				  <table class="table table-hover">
				      <tr>
				        <th>Name</th>
						<td>---</td>
				        </tr>
				      <tr>
					    <th>Email</th>
				        <td>---</td>

				      </tr>
					  <tr>
					    <th>Phone</th>
				        <td>---</td>

				      </tr>
					  <tr>
				        <th>Location</th>
						<td>---</td>
				        </tr>
				      <tr>
					    <th>C.E.O</th>
				        <td>---</td>

				      </tr>
					  <tr>
					    <th>C.T.O.</th>
				        <td>---</td>

				      </tr>
					  
				      <tr>
				        <th>H.R.</th>
						<td>---</td>
				        </tr>
				      <tr>
					    <th>Net Worth</th>
				        <td>---</td>

				      </tr>
					  <tr>
					    <th>Founded on</th>
				        <td>---</td>

				      </tr>
					  
					  <tr>
				        <th>Founder</th>
						<td>---</td>
				      </tr>

					  
				    
				  </table>
				</div>
				</div>
				<hr>
				<div id="nouse" style="border: thin solid black"> </div>
				<hr>
				<div id="dispv">
				<div class="table-responsive table-bordered" >            
				  <table class="table table-hover">
				  <tr>
				   <th>Job Title</th>
				   <th>Salary</th>
				   <th>Location</th>
				   <th>Eligiblity</th>
				   
				   </tr>
				   
				   <tr>
				   <td>-----</td>
				   <td>-----</td>
				   <td>-----</td>
				   <td>
				   <input type="button" style="color:black;" value="Check eligiblity" onclick="msg()">
				   
				   </td>
				   </tr>
				   </table>
				</div>
			  </div>
				
			</div>
		    
			
			<div class="well col-sm-3" style="background: rgba(0,0,0,0.4); border-radius: 30px; margin:10px;">
			    <h3>LIST OF COMPANIES</h3>
				<p style="color: white">Click for more details about the company</p>
				
				<?php
				
					$servername="localhost";
					$username="root";
					$password="";
					$dbname="newdb";
					
					$conn = new mysqli($servername,$username,$password,$dbname);

					if($conn->connect_error){
						die("Connection failed: ".$conn->connect_error);
					}
					$sql="Select name,email from company";
					$result = $conn->query($sql);
					
					  echo "<div class=\"table-responsive table-bordered\" >            
						  <table class=\"table table-hover\">
							<thead>
							  <tr>
								<th>Name</th>
								<th>Email</th>
							  </tr>
							</thead>
							<tbody>
							";
								
							while($row = $result->fetch_assoc()){
							  echo "<tr id=\"clist\" onclick=\"trclick('".$row['email']."','".$row['name']."',this)\">";
							  echo "<td>".$row['name']. "</td>";
							  echo "<td>".$row['email']."</td>";
							  echo "</tr>";
							}
						echo	"</tbody>
						  </table>
						</div>
						";
						
						
						
	/*	 echo  " <form method=\"POST\" action=\"\">
        <input type=\"text\" name=\"name\" placeholder=DELETE ACCOUNT></input>
       <input type=\"submit\"></input>
        </form>" ;
				  if(isset($_POST['name']) && $_POST['name']=="DELETE ACCOUNT") {
                     
               	 $sql = "Delete FROM students where email=$row['email']";
                $result = $conn->query($sql);
				
               echo "<h4 align=\"center\">ACCOUNT DELETED!!</h4>";
			   header('Location: index.html');
			        }
				  */
				 
				  
						
				?>
				
		    </div>
		  </div>
		</div>

    </div>
	</body>
</html>