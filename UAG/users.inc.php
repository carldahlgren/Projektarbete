<?php


function setUserSignup($conn) {
   if(isset($_POST['userSubmit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordMatch = $_POST['passwordMatch'];
    $date = $_POST['date'];

    /*salt and hash*/
    $salt = hash('sha3-256', rand());
    $saltedpass = $password.$salt;
    $passhash = hash('sha3-256', $saltedpass);

    /*validate form on server side*/
    $validationbool = false;
    if (trim($username) === '' || trim($username) === null ) {
        echo "Username can not be blank";
    }  elseif(checkIfUsernameExists($username, $conn)){
        echo "This username already exists";
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
      }elseif(checkIfEmailExists($email, $conn)){
        echo "This email already exists";
    } elseif (strlen(trim($password)) < 8) {
        echo "Password needs to be 8 charachters or longer";
        } elseif(!($password === $passwordMatch)){
            echo "Passwords does not match";
        }else{
            $validationbool = true;
        }


    if($validationbool === false) {
        
    } else {     
        $sql = "INSERT INTO users (username, email, password, salt, date) 
        VALUES (?, ?, ?, ?, ?)";
    
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL error";
        } else {
            mysqli_stmt_bind_param($stmt, "sssss", $username, $email, $passhash, $salt, $date);
            mysqli_stmt_execute($stmt);

            echo "Sign Up Successful!";

            header('location: login.php');
        
        }
    }
   }  
}


function checkIfUsernameExists($username, $conn) {

    $sql = "SELECT * FROM users WHERE username=?";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed";
    } else {
        //bindparameters to the placeholder
       mysqli_stmt_bind_param($stmt, "s", $username);
        //run parameters inside database
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while($row = mysqli_fetch_assoc($result)){
            
                if(strlen(trim($row['username'])) < 0){
                    return false;
                } else{
                    return true;
                }
        }
        
    }   
}


function checkIfEmailExists($email, $conn) {

    $sql = "SELECT * FROM users WHERE email=?";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed";
    } else {
        //bindparameters to the placeholder
       mysqli_stmt_bind_param($stmt, "s", $email);
        //run parameters inside database
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while($row = mysqli_fetch_assoc($result)){
            
                if(strlen(trim($row['email'])) < 0){
                    return false;
                } else{
                    return true;
                }
        }
        
    }   
}


function getUserLogin($conn){
        if(isset($_POST['userLogin'])) {
            $username = $_POST['username'];
            $loginpassword = $_POST['password'];
            
            $sqlsalt = "SELECT * FROM users WHERE username=?;";
       
            $stmt = mysqli_stmt_init($conn);
        
            if(!mysqli_stmt_prepare($stmt, $sqlsalt)) {
                echo "SQL statement failed";
            } else {
        
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
        
                $row = mysqli_fetch_assoc($result);
                   
                        $salt = $row['salt'];
                        
                        $hashedloginpassword = hash('sha3-256', $loginpassword.$salt);
                        echo "<br><br>";
                   
                        if(!$hashedloginpassword == $row['password']){
                           echo "Login Failed!";
                        } else {
                            echo "Login Successfull!";
                            $_SESSION['uid'] = $row['uid'];
                            header("Location: home.php");
                            exit();
                        }

            }
           /*$sql = "SELECT * FROM users";
            //Create a prepared statement
            $stmt = mysqli_stmt_init($conn);
            //prepare the prepared statement
            if(!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL statement failed";
            } else {
                //bindparameters to the placeholder
                mysqli_stmt_bind_param($stmt, "s", $data);
                //run parameters inside database
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
        
                while($row = mysqli_fetch_assoc($result)){
                    echo "<div class='comment-box'><p>";
                        echo $row['uid']."<br>";
                        echo $row['date']."<br>";
                        echo nl2br($row['salt']);
                    echo "</p></div>";*/          
        }
    }


