<?php
include("../Assest/Connection/Connection.php");


$message="";

include('Head.php');

if(isset($_POST["btnsave"]))
{
	
	$selJobprovider="select * from tbl_jobprovider where jobprovider_id='".$_SESSION["jobproviderid"]."' and jobprovider_password='".$_POST["txtcurrent"]."'";
	$dataJobprovider=mysql_query($selJobprovider);
	if($rowJobprovider=mysql_fetch_array($dataJobprovider))
	{
		$newpwd=$_POST["txtnew"];
		$confirmpwd=$_POST["txtconfirm"];
		if($newpwd==$confirmpwd)
		{
			$insQry="update tbl_jobprovider set jobprovider_password='".$_POST["txtconfirm"]."' where jobprovider_id='".$_SESSION["jobproviderid"]."'";
			mysql_query($insQry);
			
			echo "<script>
				alert('Password Successfuly Changed');
				window.location='EditProfle.php';
		     </script>";
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
<style>
        .form-container {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
    margin-top:50px;
}

        .profile-card {
            width: 400px;
            background: #C5D6C4;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            padding: 20px;
            animation: fadeIn 0.6s ease-out;
            margin-left:500px;
        }

        .profile-card h2 {
            text-align: center;
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        .profile-card table {
            width: 100%;
            border-collapse: collapse;
        }

        .profile-card table td {
            padding: 10px;
            font-size: 14px;
            color: #444;
        }

        .profile-card input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .profile-actions {
            margin-top: 20px;
            display: flex;
            justify-content: space-around;
        }

        .profile-actions input[type="submit"],
        .profile-actions input[type="reset"] {
            padding: 10px 20px;
            font-size: 14px;
            color: white;
            background: #00B074;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .profile-actions input[type="submit"]:hover,
        .profile-actions input[type="reset"]:hover {
            background: #00B074;
        }

        .message {
            color: #D9534F;
            font-size: 14px;
            text-align: center;
            margin-top: 10px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>  
</head>

<body>
<div class="profile-card form-container">
<form id="form1" name="form1" method="post">
  <table>
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
       <tr class="profile-actions">
        <td colspan="2" align="center">
        <input type="submit" name="btnsave" id="btnsave" value="UPDATE">
      </tr>
      <tr>
        <td colspan="2" align="center"><?php echo $message?></td>
      </tr>
    </tbody>
  </table>
</form>
</div>
</body>
</html>

<?php include('Foot.php') ?>