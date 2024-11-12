<?php 

include('Head.php'); 
?>
<html>
<head>
    <title>Applied Applications</title>
    <link href="../Assest/Templates/User/css/bootstrap.min.css" rel="stylesheet">
    <link href="../Assest/Templates/User/css/style.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #00B074;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    <h1>Applied Applications</h1>
    <form id="form1" name="form1" method="post" action="">
        <table border="1" align="center">
            <tr>
                <th>SI NO</th>
                <th>Job Provider</th>
                <th>Job Provider E-mail</th>
                <th>Job Name</th>
                <th>Applied Date</th>
                <th>Industry</th>
                <th>Department</th>
                <th>Category</th>
                <th>Sub Category</th>
            </tr>
            <?php
            $selQry = "select * from tbl_application ap inner join tbl_job j on ap.job_id=j.job_id 
                        inner join tbl_industry i on j.industry_id=i.industry_id 
                        inner join tbl_jobsubcategory s on j.jobsubcategory_id=s.jobsubcategory_id 
                        inner join tbl_jobcategory c on s.jobcategory_id=c.jobcategory_id 
                        inner join tbl_department d on c.department_id=d.department_id
                        inner join tbl_jobprovider jp on d.jobprovider_id=jp.jobprovider_id  
                        where jobseeker_id='" . $_SESSION["jobseekerid"] . "'";

            $data = mysql_query($selQry);
            $i = 0;
            while ($row = mysql_fetch_array($data)) {
                $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row["jobprovider_name"] ?></td>
                <td><?php echo $row["jobprovider_email"] ?></td>
                <td><?php echo $row["job_name"] ?></td>
                <td><?php echo $row["application_date"] ?></td>
                <td><?php echo $row["industry_name"] ?></td>
                <td><?php echo $row["department_name"] ?></td>
                <td><?php echo $row["jobcategory_name"] ?></td>
                <td><?php echo $row["jobsubcategory_name"] ?></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </form>
</body>
</html>

<?php include('Foot.php') ?>