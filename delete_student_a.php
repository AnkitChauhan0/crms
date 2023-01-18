<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="CSS/style.css">
		
		
		 <?php
			  session_start();
				$servername="localhost";
					$username="root";
					$password="";
					$dbname="newdb";
					
					function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

					// Create connection
                   $conn = new mysqli($servername, $username, $password, $dbname);
                 // Check connection
                 if ($conn->connect_error) {
                      die("Connection failed: " . $conn->connect_error);
                  } 
				  
			if($_SERVER["REQUEST_METHOD"]=="POST"){
					$uname = $_POST['uname'];
					$sql1="SELECT * from student where email=\"" . $uname . "\"";
					$result = $GLOBALS['conn']->query($sql1);
					if($result->num_rows == 0){
					    phpAlert(   "Wrong username entered!"   );
						//header('Location: student_dash.php');

					}else{
					$row=$result->fetch_assoc();
						
							$sql2="Delete from student where email='".$uname."'";
							$result = $GLOBALS['conn']->query($sql2);
							//phpAlert("Deleted!");
							//header('Location: index.html');
							$sql3="Delete from applications where s_mail='".$uname."'";
							$result3 = $GLOBALS['conn']->query($sql3);
							
							echo "<SCRIPT type='text/javascript'> //not showing me this
								alert('Deleted');
								window.location.replace(\"admin_dash.php\");
							</SCRIPT>";
						
					}
			}
        //echo $uname . "<BR>";
        //echo $pwd . "<BR>";
    
				 
           $conn->close();
          ?>
		
	</head>
	<body>

    <div class="full-page" id="delete">
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
		   <div  id="main">
  			<img class="" style="display: block; margin-left: auto; margin-right: auto; width: 35%;" src="Images/bye.jpg">
  		   </div>
		
	      <div class="container-fluid text-center form-box" style="height: 120px;width: 450px;" id="frm1">
		    <form action="" method="POST">
			   <div ><br>
				<label for="usrnm"><b style="color: white;">Enter Username of student to delete</b></label>
				<input type="text" placeholder="Enter Username" name="uname" id="usrnm" required>
			   </div><br>
			  <div>
				<button type="submit">Delete</button>
			  </div>
           </form>
          </div>
	</div>	
	</body>
</html>
