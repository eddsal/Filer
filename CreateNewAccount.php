<?php

require('layout.php') ;
$_SESSION['message'] = '';
$username= '';
$mysqli = new mysqli("localhost", "root", "", "filerproject");


  //condition if the two pass are =//z
  if (isset($_POST['register'])) {
  if ($_POST['password'] == $_POST['confirmpassword']) {
    $firstname = $mysqli->real_escape_string($_POST['firstname']);
    $lastname = $mysqli->real_escape_string($_POST['lastname']);
    $username = $mysqli->real_escape_string($_POST['username']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $password = $mysqli->real_escape_string($_POST['password']);
    $sql_u = "SELECT * FROM users WHERE username='$username'";
  	$res_u = mysqli_query($mysqli, $sql_u);
    $q = "INSERT INTO users (firstname, lastname, username, email, password)"
            ."VALUES('$firstname', '$lastname', '$username', '$email', '$password')";
             mysqli_query($mysqli, $q);

             $row = mysqli_fetch_assoc($res_u);
                      if ($username==$row['username'])
                      {
                        $_SESSION['message'] ="Username already exists";
                      }
                      elseif  ($email==$row['email'])
                      {
                        $_SESSION['message'] = "Email already exists";
                      } 






      //if reg is success//}
      elseif ($mysqli->query($q) === true) {

        session_start();
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $username;


        header('Location: welcome.php');
      }
      //if not//
      else {
        $_SESSION['message'] = "user could not be added to the database";
      }

  }
  else {
    $_SESSION['message'] = "two password do not match";
  }

}

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CreateNewAccount</title>
  </head>
  <body>
<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="style.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Create an account</h1>
    <form class="form" action="CreateNewAccount.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
      <div class="alert alert-success"></div>
        <input type="text" placeholder="first Name" name="firstname" required />
          <input type="text" placeholder="last Name" name="lastname" required />
      <input type="text" placeholder="UserName" class="username" name="username" value="<?= $username ?>" required />
      <input type="email" placeholder="Email" name="email" required />
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
      <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </form>
  </div>
</div>
  </body>
</html>
