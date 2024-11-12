<?php 
include("../Assest/Connection/Connection.php");

include('Head.php'); 



$selQry1 = "select * from tbl_application a inner join tbl_job j on j.job_id = a.job_id inner join tbl_industry i on i.industry_id = j.industry_id inner join tbl_jobseeker jo on jo.jobseeker_id = a.jobseeker_id where j.job_id = '".$_GET["userID"]."'";
$result1 = mysql_query($selQry1);


$selQry2 = "select * from tbl_department d inner join tbl_jobcategory c on d.department_id = c.department_id inner join tbl_jobsubcategory s on s.jobcategory_id = c.jobcategory_id";
$result2 = mysql_query($selQry2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Filter User</title>
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
$i=0;
while(($data1 = mysql_fetch_array($result1)) && ($data2 = mysql_fetch_array($result2)))
{
	$i++;
?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo $data1["jobseeker_name"] ?></td>
		<td><?php echo $data1["jobseeker_email"] ?></td>
		<td><img src="../Assest/Files/ProviderDocs/<?php echo $data1["jobseeker_resume"] ?>" width="80" height="80" /></td>
		<td><?php echo $data1["job_name"] ?></td>               
		<td><?php echo $data1["application_date"] ?></td>
		<td><?php echo $data1["industry_name"] ?></td>
		<td><?php echo $data2["department_name"] ?></td>
		<td><?php echo $data2["jobcategory_name"] ?></td>
		<td><?php echo $data2["jobsubcategory_name"] ?></td>
	</tr>
<?php
}
?>
		</table>
	</form>
</body>
</html>

<?php include('Foot.php') ?>