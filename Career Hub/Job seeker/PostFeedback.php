<?php
include('Head.php');

if (isset($_POST["btnsubmit"])) {
    $insqry = "insert into tbl_feedback(feedback_content, feedback_date, jobseeker_id) values ('" . $_POST["txtfeedback"] . "', curdate(), '" . $_SESSION["jobseekerid"] . "')";
    mysql_query($insqry);
}

if (isset($_GET["delID"])) {
    $delQry = "delete from tbl_feedback where feedback_id='" . $_GET["delID"] . "'";
    mysql_query($delQry);
    header("location:PostFeedback.php");
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Feedback</title>
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
        .td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #00B074;
            color: white;
        }


        .btn-custom {
            background-color: #00B074; /* Bootstrap primary color */
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }

        .btn-custom:hover {
            background-color: #00B074; /* Darker shade on hover */
        }

        .form-control {
            width: 100%; /* Ensure the input field takes full width */
            padding: 10px; /* Padding for better spacing */
            border: 1px solid #ccc; /* Border styling */
            border-radius: 5px; /* Rounded corners */
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
        }
		.a{
			background-color: #9BA5E8;
            color: red;
            border: none;
            padding: 2px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
		}
    </style>
</head>

<body>
    <h1>Post Feedback</h1>
    <form id="form1" name="form1" method="post" action="">
        <table width="200" border="1">
            <tr>
                <td class="td">Feedback</td>
                <td class="td"><input type="text" name="txtfeedback" id="txtfeedback" class="form-control" required placeholder="Enter Feedback" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center" class="td">
                    <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" class="btn-custom" />
                    <input type="reset" name="btncancel" id="btncancel" value="Cancel" class="btn-custom" />
                </td>
            </tr>
        </table>
    </form>

    <table  align="center">
        <tr>
            <th>SI NO</th>
            <th>Feedback</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        <?php
        $selQry = "select * from tbl_feedback";
        $data = mysql_query($selQry);
        $i = 0;
        while ($row = mysql_fetch_array($data)) {
            $i++;
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row["feedback_content"] ?></td>
            <td><?php echo $row["feedback_date"] ?></td>
            <td><a href="PostFeedback.php?delID=<?php echo $row["feedback_id"] ?>" class="a">Delete</a></td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>

<?php include('Foot.php') ?>
