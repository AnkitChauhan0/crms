<html>
	<head>

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="CSS/style.css">
		<!--<nav class="navbar navbar-fixed-top" id="top-nav">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Campus Recruitment System</a>
				</div>
				<ul id="list1" class="nav navbar-nav">
					<li class="active"><a href="index.html">Home</a></li>
				    <li class="active"><a href="index.html">Logout</a></li>
				</ul>
			</div>
		</nav> -->
      <style type="text/css">
      	h3{
             margin-top: -20px;
      	}
		.input-field{
	    width: 30%;
	    padding: 0px 0px;
	    margin: 0px 10px;
	    background: transparent;
	    padding-left: 20px;
	    margin-left: 20px;
        } 
       .register-box .type-btn{
         display: inline-block;
          margin-left: 20px;
         padding-left: 10px !important;
         margin-top: 5px;
        }

        label{
      	   margin-left: 100px;
      		padding-left: 100px;
      		padding-right: 100px;
      		width: 100px;
      		display: inline-block;
      	}

       .registerbtn{
          width: 100%;
          top: 5px;
          margin-left: 350px;
        }

    .register-box{
    	margin-top: 10px;
    	padding-top: 0px;
    	height: 500px;
    }

    .input-group-register{
      top: 5px;
      padding-top: -10px;
    }

    .cterms{
          margin-left: 300px;
          width: 150%;
    }

 </style>
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

		
		

		if($_SERVER["REQUEST_METHOD"]=="POST"){
			$company_name=$_POST['company_name'];
			$job_title=$_POST['job_title'];
			$salary=$_POST['salary'];
			$deadline=$_POST['deadline'];
			$bond=$_POST['bond'];
			$year=$_POST['year'];
			$cpi=$_POST['cpi'];
			$twp=$_POST['12p'];
			$tenp=$_POST['10p'];
			$branch=$_POST['branch'];
			$age=$_POST['age'];
			$degree=$_POST['degree'];
			$location=$_POST['location'];
			$job_id =$_POST['job_id'];
			/*echo $name . "<BR>";
			echo $email. "<BR>";
			echo $dob. "<BR>";
			echo $branch. "<BR>";
			echo $year. "<BR>";
			echo $cpi. "<BR>";
			echo $twp. "<BR>";
			echo $tenp. "<BR>";
			echo $pwd. "<BR>";
			echo $phone. "<BR>";
			echo $degree. "<BR>";*/

            $sql = "INSERT INTO vacancy(company_name,job_title,salary, deadline,bond,year_e,cpi_e,twp_e,tenp_e,branch_e,age_e,degree_e,location,job_id) 
		VALUES ('$company_name', '$job_title','$salary','$deadline', '$bond', '$year', '$cpi','$twp', '$tenp', '$branch', '$age','$degree','$location','$job_id')";



			
			/*$sql="INSERT into vacancy(company_name,job_title,salary,location,deadline,bond,age_e,degree_e,cpi_e,year_e,12p_e,10p_e) values(\"".$_SESSION['name']."\",\"".$job_title."\",".$salary.",\"".$location."\",\"".$deadline."\",".$bond.",".$age.",\"".$degree."\",".$cpi.",".$year.",".$twp.",".$tenp." );";
			;*/
			
			if($conn->query($sql)===TRUE){
			$GLOBALS['conn']->close();
		echo "<SCRIPT type='text/javascript'> //not showing me this
								alert('Vacancy Created Succesfully!!');
								window.location.replace(\"company_dash.php\");
							</SCRIPT>";
		}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
			
			/*
			$GLOBALS['conn']->close();
			header('Location: company_dash.php ');
			echo '<script language="javascript">';
			echo 'alert("Vacancy succesfully created!")';
			echo '</script>';*/
		}
	  ?>
	<div class="full-page" id="dash">
		<div class="navbar">
          <div>
           <a href="" class="logo"><!--<img src="images/jss_logo.jpg">-->JSS Noida</a>
          </div>
        <nav>
         <ul id="MenuItems">
          <li><a href="#">Home</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Contact</a></li>
          <li><button class="loginbtn" onclick="document.getElementId('login-form').style.display='block' " style="width: auto;">Login</button></li>
         </ul>
        </nav> 
        </div>
		<h3>CREATE VACANCY (Job Details)</h3>
		<div class="register-box">
		  <div class=" container-fluid" id="dash" >
		  <form action="vacancy.php" class="input-group-register" method="POST" enctype="multipart/form-data">
           <div class="container vacancy">
          <label for="company_name"><b>Company_name:</b></label>
           <input type="text" class="input-field" name="company_name" required><br>
		   
		   <label for="job_title"><b>Job_title:</b></label>
           <input type="text" class="input-field" name="job_title" required><br>

          <label for="salary"><b>Salary:</b></label>
          <input type="decimal" class="input-field" placeholder="in LPA" name="salary" required> <br>
	
			
		   

		  
	      <label for="deadline"><b>Deadline:</b></label>
          <input type="date" class="input-field" placeholder=" " name="deadline"><br>
	
          <label for="bond"><b>Bond:</b></label>
          <input type="number" class="input-field" placeholder=" " name="bond"><br>

          <label for="year"><b>Year:</b></label>
          <input type="number" class="input-field" placeholder="Ex.2019" name="year"><br>

          <label for="cpi"><b>CPI:</b></label>
          <input type="decimal" class="input-field" placeholder="Enter minimum cpi required" name="cpi"><br>
	
	 
		  
		  <label for="12p"><b>12th_Percentage:</b></label>
          <input type="decimal" class="input-field" placeholder="Ex.85.5" name="12p"><br>
		  
		   <label for="10p"><b>10th_Percentage:</b></label>
          <input type="decimal" class="input-field" placeholder="Ex.85.5" name="10p"><br>
		  <label for="branch"><b>Branch:</b></label>
	      <select name="branch" class="type-btn" placeholder="Select">
          <option label="cse">CSE</option>
          <option label="it">IT</option>
          <option label="ece">ECE</option>
	      <option label="mee">MEC</option>
	      <option label="msme">MCA</option>
	      <option label="che">MBA</option>
	      </select><br>
		  
		  <label for="age"><b>MaximumAge:</b></label>
          <input type="number" class="input-field" placeholder=" " name="age"><br>

           <label for="degree"><b>Course:</b></label>
	      <select name="degree" class="type-btn" placeholder="Select">
          <option label="btech">B.Tech</option>
		  <option label="btech">M.Tech</option>
		   <option label="bca">BCA</option>
          <option label="mca">MCA</option>
	      <option label="msc">MBA</option>
		  </select><br>

          <label for="location"><b>Location:</b></label>
          <input type="text" class="input-field" placeholder="Ex.Delhi" name="location"><br>

		  
		  
		  <label for="job_id"><b>Job_id:</b></label>
           <input type="number" class="input-field" name="job_id" required> <br>

		   </div>
           <p class="cterms">By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
           <button type="submit" class="registerbtn">Create Vacancy</button>
  
		  </form>
            <div class="container signin">
              <p style="top: 485px; margin-left: 50px;">Already have an account? <a href="#">Sign in</a>.</p>
            </div>
		  </div>
	    </div>
    </div>
</body>
</html>