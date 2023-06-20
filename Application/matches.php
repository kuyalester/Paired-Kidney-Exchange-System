<?php include("common.php"); ?>

<!-- This section finds matches in patients and donors table -->
<?php 

    // patient1 = main patient
    // donor1 = main donor
    // patient2 = match patient
    // donor2 = match donor

    // A piece of the query for donor matching
    // select match donors with compatible HLA typing to the main patient
    function donorMatchingQuery($patientHLAtyping){
        return "AND donors.donor_HLA_typing NOT LIKE '%$patientHLAtyping[0]%'
                AND donors.donor_HLA_typing NOT LIKE '%$patientHLAtyping[1]%'
                AND donors.donor_HLA_typing NOT LIKE '%$patientHLAtyping[2]%'
                AND donors.donor_HLA_typing NOT LIKE '%$patientHLAtyping[3]%'
                AND donors.donor_HLA_typing NOT LIKE '%$patientHLAtyping[4]%'
                AND donors.donor_HLA_typing NOT LIKE '%$patientHLAtyping[5]%'";
    }

    // A piece of the query for patient matching
    // select match patients with compatible HLA typing to the main donor
    function patientMatchingQuery($donorHLAtyping){
        return "AND patients.patient_HLA_typing NOT LIKE '%$donorHLAtyping[0]%'
                AND patients.patient_HLA_typing NOT LIKE '%$donorHLAtyping[1]%'
                AND patients.patient_HLA_typing NOT LIKE '%$donorHLAtyping[2]%'
                AND patients.patient_HLA_typing NOT LIKE '%$donorHLAtyping[3]%'
                AND patients.patient_HLA_typing NOT LIKE '%$donorHLAtyping[4]%'
                AND patients.patient_HLA_typing NOT LIKE '%$donorHLAtyping[5]%'";
    }

    //Select the family of donors with blood type AND HLA typing match
    if($patientBloodType == "O"){
        if($donorBloodType == "O"){
            $getMatchFamilies = "SELECT * 
                            FROM families INNER JOIN donors INNER JOIN patients INNER JOIN hospitals
                            ON families.donor_ID=donors.donor_id AND families.patient_ID=patients.patient_id 
                            AND families.hospital_ID=hospitals.hospital_id
                            WHERE donors.donor_blood_type='O'
                            " . donorMatchingQuery($patientHLAtyping) 
                            . "AND (patients.patient_blood_type='O' 
                            OR patients.patient_blood_type='A'
                            OR patients.patient_blood_type='B'
                            OR patients.patient_blood_type='AB')    
                            " . patientMatchingQuery($donorHLAtyping);
            $matchFamilies_rows = $database->query($getMatchFamilies);
        }else if($donorBloodType == "A"){
            $getMatchFamilies = "SELECT * 
                            FROM families INNER JOIN donors INNER JOIN patients INNER JOIN hospitals
                            ON families.donor_ID=donors.donor_id AND families.patient_ID=patients.patient_id AND families.hospital_ID=hospitals.hospital_id
                            WHERE donors.donor_blood_type='O'
                            " . donorMatchingQuery($patientHLAtyping) 
                            . "AND (patients.patient_blood_type='A'
                            OR patients.patient_blood_type='AB')    
                            " . patientMatchingQuery($donorHLAtyping);
            $matchFamilies_rows = $database->query($getMatchFamilies);
        }else if($donorBloodType == "B"){
            $getMatchFamilies = "SELECT * 
                            FROM families INNER JOIN donors INNER JOIN patients INNER JOIN hospitals
                            ON families.donor_ID=donors.donor_id AND families.patient_ID=patients.patient_id AND families.hospital_ID=hospitals.hospital_id
                            WHERE donors.donor_blood_type='O'
                            " . donorMatchingQuery($patientHLAtyping) 
                            . "AND (patients.patient_blood_type='B'
                            OR patients.patient_blood_type='AB')   
                            " . patientMatchingQuery($donorHLAtyping);
            $matchFamilies_rows = $database->query($getMatchFamilies);
        }else{
            $getMatchFamilies = "SELECT * 
                            FROM families INNER JOIN donors INNER JOIN patients INNER JOIN hospitals
                            ON families.donor_ID=donors.donor_id AND families.patient_ID=patients.patient_id AND families.hospital_ID=hospitals.hospital_id
                            WHERE donors.donor_blood_type='O'
                            " . donorMatchingQuery($patientHLAtyping) 
                            . "AND patients.patient_blood_type='AB'    
                            " . patientMatchingQuery($donorHLAtyping);
            $matchFamilies_rows = $database->query($getMatchFamilies);
        }
    }else if($patientBloodType == "A"){
        if($donorBloodType == "O"){
            $getMatchFamilies = "SELECT * 
                            FROM families INNER JOIN donors INNER JOIN patients INNER JOIN hospitals
                            ON families.donor_ID=donors.donor_id AND families.patient_ID=patients.patient_id AND families.hospital_ID=hospitals.hospital_id
                            WHERE (donors.donor_blood_type='O' OR donors.donor_blood_type='A')
                            " . donorMatchingQuery($patientHLAtyping) 
                            . "AND (patients.patient_blood_type='O' 
                            OR patients.patient_blood_type='A'
                            OR patients.patient_blood_type='B'
                            OR patients.patient_blood_type='AB')    
                            " . patientMatchingQuery($donorHLAtyping);
            $matchFamilies_rows = $database->query($getMatchFamilies);
        }else if($donorBloodType == "A"){
            $getMatchFamilies = "SELECT * 
                            FROM families INNER JOIN donors INNER JOIN patients INNER JOIN hospitals
                            ON families.donor_ID=donors.donor_id AND families.patient_ID=patients.patient_id AND families.hospital_ID=hospitals.hospital_id
                            WHERE (donors.donor_blood_type='O' OR donors.donor_blood_type='A')
                            " . donorMatchingQuery($patientHLAtyping) 
                            . "AND (patients.patient_blood_type='A'
                            OR patients.patient_blood_type='AB')    
                            " . patientMatchingQuery($donorHLAtyping);
            $matchFamilies_rows = $database->query($getMatchFamilies);
        }else if($donorBloodType == "B"){
            $getMatchFamilies = "SELECT * 
                            FROM families INNER JOIN donors INNER JOIN patients INNER JOIN hospitals
                            ON families.donor_ID=donors.donor_id AND families.patient_ID=patients.patient_id AND families.hospital_ID=hospitals.hospital_id
                            WHERE (donors.donor_blood_type='O' OR donors.donor_blood_type='A')
                            " . donorMatchingQuery($patientHLAtyping) 
                            . "AND (patients.patient_blood_type='B'
                            OR patients.patient_blood_type='AB')    
                            " . patientMatchingQuery($donorHLAtyping);
            $matchFamilies_rows = $database->query($getMatchFamilies);
        }else{
            $getMatchFamilies = "SELECT * 
                            FROM families INNER JOIN donors INNER JOIN patients INNER JOIN hospitals
                            ON families.donor_ID=donors.donor_id AND families.patient_ID=patients.patient_id AND families.hospital_ID=hospitals.hospital_id
                            WHERE (donors.donor_blood_type='O' OR donors.donor_blood_type='A')
                            " . donorMatchingQuery($patientHLAtyping) 
                            . "AND patients.patient_blood_type='AB'    
                            " . patientMatchingQuery($donorHLAtyping);
            $matchFamilies_rows = $database->query($getMatchFamilies);
        }
    }else if($patientBloodType == "B"){
        if($donorBloodType == "O"){
            $getMatchFamilies = "SELECT * 
                            FROM families INNER JOIN donors INNER JOIN patients INNER JOIN hospitals
                            ON families.donor_ID=donors.donor_id AND families.patient_ID=patients.patient_id AND families.hospital_ID=hospitals.hospital_id
                            WHERE (donors.donor_blood_type='O' OR donors.donor_blood_type='B')
                            " . donorMatchingQuery($patientHLAtyping) 
                            . "AND (patients.patient_blood_type='O' 
                            OR patients.patient_blood_type='A'
                            OR patients.patient_blood_type='B'
                            OR patients.patient_blood_type='AB')   
                            " . patientMatchingQuery($donorHLAtyping);
            $matchFamilies_rows = $database->query($getMatchFamilies);
        }else if($donorBloodType == "A"){
            $getMatchFamilies = "SELECT * 
                            FROM families INNER JOIN donors INNER JOIN patients INNER JOIN hospitals
                            ON families.donor_ID=donors.donor_id AND families.patient_ID=patients.patient_id AND families.hospital_ID=hospitals.hospital_id
                            WHERE (donors.donor_blood_type='O' OR donors.donor_blood_type='B')
                            " . donorMatchingQuery($patientHLAtyping) 
                            . "AND (patients.patient_blood_type='A'
                            OR patients.patient_blood_type='AB')    
                            " . patientMatchingQuery($donorHLAtyping);
            $matchFamilies_rows = $database->query($getMatchFamilies);
        }else if($donorBloodType == "B"){
            $getMatchFamilies = "SELECT * 
                            FROM families INNER JOIN donors INNER JOIN patients INNER JOIN hospitals
                            ON families.donor_ID=donors.donor_id AND families.patient_ID=patients.patient_id AND families.hospital_ID=hospitals.hospital_id
                            WHERE (donors.donor_blood_type='O' OR donors.donor_blood_type='B')
                            " . donorMatchingQuery($patientHLAtyping) 
                            . "AND (patients.patient_blood_type='B' 
                            OR patients.patient_blood_type='AB')    
                            " . patientMatchingQuery($donorHLAtyping);
            $matchFamilies_rows = $database->query($getMatchFamilies);
        }else{
            $getMatchFamilies = "SELECT * 
                            FROM families INNER JOIN donors INNER JOIN patients INNER JOIN hospitals
                            ON families.donor_ID=donors.donor_id AND families.patient_ID=patients.patient_id AND families.hospital_ID=hospitals.hospital_id
                            WHERE (donors.donor_blood_type='O' OR donors.donor_blood_type='B')
                            " . donorMatchingQuery($patientHLAtyping) 
                            . "AND patients.patient_blood_type='AB'    
                            " . patientMatchingQuery($donorHLAtyping);
            $matchFamilies_rows = $database->query($getMatchFamilies);
        }
    }else{
        if($donorBloodType == "O"){
            $getMatchFamilies = "SELECT * 
                            FROM families INNER JOIN donors INNER JOIN patients INNER JOIN hospitals
                            ON families.donor_ID=donors.donor_id AND families.patient_ID=patients.patient_id AND families.hospital_ID=hospitals.hospital_id
                            WHERE (donors.donor_blood_type='O' OR donors.donor_blood_type='A'
                            OR donors.donor_blood_type='B' OR donors.donor_blood_type='AB')
                            " . donorMatchingQuery($patientHLAtyping) 
                            . "AND (patients.patient_blood_type='O' 
                            OR patients.patient_blood_type='A'
                            OR patients.patient_blood_type='B'
                            OR patients.patient_blood_type='AB')   
                            " . patientMatchingQuery($donorHLAtyping);
            $matchFamilies_rows = $database->query($getMatchFamilies);
        }else if($donorBloodType == "A"){
            $getMatchFamilies = "SELECT * 
                            FROM families INNER JOIN donors INNER JOIN patients INNER JOIN hospitals
                            ON families.donor_ID=donors.donor_id AND families.patient_ID=patients.patient_id AND families.hospital_ID=hospitals.hospital_id
                            WHERE (donors.donor_blood_type='O' OR donors.donor_blood_type='A'
                            OR donors.donor_blood_type='B' OR donors.donor_blood_type='AB')
                            " . donorMatchingQuery($patientHLAtyping) 
                            . "AND (patients.patient_blood_type='A'
                            OR patients.patient_blood_type='AB')    
                            " . patientMatchingQuery($donorHLAtyping);
            $matchFamilies_rows = $database->query($getMatchFamilies);
        }else if($donorBloodType == "B"){
            $getMatchFamilies = "SELECT * 
                            FROM families INNER JOIN donors INNER JOIN patients INNER JOIN hospitals
                            ON families.donor_ID=donors.donor_id AND families.patient_ID=patients.patient_id AND families.hospital_ID=hospitals.hospital_id
                            WHERE (donors.donor_blood_type='O' OR donors.donor_blood_type='A'
                            OR donors.donor_blood_type='B' OR donors.donor_blood_type='AB')
                            " . donorMatchingQuery($patientHLAtyping) 
                            . "AND (patients.patient_blood_type='B'
                            OR patients.patient_blood_type='AB')   
                            " . patientMatchingQuery($donorHLAtyping);
            $matchFamilies_rows = $database->query($getMatchFamilies);
        }else{
            $getMatchFamilies = "SELECT * 
                            FROM families INNER JOIN donors INNER JOIN patients INNER JOIN hospitals
                            ON families.donor_ID=donors.donor_id AND families.patient_ID=patients.patient_id AND families.hospital_ID=hospitals.hospital_id
                            WHERE (donors.donor_blood_type='O' OR donors.donor_blood_type='A'
                            OR donors.donor_blood_type='B' OR donors.donor_blood_type='AB')
                            " . donorMatchingQuery($patientHLAtyping) 
                            . "AND patients.patient_blood_type='AB'    
                            " . patientMatchingQuery($donorHLAtyping);
            $matchFamilies_rows = $database->query($getMatchFamilies);
        }
    }

    //store informations of matched families into arrays
    $matchFamilyNames = array();
    $matchFamilyHospitals = array();

    $matchpatientNames = array();
    $matchpatientSexes = array();
    $matchpatientBloodTypes = array();
    $matchpatientHLAtypings= array();

    $matchdonorNames = array();
    $matchdonorSexes = array();
    $matchdonorBloodTypes = array();
    $matchdonorHLAtypings= array();

    foreach($matchFamilies_rows as $matchFamilies_row){
        array_push($matchFamilyNames, $matchFamilies_row["family_name"]);
        array_push($matchFamilyHospitals, $matchFamilies_row["hospital_name"]);

        array_push($matchpatientNames, $matchFamilies_row["patient_name"]);
        array_push($matchpatientSexes, $matchFamilies_row["patient_sex"]);
        array_push($matchpatientBloodTypes, $matchFamilies_row["patient_blood_type"]);
        array_push($matchpatientHLAtypings, $matchFamilies_row["patient_HLA_typing"]);

        array_push($matchdonorNames, $matchFamilies_row["donor_name"]);
        array_push($matchdonorSexes, $matchFamilies_row["donor_sex"]);
        array_push($matchdonorBloodTypes, $matchFamilies_row["donor_blood_type"]);
        array_push($matchdonorHLAtypings, $matchFamilies_row["donor_HLA_typing"]);
    }
