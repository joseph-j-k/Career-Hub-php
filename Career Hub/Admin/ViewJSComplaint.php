<?php include("Head.php") ?>


<?php
			include("../Assest/Connection/Connection.php");
			
		if(isset($_GET["rplayID"]))
		{
			$_SESSION["compID"]=$_GET["rplayID"];
			header("location:ReplayComplaint.php");
		}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ViewJSComplaint</title>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ViewJSComplaint</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h3 {
            color: #333;
            text-align: center;
        }

        table {
            width: 80%;
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
    </style>
</head>
<body>
<h3>NewComplaints</h3>

    <table border="1" align="center">
    
    <tr>
    	<th>SI NO</th>
    	<th>Title</th>
        <th>Complaint</th>
        <th>Date</th>
        <th>Job Seeker Name</th>
        <th>Contact</th>
    	<th>Action</th>
    </tr>
    <?php


			$selQry="select * from  tbl_complaint c inner join tbl_jobseeker j on c.jobseeker_id=j.jobseeker_id where complaint_status='0'"; 
	
			$data=mysql_query($selQry);
			$i=0;
			while($row=mysql_fetch_array($data))
			{
				$i++;
	?>
     <tr>
        <td><?php echo $i ?></td>
         <td><?php echo $row ["complaint_title"] ?></td> 
        <td><?php echo $row ["complaint_content"] ?></td>
         <td><?php echo $row ["complaint_date"] ?></td>             
         <td><?php echo $row ["jobseeker_name"] ?></td>   
         <td><?php echo $row ["jobseeker_contact"] ?></td>      
        <td colspan="2" align="center"><a href="ViewJSComplaint.php?rplayID=<?php echo $row["complaint_id"]?>">Replay</a>
        </td>
    </tr>
    <?php
			}
			
	?>
    
 </table>   
    
    <h3>SolvedComplaints</h3>
    <table border="1" align="center">
    
    <tr>
    	<th>SI NO</th>
    	<th>Title</th>
        <th>Complaint</th>
        <th>Date</th>
        <th>Job Seeker Name</th>
        <th>Contact</th>
    	<th>Reply</th>
    </tr>
    
    <?php


			$selQry="select * from tbl_complaint c inner join tbl_jobseeker j on c.jobseeker_id=j.jobseeker_id where complaint_status='1'"; 
	
			$data=mysql_query($selQry);
			$i=0;
			while($row=mysql_fetch_array($data))
			{
				$i++;
	?>
     <tr>
        <td><?php echo $i ?></td>
         <td><?php echo $row ["complaint_title"] ?></td> 
        <td><?php echo $row ["complaint_content"] ?></td>
         <td><?php echo $row ["complaint_date"] ?></td>             
         <td><?php echo $row ["jobseeker_name"] ?></td>   
         <td><?php echo $row ["jobseeker_contact"] ?></td>   
         <td><?php echo $row ["complaint_reply"] ?></td>   
           
       
    </tr>
    <?php
			}
			
	?>
    </table>
</body>
</html>

<?php include("Foot.php") ?>