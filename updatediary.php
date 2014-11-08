<?php

  session_start();

  include("connection.php");
  $query = "UPDATE `users` SET diary='".mysqli_real_escape_string($link,$_POST['diary'])."' WHERE id='".$_SESSION['id']."' LIMIT 1";
  echo $query;
  $result = mysqli_query($link, $query);
  echo "<br />".$result;
  echo "<br />".$_SESSION['id'];
?>

<form method='post'>
  <input type="text" name="diary" />
  <input type="submit" value="Submit" />
</form>
