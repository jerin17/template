<?php 
@$conn = mysqli_connect('localhost','root','seoul','template');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>