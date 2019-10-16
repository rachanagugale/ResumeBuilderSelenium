<?php
    include("connect.php");
    session_start();
    error_reporting(0);
?>

<html>
    <head>
        <title>Data Choice</title>
        <link href="https://fonts.googleapis.com/css?family=Signika&display=swap" rel="stylesheet">
        <link href="style.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <div class="heading" style="margin-top: 7rem;">
			Which data do you want to use?
		</div>
        
        <form action="dataChoice.php" method="post">
            <input type="submit" value="Use Old Data" class="button1" name="old">
        </form>
        
        <form action="dataChoice.php" method="post">
            <input type="submit" value="Enter New Data" class="button1" name="new">
        </form>
        
        <?php
            
            if(isset($_POST["old"]))
            {
                $_SESSION["dataChoice"] = 1;
                header("Location: Home.php");
                exit();   
            }
            else if(isset($_POST["new"]))
            {
                $_SESSION["dataChoice"] = 2;
                $username = $_SESSION['username'];
                $query = "delete from userDetails where username='$username'";

                $res = mysqli_query($conn, $query);
                if($res)
                {
                    header("Location: Home.php");
                    exit();
                }
            }
        ?>
    </body>
</html>