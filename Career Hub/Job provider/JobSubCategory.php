<?php
include("../Assest/Connection/Connection.php");

include('Head.php');

if(isset($_POST["btnsubmit"]))
		{
		 $insqry="insert into tbl_jobsubcategory(jobsubcategory_name,jobcategory_id) values ('".$_POST["txtsubcategory"]."','".$_POST["selcategory"]."')";
		mysql_query($insqry);
			
			
		}
		
		if(isset($_GET["delID"]))
		{
			$delQry="delete from tbl_jobsubcategory where jobsubcategory_id='".$_GET["delID"]."'";
			mysql_query($delQry);
			header("location:JobSubCategory.php");
		}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transition=l//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Job Sub Category</title>
 <style>
        

        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        .td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #00B074;
            color: white;
        }

        input[type="text"],
        textarea {
            width: 80%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #00B074;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

         .a {
            background-color: #9BA5E8;
            color: white;
            border: none;
            padding: 2px 25px;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #00B074;
        }

        h2 {
            text-align: center;
            color: #333;
        }
    </style>
</head>

<body>
<form id="form1" name="form1" method="post" action="" style="margin-top:80px">
  <table  border="1" align="center">
  
  	<tr>
      <th class="td">Department Name</th>
      <td class="td"><select name="seldept" id="seldept" onchange="getCategory(this.value)">
       <option value="--select--">--select--
      </option>
      
      <?php
							$selQry="select * from tbl_department where jobprovider_id='".$_SESSION["jobproviderid"]."'";
							$data=mysql_query($selQry);
							while($row=mysql_fetch_array($data))
								{
			?>
            
            <option value="<?php echo $row["department_id"]?>"><?php echo $row["department_name"]?></option>
            <?php
								}
			?>
      
      </select></td>
    </tr>
    <tr>
    
    <tr>
      <th class="td">Job Category</th>
      <td class="td"><select name="selcategory" id="selcategory">
      <option value="--select--">--select--
      </option>
      </select>
      </td>
    </tr>
    
    <tr>
      <th class="td">Job Sub Category</th>
      <td><input type="text" name="txtsubcategory" id="txtsubcategory" required placeholder="Enter Sub Category"/></td>
    </tr>
    <tr>
   
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      <input type="Reset" name="btnreset" id="btnreset" value="Reset" /></td>
    </tr>
  </table>
</form>
</body>
</html>



<script src="../Assest/JQ/jQuery.js"></script>
<script>
  function getCategory(did) {
    $.ajax({
      url: "../Assest/AjaxPages/AjaxCategory.php?did=" + did,
      success: function (result) {

        $("#selcategory").html(result);
      }
    });
  }

</script>

<table  align="center">
	<tr>
    	<th>SI NO</th>
    	<th>Department</th>
        <th>JobCategory</th>
        <th>JobSubCategory</th>
    	<th>Action</th>
    </tr>
    <?php
			$selQry="select * from tbl_jobsubcategory sc inner join tbl_jobcategory c on c.jobcategory_id=sc.jobcategory_id inner join tbl_department d on d.department_id=c.department_id where d.jobprovider_id='".$_SESSION["jobproviderid"]."'";
			$data=mysql_query($selQry);
			$i=0;
			while($row=mysql_fetch_array($data))
			{
				$i++;
	?>
	<tr>
    	<td><?php echo $i ?></td>
        <td><?php echo $row ["department_name"] ?></td>
         <td><?php echo $row ["jobcategory_name"] ?></td>
         <td><?php echo $row ["jobsubcategory_name"] ?></td>
        <td><a href="JobSubCategory.php?delID=<?php echo $row["jobsubcategory_id"]?>">Delete</a></td>
    </tr>
    <?php
			}
	?>
</table>

<?php include('Foot.php') ?>