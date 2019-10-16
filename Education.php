<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Education</title>
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
			Educational Details
		</div>

		<form action="Education.php" method="post">
			<div class="formBox">
				<label class="myLabel">School: </label><br>
				<input type="text" placeholder="School Name" class="myInput" name="school">
				<label class="myLabel">SSC Percentage: </label>
				<input type="text" placeholder="SSC Percentage" class="myInput" name="sscPercent">
				<label class="myLabel">Junior College: </label>
				<input type="text" placeholder="College name" class="myInput" name="juniorCollege">
				<label class="myLabel">HSC Percentage: </label>
				<input type="text" placeholder="HSC Percentage" class="myInput" name="hscPercent">
				<label class="myLabel">University: </label>
				<input type="text" placeholder="University Name" class="myInput" name="university">
				<label class="myLabel">CGPA: </label>
				<input type="text" placeholder="CGPA" class="myInput" name="cgpa">
				<input type="submit" value="Submit" class="button">
			</div>
		</form>
        
        <?php
        
            if(isset($_POST['school']) && isset($_POST['sscPercent']) && isset($_POST['juniorCollege']) && isset($_POST['hscPercent']) && isset($_POST['university']) && isset($_POST['cgpa']))
            {
                $_SESSION["school"] = $_POST['school'];
                $_SESSION["sscPercent"] = $_POST['sscPercent'];
                $_SESSION["juniorCollege"] = $_POST['juniorCollege'];
                $_SESSION["hscPercent"] = $_POST['hscPercent'];
                $_SESSION["university"] = $_POST['university']; 
                $_SESSION["cgpa"] = $_POST['cgpa'];
                header("Location: Skills.php");
                exit();
            }
            else
            {
                #echo "Variables not set";
            }
        ?>
	</body>
</html>