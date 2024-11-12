<?php
include("../Assest/Connection/Connection.php");


include('Head.php');

$selJobprovider = "select * from tbl_jobprovider where jobprovider_id='" . $_SESSION["jobproviderid"] . "'";
$dataJobprovider = mysql_query($selJobprovider);
$rowJobprovider = mysql_fetch_array($dataJobprovider);
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>My Profile</title>
    <style>  
        .profile-card {
            width: 400px;
            background: #C5D6C4;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            padding: 20px;
            animation: fadeIn 0.6s ease-out;
            text-align: center; /* Center all text in the card */
			margin-left:500px;
        }

        .profile-card h2 {
            text-align: center; /* Center the heading */
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }

        .profile-card p {
            font-size: 14px;
            color: #444;
            margin: 5px 0;
        }

        .profile-card a {
            display: inline-block;
            margin-top: 20px;
            background: #00B074;
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .profile-card a:hover {
            background: #009860; /* Darken color on hover */
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
	<p style="margin-top:50px"></p>
    <div class="profile-card form-container">
        <h2>My Profile</h2>
        <p><strong>Name:</strong> <?php echo $rowJobprovider["jobprovider_name"]?></p>
        <p><strong>Contact:</strong> <?php echo $rowJobprovider["jobprovider_contact"]?></p>
        <p><strong>Email:</strong> <?php echo $rowJobprovider["jobprovider_email"]?></p>
        <div style="text-align: center;">
            <a href="EditProfle.php">Edit Profile</a>
            <a href="ChangePassword.php">Change Password</a>
        </div>
    </div>
</body>
</html>

<?php include('Foot.php') ?>
