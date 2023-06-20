<?php include("top.html"); ?>

<div id="signup" class="form">

    <form action="familyAdded.php" method="post">

        <!-- Patient's Information Section -->
        <p class="header">Patient's Information</p> 
        <div class="input-section">
            <label>
                <span class="text">Name:</span> 
                <input type="text" name="Pname" placeholder="Name" style="width: 14em" required class="textfield"/> 
            </label> <br>

            <label>
                <span class="text">Sex:</span> 
                <input type="radio" name="Psex" value="M" checked="checked" class="textfield"/>Male
                <input type="radio" name="Psex" value="F" class="textfield"/>Female
            </label> <br>

            <label>
                <span class="text">Blood type:</span> 
                <input type="radio" name="PbloodType" value="O" checked="checked" class="textfield"/>Type O 
                <input type="radio" name="PbloodType" value="A" class="textfield"/>Type A 
                <input type="radio" name="PbloodType" value="B" class="textfield"/>Type B 
                <input type="radio" name="PbloodType" value="AB" class="textfield"/>Type AB 
            </label> <br>

            <label>
                <span class="text">HLA Typing:</span> 
                <input type="text" name="Phla"  minlength="6" maxlength="6" placeholder="HLA" style="width: 14em" required class="textfield"/> 
            </label> <br><br><br>
        </div>
        
        
        <!-- Donor's Information Section -->
        <p class="header">Donor's Information</p>

        <div class="input-section">
            <label>
                <span class="text">Name:</span> 
                <input type="text" name="Dname" placeholder="Name" style="width: 14em" required class="textfield"/> 
            </label> <br>

            <label>
                <span class="text">Sex:</span> 
                <input type="radio" name="Dsex" value="M" checked="checked" class="textfield"/>Male
                <input type="radio" name="Dsex" value="F" class="textfield"/>Female
            </label> <br>

            <label>
                <span class="text">Blood type:</span> 
                <input type="radio" name="DbloodType" value="O" checked="checked" class="textfield"/>Type O 
                <input type="radio" name="DbloodType" value="A" class="textfield"/>Type A 
                <input type="radio" name="DbloodType" value="B" class="textfield"/>Type B 
                <input type="radio" name="DbloodType" value="AB" class="textfield"/>Type AB 
            </label> <br>

            <label>
                <span class="text">HLA Typing:</span> 
                <input type="text" name="Dhla"  minlength="6" maxlength="6" placeholder="HLA" style="width: 14em" required class="textfield"/> 
            </label> <br><br>
        </div>

        <input type="submit" value="Add Family" style="width: 14em"/>
    </form>
</div>

<?php include("bottom.html"); ?>