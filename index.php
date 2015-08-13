

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="logowanie-style.css" media="all">
    </head>

    <body>
        <div id="panel">
            <form method="post" >
                <label for="username">Nazwa użytkownika:</label>
                <input type="text" id="username" name="username">
                <label for="password">Hasło:</label>
                <input type="password" id="password" name="password">
                <div id="lower">
                    <input type="submit" value="Login">
                </div>
            </form>
        </div>

    </body>

</html>

<?php
include_once('logowanie.php');
      
$valid_login_name = new Logowanie();
$valid_login_name->login_in_if_correct();
//                
