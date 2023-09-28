<?php
include_once 'dbconnect.php';
include_once 'user.php';
include_once 'dataOperations.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = array(
        "username" => $_POST['username'],
        "email" => $_POST['email']
    );

    if ($user->create($data)) {
        
        header("Location: viewusers.php");
        exit; 
    } else {
        echo "Registration failed.";
    }
}
?>
