<?php include("common.php"); ?>

<form action="home.php" method="get">
    <Label>
        <input type="submit" value="Back to Menu"> <br>
    </Label>
</form>

<?php
    //Store the information from the form to variables

    $newfamilyName = $_POST["newName"];

    $newpatientName = $_POST["newPname"];
    $newpatientSex = $_POST["newPsex"];
    $newpatientBloodType = $_POST["newPbloodType"];
    $newpatientHLA = $_POST["newPhla"];

    $newdonorName = $_POST["newDname"];
    $newdonorSex = $_POST["newDsex"];
    $newdonorBloodType = $_POST["newDbloodType"];
    $newdonorHLA = $_POST["newDhla"];

    //get the name of the family to be edit from database
    $name = $_POST["name"];

    //query for update the family from database
    $stmt = "UPDATE families INNER JOIN patients INNER JOIN donors
        ON families.donor_ID=donors.donor_id 
        AND families.patient_ID=patients.patient_id
        SET families.family_name=:newFamilyName
        , patients.patient_name=:newPatientName
        , patients.patient_sex=:newPatientSex
        , patients.patient_blood_type=:newPatientBloodType
        , patients.patient_HLA_typing=:newPatientHLAtyping
        , donors.donor_name=:newDonorName
        , donors.donor_sex=:newDonorSex
        , donors.donor_blood_type=:newDonorBloodType
        , donors.donor_HLA_typing=:newDonorHLAtyping
        WHERE families.family_name=:name";
    $editFamily = $database->prepare($stmt);
    $editFamily->execute([":name" => $name, ":newFamilyName" => $newfamilyName
                        , ":newPatientName" => $newpatientName, ":newPatientSex" => $newpatientSex
                        , ":newPatientBloodType" => $newpatientBloodType, ":newPatientHLAtyping" => $newpatientHLA
                        , ":newDonorName" => $newdonorName, ":newDonorSex" => $newdonorSex
                        , ":newDonorBloodType" => $newdonorBloodType, ":newDonorHLAtyping" => $newdonorHLA]);
?>