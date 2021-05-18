<?php

function getUsername($uid, $conn) {
    
    $db = new SQLite3('./db/databas.db');
    $sql = "SELECT * FROM users WHERE uid=:uid";
    $stmt=$db->prepare($sql);
    $stmt->bindParam(':uid', $uid, SQLITE3_TEXT);
    $result = $stmt->execute();
    $row = $result->fetchArray(SQLITE3_TEXT);
    $db->close();
    return $row['username'];

}