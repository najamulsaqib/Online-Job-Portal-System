<?php
session_start();
include "connect.php";
$id = $_GET['id'];
if(isset($_SESSION['id'])){
}
else{
    header("Location: login");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Jobies.pk - Resume</title>
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles1.css" rel="stylesheet">
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <?php
            $qry = "SELECT * FROM `user` WHERE `userid` = $id";
            $rsl = $con->query($qry);
            $row = $rsl->fetch_assoc();
        ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none"><?php echo ucwords($row['name']); ?></span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="<?php echo ucwords($row['profile']); ?>" alt="" /></span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="admin">Back</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience">Experience</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#education">Education</a></li>
                </ul>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container-fluid p-0">
            <!-- About-->
            <section class="resume-section" id="about">
                <div class="resume-section-content">
                    <h1 class="mb-0">
                        <span class="text-primary"><?php echo ucwords($row['name']); ?></span>
                    </h1>
                    <div class="subheading mb-5">
                        <?php echo ucwords($row['address']); ?><br>
                        <a href="mailto:<?php echo ucwords($row['email']); ?>"><?php echo ucwords($row['email']); ?></a><br>
                        <a href="tel:<?php echo ucwords($row['phone']); ?>"><?php echo ucwords($row['phone']); ?></a>
                    </div>
                    <p class="lead mb-5"><?php echo ucwords($row['about']); ?></p>    
                </div>
            </section>
            <hr class="m-0" />
            <!-- Experience-->
            <?php
            $qry = "SELECT * FROM `work` WHERE `userid` = $id ORDER BY `id` DESC";
            $rsl = $con->query($qry);
            ?>
            <section class="resume-section" id="experience">
                <div class="resume-section-content">
                    <h2 class="mb-5">Experience</h2>
                    <?php
                    while($row=$rsl->fetch_assoc()){ ?>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0"><?php echo ucwords($row['jobtitle']); ?></h3>
                            <div class="subheading mb-3"><?php echo ucwords($row['company']); ?></div>
                            <p><?php echo ucwords($row['aboutjob']); ?></p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary"><?php echo ucwords($row['startjob']); ?> - <?php echo ucwords($row['endjob']); ?></span></div>
                    </div>
                    <?php }?>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Education-->
            <?php
            $qry = "SELECT * FROM `education` WHERE `userid` = $id";
            $rsl = $con->query($qry);
            ?>
            <section class="resume-section" id="education">
                <div class="resume-section-content">
                    <h2 class="mb-5">Education</h2>
                    <?php
                    while($row=$rsl->fetch_assoc()){ ?>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0"><?php echo ucwords($row['institute']); ?></h3>
                            <div class="subheading mb-3"><?php echo ucwords($row['title']); ?>    </div>
                            <p>
                                <?php
                                $num = (float)$row['totalmarks']; 
                                if($num <= 4){
                                    echo "CGPA ".number_format($row['obtainedmarks'], 2);
                                } 
                                else{
                                    $tm = $row['totalmarks'];
                                    $om = $row['obtainedmarks'];
                                    $marks = ($om/$tm)*100;
                                    echo number_format($marks, 2)."%";
                                }
                                ?>
                            </p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary"><?php echo ucwords($row['start']); ?> - <?php echo ucwords($row['end']); ?></span></div>
                    </div>
                    <?php }?>
                </div>
            </section>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
