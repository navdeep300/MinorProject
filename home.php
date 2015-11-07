<html>
<head>
  <title>Home</title>
</head>
<body>

<?php
require 'connection.php';
session_start();
if ($_SESSION['id']=="") {
	header("location:registration.php");
}
require 'navigation.php';
?>

<div class="locations">

	<?php
		echo $_SESSION['name'] . "  your locations are as follows <br/><br/>";
		 $uid = $_SESSION['id'];
		 $sql = "SELECT * FROM prefs WHERE uid = '$uid'";
		 $result = mysql_query($sql, $connection);
		 echo "<ul>";
		 while($row=mysql_fetch_array($result)){
				
		 			echo "<li>" . $row['name'] . "</li>";	
		 }
		 echo "</ul>";
	?>

</div>

<div class="showweather">
	<?php
		echo "<br/><br/>weather of locations: <br/><br/>";
		 $uid = $_SESSION['id'];
		 $sql = "SELECT * FROM prefs WHERE uid = '$uid'";
		 $result = mysql_query($sql, $connection);
		 echo "<ul>";
		 while($row=mysql_fetch_array($result)){
		 			echo "<li>" . $row['name'] . "</li>";	
		 }
		 echo "</ul>";
	?>
</div>
</body>
</html>
