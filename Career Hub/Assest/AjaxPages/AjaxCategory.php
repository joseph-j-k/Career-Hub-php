<?php

	include("../Connection/Connection.php");
	
?>

<select name="selcategory" id="selcategory">
 
      <option value="--select--">--select--</option>
      		  <?php
							$selQry="select * from tbl_jobcategory where department_id='".$_GET["did"]."'";
							$data=mysql_query($selQry);
							while($row=mysql_fetch_array($data))
								{
			?>
            
            <option value="<?php echo $row["jobcategory_id"]?>"><?php echo $row["jobcategory_name"]?></option>
            <?php
								}
			?>
      </select>