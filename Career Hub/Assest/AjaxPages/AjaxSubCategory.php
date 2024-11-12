<?php

	include("../Connection/Connection.php");
	
?>

<select name="selsubcategory" id="selsubcategory">
 <option value="--select--">--select--</option>
      
      		  <?php
							$selQry="select * from tbl_jobsubcategory where jobcategory_id='".$_GET["did"]."'";
							$data=mysql_query($selQry);
							while($row=mysql_fetch_array($data))
								{
			?>
            
            <option value="<?php echo $row["jobsubcategory_id"]?>"><?php echo $row["jobsubcategory_name"]?></option>
            <?php
								}
			?>
      </select>