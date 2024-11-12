<?php include("Head.php") ?>



<?php
include("../Assest/Connection/Connection.php");

session_start();
if(isset($_POST["btnsubmit"]))
{
			$insQry="update tbl_feedback set feedback_replay='".$_POST["txtreplay"]."',feedback_status='1' 
			where feedback_id='".$_SESSION["feedID"]."'";
			mysql_query($insQry);
			
			header("location:ViewJSFeedback.php");
}

?>



<form id="form1" name="form1" method="post" action="">
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px;
        }

        textarea {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        input[type="submit"], input[type="reset"] {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-top: 10px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #0056b3;
        }
    </style>
  <table width="200" border="1">
    <tr>
      <td>Replay</td>
      <td><textarea name="txtreplay" id="txtreplay" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      <input type="reset" name="btncancel" id="btncancel" value="Submit" /></td>
    </tr>
  </table>
</form>

<?php include("Foot.php") ?>

