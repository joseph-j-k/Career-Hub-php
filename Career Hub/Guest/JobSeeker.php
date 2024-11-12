<?php
  include("Head.php");
	include("../Assest/Connection/Connection.php");
	
	if(isset($_POST["btnusumbit"]))
	{
		$photo=$_FILES["fileuphoto"]["name"];
		$temp=$_FILES["fileuphoto"]["tmp_name"];
		move_uploaded_file($temp,"../Assest/Files/ProviderDocs/".$photo);
		
		$resume=$_FILES["fileuresume"]["name"];
		$temp=$_FILES["fileuresume"]["tmp_name"];
		move_uploaded_file($temp,"../Assest/Files/ProviderDocs/".$resume);
		
		$insqry=" insert into tbl_jobseeker(jobseeker_name,jobseeker_email,jobseeker_password,jobseeker_contact,jobseeker_gender,jobseeker_education,jobseeker_experience,jobseeker_previousjob,jobseeker_photo,jobseeker_resume,jobseeker_address,district_id,jobseeker_place)values('".$_POST["txtuname"]."','".$_POST["txtuemail"]."','".$_POST["txtupassword"]."','".$_POST["txtucontact"]."','".$_POST["radio"]."','".$_POST["txtueducation"]."','".$_POST["txtuexperience"]."','".$_POST["txtupreviousjob"]."','$photo','$resume','".$_POST["txtuaddress"]."','".$_POST["seldistrict"]."','".$_POST["txtuplace"]."')";
		mysql_query($insqry);
		
		
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Seeker</title>
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
    max-width: 800px;
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
  </br>
  <table>
    <tr>
      <td>User Name</td>
      <td><input type="text" name="txtuname" id="txtuname" required placeholder="Enter Name"/></td>
    </tr>
    <tr>
      <td>E-mail</td>
      <td><input type="text" name="txtuemail" id="txtuemail" required placeholder="Enter Email"/></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="text" name="txtupassword" id="txtupassword" required placeholder="Enter Password"/></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><input type="text" name="txtucontact" id="txtucontact" required placeholder="Enter Contact"/></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><input type="radio" name="radio" id="Male" value="Male" checked />
        Male
        <input type="radio" name="radio" id="Female" value="Female" />
        Female</td>
    </tr>
    <tr>
      <td>Education</td>
      <td><input type="text" name="txtueducation" id="txtueducation" required placeholder="Enter Education"/></td>
    </tr>
    <tr>
      <td>Experience</td>
      <td><textarea name="txtuexperience" id="txtuexperience" cols="45" rows="5" required placeholder="Enter Experience"></textarea></td>
    </tr>
    <tr>
      <td>Previous Job</td>
      <td><input type="text" name="txtupreviousjob" id="txtupreviousjob" required placeholder="Enter Previous Job"/></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><input type="file" name="fileuphoto" id="fileuphoto" required/></td>
    </tr>
    <tr>
      <td>Resume</td>
      <td><input type="file" name="fileuresume" id="fileuresume" required/></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><textarea name="txtuaddress" id="txtuaddress" cols="45" rows="5" required placeholder="Enter Address"></textarea></td>
    </tr>
    
    
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
      <td>Place</td>
      <td><input type="text" name="txtuplace" id="txtuplace" required placeholder="Enter Place"/></td>
    </tr>
    <tr>
    
	<tr>
      <td colspan="2" align="center"><input type="submit" name="btnusumbit" id="btnusumbit" value="Submit" />
      <input type="submit" name="btnureset" id="btnureset" value="Reset" /></td>
    </tr>
  </table>
</form>
</div>

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
</body>
</html>

<?php  include("Foot.php"); ?>