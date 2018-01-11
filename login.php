<?php
$_SESSION['message'] = '';
require('layout.php') ;
$username = '';
$password = '';
$mysqli = mysqli_connect('localhost', 'root', '', 'filerproject');

if (!empty($_POST['username']) && !empty($_POST['password']))
{
    $username = htmlentities($_POST['username']);
    $password = $_POST['password'];

    $q= "SELECT * FROM users WHERE password = '". $password . "' AND username = '" . $username . "'";
    $result = mysqli_query($mysqli, $q);
    $user = mysqli_fetch_assoc($result);
    if ($user === NULL)
    {
        $_SESSION['message'] = 'Invalid username or password';
    }
    else
    {
        session_start();
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        header('Location: welcome.php');
        exit();
    }
}
$title = "Login";
ob_start();
?>
<body>

  <form class="login_Page" action="index.php" method="post">
      <div class="alert alert-error"><?= $_SESSION['message'] ?></div>

  <div id="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" value="<?= $username ?>">

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password">

    <button type="submit" name="login">Login</button>
    <input type="checkbox" checked="checked"> Remember me
  </div>
</body>
