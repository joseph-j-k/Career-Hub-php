<?php
	include("../Assest/Connection/Connection.php");


    include('Head.php'); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
			padding: 5px;
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
<p style="margin-top:80px"></p>    
<h2 align="center"><u>Jobs</u></h2>
<table border="1" align="center">
	<tr>
    	<th>SI NO</th>
        <th>Job Name</th>
        <th>Job Post Date</th>
        <th>Industry</th>
        <th>Department</th>
        <th>Category</th>
    	<th>Sub Category</th>
        <th>Vacancy</th>
        <th>Work Hour</th>
        <th>Qualification</th>
        <th>Experience</th>
        
        <th>Last Date</th>
        
       
    	<th>Action</th>
    </tr>
    <?php
			$selQry="select * from tbl_job j inner join tbl_industry i on j.industry_id=i.industry_id 
			inner join tbl_jobsubcategory s on j.jobsubcategory_id=s.jobsubcategory_id 
			inner join tbl_jobcategory c on s.jobcategory_id=c.jobcategory_id 
			inner join tbl_department d on c.department_id=d.department_id 
			where d.jobprovider_id='".$_SESSION["jobproviderid"]."'";
		
			$data=mysql_query($selQry);
			$i=0;
			while($row=mysql_fetch_array($data))
			{
				$i++;
	?>
	<tr>
    	<td><?php echo $i ?></td>
       
         <td><?php echo $row ["job_name"] ?></td>
         <td><?php echo $row ["job_post_date"] ?></td>       
         <td><?php echo $row ["industry_name"] ?></td>
         <td><?php echo $row ["department_name"] ?></td>
         <td><?php echo $row ["jobcategory_name"] ?></td>
         <td><?php echo $row ["jobsubcategory_name"] ?></td>
         <td><?php echo $row ["job_vacancy"] ?></td>
         <td><?php echo $row ["job_work_hour"] ?></td>
         <td><?php echo $row ["job_qualification"] ?></td>
         <td><?php echo $row ["job_experience"] ?></td>
         
         <td><?php echo $row ["job_last_date"] ?></td>
         
        <td><a href="FilterUser.php?userID=<?php echo $row["job_id"]?>">Filter Users</a>
        </td>
    </tr>
    <?php
			}
	?>
</table>
</body>
</html>

<?php include('Foot.php') ?>