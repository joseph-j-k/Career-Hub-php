
<?php include("Head.php") ?>

<?php
include("../Assest/Connection/Connection.php");

	if(isset($_POST["btnsubmit"]))
		{
			$statename=$_POST["txtstate"];
			$insqry="insert into tbl_state(state_name) values ('$statename')";
			mysql_query($insqry);
	
		}
	if(isset($_GET["delID"]))
		{
			$delQry="delete from tbl_state where state_id='".$_GET["delID"]."'";
			mysql_query($delQry);
			header("location:State.php");
		}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transition=l//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>State</title>
<style>
    /* Background styling */
    body {
        font-family: Arial, sans-serif;
        background-image: url("../Assest/Templates/Admin/img/bg/state.jpeg"); /* Add your background image here */
        background-size: cover;
		
        background-repeat: no-repeat;
        background-attachment: fixed;
        color: #333;
    }

    /* Form styling */
    form {
        margin: 30px auto;
        width: 50%;
        border-radius: 10px;
        background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent background */
        padding: 20px;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
    }

    form table {
        width: 100%;
    }

    form th, form td {
        padding: 10px;
    }

    form th {
        background-color: #4CAF50;
        color: #fff;
        border-radius: 8px 0 0 8px;
    }

    /* Buttons styling */
    input[type="submit"], input[type="reset"] {
        padding: 10px 20px;
        margin: 10px 5px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        font-size: 14px;
        color: #fff;
    }

    input[type="submit"] {
        background-color: #28a745;
    }

    input[type="reset"] {
        background-color: #dc3545;
    }

    /* Select and input field styling */
    input[type="text"] {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
    }

    /* Table styling */
    table {
        margin: 20px auto;
        width: 80%;
        border-collapse: collapse;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent background */
    }

    table th, table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }

    table th {
        background-color: #007bff;
        color: #fff;
    }

    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    table tr:hover {
        background-color: #ddd;
    }

    /* Link styling */
    a {
        color: #dc3545;
        text-decoration: none;
        font-weight: bold;
    }

    a:hover {
        text-decoration: underline;
    }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <th scope="row">State</th>
      <td><input type="text" name="txtstate" id="txtstate" required placeholder="Enter State"/></td>
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
    	<th>State</th>
    	<th>Action</th>
    </tr>
    <?php
			$selQry="select * from tbl_state";
			$data=mysql_query($selQry);
			$i=0;
			while($row=mysql_fetch_array($data))
			{
				$i++;
	?>
	<tr>
    	<td><?php echo $i ?></td>
        <td><?php echo $row ["state_name"] ?></td>
        <td><a href="State.php?delID=<?php echo $row["state_id"]?>">Delete</a></td>
    </tr>
    <?php
			}
	?>
</table>

<?php include("Foot.php") ?>