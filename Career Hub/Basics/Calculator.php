<?php
$result="";
$no1="";
$no2="";
	if(isset($_POST["btnadd"])!=null)
	{
		$no1=$_POST["txtno1"];
		$no2=$_POST["txtno2"];
		$result=$no1+$no2;
		//echo $result;
	}
	if(isset($_POST["btnsub"])!=null)
	{
		$no1=$_POST["txtno1"];
		$no2=$_POST["txtno2"];
		$result=$no1-$no2;
		//echo $result;
	}
	if(isset($_POST["btnmult"])!=null)
	{
		$no1=$_POST["txtno1"];
		$no2=$_POST["txtno2"];
		$result=$no1*$no2;
		//echo $result;
	}
	if(isset($_POST["btndiv"])!=null)
	{
		$no1=$_POST["txtno1"];
		$no2=$_POST["txtno2"];
		$result=$no1/$no2;
		//echo $result;
	}

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="POST" action="">
  <table width="200" border="1">
    <tr>
      <th scope="row">Number 1</th>
      <td><input type="text" name="txtno1" id="txtno1" value="<?php echo $no1?>" /></td>
    </tr>
    <tr>
      <th scope="row">Number 2</th>
      <td><input type="text" name="txtno2" id="txtno2" value="<?php echo $no2?>" /></td>
    </tr>
    <tr>
     
      <td colspan="2" align="center"><input type="submit" name="btnadd" id="btnadd" value="+" />
      <input type="submit" name="btnsub" id="btnsub" value="-" />
      <input type="submit" name="btnmult" id="btnmult" value="*" />
      <input type="submit" name="btndiv" id="btndiv" value="/" /></td>
    </tr>
   <tr>
      <th scope="row">Result</th>
      <td><?php echo $result ?></td>
    </tr>
  </table>
</form>
</body>
</html>