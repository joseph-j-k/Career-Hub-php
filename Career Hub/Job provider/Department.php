<?php include('Head.php'); ?>
<?php
include("../Assest/Connection/Connection.php");


	if(isset($_POST["btnsubmit"]))
		{
		 $insqry="insert into tbl_department(department_name, jobprovider_id) values ('".$_POST["txtdept"]."','".$_SESSION["jobproviderid"]."')";
		mysql_query($insqry);
			
		}
		
		if(isset($_GET["delID"]))
		{
			$delQry="delete from tbl_department where department_id='".$_GET["delID"]."'";
			mysql_query($delQry);
			header("location:Department.php");
		}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Department</title>
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
</head>

<body>

<!-- Form Section -->
<form id="form1" name="form1" method="post" action="" style="margin-top:80px">
    <table align="center">
        <tr>
            <th class="td">Department&nbsp;Name</th>
            <td class="td"><input type="text" name="txtdept" id="txtdept" required  /></td>
        </tr>
        <tr>
            <td colspan="2" align="center" class="td">
                <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
                <input type="reset" name="btnreset" id="btnreset" value="Reset" />
            </td>
        </tr>
    </table>
</form>

<!-- Display Departments Table -->
<table align="center">
    <tr>
        <th>SI NO</th>
        <th>Department</th>
        <th>Action</th>
    </tr>
    <?php
        $selQry = "select * from tbl_department where jobprovider_id='" . $_SESSION["jobproviderid"] . "'";
        $data = mysql_query($selQry);
        $i = 0;
        while ($row = mysql_fetch_array($data)) {
            $i++;
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row["department_name"] ?></td>
        <td><a href="Department.php?delID=<?php echo $row["department_id"] ?>" class="a">Delete</a></td>
    </tr>
    <?php
        }
    ?>
</table>

</body>
</html>

<?php include('Foot.php') ?>
