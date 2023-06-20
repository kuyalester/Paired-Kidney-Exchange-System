# Paired-Kidney-Exchange-System
A web application that enables hospitals to search for compatible kidney donors within a database, facilitating potential kidney swaps for patients whose original donors are incompatible.

1. Import paired_kindey_exhange.sql to your database, then change the $user and $password in the common.php file to match your computer.

2. Log in to the website by putting the hospital id of a hospital and its password. We created 67 hospital accounts for this website, the 
    hospital ID of the first hospital account is '300000001', and the last with the hospital ID of '300000067'. The password for all the
    hospital accounts is 'password'.

3. Once logged in you can see a list of families admitted to that hospital and different button options.

    Add family - add a family record to the hospital, it will ask for the patient's information and the donor's information. (it will add the family to the database)
    Delete family - delete the selected family from the hospital. (it will delete the family from the database)
    Search family - searches a family in the hospital based on the given string. 
    Edit family - edit/update the information of the selected family from the hospital. (it will update the family from the database)
    Match family - Searches for matches for the family in the database, then display all the matches for that family.
    Log out - log out from the hospital account, will go back to index.html once logged out.


A demo recording on how to set-up and use the web app can be accessed here: https://drive.google.com/drive/folders/1XWONbeRKWdRs377-BKoYZlak5HXq13sa?usp=drive_link
