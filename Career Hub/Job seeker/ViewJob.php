<?php
include('Head.php');

if (isset($_GET["applyID"])) {
    $_SESSION["jobID"] = $_GET["applyID"];
    $insqry = "insert into tbl_application(job_id,jobseeker_id,application_date) values ('" . $_SESSION["jobID"] . "','" . $_SESSION["jobseekerid"] . "',curdate())";
    mysql_query($insqry);
    echo $insqry;
    header("location:AppliedApplication.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ViewJob</title>
    <style>
     .form-container {
          display: flex;
          justify-content: center;
          align-items: center;
          padding: 20px;
          margin-top:50px;
           }
        .profile-card {
            width: 400px;
            background: #C5D6C4;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            animation: fadeIn 0.6s ease-out;
            padding: 20px; /* Added padding for content */
            margin-left:500px;
        }

        .profile-card:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
        }

        .profile-content {
            text-align: justify; /* Align text to left */
        }

        .profile-content h2 {
            font-size: 24px;
            font-weight: 600;
            color: #333;
        }

        .profile-content p {
            font-size: 14px;
            color: #444;
            margin: 5px 0;
        }

        .apply-button {
            display: block;
            margin-top: 20px;
            text-align: center;
            background: #00B074;
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .apply-button:hover {
            background: #009860; /* Darken color on hover */
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="profile-card form-container" >
        <?php
        $selQry = "select * from tbl_job j inner join tbl_industry i on j.industry_id=i.industry_id 
        inner join tbl_jobsubcategory s on j.jobsubcategory_id=s.jobsubcategory_id 
        inner join tbl_jobcategory c on s.jobcategory_id=c.jobcategory_id 
        inner join tbl_department d on c.department_id=d.department_id 
        where j.job_id='" . $_SESSION["jobID"] . "'";

        $data = mysql_query($selQry);

        if ($row = mysql_fetch_array($data)) {
        ?>
        <div class="profile-content">
            <h2><?php echo $row["job_name"]; ?></h2>
            <p><strong>Post Date:</strong> <?php echo $row["job_post_date"]; ?></p>
            <p><strong>Industry:</strong> <?php echo $row["industry_name"]; ?></p>
            <p><strong>Department:</strong> <?php echo $row["department_name"]; ?></p>
            <p><strong>Category:</strong> <?php echo $row["jobcategory_name"]; ?></p>
            <p><strong>Subcategory:</strong> <?php echo $row["jobsubcategory_name"]; ?></p>
            <p><strong>No of Vacancy:</strong> <?php echo $row["job_vacancy"]; ?></p>
            <p><strong>Hours of Working:</strong> <?php echo $row["job_work_hour"]; ?></p>
            <p><strong>Qualification:</strong> <?php echo $row["job_qualification"]; ?></p>
            <p><strong>Experience:</strong> <?php echo $row["job_experience"]; ?></p>
            <p><strong>Salary:</strong> <?php echo $row["job_salary"]; ?></p>
            <p><strong>Last Date:</strong> <?php echo $row["job_last_date"]; ?></p>
            <p><strong>Details:</strong> <?php echo $row["job_about"]; ?></p>
            <a class="apply-button" href="ViewJob.php?applyID=<?php echo $row["job_id"]; ?>">Apply Now</a>
        </div>
        <?php
        }
        ?>
    </div>
</body>

</html>

<?php include('Foot.php') ?>

