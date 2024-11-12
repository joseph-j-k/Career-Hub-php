<?php include('Head.php'); 




if(isset($_POST["btnsave"]))
{
	$insQry="update tbl_jobseeker set jobseeker_name='".$_POST["txtname"]."',jobseeker_email='".$_POST["txtemail"]."',jobseeker_contact='".$_POST["txtcontact"]."' where jobseeker_id='".$_SESSION["jobseekerid"]."'";
	mysql_query($insQry);
	echo "<script>
				alert('Updated');
				window.location='EditProfle.php';
		     </script>";
}


	$selJobseeker="select * from tbl_jobseeker where jobseeker_id='".$_SESSION["jobseekerid"]."'";
	$dataJobseeker=mysql_query($selJobseeker);
	$rowJobseeker=mysql_fetch_array($dataJobseeker);
	
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
			<h2>Edit Profile</h2>
            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="txtname" value="<?php echo $rowJobseeker["jobseeker_name"]; ?>"></td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td><input type="text" name="txtcontact" value="<?php echo $rowJobseeker["jobseeker_contact"]; ?>"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="txtemail" value="<?php echo $rowJobseeker["jobseeker_email"]; ?>"></td>
                </tr>
            </table>
            <div class="profile-actions">
                <input type="submit" name="btnsave" value="UPDATE">
            </div>
        </form>
    </div>
</body>
</html>

<?php include('Foot.php') ?>