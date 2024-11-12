<?php include("Head.php") ?>

<?php
include("../Assest/Connection/Connection.php");

		
	if(isset($_GET["acid"]))
		{
			$upQry="update  tbl_jobseeker set jobseeker_status	='1' where jobseeker_id='".$_GET["acid"]."'";
			mysql_query($upQry);
			//echo $upQry;
			header("location:JobSeekerVerification.php");
		}
	if(isset($_GET["rejid"]))
		{
			$upQry="update  tbl_jobseeker set jobseeker_status	='2' where jobseeker_id='".$_GET["rejid"]."'";
			mysql_query($upQry);
			header("location:JobSeekerVerification.php");
		}
	

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Job Seeker Verification</title>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h3 {
            text-align: center;
            color: #333;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background: #fff;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }

        a:hover {
            color: #0056b3;
        }

        img {
            max-width: 80px;
            height: auto;
        }
    </style>
</head>

<body>

</body>
</html>
<h3>NewSeeker List</h3>
<table border="1" align="center">
	<tr>
    	<th>SI NO</th>
    	<th>Name</th>
        <th>E-mail</th>
        <th>Contact</th>
        <th>Resume</th>
        <th>Education</th>
        <th>District</th>
    	<th>Action</th>
    </tr>
    <?php
			$selQry="select * from tbl_jobseeker s inner join tbl_district d on d.district_id=s.district_id where jobseeker_status	='0'";
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
        <td><?php echo $row ["jobseeker_contact"] ?></td>
        <td>
        <a href="../Assest/Files/ProviderDocs/<?php echo $row ["jobseeker_resume"] ?>">
        <img src="../Assest/Files/ProviderDocs/<?php echo $row ["jobseeker_resume"] ?>" width="80" height="80" />
        </a>
        </td>
        <td><?php echo $row ["jobseeker_education"] ?></td>
        
        <td><?php echo $row ["district_name"] ?></td>
        
        <td><a href="JobSeekerVerification.php?acid=<?php echo $row["jobseeker_id"]?>">Accept</a>/
        <a href="JobSeekerVerification.php?rejid=<?php echo $row["jobseeker_id"]?>">Reject</a>
        </td>
    </tr>
    <?php
			}
	?>
</table>

<h3>Accepted List</h3>
<table border="1" align="center">
	<tr>
    	<th>SI NO</th>
    	<th>Name</th>
        <th>E-mail</th>
        <th>Contact</th>
        <th>Resume</th>
        <th>Education</th>
        <th>District</th>
    	<th>Action</th>
    </tr>
    <?php
			$selQry="select * from tbl_jobseeker s inner join tbl_district d on d.district_id=s.district_id where jobseeker_status	='1'";
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
        <td><?php echo $row ["jobseeker_contact"] ?></td>
        <td>
        <a href="../Assest/Files/ProviderDocs/<?php echo $row ["jobseeker_resume"] ?>">
        <img src="../Assest/Files/ProviderDocs/<?php echo $row ["jobseeker_resume"] ?>" width="80" height="80" />
        </a>
        </td>
        <td><?php echo $row ["jobseeker_education"] ?></td>
        
        <td><?php echo $row ["district_name"] ?></td>
        
  
        <td><a href="JobSeekerVerification.php?rejid=<?php echo $row["jobseeker_id"]?>">Reject</a></td>
    </tr>
    <?php
			}
	?>
</table>

<h3>Rejected List</h3>
<table border="1" align="center">
	<tr>
    	<th>SI NO</th>
    	<th>Name</th>
        <th>E-mail</th>
        <th>Contact</th>
        <th>Resume</th>
        <th>Education</th>
        <th>District</th>
    	<th>Action</th>
    </tr>
    <?php
			$selQry="select * from tbl_jobseeker s inner join tbl_district d on d.district_id=s.district_id where jobseeker_status	='2'";
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
        <td><?php echo $row ["jobseeker_contact"] ?></td>
        <td>
        <a href="../Assest/Files/ProviderDocs/<?php echo $row ["jobseeker_resume"] ?>">
        <img src="../Assest/Files/ProviderDocs/<?php echo $row ["jobseeker_resume"] ?>" width="80" height="80" />
        </a>
        </td>
        <td><?php echo $row ["jobseeker_education"] ?></td>
        
        <td><?php echo $row ["district_name"] ?></td>
        
        <td><a href="JobSeekerVerification.php?acid=<?php echo $row["jobseeker_id"]?>">Accept</a></td>
       
    </tr>
    <?php
			}
	?>
</table>
<?php include("Foot.php") ?>