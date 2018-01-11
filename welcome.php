<?php
session_start();
require('layout2.php') ;
require('header2.php');
$_SESSION['message'] = '';
$_SESSION['message1'] = '';
$username = '';
$user = $_SESSION['username'];
$mysqli = new mysqli("localhost", "root", "", "filerproject");

	if(isset($_POST['submit_image'])){


    $imgname = addslashes($_FILES['image']['name']);
		$filetmp =$_FILES["image"]["tmp_name"];
    $type = addslashes($_FILES['image']['type']);
		$filepath = "uploaded/".$imgname;
	   move_uploaded_file($filetmp,$filepath);






    if(empty($type)){
     $_SESSION['message'] = "Please Select Image File.";
		 $uploadOk = 0;

  }else {
    $q =  "INSERT INTO image (name, image, user) "
    . "VALUES ('$imgname', '$filetmp', '$user')";


              mysqli_query($mysqli, $q);
               $_SESSION['message1'] = "your image has been succesfuly uploaded.";

  }


}
?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
   <link rel="stylesheet" href="style.css" type="text/css">
   <body>
     <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
     <div class="alert alert-success"><?= $_SESSION['message1'] ?></div>
      <form class="form" action="#" method="post" enctype="multipart/form-data" autocomplete="off">
     <div id="imgContainer">
       <input type="file" name="image"  value="image"><br>
       <input type="submit" name="submit_image" value="upload">
       </div>
     </form>
   </body>
 </html>
