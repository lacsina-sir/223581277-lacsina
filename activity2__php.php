<?php

$correctPassword = "password123";

$userPassword = "";

do {
    $userPassword = readline("Please enter your password: ");
    
    if ($userPassword !== $correctPassword) {
        echo "incorrect password. please try again.\n";
    }
} while ($userPassword !== $correctPassword);

// Once the correct password is entered
echo "access granted.\n";
?>