<?php
include("../Assest/Connection/Connection.php");

include('Head.php');

$selJobseeker="select * from tbl_jobseeker where jobseeker_id='".$_SESSION["jobseekerid"]."'";
$dataJobseeker=mysql_query($selJobseeker);
$rowJobseeker=mysql_fetch_array($dataJobseeker);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Material+Icons&display=swap" rel="stylesheet">

    <!-- CSS Styles -->
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
    margin: auto;
    background: #C5D6C4;
    border-radius: 15px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    animation: fadeIn 0.6s ease-out;
    margin-left:500px;
}

.profile-card:hover {
    transform: scale(1.05);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
}

.profile-header {
    width: 100%;
    height: 140px;
    background: #869897;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    padding: 10px;
}

.search {
    color: white;
    font-size: 16px;
    padding: 10px 15px;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s, transform 0.3s;
    background-color: #4f5f6f;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.search:hover {
    background-color: #3e4f5f;
}

.profile-content {
    padding: 20px;
    text-align: center;
}

.profile-content h2 {
    font-size: 24px;
    font-weight: 600;
    color: #333;
}

.profile-content p {
    font-size: 14px;
    color: #444;
    margin: 5px 0;
}

.profile-actions {
    margin-top: 20px;
    display: flex;
    justify-content: space-around;
    padding-bottom: 20px;
}

.profile-actions a {
    font-size: 14px;
    color: white;
    background: #00B074;
    padding: 10px 20px;
    border-radius: 20px;
    transition: background 0.3s ease;
    text-decoration: none;
}

.profile-actions a:hover {
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
    <p style="margin-top:50px"></p>
    <div class="profile-card" style="animation: fadeIn 0.6s ease-out; form-container">
        <div class="profile-header" >
        <a href="HomePage.php" class="search">Back</a>
        </div>
        <div class="profile-content">
            <p><strong>Name:</strong> <?php echo $rowJobseeker["jobseeker_name"]?></p>
            <p><strong>Contact:</strong> <?php echo $rowJobseeker["jobseeker_contact"]?></p>
            <p><strong>Email:</strong> <?php echo $rowJobseeker["jobseeker_email"]?></p>
        </div>
        <div class="profile-actions">
            <a href="EditProfle.php">Edit Profile</a>
            <a href="Changepassword.php">Change Password</a>
        </div>
    </div>
</body>

</html>

<?php include('Foot.php') ?>
