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
$imgname = '{$row["name"]}';
$filepath = "uploaded/".$imgname;
echo "<table>";


while ($row=mysqli_fetch_array($sth)) {
  echo "<tr>";
  echo "<td><img src='uploaded/{$row['name']}'  height=400px width=300px ></td>";
  echo "<td>"; echo$row ["name"]; echo "</td>";


    echo "<form class='form' method='post'>";
    ?><td><input type="submit" name="edit" value="edit" ></a></td> <?php

      if (isset($_POST['edit'])) {

        echo "<input type='text' value='$nname' placeholder= {$row ['name']} >";
        echo "<button name='rename' >rename</button>";
    }
            if (isset($_POST['rename'])) {
                rename($row["name"], $nname);




            }


    ?><td><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td> <?php
    ?><td><a href="<?php $filepath ?>" Download="<?php $imgname ?>" >Download</a> </td> <?php

    var_dump($filepath);
}


?>
