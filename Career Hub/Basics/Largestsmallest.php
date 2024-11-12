<?php
$resultl="";
$results="";
$no1="";
$no2="";
$no3="";
	if(isset($_POST["btnsubmit"])!=null)
	{
		$no1=$_POST["txtno1"];
		$no2=$_POST["txtno2"];
		$no3=$_POST["txtno3"];
		
		//Find the largest number 
		//$resultl= max($no1,$no2,$no3);
		//Find the smallest number
		//$results= min($no1,$no2,$no3);
		if($no1>$no2 && $no1>$no3)
		{
			$resultl= $no1;
		}
		elseif($no2>$no1 && $no2>$no3)
		{
			$resultl= $no2;
		}
		else
		{
			$resultl= $no3;
		}
		
		if($no1<$no2 && $no1<$no3)
		{
			$results= $no1;
		}
		elseif($no2<$no1 && $no2<$no3)
		{
			$results= $no2;
		}
		else
		{
			$results= $no3;
		}
	}
?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <th scope="row"><p>Number 1</p></th>
      <td><input type="text" name="txtno1" id="txtno1" value="<?php echo $no1 ?>"/></td>
    </tr>
    <tr>
      <th scope="row">Number 2</th>
      <td><input type="text" name="txtno2" id="txtno2" value="<?php echo $no2 ?>"/></td>
    </tr>
    <tr>
      <th scope="row">Number 3</th>
      <td><input type="text" name="txtno3" id="txtno3" value="<?php echo $no3 ?>"/></td>
    </tr>
    <tr>
      
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
    </tr>
    <tr>
      <th scope="row">Largest</th>
      <td><?php echo $resultl ?></td>
    </tr>
    <tr>
      <th scope="row">Smallest</th>
      <td><?php echo $results ?></td>
    </tr>
  </table>
</form>
</body>
</html>