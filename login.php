<?php
session_start();
session_unset();
include "connect.php";
$error = "";
if(isset($_POST['submit'])){
	$pass = $_POST['password'];
    $email = $_POST['email'];
    $qry = "SELECT * FROM `user` WHERE `user`.`email` = '$email' AND `user`.`pass` = '$pass';";
    $rsl = $con->query($qry);
    $row = $rsl->fetch_assoc();
    if($rsl){
        $_SESSION['id'] = $row['userid'];
        if($row['userid'] == 1){
            header("Location: admin");
        }
		    else{
          header("Location: ../jobies.pk");
        }
	}
	else{
    ?>
    <script>
       alert("Email or Password is incorrect.");
       window.location.href = "login";
    </script>
  <?php
  }
}
?>
<!DOCOTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
        <title>jobies.pk | Login</title>
        <link rel="stylesheet" href="css/insert.css">
        
    </head>
    <body>
        <form class="form-control center_div" method="POST" action="">
            <div class="form-header">
              <div class="form-row">
                <div class="form-group">
                  <h1 style="font-size: 60px;">Jobies.pk</h1>
                  <small style="font-size: 20px;">Find a Job</small>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Email</label>
                <input type="email" class="form-control" name="email" required>
              </div>
			</div>
			<div class="form-row">
              <div class="form-group col-md-12">
                <label>Password</label>
                <input type="password" class="form-control" name="password" required>
              </div>
      </div>
      <div class="form-row">
				<span>Don't have account? <a href="signup">Signup</a></span>
			</div>
			<div class="form-row">
				<span><?php echo $error; ?></span>
			</div>
      <div class="form-row">
          <input type="submit" class="btn btn-primary" name="submit" value="Login"></input>
			</div>
          </form>
    </body>
</html>