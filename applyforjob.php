<?php
session_start();
$uid = $_SESSION['id'];
include "connect.php";
$qry = "SELECT SUM(experiance) AS `exp` FROM `work` WHERE `userid` = '$uid';";
$rsl = $con->query($qry);
$row = $rsl->fetch_assoc();
$exp = $row['exp'];
$jobid = $_GET['id'];
$qry = "INSERT INTO `appliedjobs` (`aj_id`, `jobid`, `userid`, `experiance`, `status`) VALUES (NULL, '$jobid', '$uid', '$exp', '1');";
$rsl = $con->query($qry);
if(!$rsl){
    echo "UnExpected Error Occur";
    header("Location: index");
}
header("Location: ../jobies.pk");
?>