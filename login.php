<?php

  session_start();

  if ($_GET['logout'] == 1 AND $_SESSION['id']) {

    session_destroy();
    $logoutMessage = "You have been logged out. Have a nice day!";

  }

  include("connection.php");

  if ($_POST['submit']=="Sign Up") {
    //email validation
    if (!$_POST['email']) $error = "<br />Please enter your email";
      else if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) $error = "<br />Please enter a valid email address";

    //password validation
    if (!$_POST['password']) $error = "<br />Please enter a password";
      else {
        if (strlen($_POST['password']) < 8) $error = "<br />Please enter a password with at least eight characters";
        if (!preg_match('`[A-Z]`', $_POST['password'])) $error = "<br />Please include at least one capital letter in your password";
      }

    //output errors on form submission
    if ($error) $error = "There were error(s) in your sign-up details.".$error;
      else {

        if (mysqli_connect_error()) {
          $error = "Could not connect to the database";
        }

        //salt password
        $salt = md5(md5($_POST['email']).$_POST['password']);

        //check to see if they're in the database already
        $query = "SELECT * FROM `users` WHERE `email`='".mysqli_real_escape_string($link, $_POST['email'])."'";
        $result = mysqli_query($link, $query);
        $results = mysqli_num_rows($result);

        //add them to the database if they're not included already
        if ($results > 0) {
          $error = "That email address is already registered. Do you want to log in?";
        } else {
          $query = "INSERT INTO `users` (`email`, `password`) VALUES('".$_POST['email']."', '".$salt."')";
          mysqli_query($link, $query);

          //establish their session
          $_SESSION['id'] = mysqli_insert_id($link);
          //redirect them to the diary page
          header("Location:main.php");


        }
      }
  }

  if ($_POST['submit']=="Log In") {

    //look up the user
    $salt = md5(md5($_POST['loginEmail']).$_POST['loginPassword']);
    $query = "SELECT * FROM `users` WHERE `email`='".mysqli_real_escape_string($link,$_POST['loginEmail'])."' AND `password`='".$salt."' LIMIT 1";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);

    //log them in if they're found successfully
    if ($row) {
      $_SESSION['id'] = $row['id'];
      //redirect them to the diary page
      header("Location:main.php");
    } else {
      //prompt them to sign up if they're not found
      $error = "We could not find you in our database. Sorry!";
    }
  }

?>
