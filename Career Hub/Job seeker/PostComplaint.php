<?php include('Head.php'); 

	if(isset($_POST["btnsubmit"]))
		{
			$insqry="insert into tbl_complaint(complaint_title,complaint_content,complaint_date,jobseeker_id) values ('".$_POST["txttitle"]."','".$_POST["txtcomplaint"]."',curdate(),'".$_SESSION["jobseekerid"]."')";
			mysql_query($insqry);
			
		}

		if(isset($_GET["delID"]))
		{
			$delQry="delete from tbl_complaint where complaint_id='".$_GET["delID"]."'";
			mysql_query($delQry);
			header("location:PostComplaint.php");
		}
		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaint</title>
 <style>
        

        table {
            width: 80%;
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

        input[type="text"],
        textarea {
            width: 80%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #00B074;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

         .a {
            background-color: #9BA5E8;
            color: white;
            border: none;
            padding: 2px 25px;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #00B074;
        }

        h2 {
            text-align: center;
            color: #333;
        }
    </style>
</head>

<body>
    <form id="form1" name="form1" method="post" action="" style="margin-top:80px">
       <h2>Post Your Complaint</h2>
        <table align="center">
            <tr>
                <td class="td">Title</td>
                <td class="td"><input type="text" name="txttitle" id="txttitle" required placeholder="Enter Title" /></td>
            </tr>
            <tr>
                <td class="td">Complaint</td>
                <td class="td"><textarea name="txtcomplaint" id="txtcomplaint" cols="45" rows="5" required placeholder="Enter Complaint"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center" class="td">
                    <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
                    <input type="reset" name="btncancel" id="btncancel" value="Cancel" />
                </td>
            </tr>
        </table>
    </form>

    <h2>Your Complaints</h2>
    <table  align="center">
        <tr>
            <th>SI NO</th>
            <th>Title</th>
            <th>Complaint</th>
            <th>Date</th>
            <th>Reply</th>
            <th>Action</th>
        </tr>
        <?php
        $selQry = "select * from tbl_complaint where jobseeker_id='" . $_SESSION["jobseekerid"] . "'";
        $data = mysql_query($selQry);
        $i = 0;
        while ($row = mysql_fetch_array($data)) {
            $i++;
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row["complaint_title"] ?></td>
            <td><?php echo $row["complaint_content"] ?></td>
            <td><?php echo $row["complaint_date"] ?></td>
            <td><?php echo $row["complaint_reply"] ?></td>
            <td><a href="PostComplaint.php?delID=<?php echo $row["complaint_id"] ?>" class="a">Delete</a></td>
        </tr>
        <?php
        }
        ?>
    </table>
    <p style="margin-top:80px"></p>
</body>
</html>

<?php include('Foot.php') ?>

