<?php
include_once 'dbconnect.php';
include_once 'user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

echo "<h2>Users List:</h2>";
$users = $user->read();

if (count($users) > 0) {
    echo "<ul>";
    foreach ($users as $userData) {
        echo "<li>ID: " . $userData['id'] . ", Username: " . $userData['username'] . ", Email: " . $userData['email'] . "</li>";
    }
    echo "</ul>";
} else {
    echo "No users found.";
}
?>
