<?php
  include("login.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secret Diary</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
    <!-- Additional styling -->
    <link rel="stylesheet" href="style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header pull-left">
          <a class="navbar-brand" href="#">Secret Diary</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <!-- Login Form -->
        <form class="navbar-form pull-right" method="post">
          <div class="form-group">
            <label for="loginEmail"></label><input class="form-control" type="email" name="loginEmail" id="loginEmail" placeholder="Your Email" value="<?php echo addslashes($_POST['loginEmail']); ?>" />
            <label for="loginPassword"></label><input class="form-control" type="password" name="loginPassword" id="loginPassword" placeholder="Your password" />
            <input class="btn btn-primary" type="submit" name="submit" value="Log In" />
          </div>
        </form>
      </div><!-- /.container-fluid -->
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
          <p class="lead">Your own private diary.<br />Make any notes you'd like.</p>
          <?php
            if ($error) {
              echo "<div class='alert alert-danger'>".addslashes($error)."</div>";
            }
            if ($logoutMessage) {
              echo "<div class='alert'>".$logoutMessage."</div>";
            }
          ?>
        </div>
        <div class="col-md-6 col-md-offset-3">
          <!-- Sign-up Form -->
          <form class="marginTop" method="post" id="signUpForm">
            <div class="form-group">
              <label for="email">Email</label><input class="form-control" type="email" name="email" id="email" placeholder="Your Email" value="<?php echo addslashes($_POST['email']); ?>" />
              <label for="password">Password</label><input class="form-control" type="password" name="password" id="password" placeholder="Your password"/><br />
              <input class="btn btn-success" type="submit" name="submit" value="Sign Up" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <!-- Custom scripts -->
  <script src="scripts.js"></script>
</html>
