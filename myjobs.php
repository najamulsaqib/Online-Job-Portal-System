<?php
session_start();
if(isset($_SESSION['id'])){
}
else{
    header("Location: login");
}
	include "connect.php";
	$i = $_SESSION['id'];
	$qry = "SELECT jobs.title, appliedjobs.status, appliedjobs.userid FROM `appliedjobs` LEFT JOIN jobs ON jobs.jobid = appliedjobs.jobid WHERE appliedjobs.userid = '$i' AND `jobs`.`jobid` IN(SELECT appliedjobs.jobid FROM appliedjobs WHERE appliedjobs.userid = '$i')";
	$rsl = $con->query($qry);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Jobies - Find Jobs</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Jobies.pk | My Jobs</h2>
					</div>
					<div class="col-sm-6">
                        <a href="logout" class="btn btn-danger"><i class="material-icons" title="Delete">&#xE879;</i> <span>Logout</span></a>
						 <a href="../jobies.pk" class="btn btn-success" ><i class="material-icons">&#xE416;</i> <span>Jobies.pk</span></a> 
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<?php
				
				$count = mysqli_num_rows($rsl);
				if(!empty($count)){ ?>
					<thead>
						<tr>
							<th>No.</th>
							<th colspan="5">Title</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$num = 1;
						while ($row = $rsl->fetch_assoc()){ ?>
							<tr>
								<td><b><?php echo $num; $num += 1;?></b></td>
								<td colspan="5"><?php echo $row['title']?></td>
								<td>
									<?php
										$status = $row['status'];
										if($status==1){
											echo "<a class='edit'>Pending</a>";
										}
										elseif($status==2){
											echo "<a class='accept'>Approved</a>";
										}
										elseif($status==3){
											echo "<a class='delete'>Rejected</a>";
										}
									?>
								</td>
							</tr>
						<?php	
						}
					}
					else{
						?>
						<td>
							<tr colspan="7">
								<h1>You haven't applied yet.</h1>
							</tr>
						</td>
						<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>        
</div>
</html>