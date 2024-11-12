<?php
include("../Assest/Connection/Connection.php");
include("Head.php");
$selqry = "select * from tbl_booking b inner join tbl_premiumcard c on b.booking_id = c.booking_id where booking_status > 0  and card_status > 0 and  jobseeker_id = '".$_SESSION['jobseekerid']."'";
$result = mysql_query($selqry);	
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Galerie DArt::My Booking</title>
</head>

<body>
<div id="tab" align="center">
<h1>My Booking</h1>
<form id="form1" name="form1" method="post" action="">
  <table border="1">
    <tr align="center">
      <td>SlNO</td>
      <td>Seeker Name</td>
      <td>Package</td>
      <td>Photo</td>
      <td>Description</td>
      <td>Total amount</td>
      <td>Status</td>
    </tr>
     <?php
	 $i=0;
	while($row = mysql_fetch_array($result))
	{
		
		 $i++;
  ?>
  <tr align="center">
          <td><?php echo $i; ?></td>
          <td><?php echo $_SESSION["jobseekername"];?></td>
          <td><?php echo $row["card_title"];?></td>
          <td><img src="<?php echo $row["card_image_url"];?>" width="100" height="100" /></td>
          <td><?php echo $row["card_description"];?></td>
          <td><?php echo $row["booking_amount"];?></td>
          <td>
          <?php
                
					if($row["booking_status"] == 0)
					{
						echo "Payment Pending....";
					}
					else if($row["booking_status"] == 1)
					{
						echo "Payment Completed....";
					}
					
				?>
          </td>

  </tr>
  <?php
	}
	?>
  </table>
</form>
</div>
</body>
<?php
include("Foot.php");
?>
</html>