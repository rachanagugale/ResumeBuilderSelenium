<?php
    include("connect.php");
    session_start();
    error_reporting(0);
?>

<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Skills</title>
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
				box-sizing: border-box;
				-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
				background: #e8eeef;
				color:#8a97a0;
				-webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
				box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
				margin: 20px auto 1rem;
				font-size: 15px;
				width: 20rem;
				height: 5rem;
			}

			.myInput:focus {
				background: #d2d9dd;
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
        
		<div class="heading">Cover Letter</div>
        
		<form action="CoverLetter.php" method="post">
			<div class="formBox">
				<input type="text" class="myInput" name="coverLetter">
				<input type="submit" value="Submit" class="button">
			</div>
		</form>
        
        <?php

        if($_POST["coverLetter"])
        {
            $username = $_SESSION["username"];
            $name = $_SESSION["name"];
            $profession = $_SESSION["profession"];
            $address = $_SESSION["address"];
            $phone = $_SESSION["phone"];
            $email = $_SESSION["email"];
            $school = $_SESSION["school"];
            $sscPercent = $_SESSION["sscPercent"];
            $juniorCollege = $_SESSION["juniorCollege"]; 
            $hscPercent = $_SESSION["hscPercent"];
            $university = $_SESSION["university"];
            $cgpa = $_SESSION["cgpa"];
            $skills = $_SESSION["skills"];
            $coverLetter = $_POST["coverLetter"];
            $skillsArr = explode(',', $skills);
            $skillsString = "<ul>";
            
            foreach($skillsArr as $iter)
            {
                $skillsString = $skillsString."<li>".$iter."</li> ";
            }
            
            $skillsString = $skillsString."</ul>";
                
            $query = "insert into userDetails values('$username', '$name', '$profession', '$address', '$phone', '$email', '$school', '$sscPercent', '$juniorCollege', '$hscPercent', '$university', '$cgpa', '$skills', '$coverLetter');";

                $res = mysqli_query($conn, $query);
                if($res)
                {
                    $fileString = file_get_contents("resumeTemplate.html");
                    $vars = array(
                      '_name' => $name,
                      '_profession' => $profession,
                      '_address' => $address,
                        '_email' => $email,
                      '_phone' => $phone,
                      '_school' => $school,
                        '_juniorCollege' => $juniorCollege,
                      '_university' => $university,
                      '_cgpa' => $cgpa,
                        '_SSCPercent' => $sscPercent,
                      '_HSCPercent' => $hscPercent,
                      '_skills' => $skillsString,
                        '_coverLetter' => $coverLetter
                    );
                    
                    $fileString = strtr($fileString, $vars);
                    
                    
                    $outputFile = fopen("resume.html", "w") or die("Unable to open file!");
                    fwrite($outputFile, $fileString);
                    fclose($outputFile);
                    header("Location: resume.html");
                    exit();
                    
                }
                else
                {
                    #echo "Insertion unsuccessful";
                }
        }
        
        
        ?>

	</body>
</html>