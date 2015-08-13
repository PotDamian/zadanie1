

<?php

include_once('../wyswietlanie_tab.php');
include_once('../logowanie.php');
include_once('../sesja.php');

$database = new Db();
$database->check_what_is_clicked();
//$database->bind(':lname', 'Smith')
$sesja = new Sesja();
?>


<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8" />
        <style type="text/css">

            tr:nth-child(odd) {background: red;} // odnosi się do nieparzystych elementów,
            tr:nth-child(even) {background: green;} //odnosi się do parzystych elementów.
        </style>
    </head> 
     <body>
         <form method="get">
             <label for="search">Szukaj</label>
             <input type="text"  name="search">
             <input type="submit" value="Szukaj">
         </form>
         <form method="get">
             <label for="sort">Sortuj</label>
             <input type="radio" name="sort" id="sort" value="sort"><br>
             <input type="submit" value="Sortuj">
         </form>

        <a href="../logout.php">Wyloguj się</a>
    </body>
</html>
