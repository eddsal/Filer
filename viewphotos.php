<?php
  session_start();
require('layout2.php') ;
require('header2.php');
$_SESSION['message'] = '';
$_SESSION['message1'] = '';
$user = $_SESSION['username'];



$mysqli = new mysqli("localhost", "root", "", "filerproject");
$sql = "SELECT *  FROM `image` WHERE user = '$user'";
$sth = $mysqli->query($sql);
$imgname = '{$row["name"]}' ;
$filepath = "uploaded/".$imgname;

echo "<table>";


while ($row=mysqli_fetch_array($sth)) {
  echo "<tr>";
  echo "<td><img src='uploaded/{$row['name']}'  height=400px width=300px ></td>";
  echo "<td>"; echo$row ["name"]; echo "</td>";


    echo "<form class='form' method='post'>";
    ?><td><input type="submit" name="edit" value="edit" ></a></td> <?php

      if (isset($_POST['edit'])) {
      echo "<form  method='post' enctype='multipart/form-data'>";
        echo "<input type='text' name='file' placeholder= {$row ['name']} >";
        echo "<input type='submit' name='rename' value='rename'>";
        echo"</form>";
        if (isset($_POST['rename'])) {
     $tmp_file = $_FILES['image']['tmp_name'];
     $ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
     $rand = md5(uniqid().rand());
     $post_image = $rand.".".$ext;
     move_uploaded_file($tmp_file,"../uploaded/".$post_image);
  }


}


    ?><td><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td> <?php
    ?><td><a href='download.php'>Download</a> </td> <?php


}

?>
