<?php
    include("connect.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Personal Info</title>
		<link href="https://fonts.googleapis.com/css?family=Signika&display=swap" rel="stylesheet">

		<style>

			body {
				margin: 0;
				background-image: linear-gradient(to right, #FF814F, #FC4D55) ;
			}

			.heading {
				font-family: 'Signika', sans-serif;
				color: white;
				background-color: transparent;
				font-size: 6vh;
				text-align: center;
				padding: 3vh;
				margin: 0;
				font-weight: bolder;
				position: -webkit-sticky;
			}


			.formBox {
				width: 30%;
				background: #f4f7f8;
				margin: 10px auto;
				padding: 20px;
				border-radius: 8px;
				font-family: Georgia, "Times New Roman", Times, serif;
			}

			.myInput {
				display: block;
				font-family: Georgia, "Times New Roman", Times, serif;
				border: none;
				border-radius: 4px;
				outline: 0;
				padding: 10px;
				width: 90%;
				box-sizing: border-box;
				-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
				background: #e8eeef;
				color:#8a97a0;
				-webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
				box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
				margin: auto auto 1rem;
				font-size: 15px;
			}

			.myInput:focus {
				background: #d2d9dd;
			}

			.myLabel {
				font-family: 'Signika', sans-serif;
				color: #FC4D55;
				font-weight: bold;
				left: 5%;
				position: relative;
				margin-bottom: 10vh;
			}

			.button {
				background-color: #FC4D55;
				border: none;
				text-align: center;
				padding: 20px 40px;
				font-size: 1.2rem;
				font-family: 'Signika', sans-serif;
				font-weight: bold;
				position: relative;
				top: 50%;
				left: 50%;
				transform: translate(-50%, 0%);
				width: 80%;
				margin-top: 5vh;
				border-radius: 2rem;
				color: white;
			}

			.button:hover {
				cursor: pointer;
			}

		</style>
	</head>
	<body>
		<div class="heading">
			Personal Information
		</div>

		<form action="PersonalInfo.php" method="post">
			<div class="formBox">
				<label class="myLabel">Name: </label><br>
				<input type="text" placeholder="Name" class="myInput" name="name">
                <label class="myLabel">Profession: </label>
				<input type="text" placeholder="Profession" class="myInput" name="profession">
				<label class="myLabel">Email: </label>
				<input type="email" placeholder="Email" class="myInput" name="email">
				<label class="myLabel">Phone: </label>
				<input type="text" placeholder="Phone" class="myInput" name="phone">
				<label class="myLabel">Address: </label>
				<input type="text" placeholder="Address" class="myInput" name="address">
				<input type="submit" value="Submit" class="button">
			</div>
		</form>
        
         <?php
            
            if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['profession']))
            {
                
                $_SESSION["name"] = $_POST['name'];
                $_SESSION["email"] = $_POST['email'];
                $_SESSION["phone"] = $_POST['phone'];
                $_SESSION["address"] = $_POST['address'];
                $_SESSION["profession"] = $_POST['profession'];
                
                header("Location: Education.php");
                exit();
            }
            else
            {
                #echo "Variables not set";
            }
        ?>

	</body>
</html>