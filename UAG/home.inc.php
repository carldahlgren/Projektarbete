<?php

function getUsername($uid, $conn) {
    
    $sql = "SELECT * FROM users WHERE uid=?";
    
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed";
    } else {
        //bindparameters to the placeholder
       mysqli_stmt_bind_param($stmt, "s", $uid);
        //run parameters inside database
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while($row = mysqli_fetch_assoc($result)){
            
                return $row['username'];
        }
    }   
}