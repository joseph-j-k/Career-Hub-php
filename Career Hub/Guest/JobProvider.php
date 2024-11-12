<?php include("Head.php") ?>
<?php

	include("../Assest/Connection/Connection.php");
	
	if(isset($_POST["btnsubmit"]))
	{
		$photo=$_FILES["filejpproof"]["name"];
		$temp=$_FILES["filejpproof"]["tmp_name"];
		move_uploaded_file($temp,"../Assest/Files/ProviderDocs/".$photo);
		
		$logo=$_FILES["filejplogo"]["name"];
		$temp=$_FILES["filejplogo"]["tmp_name"];
		move_uploaded_file($temp,"../Assest/Files/ProviderDocs/".$logo);
		
		$insqry="insert into tbl_jobprovider(jobprovider_name,jobprovider_email,jobprovider_password,jobprovider_contact,jobprovider_proof,jobprovider_logo,jobprovider_web_add,jobprovider_place,district_id,companytype_id)values('".$_POST["txtjpname"]."','".$_POST["txtjpemail"]."','".$_POST["txtjppasword"]."','".$_POST["txtjpcontact"]."','$photo','$logo','".$_POST["txtjpweb"]."','".$_POST["txtplace"]."','".$_POST["seldistrict"]."','".$_POST["selctype"]."')";
	mysql_query($insqry);
	

	}

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Job provider</title>
<style>  
    body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
}

.form-container {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
    margin-top:50px;
}

form {
    background-color: #ffffff;
    padding: 20px 30px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 500px;
}

    /* Table Styling */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    /* Row and Label Styling */
    tr {
        margin-bottom: 15px;
    }

    td {
        padding: 10px;
        vertical-align: middle;
    }

    td:first-child {
        font-weight: bold;
        color: #333;
        width: 35%;
    }

    /* Input, Select, and File Upload Styling */
    input[type="text"], input[type="file"], select {
        width: 100%;
        padding: 8px 12px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-sizing: border-box;
        transition: border-color 0.3s;
    }

    input[type="text"]:focus, select:focus {
        border-color: #007bff;
        outline: none;
    }

    /* Placeholder Styling */
    input::placeholder {
        color: #aaa;
    }

    /* Button Styling */
    input[type="submit"] {
        padding: 10px 20px;
        margin: 10px 5px;
        border: none;
        border-radius: 5px;
        background-color: #333;
        color: white;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s;
        width: 100px;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    /* Center Button Row */
    td[colspan="2"] {
        text-align: center;
        padding-top: 20px;
    }
</style>

</head>

<body>
<div class="form-container">  
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<div class="container">
  <h5><a href="../index.php">Home</a>
  <span>/</span>  Registration</h5>
  </div>
  <table>
  <tr>
    <td>State</td>
    <td><label for="selstate"></label>
      <select name="selstate" id="selstate" onchange="getDistrict(this.value)">
      
      		  <?php
							$selQry="select * from tbl_state";
							$data=mysql_query($selQry);
							while($row=mysql_fetch_array($data))
								{
			?>
            
            <option value="<?php echo $row["state_id"]?>"><?php echo $row["state_name"]?></option>
            <?php
								}
			?>
      </select></td>
  </tr>
  
  <tr>
  <td>District</td>
  <td>
  			<select name="seldistrict" id="seldistrict">
            </select>
  </td>
  </tr>
  
  
  	<tr>
  <td>Company Type</td>
  <td>
  			<select name="selctype" id="selctype">
            
             <?php
							$selQry="select * from tbl_companytype";
							$data=mysql_query($selQry);
							while($row=mysql_fetch_array($data))
								{
			?>
            
            <option value="<?php echo $row["companytype_id"]?>"><?php echo $row["companytype_name"]?></option>
            <?php
								}
			?>
            
            </select>
  </td>
  </tr>
    <tr>
      <td width="73">Company Name</td>
      <td width="218"><input type="text" name="txtjpname" id="txtjpname" required placeholder="Enter Company Name"/></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><input type="text" name="txtplace" id="txtplace" required placeholder="Enter Place"/></td>
    </tr>
    <tr>
      <td>E-mail</td>
      <td><input type="text" name="txtjpemail" id="txtjpemail" required placeholder="Enter Email"/></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="text" name="txtjppasword" id="txtjppasword" required placeholder="Enter Password"/></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><input type="text" name="txtjpcontact" id="txtjpcontact" required placeholder="Enter Contact"/></td>
    </tr>
    <tr>
      <td>Proof</td>
      <td><input type="file" name="filejpproof" id="filejpproof" required /></td>
    </tr>
    <tr>
      <td>Logo</td>
      <td><input type="file" name="filejplogo" id="filejplogo" required /></td>
    </tr>
    <tr>
      <td>Website</td>
      <td><input type="text" name="txtjpweb" id="txtjpweb" required placeholder="www.careerhub.com"/></td>
    </tr>
    
    
    
    <tr>
      
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      <input type="submit" name="btnreset" id="btnreset" value="Cancel" /></td>
    </tr>
  </table>
  </form>
  </div>
</body>
</html>  
  
 

 <script src="../Assest/JQ/jQuery.js"></script>
<script>
  function getDistrict(did) {
    $.ajax({
      url: "../Assest/AjaxPages/AjaxDistrict.php?did=" + did,
      success: function (result) {

        $("#seldistrict").html(result);
      }
    });
  }

</script>

<?php include("Foot.php") ?>