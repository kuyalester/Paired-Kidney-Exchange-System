      
<?php
    try {
        $user = 'root'; 
        $password = '';  

        //connect mysql database (kidneyexchange)
        $database = new PDO("mysql:host=localhost;dbname=kidneyexchange", $user, $password);
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $ex) {
?>
        <p>Sorry, a database error occurred. Please try again later.</p>
        <p>(Error details: <?= $ex->getMessage() ?>)</p>
<?php
    }
?>