<?php
include("../Assest/Connection/Connection.php");

session_start();
if(isset($_POST["btnsubmit"]))
{
			$insQry="update tbl_complaint set complaint_reply='".$_POST["txtreplay"]."',complaint_status='1' 
			where complaint_id='".$_SESSION["compID"]."'";
			mysql_query($insQry);
			
			header("location:ViewJSComplaint.php");
}

?>



<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Replay</td>
      <td><textarea name="txtreplay" id="txtreplay" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      <input type="reset" name="btncancel" id="btncancel" value="Submit" /></td>
    </tr>
  </table>
</form>
