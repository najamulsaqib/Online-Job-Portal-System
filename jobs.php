<?php
session_start();
if(isset($_SESSION['id']) && $_SESSION['id'] == 1){
}
else{
    header("Location: login");
}
	include "connect.php";
	$qry = "SELECT *, (SELECT COUNT(aj_id) FROM appliedjobs WHERE appliedjobs.jobid = jobs.jobid ) AS candidates from `jobs`";
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
						<h2>Jobies.pk</h2>
					</div>
					<div class="col-sm-7">
                        <a href="logout" class="btn btn-danger"><i class="material-icons" title="Delete">&#xE879;</i> <span>Logout</span></a>
						 <a href="addjob" class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>Add New Job</span></a> 
                        <a href="approved" class="btn btn-info"><i class="material-icons" title="Delete">&#xE172;</i> <span>Approved candidate</span></a>
                        <a href="admin" class="btn btn-outline-info"><i class="material-icons" title="Delete">&#xE851;</i> <span>Admin pannel</span></a>
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
							<th>Job Title</th>
							<th>Total Applicant</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$num = 1;
						while ($row = $rsl->fetch_assoc()){ ?>
							<tr>
								<td><b><?php echo $num; $num += 1;?></b></td>
								<td><?php echo $row['title']?></td>
								<td><?php echo $row['candidates']?></td>
								<td>
                                <?php 
                                if($row['status']==1){
                                    ?>
                                    <a href="requests.php?aid=<?php echo $row['jobid'];?>" class="accept"><i class="material-icons" name="accept" title="Accept Applications" onclick="return confirm('Are you sure to Accept Applications?')">&#xE876;</i></a>
                                    <?php
                                }
                                else{
                                    ?>
                                    <a href="requests.php?rid=<?php echo $row['jobid'];?>" class="delete"><i class="material-icons" name="decline" title="Restrict Applications" onclick="return confirm('Are you sure to Restrict Applications?')">&#xE612;</i></a>
                                    <?php
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