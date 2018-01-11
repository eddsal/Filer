<?php

$mysqli = new mysqli("localhost", "root", "", "filerproject");
$id= $_GET["id"];
$deletefrom = "delete from image where id = $id";
mysqli_query($mysqli, $deletefrom);
?>

<script type="text/javascript">
window.location = "viewphotos.php"
</script>
