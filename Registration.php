<?php
    include("connect.php");
    session_start();
    error_reporting(0);
?>

<html>
    <head>
        <title>Registration</title>
        <link href="https://fonts.googleapis.com/css?family=Signika&display=swap" rel="stylesheet">
        <link href="style.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <div class="heading">
			Register
		</div>
        
        <form action="Registration.php" method="post">
            <div class="formBox">
				<label class="myLabel">Username: </label><br>
				<input type="text" placeholder="Username" class="myInput" name="username">
                <label class="myLabel">Password: </label>
				<input type="password" placeholder="Password" class="myInput" name="password">
				<input type="submit" value="Submit" class="button">
			</div>
        </form>
        
        <p  class="links"><a href="Login.php">Already a user? Login</a></p>
        
        <?php
        
            if(isset($_POST["username"]) && isset($_POST["password"]))
            {
                $username = $_POST["username"];
                $password = $_POST["password"];


                $query = "insert into users values('$username', '$password');";

                $res = mysqli_query($conn, $query);

                if($res)
                {
                    $_SESSION["username"] = $username;
                    $_SESSION["password"] = $password;
                    $_SESSION["dataChoice"] = 2;
                    header("Location: Home.php");
                    exit();
                }
                else
                {
                    echo "<p>Username already exists</p>";
                }
            }
            
        ?>
    </body>
</html>