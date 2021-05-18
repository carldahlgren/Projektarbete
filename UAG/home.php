<?php
session_start();
    date_default_timezone_set('Europe/Stockholm');
    include 'dbh.inc.php';
    include 'home.inc.php';

    if(!$_SESSION['uid']){
        header("location:login.php");
    }
    $username = getUsername($_SESSION['uid'], $conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    <script defer src="comment script.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <?php echo "<form class='redirect' method='POST' action='logout.php'>
        <button>Logout</button>
        </form>";
    ?>
  
  <div class='container'>
        <div class='header'>
            <h2>Welcome <?php echo $username ?></h2>
        </div>
        <?php echo "<form id='Form' class='form' method='POST' action=''>
            
            <input type='hidden' name='username' placeholder='Enter username' id='username' value=$username />

           

            <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
            
         
        </form>
        </div>";
  
        echo "<div class='comment-container'>";
        ?>
</div>
</body>
</html>

