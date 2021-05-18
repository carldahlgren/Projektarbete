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
    <script defer src="sign in script.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
    echo "<form class='redirect' method='POST' action='login.php'>
    <button>Login</button>
    </form>";

  
    echo "<div class='logsign-box'>
        <form id='signInForm' class='logsign-formbox' method='POST' action='".setUserSignup()."'>

            <h1>Sign Up!</h1>

            <div class='form-control'>
            <label for='username'>Username:</label><br>
            <input type='text' name='username' id='signInUsername'><br>
            <small>Error message</small><br>
            </div>

            <div class='form-control'>
            <label for='email'>Email:</label><br>
            <input type='text' name='email' id='email'> <br>
            <small>Error message</small><br>
            </div>

            <div class='form-control'>
            <label for='password'>Password:</label><br>
            <input type='password' name='password' id='password'><br>
            <small>Error message</small><br>
            </div>

            <div class='form-control'>
            <label for='passwordMatch'>Retype Password:</label><br>
            <input type='password' name='passwordMatch' id='passwordMatch'><br>
            <small>Error message</small><br>
            </div>

            <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>

            <button type='submit' name='userSubmit'>Submit</button>
    </form>
    </div>";
    
?>
</body>
</html>