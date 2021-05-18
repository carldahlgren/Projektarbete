<?php   
session_start();
    date_default_timezone_set('Europe/Stockholm');
    include 'dbh.inc.php';
    include 'users.inc.php';
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script defer src="login script.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

echo "<form class='redirect' method='POST' action='signup.php'>
     <button>signup</button>
     </form>";


     echo "<div class='logsign-box'>
    <form id='loginForm' class='logsign-formbox' id=loginForm method='POST' action='".getUserLogin($conn)."'>
            <h1>Login</h1>
            <div class='form-control'>
        <label for='username'>Username:</label><br>
        <input type='text' name='username' id='loginUsername'><br>
        <small>Error message</small><br>
        </div>

        <div class='form-control'>
        <label for='username'>Password:</label><br>
        <input type='password' name='password' id='loginPassword'><br>
        <small>Error message</small><br>
        </div>

        <button type='submit' name='userLogin'>Login</button>
        
    </form>
    </div>";
    
?>
</body>
</html>