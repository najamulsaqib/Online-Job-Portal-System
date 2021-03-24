<?php
include "connect.php";
$id = $_GET['id'];
$qry = "UPDATE `appliedjobs` SET `status` = '3' WHERE `appliedjobs`.`aj_id` = '$id';";
$rsl = $con->query($qry);
if(!$rsl){
    echo "UnExpected Error Occur";
    header("Location: admin");
}
header("Location: admin");
?>