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
      <td>Welcome :: <?php echo $_SESSION["jobprovidername"]?></td>
    </tr>
    <tr>
      <td><a href="MyProfile.php">Profile </a></td>
    </tr>
    <tr>
      <td><a href="Department.php">Department </a></td>
    </tr>
     <tr>
      <td><a href="JobCategory.php">Job Category </a></td>
    </tr>
     <tr>
      <td><a href="JobSubCategory.php">Job SubCategory </a></td>
    </tr>
    <tr>
      <td><a href="JobDetails.php">Job </a></td>
    </tr>
     <tr>
      <td><a href="AppliedUser.php">Applied User </a></td>
    </tr>
    <tr>
      <td><a href="FilterAppliedUser.php">Filter Applied User </a></td>
    </tr>
   
   
  
</table>
</body>
</html>