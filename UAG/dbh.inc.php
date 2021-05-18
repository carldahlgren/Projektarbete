<?php
$conn = mysqli_connect('localhost', 'root', '', 'commentsection');

if (!$conn) {
    die("Connection failed: ".mysqli_connects_error());
}