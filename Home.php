<?php
    session_start();
    error_reporting(0);
?>

<html>
    <head>
        <title>Choose Template</title>
        <link href="https://fonts.googleapis.com/css?family=Signika&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <style>
            body {
                margin: 0;
                background-image: linear-gradient(to right, #FF814F, #FC4D55) ;
            }

            h1 {
                position: sticky;
            }

            .heading {
                font-family: 'Signika', sans-serif;
                color: white;
                background-color: transparent;
                font-size: 8vh;
                text-align: center;
                padding-top: 5vh;
                padding-bottom: 2vh;
                margin: 0;
                font-weight: bolder;
                position: -webkit-sticky;
            }

            .button {
                background-color: white;
                border: none;
                color: #FC4D55;
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
            }

            .button:hover {
                opacity: 1;
                cursor: pointer;
            }


            .container {
                background-color: transparent;
                display: flex;
                align-items: center;
                padding: 0;
            }

            .imgContainer {
                margin: 15vh;
                background-color: transparent;
                align-items: center;
                align-content: center;
                flex-direction: column;
                width: 50%;
                height: 50%;

            }

            .image {
                /*
                margin: auto;
                width: 70%;
                height: 70%;
                */

                width: 100%;
                height: 100%;
                transition: 0.5s ease;

            }

            .image:hover {
                opacity: 0.3;
            }

        </style>
    </head>

    <body>
        <div class="heading">Choose a template</div>
        
        <form action="Home.php" method="post">
            <div class="container">
                <span class="imgContainer">
                    <img class="image" src="image1.png"/>
                    <button class="button" name="t1">Select Template</button>
                </span>

                <span class="imgContainer">
                    <img class="image" src="image2.png"/>
                    <button class="button" name="t2">Select Template</button>
                </span>

                <span class="imgContainer">
                    <img class="image" src="image3.png"/>
                    <button class="button" name="t3">Select Template</button>
                </span>

            </div>
        </form>
        
        <?php
            
        if(isset($_POST['t1']) || isset($_POST['t2']) || isset($_POST['t3']))
        {
            if(isset($_POST['t1']))
            {
                $_SESSION["template"] = 1;
            }
            else if(isset($_POST['t2']))
            {
                $_SESSION["template"] = 2;
            }
            else if(isset($_POST['t3']))
            {
                $_SESSION["template"] = 3;
            }
            
            $dataChoice = $_SESSION["dataChoice"];
            
            if($dataChoice == 1)
            {
                header("Location: retrieveData.php");
                exit();
            }
            else if($dataChoice == 2)
            {
                header("Location: PersonalInfo.php");
                exit();
            }
        }
        
        ?>
        
    </body>
</html>

