<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="hp.css" rel="stylesheet">
	<title>Confirmation</title>
</head>
<body>
	<div>
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "", "form1");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 $t = $mysqli->real_escape_string($_REQUEST['title']);
$n = $mysqli->real_escape_string($_REQUEST['username']);
$e = $mysqli->real_escape_string($_REQUEST['usermail']);
 $p = $mysqli->real_escape_string($_REQUEST['password']);
$u = $mysqli->real_escape_string($_REQUEST['usercard']);
$c = $mysqli->real_escape_string($_REQUEST['cardnumber']);
$d = $mysqli->real_escape_string($_REQUEST['expiration']);
// Attempt insert query execution
$sql = "INSERT INTO table1 (title, name, email,pass,ctype,cnumber,date) VALUES ('$t', '$n', '$e', '$p', '$u', '$c', '$d')";
if(mysqli_query($mysqli, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}
 
// Close connection
mysqli_close($mysqli);
?>
</div>
	<div>
		<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "", "form1");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Attempt select query execution
$sql = "SELECT * FROM table1";
if($result = $mysqli->query($sql)){
    if($result->num_rows > 0){
		
        echo "<table>";
            echo "<tr>";
			
                echo "<th>Gender</th>";
				
                echo "<th>Name</th>";
                echo "<th>E-mail</th>";
                echo "<th>Password</th>";
                echo "<th>Card Type</th>";
                echo "<th>Card Number</th>";
                echo "<th>Expiration Date</th>";
            echo "</tr>";
			
        while($row = $result->fetch_array()){
            echo "<tr>";
                
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['pass'] . "</td>";
                echo "<td>" . $row['ctype'] . "</td>";
                echo "<td>" . $row['cnumber'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        $result->free();
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
 
// Close connection
$mysqli->close();
?>
	</div>
</body>
</html>