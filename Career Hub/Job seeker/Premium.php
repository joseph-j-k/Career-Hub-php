<?php 
include("Head.php"); 

if(isset($_POST["btn_submit"])) {

    $card_title = $_POST['card_title'];
    $card_description = $_POST['card_description'];
    $card_image_url = $_POST['card_image_url'];
    $cardAmount = $_POST["card_amount"];

	echo $insertBookingQuery = "INSERT INTO tbl_booking (jobseeker_id, booking_date, booking_amount) 
                           VALUES ('".$_SESSION['jobseekerid']."', curdate(), '".$cardAmount."')";
    if(mysql_query($insertBookingQuery))
    {
        $lastBookingId = mysql_insert_id();
        
        echo $insertPremiumCardQuery = "INSERT INTO tbl_premiumcard (booking_id, card_title, card_description, card_image_url, card_status) 
                                   VALUES ('".$lastBookingId."', '".$card_title."', '".$card_description."', '".$card_image_url."', '1') 
                                   ON DUPLICATE KEY UPDATE 
                                   card_title ='".$card_title."', 
                                   card_description = '".$card_description."', 
                                   card_image_url = '".$card_image_url."', 
                                   card_status = '1'";
					if(mysql_query($insertPremiumCardQuery))
					{
					  $_SESSION["bid"] = $lastBookingId;
					  ?>
					  <script>
                        window.location="Payment.php";
					  </script>
					  <?php
		
        }    
    } 
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Card Design</title>
    <style>
        /* Card container for flex layout */
        .card-container {
            display: flex;
            gap: 20px; /* Space between cards */
            justify-content: center;
            flex-wrap: nowrap; /* Prevent cards from wrapping */
            overflow-x: auto; /* Allow horizontal scrolling if necessary */
            padding: 20px;
        }

        .card {
            width: 350px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            background: linear-gradient(135deg, #ffffff, #f7f7f7);
            border: 1px solid rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            padding: 10px;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.25);
        }

        .card img {
            width: 100%;
            height: auto;
            display: block;
        }

        .card-content {
            padding: 20px;
        }

        .card-title {
            font-size: 1.6em;
            font-weight: bold;
            margin-bottom: 12px;
            color: #333;
        }

        .card-description {
            font-size: 1em;
            color: #555;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .card-amount {
            font-size: 1em;
            color: #555;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .card-button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #0d6efd;
            border: 1px solid red;
            color: #fff;
            font-weight: bold;
            text-decoration: none;
            border-radius: 30px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .card-button:hover {
            background-color: #084298;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<div class="card-container">
    <form method="post" action="">
        <div class="card">
            <img src="https://images.pexels.com/photos/3182834/pexels-photo-3182834.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" style="height:450px" alt="Card Image">
            <div class="card-content">
                <h2 class="card-title">Interpersonal Skills</h2>
                <p class="card-description">
                    This card is designed with a luxurious feel in mind, combining gradients, subtle shadows, and elegant typography for a more polished look.
                </p>
                <p class="card-amount">5000/-</p>
                <input type="hidden" name="card_title" value="Interpersonal Skills" />
                <input type="hidden" name="card_description" value="This card is designed with a luxurious feel in mind, combining gradients, subtle shadows, and elegant typography for a more polished look." />
                <input type="hidden" name="card_image_url" value="https://images.pexels.com/photos/3182834/pexels-photo-3182834.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" />
                <input type="hidden" name="card_amount" value="5000/-" />
                <input type="submit" name="btn_submit" value="Pay Now" class="card-button"/>
            </div>
        </div>
    </form>

    <form method="post" action="">
        <div class="card">
            <img src="https://images.pexels.com/photos/8962375/pexels-photo-8962375.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" style="height:450px" alt="Card Image">
            <div class="card-content">
                <h2 class="card-title">Interview Skill</h2>
                <p class="card-description">
                    This card is designed with a luxurious feel in mind, combining gradients, subtle shadows, and elegant typography for a more polished look.
                </p>
                <p class="card-amount">8000/-</p>
                <input type="hidden" name="card_title" value="Interview Skill" />
                <input type="hidden" name="card_description" value="This card is designed with a luxurious feel in mind, combining gradients, subtle shadows, and elegant typography for a more polished look." />
                <input type="hidden" name="card_image_url" value="https://images.pexels.com/photos/8962375/pexels-photo-8962375.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" />
                <input type="hidden" name="card_amount" value="8000/-" />
                <input type="submit" name="btn_submit" value="Pay Now" class="card-button"/>
            </div>
        </div>
    </form>

    <form method="post" action="">
        <div class="card">
            <img src="https://images.pexels.com/photos/5496464/pexels-photo-5496464.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" style="height:450px" alt="Card Image">
            <div class="card-content">
                <h2 class="card-title">Technical Skills</h2>
                <p class="card-description">
                    This card is designed with a luxurious feel in mind, combining gradients, subtle shadows, and elegant typography for a more polished look.
                </p>
                <p class="card-amount">10000/-</p>
                <input type="hidden" name="card_title" value="Technical Skills" />
                <input type="hidden" name="card_description" value="This card is designed with a luxurious feel in mind, combining gradients, subtle shadows, and elegant typography for a more polished look." />
                <input type="hidden" name="card_image_url" value="https://images.pexels.com/photos/5496464/pexels-photo-5496464.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" />
                <input type="hidden" name="card_amount" value="10000/-" />
                <input type="submit" name="btn_submit" value="Pay Now" class="card-button"/>
            </div>
        </div>
    </form>
</div>

</body>
</html>

<?php include("Foot.php"); ?>
