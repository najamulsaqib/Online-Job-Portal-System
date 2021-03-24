<?php
session_start();
include "connect.php";
if(isset($_SESSION['id'])){
    if($_SESSION['id'] == 1){
        header("Location: admin");
    }
}
else{
    header("Location: login");
}
if(isset($_GET['search']) && $_GET['search']!= NULL){
    $s = $_GET['search'];
    $qry = "SELECT * FROM `jobs` WHERE `title` LIKE '%$s%' AND `jobs`.`jobid` NOT IN(SELECT appliedjobs.jobid FROM appliedjobs WHERE appliedjobs.userid = '".$_SESSION['id']."') AND `jobs`.`status` = 0;";
}
else{
	$qry = "SELECT * FROM `jobs` WHERE `jobs`.`jobid` NOT IN(SELECT appliedjobs.jobid FROM appliedjobs WHERE appliedjobs.userid = '".$_SESSION['id']."') AND `jobs`.`status` = 0;";
}
	$rsl = $con->query($qry);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobies.pk | Find Jobs</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/Fontawesome.css">
    <style>
body{
    margin: 0;
	font-family: "Lucida Console", Courier, monospace;
    background-color: #F0F0F0;
}
.topnav {
  background-color: #566787;
  overflow: hidden;
  margin: 0 0 0 0;
}
.topnav .logo{
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  font-family: "Lucida Console", Courier, monospace;
  text-decoration: none;
  font-size: 27px;
}
.topnav a {
  float: right;
  color: #f2f2f2;
  text-align: center;
  padding: 18px 16px;
  text-decoration: none;
  font-size: 20px;
}
.topnav a.active {
  background-color:  #F44336;
  color: white;
}
.topnav a:hover {
  background-color: #00aa00;
  color: white;
}
@import url("https://fonts.googleapis.com/css?family=Poppins:400,500,600,700|Didact+Gothic&display=swap");

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.section-bg {
    padding: 60px 0;
    background: #F0F0F0;
}

.section-title {
    /* margin-bottom: 25px; */
}

.section-title h2 {
    position: relative;
    font-size: 32px;
    line-height: 1.4;
    font-weight: 700;
    letter-spacing: 1px;
    z-index: 1;
    text-transform: capitalize;
    display: inline-block;
    font-family: "Didact Gothic", sans-serif;
}

.single-product {
    box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.25);
    padding: 0 0 20px;
    border-radius: 0 0 12px 12px;
    margin-bottom: 50px;
}

.single-product .product-thumb {
    margin-bottom: 20px;
}

.single-product .product-title {
    margin-bottom: 20px;
    text-align: center;
    align-items: center;
}

.single-product .product-title h3 {
    font-family: "Didact Gothic", sans-serif;
    font-size: 17px;
    font-weight: 200;
}

.single-product .product-title h3 a {
    color: #292929;
    text-decoration: none;
}

.single-product .product-title h3 a:hover {
    color: #7289ab;
}

.single-product:hover {
    box-shadow: -2px -2px 8px white,
     -2px -2px 12px rgba(255, 255, 255, 0.5),
      inset 2px 2px 4px rgba(255, 255, 255, 0.1),
       2px 2px 8px rgba(0, 0, 0, 0.15);
}

img {
    display: inline-block;
    max-width: 100%;
}

.product-btns
{
    display: flex;
    justify-content: center;
}

a {
    text-decoration: none;
    cursor: pointer;
    transition: .3s;
    color: #292929;
}

