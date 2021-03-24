<?php
session_start();
include "connect.php";
$error = "";
if(isset($_POST['submit'])){
  $image = $_FILES['image'];
  $imageName = $_FILES['image']['name'];
  $temp = $_FILES['image']['tmp_name'];
  $extract = explode('.', $imageName);
  $ext = $extract[1];
  $path = 'img/'.$extract[0].rand(1,9999999).'.'.$ext;
  $allowed = array('gif', 'jpeg', 'jpg', 'png');
  if(in_array($ext, $allowed)){
    move_uploaded_file($temp, $path);

	  $pass = $_POST['password'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $about = $_POST['about'];
    $qry = "INSERT INTO `user` (`userid`, `name`, `email`, `pass`, `address`, `phone`, `about`, `profile`) VALUES (NULL, '$name', '$email', '$pass', '$address', '$phone', '$about', '$path');";
    $rsl = $con->query($qry);
    $qury = "SELECT userid FROM user ORDER BY userid DESC LIMIT 1";
    $rslt = $con->query($qury);
    $row = $rslt->fetch_assoc();
    $_SESSION['id'] = $row['userid'];
    if($rsl){
        header("Location: education");
	  }
	  else{
		  ?>
        <script>
           alert("UnExpected Error Occur.");
        </script>
      <?php
    }
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
        <form class="form-control center_div" method="POST" action="" enctype="multipart/form-data">
          <div class="form-header">
            <div class="form-row">
              <div class="form-group col-md-6">
                <h1 style="font-size: 60px;">Jobies.pk</h1>
                <small style="font-size: 20px;">Find a Job</small>
              </div>
              <div class="form-group col-md-6">
                  <center>
                    <img src="img/profile.png" id="blah" alt="Avatar" style="border-radius: 50%" width="140px" height="140px"><br><br>
                    <input type="file" id="selectedFile" name="image" style="display: none;" onchange="readURL(this);" />
                    <input type="button" class="btn btn-info btn-sm" value="Select" onclick="document.getElementById('selectedFile').click();" />
                  </center>
                </div>
            </div>
        </div>
        <div class="form-row">
              <div class="form-group col-md-12">
                <label>Your Full Name</label>
                <input type="text" class="form-control" name="name" required>
              </div>
            </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Password<small></small></label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Mobile No<small><i> (03XXXXXXXXX)</i></small></label>
                <input type="number" class="form-control" name="phone" onKeyPress="if(this.value.length==11) return false;" required>
              </div>
            </div>
            <div class="form-group">
              <label>Address</label>
              <textarea type="text" class="form-control" name="address" required></textarea>
            </div>
            <div class="form-group">
              <label>About Yourself</label>
              <textarea type="text" class="form-control" name="about" required></textarea>
            </div>
            <div class="form-row">
                <span>Already have account? <a href="login">Sigin</a></span>
            </div>
            <div class="form-row">
                <span><?php echo $error; ?></span>
            </div>
            <div class="form-row">
                <input type="submit" class="btn btn-primary" name="submit" value="Next"></input>
			</div>
          </form>
    </body>
    <script>
      function readURL(input) {
              if (input.files && input.files[0]) {
                  var reader = new FileReader();

                  reader.onload = function (e) {
                      $('#blah')
                          .attr('src', e.target.result)
                  };
                  reader.readAsDataURL(input.files[0]);
              }
          }
      </script>
</html>