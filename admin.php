<?php
session_start();
if(isset($_SESSION['id']) && $_SESSION['id'] == 1){

}
else{
    header("Location: login");
}
	include "connect.php";
	$qry = "SELECT `user`.`name`, `user`.`userid`, `jobs`.`jobid`, `jobs`.`title`, `appliedjobs`.`aj_id`, `appliedjobs`.`experiance` FROM `appliedjobs` JOIN jobs on appliedjobs.jobid = jobs.jobid JOIN user ON appliedjobs.userid = user.userid WHERE `appliedjobs`.`status` = '1' ORDER BY `appliedjobs`.`experiance` DESC";
	$rsl = $con->query($qry);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Jobies - Admin Pannel</title>
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
					<div class="col-sm-5">
						<h2>Admin Pannel | Jobies.pk</h2>
					</div>
					<div class="col-sm-7">
                        <a href="logout" class="btn btn-danger"><i class="material-icons" title="Delete">&#xE879;</i> <span>Logout</span></a>
						 <a href="addjob" class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>Add New Job</span></a> 
						 <a href="jobs" class="btn btn-info" ><i class="material-icons">&#xE150;</i> <span>Jobs</span></a> 
                        <a href="approved" class="btn btn-outline-info"><i class="material-icons" title="Delete">&#xE179;</i> <span>Approved candidate</span></a>
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
							<th>Applicant Name</th>
							<th>Job Title</th>
							<th>Experiance</th>
                            <th>CV Link</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$num = 1;
						while ($row = $rsl->fetch_assoc()){ ?>
							<tr>
								<td><b><?php echo $num; $num += 1;?></b></td>
								<td><?php echo $row['name']?></td>
								<td><?php echo $row['title']?></td>
                                <td><?php echo $row['experiance']?> Years</td>
                                <td><a href="ecplorecv.php?id=<?php echo $row['userid'];?>" class="accept"><i class="material-icons" name="accept" title="Explore CV">&#xE416;</i></a></td>
								<td>
									<a href="accept.php?id=<?php echo $row['aj_id'];?>" class="accept"><i class="material-icons" name="accept" title="Accept" onclick="return confirm('Are you sure to Accept Application?')">&#xE876;</i></a>
                                    <a href="decline.php?id=<?php echo $row['aj_id'];?>" class="delete"><i class="material-icons" name="decline" title="Decline" onclick="return confirm('Are you sure to Decline Application?')">&#xE612;</i></a>
								</td>
							</tr>
						<?php	
						}
					}
					else{
						?>
						<td>
							<tr colspan="7">
								<h1>No New Candidate</h1>
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