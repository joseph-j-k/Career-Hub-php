<?php 
$fname="";
$lname="";
$intial="";
$gender="";
$dept="";
$mark1="";
$mark2="";
$mark3="";
$total="";
$percentage="";
$grade="";

	if(isset($_POST["btnsubmit"])!=null)
	{
		$fname=$_POST["txtfname"];
		$lname=$_POST["txtlname"];
		$gender=$_POST["gender"];
		$dept=$_POST["seldepartment"];
		$mark1=$_POST["txtmark1"];
		$mark2=$_POST["txtmark2"];
		$mark3=$_POST["txtmark3"];
		$total=$mark1+$mark2+$mark3;
		$percentage=($total/300)*100;
		
		if($percentage>90)
		{
			$grade='A+';
			
		}
		elseif($percentage>85)
		{
			$grade='A';		
		}
		elseif($percentage>75)
		{
			$grade='B+';		
		}
		elseif($percentage>70)
		{
			$grade='B';		
		}
		elseif($percentage>60)
		{
			$grade='C+';		
		}
		elseif($percentage>50)
		{
			$grade='C';		
		}
		elseif($percentage>40)
		{
			$grade='D+';		
		}
		elseif($percentage>30)
		{
			$grade='D';		
		}
		else
		{
			$grade='E';
		}
		
		if($_POST["gender"]=="Male")
		{
			$gender="Male";
			$intial="Mr.";
		}
		elseif
		{
			$gender="Female";
			$intial="Ms.";
		}
		else
		{
			$gender="Others";
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
  <table width="333" border="1">
    <tr>
      <td width="71">First Name</td>
      <td width="228"><input type="text" name="txtfname" id="txtfname" /></td>
    </tr>
    <tr>
      <td>Last Name</td>
      <td><input type="text" name="txtlname" id="txtlname" /></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><label>
            <input type="radio" name="gender" value="Male" id="gender" />
            Male</label>
          <label>
            <input type="radio" name="gender" value="Female" id="gender" />
            Female</label>            
          <label>
            <input type="radio" name="gender" value="Others" id="gender" />
            Others</label></td>              
    </tr>
    <tr>
      <td>Department</td>
      <td><select name="seldepartment" size="1" id="seldepartment">
        <option>Computer Science</option>
        <option>Commerce</option>
        <option>Physology</option>
        <option>Physics</option>
        <option>Chemistry</option>
      </select></td>
    </tr>
    <tr>
      <td>Mark 1</td>
      <td><input type="text" name="txtmark1" id="txtmark1" /></td>
    </tr>
    <tr>
      <td>Mark 2</td>
      <td><input type="text" name="txtmark2" id="txtmark2" /></td>
    </tr>
    <tr>
      <td>Mark 3</td>
      <td><input type="text" name="txtmark3" id="txtmark3" /></td>
    </tr>
    <tr>
      
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><?php echo $intial.$fname.$lname ?></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><?php echo $gender ?></td>
    </tr>
    <tr>
      <td>Department</td>
      <td><?php echo $dept ?></td>
    </tr>
    <tr>
      <td>Total</td>
      <td><?php echo $total ?></td>
    </tr>
    <tr>
      <td>Percentage</td>
      <td><?php echo $percentage ?></td>
    </tr>
    <tr>
      <td>Grade</td>
      <td><?php echo $grade ?></td>
    </tr>
  </table>
</form>
</body>
</html>