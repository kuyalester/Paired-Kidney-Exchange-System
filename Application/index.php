<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Paired Kindney Exchange</title>
    <meta charset="utf-8" />
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>

<body>

<?php include("common.php"); ?>

<?php
    $text = "";

    //check if there was already an instance of entry in the login form
    if(isset($_POST["hospital_ID"])){
        $_SESSION["hospital_ID"] = $_POST["hospital_ID"];
        $_SESSION["password"] = $_POST["password"];

        $hospital_ID =  $_SESSION["hospital_ID"];
        //query for select the family from database
        $getHospital = "SELECT *
                FROM hospitals
                WHERE hospitals.hospital_id=$hospital_ID";
        $hospitals = $database->query($getHospital);
        
        //check if hospital ID exist in the database
        if($hospitals -> rowCount() == 0){
            $text = "Hospital ID not in the database";
        }

        //check if the password of the given hospital id is correct
        else{
            foreach($hospitals as $hospital){
                $password =  $hospital["password"];
            }

            if($password != $_SESSION["password"]){
                $text = "Wrong password";
            }else{
                header("location: home.php");
            }
        }
    }
?> 

    <!-- Login form -->
    <div id="bg-image"></div>

    <div id="login">
        <form action="index.php" method="post">
            <input type="number" name="hospital_ID" placeholder="Hospital ID" style="width: 14em" required> <br>
            <input type="password" name="password" placeholder="password" style="width: 14em" required> <br>
            <input type="submit" value="login" style="width: 5em"> <br>
            <span><?=$text?></span>
        </form>
    </div>

</body>
</html>