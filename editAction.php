<html>
<body>
<?php
	$servername = "localhost";
    $username = "root";
    $password = "";
	$dbname = "projectmanagement";
	session_start();
	if(!isset($_SESSION['Username'])){
			echo "No session detected!";
			return;
			}
    $con = new mysqli($servername, $username, $password, $dbname);

    if (mysqli_connect_errno($con))
    {
        echo "MySql Error: " . mysqli_connect_error();
        }
	$sql = "SELECT * FROM Employees WHERE Project='$_POST[project]'";
    $query=mysqli_query($con,$sql);
	$result = $con->query($sql);
    $count=mysqli_num_rows($query);
    $row=mysqli_fetch_array($query);
	
	
   if ($result->num_rows > 0) {
	echo "Project has this employee: <br>"; 
	
	echo "<form action='timeAction2.php' method='POST'>"; 
    while($row = $result->fetch_assoc()) {
		
  		echo "<input type='radio' name='employee' value=" .$row["Name"]. "> ".$row["Name"]." <br>"; 
			
    }
	
	echo "<p><input type='submit' value='Get Task' /></p>";
	echo "</form>";
	echo "<a href = 'editTask.php'>Go back</a>";
} else {
    echo "0 results";
}

    mysqli_close($con);
    ?>
</body>
</html>