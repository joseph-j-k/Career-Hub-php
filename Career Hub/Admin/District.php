
<?php include("Head.php") ?>

<?php
include("../Assest/Connection/Connection.php");

if(isset($_POST["btnsubmit"]))
{
	$insqry="insert into tbl_district(district_name,state_id)values('".$_POST["txtdistrict"]."','".$_POST["selstate"]."')";
	mysql_query($insqry);
	
}

	if(isset($_GET["delID"]))
		{
			$delQry="delete from tbl_district where district_id='".$_GET["delID"]."'";
			mysql_query($delQry);
			header("location:District.php");
		}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District</title>
<style>
 body {
        
        background-image: url("../Assest/Templates/Admin/img/bg/district.jpeg"); /* Add your background image here */
        
    }
    
    form {
        margin: 20px auto;
        width: 50%;
        border: 1px solid #ccc;
        background-color: #ffff;
        padding: 20px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    form table {
        width: 100%;
    }

    form th, form td {
        padding: 10px;
        text-align: left;
    }

    form th {
        width: 30%;
        background-color: #f0f0f5;
        font-weight: bold;
    }

    /* Buttons styling */
    input[type="submit"], input[type="reset"] {
        padding: 8px 16px;
        margin: 10px 5px;
        border: none;
        cursor: pointer;
        border-radius: 4px;
        font-size: 14px;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: #fff;
    }

    input[type="reset"] {
        background-color: #f44336;
        color: #fff;
    }

    /* Select and input field styling */
    select, input[type="text"] {
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
    }

    table th, table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }

    table th {
        background-color: #6495ed;
        color: black;
    }

   

    table tr {
        color: rgb(255,255,255,200);
    }

    /* Link styling */
    a {
        color: firebrick;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table>
    <tr>
      <th scope="row">State</th>
      <td>
      
      <select name="selstate" id="selstate">
      		 <?php
							$selQry="select * from tbl_state";
							$data=mysql_query($selQry);
							while($row=mysql_fetch_array($data))
								{
			?>
            
            <option value="<?php echo $row["state_id"]?>"><?php echo $row["state_name"]?></option>
            <?php
								}
			?>
      
      </select>
      
      
      </td>
    </tr>
    <tr>
      <th scope="row">District</th>
      <td><input type="text" name="txtdistrict" id="txtdistrict" required placeholder="Enter District"/></td>
    </tr>
    <tr>
      
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      <input type="Reset" name="btnreset" id="btnreset" value="Reset" /></td>
    </tr>
  </table>
</form>
</body>
</html>


<table  align="center">
	<tr>
    	<th>SI NO</th>
    	<th>State</th>
        <th>District</th>
    	<th>Action</th>
    </tr>
    <?php
			$selQry="select * from tbl_district d inner join tbl_state s on d.state_id=s.state_id";
			$data=mysql_query($selQry);
			$i=0;
			while($row=mysql_fetch_array($data))
			{
				$i++;
	?>
	<tr>
    	<td><?php echo $i ?></td>
        <td><?php echo $row ["state_name"] ?></td>
         <td><?php echo $row ["district_name"] ?></td>
        <td><a href="District.php?delID=<?php echo $row["district_id"]?>">Delete</a></td>
    </tr>
    <?php
			}
	?>
</table>


<?php include("Foot.php") ?>