.btn-small {
    display: inline-block;
    font-size: 14px;
    font-weight: 700;
    text-transform: uppercase;
    padding: 8px 32px;
    border-radius: 50px;
    text-decoration: none;
    box-shadow: inset -2px -2px 8px white,
     inset -2px -2px 12px rgba(255, 255, 255, 0.5),
      inset 2px 2px 4px rgba(255, 255, 255, 0.1),
       inset 2px 2px 8px rgba(0, 0, 0, 0.15);
    transition: 0.4s;
}
.topnav input[type=text] {
  float: right;
  padding: 6px;
  border: none;
  margin-top: 15px;
  margin-right: 360px;
  font-size: 17px;
}
.btn-round {
    display: inline-block;
    font-size: 14px;
    font-weight: 700;
    text-transform: uppercase;
    height: 45px;
    width: 45px;
    text-align: center;
    line-height: 45px;
    border-radius: 50%;
    text-decoration: none;
    box-shadow: -2px -2px 8px white, 
    -2px -2px 12px rgba(255, 255, 255, 0.5), 
    inset 2px 2px 4px rgba(255, 255, 255, 0.1),
     2px 2px 8px rgba(0, 0, 0, 0.15);
}

.btn-small:hover {
    box-shadow: -2px -2px 8px white,
     -2px -2px 12px rgba(255, 255, 255, 0.5),
      inset 2px 2px 4px rgba(255, 255, 255, 0.1),
       2px 2px 8px rgba(0, 0, 0, 0.15);
    color: #7289ab;
    text-decoration: none;
}

.btn-small:hover span {
    display: inline-block;
    transform: scale(0.98);
}

.btn-round:hover {
    box-shadow: inset -2px -2px 8px white,
     inset -2px -2px 12px rgba(255, 255, 255, 0.5),
      inset 2px 2px 4px rgba(255, 255, 255, 0.1),
       inset 2px 2px 8px rgba(0, 0, 0, 0.15);
    color: #7289ab;
}

.button-center
{
    justify-content: center;
    text-align: center;
}

.bttn-def {
    display: inline-block;
    font-size: 14px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    padding: 14px 42px;
    border-radius: 50px;
    text-decoration: none;
    font-family: "Poppins", sans-serif;
    box-shadow: -2px -2px 8px white, -2px -2px 12px rgba(255, 255, 255, 0.5), inset 2px 2px 4px rgba(255, 255, 255, 0.1), 2px 2px 8px rgba(0, 0, 0, 0.15);
    transition: 0.4s;
}

.bttn-def:hover {
    color: #7289ab;
    box-shadow: inset -2px -2px 8px white, inset -2px -2px 12px rgba(255, 255, 255, 0.5), inset 2px 2px 4px rgba(255, 255, 255, 0.1), inset 2px 2px 8px rgba(0, 0, 0, 0.15);
}

.bttn-def:hover span {
    display: inline-block;
    transform: scale(0.98);
}
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Jobies.Pk</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="myjobs">My Applications</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about">My CV</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout">Logout</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search"  <?php if(isset($_GET['search'])){$val = $_GET['search']; echo "value='$val'";}?>>
      <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    
  </div>
</nav>
<!-- <nav class="topnav">
    <a class="active" href="logout">logout</a>
    <a href="myjobs">My Applications</a>
    <a href="about">My CV</a>
    <form>
        <input type="text" size="30" name="search" <?php if(isset($_GET['search'])){$val = $_GET['search']; echo "value='$val'";}?>>
    </form>
    <l class="logo">Jobies.pk</l>
</nav> -->
<section class="section-bg">
    <div class="container">
        <div class="row"> 
        <?php
        $count = mysqli_num_rows($rsl);
		if(!empty($count)){
            while ($row = $rsl->fetch_assoc()){ ?>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="single-product">
                        <div class="product-thumb">
                            <img src="<?php echo $row['img'];?>" alt="">
                        </div>
                        <div class="product-title">
                            <h3><a href=""><?php echo $row['title']?></a></h3>
                        </div>
                        <div class="product-btns">
                            <a href="applyforjob.php?id=<?php echo $row['jobid']; ?>" class="btn-small mr-2" onclick="return confirm('Are you Sure?')">Apply for Job</a>
                        </div>
                    </div>
                </div>
            <?php }
        }
        else{
            ?>
            <h1>No Search Related Job</h1>
            <?php
        }
            ?>
        </div>
    </div>
</section>
</body>
</html>