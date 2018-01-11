<?php
require('viewphotos.php');
$_SESSION['message'] = '';
$_SESSION['message1'] = '';
$user = $_SESSION['username'];



$mysqli = new mysqli("localhost", "root", "", "filerproject");
$sql = "SELECT *  FROM `image` WHERE user = '$user'";


	if (isset($_POST['edit'])) {
		echo "<input type='text' value="$row ["name"]">";

	}

?>
