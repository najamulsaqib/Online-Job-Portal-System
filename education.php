<?php
session_start();
if(isset($_SESSION['id'])){
}
else{
    header("Location: login");
}
include "connect.php";
$error = "";
if(isset($_POST['submit'])){
    $uid = $_SESSION['id'];
    $dtitle = $_POST['dtitle'];
    $isntname = $_POST['isntname'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $tmarks = $_POST['tmarks'];
    $omarks = $_POST['omarks'];
    $qry = "INSERT INTO `education` (`id`, `userid`, `title`, `institute`, `totalmarks`, `obtainedmarks`, `start`, `end`) VALUES (NULL, '$uid', '$dtitle', '$isntname', '$tmarks', '$omarks', '$start', '$end');";
    $rsl = $con->query($qry);
    if($rsl){
        header("Location: work");
	}
	else{
		$error = "Unknown Error";
	}
}
if(isset($_POST['add'])){
    $uid = $_SESSION['id'];
    $dtitle = $_POST['dtitle'];
    $isntname = $_POST['isntname'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $tmarks = $_POST['tmarks'];
    $omarks = $_POST['omarks'];
    $qry = "INSERT INTO `education` (`id`, `userid`, `title`, `institute`, `totalmarks`, `obtainedmarks`, `start`, `end`) VALUES (NULL, '$uid', '$dtitle', '$isntname', '$tmarks', '$omarks', '$start', '$end');";
    $rsl = $con->query($qry);
    if($rsl){
        header("Location: education");
	}
	else{
		$error = "Unknown Error";
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
                  <small style="font-size: 20px;">Add Education</small>
                </div>
            </div>
        </div>
        <div class="form-row">
              <div class="form-group col-md-12">
                <label>Degree Title</label>
                <input type="text" class="form-control" name="dtitle" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Institute Name</label>
                <input type="text" class="form-control" name="isntname" required>
              </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Starting Date <small>(mm/yyyy)</small></label>
                    <input type="text" class="form-control" name="start" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Ending Date<small>(mm/yyyy)</small></label>
                    <input type="text" class="form-control" name="end" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Total Marks<small>(Marks/CGPA)</small></label>
                    <input type="text" class="form-control" name="tmarks" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Obtained Marks<small>(Marks/CGPA)</small></label>
                    <input type="text" class="form-control" name="omarks" required>
                </div>
            </div>
            <div class="form-row">
                <span><?php echo $error; ?></span>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <button class="btn btn-primary" name="add">Add Another</input>
                </div>
                <div class="form-group col-md-6">
                    <input type="submit" class="btn btn-primary" name="submit" value="Next"></input>
                </div>
            </div>
          </form>
    </body>
</html>