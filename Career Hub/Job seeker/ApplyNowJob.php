<?php
			include("../Assest/Connection/Connection.php");
			
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ApplyNowJob</title>
</head>

<body>

<?php

			$selQry="select * from tbl_job j inner join tbl_industry i on j.industry_id=i.industry_id 
			inner join tbl_jobsubcategory s on j.jobsubcategory_id=s.jobsubcategory_id 
			inner join tbl_jobcategory c on s.jobcategory_id=c.jobcategory_id 
			inner join tbl_department d on c.department_id=d.department_id where j.job_id='".$_SESSION["jobID"]."'";
			
		
		
			$data=mysql_query($selQry);
		
			if($row=mysql_fetch_array($data))
			{
				
	?>
    <table border="1" align="center">
	<tr>
    	<td>JobTitle</td>
         <td><?php echo $row ["job_name"] ?></td>
    </tr>
    <tr>
    	<td>POSTDate</td>
         <td><?php echo $row ["job_post_date"] ?></td>  
    </tr>
    
    <tr>
    	<td>Industry</td>   
        <td><?php echo $row ["industry_name"] ?></td>
    </tr>  
    
       <tr>
    	<td>Department</td>   
        <td><?php echo $row ["department_name"] ?></td>
    </tr>  
    <tr>
    	<td>Category</td>           
         <td><?php echo $row ["jobcategory_name"] ?></td>
    </tr>
         
     <tr>
    			<td>Subcategory</td>   
         		<td><?php echo $row ["jobsubcategory_name"] ?></td>
     </tr>
        
      <tr>
    	 <td>No of Vacancy</td>   
         <td><?php echo $row ["job_vacancy"] ?></td>
       </tr>
    <tr>
    	<td>Hours of Working</td>   
         <td><?php echo $row ["job_work_hour"] ?></td>
     </tr>
         <tr>
    			<td>Qulaification</td>   
         		<td><?php echo $row ["job_qualification"] ?></td>
         </tr>
         <tr>
    	<td>Experience</td>   
         <td><?php echo $row ["job_experience"] ?></td>
         </tr>
         <tr>
    	<td>Salary</td>   
         <td><?php echo $row ["job_salary"] ?></td>
         </tr>
         <tr>
    	<td>LastDate</td>   
         <td><?php echo $row ["job_last_date"] ?></td>
         </tr>
         <tr>
    	<td>Details</td>   
         <td><?php echo $row ["job_about"] ?></td>
         </tr>
         <tr>
        <td colspan="2" align="center"><a href="ApplyNowJob.php?applyID=<?php echo $row["job_id"]?>">ApplyNow</a>
        </td>
    </tr>
    <?php
			}
			
	?>
    
    
</body>
</html>