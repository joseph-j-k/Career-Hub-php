
<?php
include("../Assest/Connection/Connection.php");

include('Head.php'); 

	if(isset($_POST["btnjsubmit"]))
		{
			$insqry="insert into tbl_job(job_name,job_post_date,job_vacancy,job_work_hour,job_qualification,job_experience,job_salary,job_about,job_last_date,jobsubcategory_id,industry_id) values ('".$_POST["txtjname"]."',curdate(),'".$_POST["txtjvacancy"]."','".$_POST["txtjworkhr"]."','".$_POST["txtjqualification"]."','".$_POST["txtjexperience"]."','".$_POST["txtjsalary"]."','".$_POST["txtjabout"]."','".$_POST["ldate"]."','".$_POST["selsubcategory"]."','".$_POST["selindustry"]."')";
			mysql_query($insqry);
	
		}
		if(isset($_GET["delID"]))
		{
			$delQry="delete from tbl_job where job_id='".$_GET["delID"]."'";
			mysql_query($delQry);
			header("location:JobDetails.php");
		}
		
		




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Job Details</title>
<style>
        /* Styles as per your requirements */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        h1, h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border-radius: 10px;
            overflow: hidden; 
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 5px;
            text-align: left;
        }
        th {
            background-color: #00B074;
            color: white;
        }
        tr {
            transition: background-color 0.3s;
        }
        input[type="text"],
        input[type="date"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
        }
        input[type="submit"] {
            background-color: #28a745; 
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #218838; 
        }
        textarea {
            resize: vertical; 
        }
        @media (max-width: 768px) {
            table {
                font-size: 14px; 
            }
        }
    </style>

</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1">
    <tr>
      <th>Job Name</th>
      <td><input type="text" name="txtjname" id="txtjname" required placeholder="Enter Job Name"/></td>
    </tr>
    
   
    
     <tr>
      <th scope="row">Industry</th>
      <td><select name="selindustry" id="selindustry">
       <option value="--select--">--select--
      </option>
      
        <?php
							$selQry="select * from tbl_industry";
							$data=mysql_query($selQry);
							while($row=mysql_fetch_array($data))
								{
			?>
            
            <option value="<?php echo $row["industry_id"]?>"><?php echo $row["industry_name"]?></option>
            <?php
								}
			?>
      
      </select></td>
    </tr>
     <tr>
      <th scope="row"><div align="left">Department</div></th>
      <td>
      <select name="seldept" id="seldept" onchange="getCategory(this.value)">
       <option value="--select--">--select--</option>
      
      
      		  <?php
							$selQry="select * from tbl_department where jobprovider_id='".$_SESSION["jobproviderid"]."'";
							$data=mysql_query($selQry);
							while($row=mysql_fetch_array($data))
								{
			?>
            
            <option value="<?php echo $row["department_id"]?>"><?php echo $row["department_name"]?></option>
            <?php
								}
			?>
      
      </select></td>
    </tr>
     <tr>
      <th scope="row"><div align="left">Category</div></th>
      <td>
      <select name="selcategory" id="selcategory" onchange="getSubCategory(this.value)">
       			<option value="--select--">--select--</option>
      </select>
      
      </td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Sub Category</div></th>
      <td><select name="selsubcategory" id="selsubcategory" >
       <option value="--select--">--select--
      </option>
      </select></td>
    </tr>
    
    <tr>
      <th><div align="left">Vacancy</div></th>
      <td><input type="text" name="txtjvacancy" id="txtjvacancy" required placeholder="Enter Vacancy"/></td>
    </tr>
    <tr>
      <th><div align="left">Work Hour</div></th>
      <td><input type="text" name="txtjworkhr" id="txtjworkhr" required placeholder="Enter Work Hour"/></td>
    </tr>
    <tr>
      <th><div align="left">Qualification</div></th>
      <td><input type="text" name="txtjqualification" id="txtjqualification" required placeholder="Enter Qualification"/></td>
    </tr>
    <tr>
      <th><div align="left">Experience</div></th>
      <td><input type="text" name="txtjexperience" id="txtjexperience" required placeholder="Enter Experience"/></td>
    </tr>
    <tr>
      <th><div align="left">Salary</div></th>
      <td><input type="text" name="txtjsalary" id="txtjsalary" required placeholder="Enter Salary"/></td>
    </tr>
    <tr>
      <th><div align="left">Last Date</div></th>
      <td><input type="date" name="ldate" id="ldate" required placeholder="Enter Last Date"/></td>
    </tr>
    <tr>

    <tr>
      <th><div align="left">About</div></th>
      <td><textarea name="txtjabout" id="txtjabout" cols="45" rows="5" required placeholder="Enter About"></textarea></td>
    </tr>
    <tr>

      <td colspan="2" align="center"><input type="submit" name="btnjsubmit" id="btnjsubmit" value="Submit" />
      <input type="submit" name="btnjreset" id="btnjreset" value="Cancel" /></td>
    </tr>
  </table>
</form>
</body>
</html>

<script src="../Assest/JQ/jQuery.js"></script>
<script>

  function getCategory(did) {
    $.ajax({
      url: "../Assest/AjaxPages/AjaxCategory.php?did=" + did,
      success: function (result) {

        $("#selcategory").html(result);
      }
    });
  }
  
    function getSubCategory(did) {
    $.ajax({
      url: "../Assest/AjaxPages/AjaxSubCategory.php?did=" + did,
      success: function (result) {

        $("#selsubcategory").html(result);
      }
    });
  }

</script>

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
        <th>Salary</th>
        <th>Last Date</th>
        <th>About</th>
       
    	<th>Action</th>
    </tr>
    <?php
			$selQry="select * from tbl_job j inner join tbl_industry i on j.industry_id=i.industry_id 
			inner join tbl_jobsubcategory s on j.jobsubcategory_id=s.jobsubcategory_id 
			inner join tbl_jobcategory c on s.jobcategory_id=c.jobcategory_id 
			inner join tbl_department d on c.department_id=d.department_id where d.jobprovider_id='".$_SESSION["jobproviderid"]."'";
		
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
         <td><?php echo $row ["job_salary"] ?></td>
         <td><?php echo $row ["job_last_date"] ?></td>
         <td><?php echo $row ["job_about"] ?></td>
        <td><a href="JobDetails.php?delID=<?php echo $row["job_id"]?>">Delete</a>
        </td>
    </tr>
    <?php
			}
	?>
</table>
</body>
</html>
<?php include('Foot.php') ?>
