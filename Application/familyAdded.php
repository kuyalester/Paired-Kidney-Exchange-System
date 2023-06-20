<?php session_start(); ?>
<?php include("top.html"); ?>

<?php 
    //Store the information from the form to variables
    $familyName = $_POST["Pname"];

    $patientName = $_POST["Pname"];
    $patientSex = $_POST["Psex"];
    $patientBloodType = $_POST["PbloodType"];
    $patientHLA = $_POST["Phla"];

    $donorName = $_POST["Dname"];
    $donorSex = $_POST["Dsex"];
    $donorBloodType = $_POST["DbloodType"];
    $donorHLA = $_POST["Dhla"];
?>

<?php include("common.php"); ?>   

<?php
    //get the last patient's id and last donor's id
    $get_ID = "SELECT patient_ID, donor_ID
            FROM families
            ORDER BY patient_ID DESC
            LIMIT 1";
    $lastID_rows = $database->query($get_ID);

    $lastPatientID = null;
    $lastDonorID = null;
    foreach($lastID_rows as $lastID_row){
        $lastPatientID = $lastID_row["patient_ID"];
        $lastDonorID = $lastID_row["donor_ID"];
        
    }

    $lastPatientID++;
    $lastDonorID++;

    //insert values to database 
    $stmt = "INSERT INTO families 
            VALUES (:name, :patient_ID, :donor_ID, :hospital_ID)";
    $addFamily = $database->prepare($stmt);
    $addFamily->execute(['name' =>  $familyName, 'patient_ID' =>  $lastPatientID, 'donor_ID' =>  $lastDonorID , 'hospital_ID' =>  $_SESSION["hospital_ID"]]);

    $stmt2 = "INSERT INTO patients (patient_name, patient_sex, patient_blood_type, patient_HLA_typing)
    VALUES (:patient_name, :patient_sex, :patient_blood_type, :patient_HLA_typing)";
    $addPatient = $database->prepare($stmt2);
    $addPatient->execute(['patient_name' =>  $patientName, 'patient_sex' => $patientSex, 'patient_blood_type' =>  $patientBloodType, 'patient_HLA_typing' =>  $patientHLA]);

    $stmt3 = "INSERT INTO donors (donor_name, donor_sex, donor_blood_type, donor_HLA_typing)
    VALUES (:donor_name, :donor_sex, :donor_blood_type, :donor_HLA_typing)";
    $addDonor = $database->prepare($stmt3);
    $addDonor->execute(['donor_name' =>  $donorName, 'donor_sex' => $donorSex, 'donor_blood_type' =>  $donorBloodType, 'donor_HLA_typing' =>  $donorHLA]);

?>
    <!-- Back to menu form -->
    <form action="home.php" method="get">
        <Label>
            <input type="submit" value="Back to Menu"> <br>
        </Label>
    </form>

<?php include("bottom.html"); ?>