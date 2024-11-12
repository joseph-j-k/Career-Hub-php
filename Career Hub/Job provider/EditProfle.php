<?php
include("../Assest/Connection/Connection.php");



include('Head.php'); 


if(isset($_POST["btnsave"]))
{
	$insQry="update tbl_jobprovider set jobprovider_name='".$_POST["txtname"]."',jobprovider_email='".$_POST["txtemail"]."',jobprovider_contact='".$_POST["txtcontact"]."' where jobprovider_id='".$_SESSION["jobproviderid"]."'";
	mysql_query($insQry);
	echo "<script>
				alert('Updated');
				window.location='EditProfle.php';
		     </script>";
}


	$selJobprovider="select * from tbl_jobprovider where jobprovider_id='".$_SESSION["jobproviderid"]."'";
	$dataJobprovider=mysql_query($selJobprovider);
	$rowJobprovider=mysql_fetch_array($dataJobprovider);
	
?>




<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit profile</title>
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
        }

        .profile-card table td {
            padding: 10px;
            font-size: 14px;
            color: #444;
        }

        .profile-card input[type="text"],
        .profile-card input[type="email"] {
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
<form method="post">
<table align="center">
<tr>
		<td>Name</td>
        <td><input type="text" name="txtname" value="<?php echo $rowJobprovider["jobprovider_name"]?>"></td>
</tr>
<tr>
		<td>Contact</td>
        <td><input type="text" name="txtcontact" value="<?php echo $rowJobprovider["jobprovider_contact"]?>"></td>
</tr>
<tr>
		<td>Email</td>
        <td><input type="email" name="txtemail" value="<?php echo $rowJobprovider["jobprovider_email"]?>"></td>
</tr>
<tr>
        <td colspan="2" align="center" class="profile-actions">
			<input type="submit" name="btnsave" id="btnsave" value="UPDATE">
        <input type="reset" name="btncancel" id="btncancel" value="CANCEL"></td>
      </tr>

</table>
</form>
</div>
</body>
</html>

<?php include('Foot.php') ?>