<?php

session_start();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home page</title>
</head>

<body>
<table width="200" border="1">
  
    <tr>
      <td>Welcome :: <?php echo $_SESSION["adminname"]?></td>
    </tr>
    <tr>
      <td><a href="AdminRegistration.php">ADMIN </a></td>
    </tr>
    <tr>
      <td><a href="MyProfile.php">PROFILE </a></td>
    </tr>
    <tr>
      <td><a href="State.php"> STATE </a></td>
    </tr>
    <tr>
      <td><a href="District.php">DISTRICT </a></td>
    </tr>
    
     <tr>
      <td><a href="CompanyType.php">CompanyType </a></td>
    </tr>
     <tr>
      <td><a href="Industry.php">Industry </a></td>
    </tr>
    
    
     <tr>
      <td><a href="JobSeekerVerfication.php">JobSeekerVerfication </a></td>
    </tr>
    
     <tr>
      <td><a href="JobProviderVerification.php">JobProviderVerification</a></td>
    </tr>
    <tr>
      <td><a href="ViewJSComplaint.php">ViewJSComplaint</a></td>
    </tr>
     <tr>
      <td><a href="ViewJSFeedback.php">ViewJSFeedback</a></td>
    </tr>
  
</table>
</body>
</html>