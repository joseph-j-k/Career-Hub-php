<?php

	include("../Connection/Connection.php");
	
?>

<select name="seldistrict" id="seldistrict">

      
      		  <?php
							$selQry="select * from tbl_district where state_id='".$_GET["did"]."'";
							$data=mysql_query($selQry);
							while($row=mysql_fetch_array($data))
								{
			?>
            
            <option value="<?php echo $row["district_id"]?>"><?php echo $row["district_name"]?></option>
            <?php
								}
			?>
      </select>