?>

<!-- This section prints the results -->
<?php
    $matchNumber = 0;

    foreach($matchFamilyNames as $matchFamilyName){

    $matchNumber++;

    $matchFamilyName = array_pop($matchFamilyNames);
    $matchFamilyHospital = array_pop($matchFamilyHospitals);

    $matchpatientName = array_pop($matchpatientNames);
    $matchpatientSex = array_pop($matchpatientSexes);
    $matchpatientBloodType = array_pop($matchpatientBloodTypes);
    $matchpatientHLAtyping = array_pop($matchpatientHLAtypings);

    $matchdonorName = array_pop($matchdonorNames);
    $matchdonorSex = array_pop($matchdonorSexes);
    $matchdonorBloodType = array_pop($matchdonorBloodTypes);
    $matchdonorHLAtyping = array_pop($matchdonorHLAtypings);

?>

    <h2>Match <?= "$matchNumber for $familyName"?> Family </h2>

    <div id="match-box">
        <div class="family-box">
            <div class="family">
                <p>Family: <?= $familyName ?> </p>
                <p>Hospital: <?= $hospitalName ?> </p>
            </div>
            <br>
            <div class="patient">
                <p>Name: <?= $patientName ?> </p>
                <p>Sex: <?= $patientSex ?> </p>
                <p>BloodType: <?= $patientBloodType ?> </p>
                <p>HLA Typing: <?= $patientHLAtyping ?> </p>
            </div>
            <br>
            <div class="donor">
                <p>Name: <?= $donorName ?> </p>
                <p>Sex: <?= $donorSex ?> </p>
                <p>BloodType: <?= $donorBloodType ?> </p>
                <p>HLA Typing: <?= $donorHLAtyping ?> </p>
            </div>
        </div>

        <div class="family-box">
            <div class="family">
                <p>Family: <?= $matchFamilyName ?> </p>
                <p>Hospital: <?= $matchFamilyHospital ?> </p>
            </div>
            <br>
            <div class="patient">
                <p>Name: <?= $matchpatientName ?> </p>
                <p>Sex: <?= $matchpatientSex ?> </p>
                <p>BloodType: <?= $matchpatientBloodType ?> </p>
                <p>HLA Typing: <?= $matchpatientHLAtyping ?> </p>
            </div>
            <br>
            <div class="donor">
                <p>Name: <?= $matchdonorName ?> </p>
                <p>Sex: <?= $matchdonorSex ?> </p>
                <p>BloodType: <?= $matchdonorBloodType ?> </p>
                <p>HLA Typing: <?= $matchdonorHLAtyping ?> </p>
            </div>
        </div>
    </div>
   
    <!-- remove this part later -->
    <p>.</p>
    <p>.</p>
    <p>.</p>
    <p>.</p>
    
<?php 
    } 
?>
