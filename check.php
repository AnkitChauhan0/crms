<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php
	
	$job_id= $_GET['job_id'];
	$s_mail= $_GET['s_mail'];
	
	$servername="localhost";
					$username="root";
					$password="";
					$dbname="newdb";
					
	$conn = new mysqli($servername,$username,$password,$dbname);
	if (!$conn) {
		die('Could not connect: ' . mysqli_error($conn));
	}

	$sql1="SELECT * FROM student WHERE email = '".$s_mail."'";
	$result1 = $conn->query($sql1);
	$row1 = $result1->fetch_assoc();

	$sql2="SELECT * FROM vacancy WHERE job_id = '".$job_id."'";
	$result2 = $conn->query($sql2);
	$row2 = $result2->fetch_assoc();
	
	//Pending!
	//echo $row1['degree']." ".$row2['degree_e']." ".$row1['cpi']." ".$row2['cpi_e'] ." ". $row1['year']." ".$row2['year_e'] ." ". $row1['12p']." ".$row2['12p_e'] ." ". $row1['10p']." ".$row2['10p_e'] ;
	if($row1['degree']==$row2['degree_e'])
		echo "<h6>Degree required ".$row2['degree_e']." <img src=\"Images/tick.png\" height=\"20px\" width=\"20px\" ></h6>";
	else
		echo "<h6>Degree required ".$row2['degree_e']." <img src=\"Images/cross.png\" height=\"20px\" width=\"20px\" ></h6>";
	
	if($row1['cpi']>=$row2['cpi_e'])
		echo "<h6>CPI required greater than ".$row2['cpi_e']." <img src=\"Images/tick.png\" height=\"20px\" width=\"20px\" ></h6>";
	else
		echo "<h6>CPI required greater than ".$row2['cpi_e']." <img src=\"Images/cross.png\" height=\"20px\" width=\"20px\" ></h6>";
	
	if($row1['year']>=$row2['year_e'])
		echo "<h6>Year of passing required greater than ".$row2['year_e']." <img src=\"Images/tick.png\" height=\"20px\" width=\"20px\" ></h6>";
	else
		echo "<h6>Year of passing required greater than ".$row2['year_e']." <img src=\"Images/cross.png\" height=\"20px\" width=\"20px\" ></h6>";
	
	if($row1['twp']>=$row2['twp_e'])
		echo "<h6>12th %age required greater than ".$row2['twp_e']." <img src=\"Images/tick.png\" height=\"20px\" width=\"20px\" ></h6>";
	else
		echo "<h6>12th %age required greater than ".$row2['twp_e']." <img src=\"Images/cross.png\" height=\"20px\" width=\"20px\" ></h6>";
	
	if($row1['tenp']>=$row2['tenp_e'])
		echo "<h6>10th %age required greater than ".$row2['tenp_e']." <img src=\"Images/tick.png\" height=\"20px\" width=\"20px\" ></h6>";
	else
		echo "<h6>10th %age required greater than ".$row2['tenp_e']." <img src=\"Images/cross.png\" height=\"20px\" width=\"20px\" ></h6>";
	
	
	if($row1['degree']==$row2['degree_e'] && $row1['cpi']>=$row2['cpi_e'] && $row1['year']>=$row2['year_e'] && $row1['twp']>=$row2['twp_e'] && $row1['tenp']>=$row2['tenp_e']  ){
		echo "<H3>You're eligible!</H3><BR>";
		echo "<input type=\"button\" value=\"Apply\" style=\"color:black;\"onclick=\"apply_fun('".$job_id."','".$s_mail."','".$row2['company_name']."',this)\">";
	}else{
		echo "<H3>You're not eligible!</H3><BR>";
	}
?>
</body>
</html>