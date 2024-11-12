<?php include("Head.php") ?>


<?php
include("../Assest/Connection/Connection.php");

	if(isset($_POST["btnsubmit"]))
		{
			$insqry="insert into tbl_admin(admin_name,admin_email,admin_password,admin_contact) values ('".$_POST["txtname"]."','".$_POST["txtemail"]."','".$_POST["txtpassword"]."','".$_POST["txtcontact"]."')";
			mysql_query($insqry);
	
		}
		
	if(isset($_GET["delID"]))
		{
			$delQry="delete from tbl_admin where admin_id='".$_GET["delID"]."'";
			mysql_query($delQry);
			header("location:Admin  Registration.php");
		}
	

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Registration</title>
<style>
   body {
  font-family: "Open Sans", "Roboto", Arial, sans-serif;
  background-color: #e9e9e9;
  color: #333;
  margin: 0;
  padding: 0;
}

table {
  width: 50%;
  margin: 20px auto;
  border-collapse: collapse;
  background: #fafafa;
  box-shadow: 0px 3px 7px rgba(0, 0, 0, 0.25);
}

table, th, td {
  border: 1px solid #ddd;
  padding: 10px;
}

th {
  background-color: #333;
  color: #fff;
  text-transform: uppercase;
  font-size: 0.9rem;
}

td {
  text-align: center;
}

input[type="text"], 
input[type="password"] {
  width: 100%;
  padding: 8px;
  margin: 5px 0;
  border: 1px solid #ddd;
  border-radius: 3px;
  color: #111;
}

input[type="submit"],
input[type="reset"] {
  padding: 10px 20px;
  font-size: 0.9rem;
  color: #fff;
  background-color: #333;
  border: none;
  cursor: pointer;
  transition: background-color 0.25s ease-in;
}

input[type="submit"]:hover,
input[type="reset"]:hover {
  background-color: #555;
}

a {
  color: #333;
  text-decoration: none;
  font-weight: bold;
}

a:hover {
  color: #555;
}

    </style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Name</td>
      <td><input type="text" name="txtname" id="txtname" required placeholder="Enter Name"/></td>
    </tr>
    <tr>
      <td>E-mail</td>
      <td><input type="text" name="txtemail" id="txtemail" required placeholder="Enter Email"/></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="password" name="txtpassword" id="txtpassword" required placeholder="Enter Password"/></td>
    </tr>    
    <tr>
      <td>Contact</td>
      <td><input type="text" name="txtcontact" id="txtcontact" required placeholder="Enter Contact"/></td>
    </tr>
    <tr>
      
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Login" />
      <input type="reset" name="btnreset" id="btnreset" value="Cancel" /></td>
    </tr>
  </table>
</form>
</body>
</html>

<table border="1" align="center">
	<tr>
    	<th>SI NO</th>
    	<th>Name</th>
        <th>E-mail</th>
        <th>Contact</th>
    	<th>Action</th>
    </tr>
    <?php
			$selQry="select * from tbl_admin";
			$data=mysql_query($selQry);
			$i=0;
			while($row=mysql_fetch_array($data))
			{
				$i++;
	?>
	<tr>
    	<td><?php echo $i ?></td>
        <td><?php echo $row ["admin_name"] ?></td>
        <td><?php echo $row ["admin_email"] ?></td>
        <td><?php echo $row ["admin_contact"] ?></td>
        <td><a href="AdminRegistration.php?delID=<?php echo $row["admin_id"]?>">Delete</a></td>
    </tr>
    <?php
			}
	?>
</table>


<?php include("Foot.php") ?>