<?php session_start(); ?>
<?php include("top.html"); ?>
<?php include("common.php"); ?>

<?php

    $hospital_ID = $_SESSION["hospital_ID"]; 
    $hospitalPassword = $_SESSION["password"];

    //Get the name of the hospital from the database
    $getHospital_ID = "SELECT hospital_name
            FROM hospitals
            WHERE hospitals.hospital_id=$hospital_ID";
    $hospitalID_rows = $database->query($getHospital_ID);

    foreach($hospitalID_rows as $hospitalID_row){
        $hospitalName = $hospitalID_row["hospital_name"];
    }
?>

    <h2><?=$hospitalName?></h2>

    <div id="add-logout">
        <!-- Add Family Form -->
        <form action="addFamily.php" class="options">
            <Label>
                <input type="submit" value="Add Family" id="add">
            </Label>
        </form>
        
        <!-- Log out Form -->
        <form action="index.php" class="options">
            <Label>
                <input type="submit" value="Log out" id="logout"> 
            </Label>
        </form>
    </div>


    <!-- Search Family Form -->
    <form action="home.php" method="get" id="search">
        <Label>
            <input type="text" name="search"> 
            <input type="submit" value="Search Family">
        </Label>
    </form>

    <div id="home">

<?php

    //check if delete button was pressed
    if(isset($_POST["delete"])){
        //get the name of the family to be removed from database
        $name = $_POST["name"];

        //query for select the family from database
        $stmt = "DELETE families, patients, donors
            FROM families INNER JOIN patients INNER JOIN donors
            ON families.donor_ID=donors.donor_id AND families.patient_ID=patients.patient_id
            WHERE families.family_name=:name";
        $deleteFamily = $database->prepare($stmt);
        $deleteFamily->execute([":name" => $name]);
    }

    //check if search family button was pressed
    if(isset($_GET["search"])){
        //Select families from a given string
        $search = $_GET["search"];
        $getFamilies = "SELECT family_name
                FROM families
                WHERE families.family_name LIKE '%$search%'
                AND families.hospital_ID=$hospital_ID
                ORDER BY family_name";
        $family_rows = $database->query($getFamilies);
    }else{
        //Select all families 
        $getFamilies = "SELECT family_name
                FROM families
                WHERE families.hospital_ID=$hospital_ID
                ORDER BY family_name";
        $family_rows = $database->query($getFamilies);
    }

    // View all selected families
    foreach($family_rows as $family_row){
?>
    <form action="handleEvent.php" method="get" class="table">
        <input type="text" name="family_name" value="<?= $family_row["family_name"] ?>" readonly> 
        <input type="submit" name="edit" value="Edit Family"> 
        <input type="submit" name="view" value="View Matches"> 
    </form>
<?php 
    } 
?>
    </div>

<?php include("bottom.html"); ?>