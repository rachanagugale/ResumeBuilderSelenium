<?php
    include("connect.php");
    session_start();
    error_reporting(0);
?>

<html>
    <head>
        <title>Login</title>
        <link href="https://fonts.googleapis.com/css?family=Signika&display=swap" rel="stylesheet">
        <link href="style.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <div class="heading">
			Login
		</div>
        
        <form action="Login.php" method="post">
            <div class="formBox">
				<label class="myLabel">Username: </label><br>
				<input type="text" placeholder="Username" class="myInput" name="username">
                <label class="myLabel">Password: </label>
				<input type="password" placeholder="Password" class="myInput" name="password">
				<input type="submit" value="Submit" class="button">
			</div>
        </form>
        
        <p class="links"><a href="Registration.php">Not a user? Register here</a></p>
        
        <?php
        
            if(isset($_POST["username"]) && isset($_POST["password"]))
            {
                $username = $_POST["username"];
                $password = $_POST["password"];


                $query = "select * from users where username='$username';";

                $res = mysqli_query($conn, $query);
                $no_of_rows = mysqli_num_rows($res);

                    if($no_of_rows == 0)
                    {
                        echo "<p>Invalid username</p>";
                    }
                    else
                    {
                        $table = mysqli_fetch_assoc($res);
                        if($table['pass'] == $password)
                        {
                            $_SESSION["username"] = $username;
                            $_SESSION["password"] = $password;
                            
                            $query1 = "select * from userDetails where username='$username';";
                            $res1 = mysqli_query($conn, $query1);
                            
                            if($res1)
                            {
                                header("Location: dataChoice.php");
                                exit();
                            }
                            else
                            {
                                header("Location: Home.php");
                                exit();
                            }                   
                            
                        }
                        else
                        {
                            echo "<p>Invalid password</p>";
                        }
                    }
            }
            
        ?>
    </body>
</html>