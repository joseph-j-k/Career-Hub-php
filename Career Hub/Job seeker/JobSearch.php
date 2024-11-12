<?php include('Head.php');

if(isset($_GET["viewID"]))
		{
			$_SESSION["jobID"]=$_GET["viewID"];
			header("location:ViewJob.php");
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JobSearch</title>
 <style>
      
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top:50px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            
        }

        th {
            background-color: #00B074;
            color: white;
        }

        
        select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #00B074;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #7b88d1;
        }

        h2 {
            text-align: center;
            color: #333;
        }
    </style>
</head>

<body>
  <br><br><br>  
   <h1 align="center">Search Job</h1>
    <form id="form1" name="form1" method="post" action="" class="form-container">
        <table>
            <tr>
                <th scope="row"><div align="left">Industry</div></th>
                <td>
                    <select name="selindustry" id="selindustry">
                        <option value="--select--">--select--</option>
                        <?php
                        $selQry = "select * from tbl_industry";
                        $data = mysql_query($selQry);
                        while ($row = mysql_fetch_array($data)) {
                        ?>
                        <option value="<?php echo $row["industry_id"]?>"><?php echo $row["industry_name"]?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th scope="row"><div align="left">Department</div></th>
                <td>
                    <select name="seldept" id="seldept" onchange="getCategory(this.value)">
                        <option value="--select--">--select--</option>
                        <?php
                        $selQry = "select * from tbl_department";
                        $data = mysql_query($selQry);
                        while ($row = mysql_fetch_array($data)) {
                        ?>
                        <option value="<?php echo $row["department_id"]?>"><?php echo $row["department_name"]?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Category</th>
                <td>
                    <select name="selcategory" id="selcategory" onchange="getSubCategory(this.value)">
                        <option value="--select--">--select--</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Sub Category</th>
                <td>
                    <select name="selsubcategory" id="selsubcategory">
                        <option value="--select--">--select--</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btnsearch" id="btnsearch" value="Search" />
                </td>
            </tr>
        </table>
    </form>

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

        function getSubCategory(did) {
            $.ajax({
                url: "../Assest/AjaxPages/AjaxSubCategory.php?did=" + did,
                success: function (result) {
                    $("#selsubcategory").html(result);
                }
            });
        }
    </script>

    <?php
    if (isset($_POST["btnsearch"])) {
        $industry = $_POST["selindustry"];
        $subcat = $_POST["selsubcategory"];
    ?>
    <h2 align="center"><u>Jobs</u></h2>
    <table align="center">
        <tr>
            <th>SI NO</th>
            <th>Job Name</th>
            <th>JobProvider</th>
            <th>Job Post Date</th>
            <th>Industry</th>
            <th>Department</th>
            <th>Category</th>
            <th>Sub Category</th>
            <th>Vacancy</th>
            <th>Action</th>
        </tr>
        <?php
        $selQry = "select * from tbl_job j inner join tbl_industry i on j.industry_id=i.industry_id 
            inner join tbl_jobsubcategory s on j.jobsubcategory_id=s.jobsubcategory_id 
            inner join tbl_jobcategory c on s.jobcategory_id=c.jobcategory_id 
            inner join tbl_department d on c.department_id=d.department_id 
            inner join tbl_jobprovider jp on jp.jobprovider_id=d.jobprovider_id 
            where j.industry_id='$industry' and j.jobsubcategory_id='$subcat'";

        $data = mysql_query($selQry);
        $i = 0;
        while ($row = mysql_fetch_array($data)) {
            $i++;
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row["job_name"] ?></td>
            <td><?php echo $row["jobprovider_name"] ?></td>
            <td><?php echo $row["job_post_date"] ?></td>
            <td><?php echo $row["industry_name"] ?></td>
            <td><?php echo $row["department_name"] ?></td>
            <td><?php echo $row["jobcategory_name"] ?></td>
            <td><?php echo $row["jobsubcategory_name"] ?></td>
            <td><?php echo $row["job_vacancy"] ?></td>
            <td><a href="JobSearch.php?viewID=<?php echo $row["job_id"]?>">View More</a></td>
        </tr>
        <?php
        }
    }
    ?>
    </table>
</body>
</html>

<?php include('Foot.php') ?>