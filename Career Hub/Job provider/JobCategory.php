<?php
include("../Assest/Connection/Connection.php");



include('Head.php'); 
if(isset($_POST["btnsubmit"]))
{
	$insqry="insert into tbl_jobcategory(jobcategory_name,department_id)values('".$_POST["txtcategory"]."','".$_POST["seldept"]."')";
	mysql_query($insqry);
	
}

	if(isset($_GET["delID"]))
		{
			$delQry="delete from tbl_jobcategory where jobcategory_id='".$_GET["delID"]."'";
			mysql_query($delQry);
			header("location:JobCategory.php");
		}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <style>
        

        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        .td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #00B074;
            color: white;
        }

        input[type="text"],
        textarea {
            width: 80%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #00B074;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

         .a {
            background-color: #9BA5E8;
            color: white;
            border: none;
            padding: 2px 25px;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #00B074;
        }

        h2 {
            text-align: center;
            color: #333;
        }
    </style>
<title>JobCategory</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="" style="margin-top:80px">
  <table border="1" align="center">
    <tr>
      <th class="td">Department</th>
      <td class="td">
      
      <select name="seldept" id="seldept">
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
      
      </select>
      
      
      </td>
    </tr>
    <tr>
      <th class="td">JobCategory</th>
      <td class="td"><input type="text" name="txtcategory" id="txtcategory" required placeholder="Enter Category" /></td>
    </tr>
    <tr>
      
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      <input type="Reset" name="btnreset" id="btnreset" value="Reset" /></td>
    </tr>
  </table>
</form>
</body>
</html>


<table border="1" align="center">
	<tr>
    	<th>SI NO</th>
    	<th>Department</th>
        <th>JobCategory</th>
    	<th>Action</th>
    </tr>
    <?php
			$selQry="select * from tbl_jobcategory c inner join tbl_department d on c.department_id=d.department_id 
			where jobprovider_id='".$_SESSION["jobproviderid"]."'";
			$data=mysql_query($selQry);
			$i=0;
			while($row=mysql_fetch_array($data))
			{
				$i++;
	?>
	<tr>
    	<td><?php echo $i ?></td>
        <td><?php echo $row ["department_name"] ?></td>
         <td><?php echo $row ["jobcategory_name"] ?></td>
        <td>
          <a href="JobCategory.php?delID=<?php echo $row["jobcategory_id"]?>">Delete</a> ||
          <a href="JobSubCategory.php">   Goto Subcategory</a>
        </td>
    </tr>
    <?php
			}
	?>
</table>

<?php include('Foot.php') ?>