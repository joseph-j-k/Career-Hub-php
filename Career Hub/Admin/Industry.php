<?php include("Head.php") ?>

<?php
include("../Assest/Connection/Connection.php");

if(isset($_POST["btnsubmit"]))
{
	$insqry="insert into tbl_industry(industry_name)values('".$_POST["txtIndustry"]."')";
	mysql_query($insqry);
	
}

	if(isset($_GET["delID"]))
		{
			$delQry="delete from tbl_industry where industry_id='".$_GET["delID"]."'";
			mysql_query($delQry);
			header("location:Industry.php");
		}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Industry</title>
<style>
       form {
  background-color: #ffffff;
  margin: 20px auto;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  width: 50%;
  max-width: 400px;
  margin-bottom: 20px;
}

table {
  width: 80%;
  border-collapse: collapse;
  margin: 20px auto;
  background: #ffffff;
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

table, th, td {
  border: 1px solid #ddd;
  padding: 12px;
}

th {
  background-color: #333;
  color: #ffffff;
  text-transform: uppercase;
  font-size: 1rem;
}

td {
  text-align: center;
  font-size: 0.95rem;
}

/* Input and button styling */
input[type="text"], 
{
  
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 4px;
  font-size: 0.9rem;
  margin: 5px 0;
}

input[type="submit"],
input[type="reset"] {
  color: #fff;
  background-color: #333;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

input[type="submit"]:hover,
input[type="reset"]:hover {
  background-color: #555;
}

/* Link (delete) styling */
a {
  color: #d9534f;
  text-decoration: none;
  font-weight: bold;
  transition: color 0.3s;
}

a:hover {
  color: #c9302c;
}

/* Centering content */
table {
  text-align: center;
}

th, td {
  padding: 10px;
}

table th, table td {
  font-weight: normal;
}     

    </style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
   
    <tr>
      <th scope="row">Industry</th>
      <td><input type="text" name="txtIndustry" id="txtIndustry" required placeholder="Enter Industry"/></td>
    </tr>
    <tr>
      
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      <input type="Reset" name="btnreset" id="btnreset" value="Reset" /></td>
    </tr>
  </table>
</form>
</body>
</html>


<table border="1" align="center">
	<tr>
    	<th>SI NO</th>
    	<th>Industry</th>
       
    	<th>Action</th>
    </tr>
    <?php
			$selQry="select * from tbl_industry";
			$data=mysql_query($selQry);
			$i=0;
			while($row=mysql_fetch_array($data))
			{
				$i++;
	?>
	<tr>
    	<td><?php echo $i ?></td>
       
         <td><?php echo $row ["industry_name"] ?></td>
        <td><a href="Industry.php?delID=<?php echo $row["industry_id"]?>">Delete</a></td>
    </tr>
    <?php
			}
	?>
</table>


<?php include("Foot.php") ?>	