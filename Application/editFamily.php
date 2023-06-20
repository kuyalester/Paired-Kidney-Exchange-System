<?php   
    $PsexM_Ischeck = "unchecked";
    $PsexF_Ischeck = "unchecked";
    $PbloodtypeO_Ischeck = "unchecked";
    $PbloodtypeA_Ischeck = "unchecked";
    $PbloodtypeB_Ischeck = "unchecked";
    $PbloodtypeAB_Ischeck = "unchecked";

    $DsexM_Ischeck = "unchecked";
    $DsexF_Ischeck = "unchecked";
    $DbloodtypeO_Ischeck = "unchecked";
    $DbloodtypeA_Ischeck = "unchecked";
    $DbloodtypeB_Ischeck = "unchecked";
    $DbloodtypeAB_Ischeck = "unchecked";

    if($patientSex == 'M'){
        $PsexM_Ischeck = "checked";
    }else{
        $PsexF_Ischeck = "checked";
    }
    
    if($patientBloodType == 'O'){
        $PbloodtypeO_Ischeck = "checked";
    }else if($patientBloodType == 'A'){
        $PbloodtypeAB_Ischeck = "checked";
    }else if($patientBloodType == 'B'){
        $PbloodtypeB_Ischeck = "checked";
    }else{
        $PbloodtypeAB_Ischeck = "checked";
    }

    if($donorSex == 'M'){
        $DsexM_Ischeck = "checked";
    }else{
        $DsexF_Ischeck = "checked";
    }

    if($donorBloodType == 'O'){
        $DbloodtypeO_Ischeck = "checked";
    }else if($donorBloodType == 'A'){
        $DbloodtypeAB_Ischeck = "checked";
    }else if($donorBloodType == 'B'){
        $DbloodtypeB_Ischeck = "checked";
    }else{
        $DbloodtypeAB_Ischeck = "checked";
    }
?>

<div class="form">

    <form action="saveFamily.php" method="post">
        <!-- General Information Section -->
        <input type="hidden" name="name" value="<?=$familyName?>"/> 
        <div class="input-section">
            <p class="header">General Information</p> 
            <label>
                <span class="text">Family:</span> 
                <input type="text" name="newName" value="<?=$familyName?>" required  class="textfield"/> 
            </label> <br>        
        </div>


        <!-- Patient's Information Section -->
        <p class="header">Patient's Information</p> 
        <div class="input-section">
            <label>
                <span class="text">Name:</span> 
                <input type="text" name="newPname" value="<?=$patientName?>" required class="textfield"/> 
            </label> <br>

            <label>
                <span class="text">Sex:</span> 
                <input type="radio" name="newPsex" value="M" <?=$PsexM_Ischeck?> class="textfield"/>Male
                <input type="radio" name="newPsex" value="F" <?=$PsexF_Ischeck?> class="textfield"/>Female
            </label> <br>

            <label>
                <span class="text">Blood type:</span> 
                <input type="radio" name="newPbloodType" value="O" <?=$PbloodtypeO_Ischeck?> class="textfield"/>Type O 
                <input type="radio" name="newPbloodType" value="A" <?=$PbloodtypeA_Ischeck?> class="textfield"/>Type A 
                <input type="radio" name="newPbloodType" value="B" <?=$PbloodtypeB_Ischeck?> class="textfield"/>Type B 
                <input type="radio" name="newPbloodType" value="AB" <?=$PbloodtypeAB_Ischeck?> class="textfield"/>Type AB 
            </label> <br>

            <label>
                <span class="text">HLA Typing:</span> 
                <input type="text" name="newPhla"  minlength="6" maxlength="6" value="<?=$patientHLAtyping?>" required class="textfield"/> 
            </label> <br><br><br>
        </div>
        
        <!-- Donor's Information Section -->
        <p class="header">Donor's Information</p> 

        <div class="input-section">
            <label>
                <span class="text">Name:</span> 
                <input type="text" name="newDname" value="<?=$donorName?>" required class="textfield"/> 
            </label> <br>

            <label>
                <span class="text">Sex:</span> 
                <input type="radio" name="newDsex" value="M" <?=$DsexM_Ischeck?> class="textfield"/>Male
                <input type="radio" name="newDsex" value="F" <?=$DsexF_Ischeck?>/>Female
            </label> <br>

            <label>
                <span class="text">Blood type:</span> 
                <input type="radio" name="newDbloodType" value="O" <?=$DbloodtypeO_Ischeck?> class="textfield"/>Type O 
                <input type="radio" name="newDbloodType" value="A" <?=$DbloodtypeA_Ischeck?>/>Type A 
                <input type="radio" name="newDbloodType" value="B" <?=$DbloodtypeB_Ischeck?>/>Type B 
                <input type="radio" name="newDbloodType" value="AB" <?=$DbloodtypeAB_Ischeck?>/>Type AB 
            </label> <br>

            <label>
                <span class="text">HLA Typing:</span> 
                <input type="text" name="newDhla"  minlength="6" maxlength="6" value="<?=$donorHLAtyping?>" required class="textfield"/> 
            </label> <br><br><br>
        </div>

        <input type="submit" name="edit" value="Save"/>
    </form>

    <form action="home.php" method="post">
        <Label>
            <input type="hidden" name="name" value="<?=$familyName?>"/> 
            <input type="submit" name="delete" value="Remove Family"> <br>
        </Label>
    </form>

</div>


