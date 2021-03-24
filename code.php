<!-- PHP File -->
<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "task";
$con = new mysqli($server, $user, $pass, $db);
if($con->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

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
      $qry = "INSERT INTO `img` (`id`, `path`) VALUES ('NULL', '$path');";
      $rsl = $con->query($qry);
      header("Location: 2nd.php");
    }
}
?>
<!-- HTML File -->
<html>
<body>
<center>
    <input type="button" class="btn btn-info btn-sm" value="Select" name="submit" />
</center>
</body>
</html>

<!-- HTML File 2 -->
<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "task";
$con = new mysqli($server, $user, $pass, $db);
if($con->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
$qry = "SELECT * FROM `img`;";
$rsl = $con->query($qry);
$row = $rsl->fetch_assoc();
?>
<html>
<body>
<center>
    <img src="<?php echo $path;?>" id="blah" alt="Avatar" style="border-radius: 50%" width="140px" height="140px"><br><br>
</center>
</body>
</html>