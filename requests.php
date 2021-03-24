<?php
include "connect.php";
if(isset($_GET['aid'])){
    $id = $_GET['aid'];
    $qry = "UPDATE `jobs` SET `status` = '0' WHERE `jobs`.`jobid` = '$id';";
}
elseif(isset($_GET['rid'])){
    $id = $_GET['rid'];
    $qry = "UPDATE `jobs` SET `status` = '1' WHERE `jobs`.`jobid` = '$id';";
}
$rsl = $con->query($qry);
if(!$rsl){
    echo "UnExpected Error Occur";
    header("Location: jobs");
}
header("Location: jobs");
?>