<?php 
include("../Assest/Connection/Connection.php");


include('Head.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Applied Candidates</title>
	<style>
		h3 {
			text-align: center;
			color: #333;
		}
		table {
			width: 100%;
			border-collapse: collapse;
			background-color: #fff;
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
			margin: 20px 0;
		}
		th, td {
			padding: 12px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		th {
			background-color: #00B074;
			color: white;
		}
		tr:hover {
			background-color: #f1f1f1;
		}
		img {
			border-radius: 4px;
		}
	</style>
</head>
<body>
	<form id="form1" name="form1" method="post" action="" style="margin-top:80px">
		<table border="1" align="center">
			<h3>Applied Candidates</h3>
			<tr>
				<th>SI NO</th>
				<th>Job Seeker</th>
				<th>Job Seeker E-mail</th>
				<th>Resume</th>
				<th>Job Name</th>       
				<th>Applied Date</th>
				<th>Industry</th>
				<th>Department</th>
				<th>Category</th>
				<th>Sub Category</th>            
			</tr>
<?php

$selQry="select * from tbl_application ap inner join tbl_job j on ap.job_id=j.job_id 
inner join tbl_industry i on j.industry_id=i.industry_id 
inner join tbl_jobsubcategory s on j.jobsubcategory_id=s.jobsubcategory_id 
inner join tbl_jobcategory c on s.jobcategory_id=c.jobcategory_id 
inner join tbl_department d on c.department_id=d.department_id
inner join tbl_jobseeker js on ap.jobseeker_id=js.jobseeker_id  
where jobprovider_id='".$_SESSION["jobproviderid"]."'";

$data=mysql_query($selQry);
$i=0;
while($row=mysql_fetch_array($data))
{
	$i++;
?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo $row ["jobseeker_name"] ?></td>
		<td><?php echo $row ["jobseeker_email"] ?></td>
		<td><img src="../Assest/Files/ProviderDocs/<?php echo $row ["jobseeker_resume"] ?>" width="80" height="80" /></td>
		<td><?php echo $row ["job_name"] ?></td>               
		<td><?php echo $row ["application_date"] ?></td>
		<td><?php echo $row ["industry_name"] ?></td>
		<td><?php echo $row ["department_name"] ?></td>
		<td><?php echo $row ["jobcategory_name"] ?></td>
		<td><?php echo $row ["jobsubcategory_name"] ?></td>
	</tr>
<?php
}
?>
		</table>
	</form>
</body>
</html>

<?php include('Foot.php') ?>
