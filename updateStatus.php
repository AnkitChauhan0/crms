<?php
$servername="localhost";
		 $username="root";
		 $password="";
		 $dbname="newdb";
		 
		 $conn = new mysqli($servername,$username,$password,$dbname);
		 
		 if($conn->connect_error){
			 die("Connection failed: ".$conn->connect_error);
		}
	if($_SERVER["REQUEST_METHOD"]=="POST"){
        $app_id = $_POST['app_id'];
		$status = $_POST['status'];
		
		echo "<script>console.log('Debug app id of student: " . $status . "' );</script>";
        echo $app_id." ".$status;
		 
	
		 $usql="Update applications set status=".$status." where app_id=".$app_id."";		
		 $uresult=$conn->query($usql);
		 $conn->close();
		header('Location: company_dash.php');
	
	}
?>
  