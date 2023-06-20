<?php session_start(); ?>
<?php include("top.html"); ?>

<?php
    include("common.php");

    //get the name of the family to view matches
    $name = $_GET["family_name"];

    //query for select the family from database
    $getFamily = "SELECT *
            FROM families
            WHERE families.family_name='$name'";
    $family_rows = $database->query($getFamily);

    //store main family information 
    $familyName = null;
    $patient_ID = null;
    $donor_ID = null;
    $hospital_ID = null;
    foreach($family_rows as $family_row){
        $familyName = $family_row["family_name"];
        $patient_ID = $family_row["patient_ID"];
        $donor_ID = $family_row["donor_ID"];
        $hospital_ID = $family_row["hospital_ID"];
    }

    //get the information of the main patient
    $getPatientInfo = "SELECT * 
                    FROM patients
                    WHERE patients.patient_id=$patient_ID";
    $patientInfo_rows = $database->query($getPatientInfo);

    //store main patient information
    $patientName = null;
    $patientSex = null;
    $patientBloodType = null;
    $patientHLAtyping;
    foreach($patientInfo_rows as $patientInfo_row){
        $patientName = $patientInfo_row["patient_name"];
        $patientSex = $patientInfo_row["patient_sex"];
        $patientBloodType = $patientInfo_row["patient_blood_type"];
        $patientHLAtyping = $patientInfo_row["patient_HLA_typing"];
    }

    //get the information of the main donor
    $getDonorInfo = "SELECT * 
                    FROM donors
                    WHERE donors.donor_id=$donor_ID";
    $donorInfo_rows = $database->query($getDonorInfo);

    //store main donor information
    $donorName = null;
    $donorSex = null;
    $donorBloodType = null;
    $donorHLAtyping;
    foreach($donorInfo_rows as $donorInfo_row){
        $donorName = $donorInfo_row["donor_name"];
        $donorSex = $donorInfo_row["donor_sex"];
        $donorBloodType = $donorInfo_row["donor_blood_type"];
        $donorHLAtyping = $donorInfo_row["donor_HLA_typing"];
    }

    //query for select the family from database
    $getHospital = "SELECT *
                FROM hospitals
                WHERE hospital_id=$hospital_ID";
    $hospital_rows = $database->query($getHospital);

    //store hospital information 
    $hospitalName = null;
    $hospitalRegion = null;
    $hospitalAddress = null;
    foreach($hospital_rows as $hospital_row){
        $hospitalName = $hospital_row["hospital_name"];
        $hospitalRegion = $hospital_row["hospital_region"];
        $hospitalAddress = $hospital_row["hospital_address"];
    }

    if(isset($_GET["view"])){
        include("matches.php");
    }else{
        include("editFamily.php");
    }
?>

<?php include("bottom.html"); ?>