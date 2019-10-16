<?php
    include("connect.php");
    session_start();
    error_reporting(0);
    $username = $_SESSION['username'];

    $query = "select * from userDetails where username='$username';";

    $res = mysqli_query($conn, $query);

    $table = mysqli_fetch_assoc($res);
    $fileString = file_get_contents("resumeTemplate.html");
    $skills = $table['skills'];
    $skillsArr = explode(',', $skills);
    $skillsString = "<ul>";
            
    foreach($skillsArr as $iter)
    {
        $skillsString = $skillsString."<li>".$iter."</li> ";
    }

    $skillsString = $skillsString."</ul>";

    $vars = array(
      '_name' => $table['name'],
      '_profession' => $table['profession'],
      '_address' => $table['address'],
        '_email' => $table['email'],
      '_phone' => $table['phone'],
      '_school' => $table['school'],
        '_juniorCollege' => $table['juniorCollege'],
      '_university' => $table['university'],
      '_cgpa' => $table['cgpa'],
        '_SSCPercent' => $table['sscPercent'],
      '_HSCPercent' => $table['hscPercent'],
      '_skills' => $skillsString,
        '_coverLetter' => $table['coverLetter']
    );

    $fileString = strtr($fileString, $vars);


    $outputFile = fopen("resume.html", "w") or die("Unable to open file!");
    fwrite($outputFile, $fileString);
    fclose($outputFile);
    header("Location: resume.html");
    exit();
?>

