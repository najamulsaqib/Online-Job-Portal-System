<?php
session_start();
if(isset($_SESSION['id']) && $_SESSION['id'] == 1){
}
else{
    header("Location: login");
}

if(isset($_POST['submit'])){
    $title = $_POST['jobtitle'];
    include "connect.php";
    $choice = array("img/sq1.jpg","img/bandage.jpg", "img/sq2.jpg", "img/chair.jpg", "img/sq3.jpg", "img/chart.jpg", "img/sq4.jpeg", "img/clock.jpg", "img/sq5.jpeg", "img/code.jpg", "img/sq6.jpeg", "img/notes.jpg", "img/sq7.jpeg", "img/pencil.jpg", "img/sq8.jpeg", "img/web.jpg", "img/sq9.jpeg", "img/sq10.jpeg", "img/sq11.jpeg", "img/sq12.jpeg", "img/sq13.jpeg", "img/sq14.jpeg", "img/sq15.jpeg");
    $rno = rand(0,count($choice)-1);
    $img = $choice[$rno];
    $qry = "INSERT INTO `jobs` (`jobid`, `title`, `img`) VALUES (NULL, '$title', '$img');";
    $rsl = $con->query($qry);
    if($rsl){
      ?>
      <script>
         alert("Job Created  Sucessfully.");
         window.location.href = "admin";
      </script>
    <?php
    }
    else{
      ?>
      <script>
         alert("UnExpected Error Occur.");
         window.location.href = "admin";
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
        <title>Jobies.pk | Add Job</title>
        <link rel="stylesheet" href="css/insert.css">
        
    </head>
    <body>
        <form class="form-control center_div" method="POST" action="">
            <div class="form-header">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <h1 style="font-size: 60px;">Jobies.pk</h1>
                  <small style="font-size: 20px;">Add a New Job</small>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Breif About Job</label>
              <textarea type="text" class="form-control" name="jobtitle" required></textarea>
            </div>
            <div>
              <input type="submit" class="btn btn-primary" name="submit"></input>
            </div>
          </form>
    </body>
</html>
