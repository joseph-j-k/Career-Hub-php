<?php
include("../Assest/Connection/Connection.php");

session_start();

$message="";


if(isset($_POST["btnsave"]))
{
	
	$selAdmin="select * from tbl_admin where admin_id='".$_SESSION["adminid"]."' and admin_password='".$_POST["txtcurrent"]."'";
	$dataAdmin=mysql_query($selAdmin);
	if($rowAdmin=mysql_fetch_array($dataAdmin))
	{
		$newpwd=$_POST["txtnew"];
		$confirmpwd=$_POST["txtconfirm"];
		if($newpwd==$confirmpwd)
		{
			$insQry="update tbl_admin set admin_password='".$_POST["txtconfirm"]."' where admin_id='".$_SESSION["adminid"]."'";
			mysql_query($insQry);
			
			//header("location:../Guest/Login.php");
		}
		else
		{
			$message="Pasword not same...";
		}
	}
	else
	{
		$message="Pasword not correct...";
		
	}


}
	
?>




<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Change password</title>
</head>

<body>
<form id="form1" name="form1" method="post">
  <table width="200" border="1">
    <tbody>
      <tr>
        <td>Current Password</td>
        <td>
        <input type="password" name="txtcurrent" id="txtcurrent" required placeholder="Enter Current Password"></td>
      </tr>
      <tr>
        <td>New Password</td>
        <td>
        <input type="password" name="txtnew" id="txtnew" required placeholder="Enter New Password"></td>
      </tr>
      <tr>
        <td>Confirm Password</td>
        <td>
        <input type="password" name="txtconfirm" id="txtconfirm" required placeholder="Enter Password"></td>
      </tr>
       <tr>
        <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="UPDATE">
        <input type="reset" name="btncancel" id="btncancel" value="CANCEL"></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><?php echo $message?></td>
      </tr>
    </tbody>
  </table>
</form>
</body>
</html>