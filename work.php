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
    $exp = $_POST['exp'];
    $qry = "INSERT INTO `work` (`id`, `userid`, `jobtitle`, `company`, `aboutjob`, `startjob`, `endjob`, `experiance`) VALUES (NULL, '$uid', '$dtitle', '$isntname', '$abjob', '$start', '$end', $exp);";
    $rsl = $con->query($qry);
    if($rsl){
        ?>
            <script>
                alert("Data Insertion Sucessfull!");
                window.location.href = "../jobies.pk";
            </script>
        <?php
      	}
	else{
		?>
            <script>
            alert("UnExpected Error Occur.");
            </script>
        <?php
	}
}
if(isset($_POST['add'])){
    $uid = $_SESSION['id'];
    $dtitle = $_POST['dtitle'];
    $isntname = $_POST['isntname'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $abjob = $_POST['abjob'];
    $exp = $_POST['exp'];
    $qry = "INSERT INTO `work` (`id`, `userid`, `jobtitle`, `company`, `aboutjob`, `startjob`, `endjob`, `experiance`) VALUES (NULL, '$uid', '$dtitle', '$isntname', '$abjob', '$start', '$end', $exp);";
    $rsl = $con->query($qry);
    if($rsl){
        header("Location: work");
	}
	else{
    ?>
        <script>
            alert("UnExpected Error Occur.");
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
                <label>Job Title</label>
                <input type="text" class="form-control" name="dtitle" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Company Name</label>
                <input type="text" class="form-control" name="isntname" required>
              </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Starting Date <small>(mm/yyyy)</small></label>
                    <input type="text" class="form-control" name="start" required>
                </div>
                <div class="form-group col-md-4">
                    <label>Ending Date <small>(mm/yyyy)</small></label>
                    <input type="text" class="form-control" name="end" required>
                </div>
                <div class="form-group col-md-4">
                    <label>Experiance <small>(In Years)</small></label>
                    <input type="number" class="form-control" name="exp" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>About Job</label>
                    <input type="text" class="form-control" name="abjob" required>
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