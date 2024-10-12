<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Loops Activities</title>
</head>
<body>
    <h1>PHP Loops Activities</h1>

    <h2>Index</h2>
    <ul>
        <li><a href="#activity1">Activity 1: Number Counter</a></li>
        <li><a href="#activity2">Activity 2: Password Validator</a></li>
        <li><a href="#activity3">Activity 3: Multiplication Table</a></li>
        <li><a href="#activity4">Activity 4: Loop Control with Break and Continue</a></li>
        <li><a href="#activity5">Activity 5: Sum of Numbers</a></li>
        <li><a href="#activity6">Activity 6: Array Iteration with Foreach</a></li>
        <li><a href="#activity7">Activity 7: Key-Value Pairs with Foreach</a></li>
        <li><a href="#activity8">Activity 8: Factorial Calculator</a></li>
        <li><a href="#activity9">Activity 9: FizzBuzz Challenge</a></li>
        <li><a href="#activity10">Activity 10: Prime Number Checker</a></li>
        <li><a href="#activity11">Activity 11: Fibonacci Sequence</a></li>
        <li><a href="#activity12">Activity 12: Reverse a String</a></li>
    </ul>

    <h2 id="activity1">Activity 1: Number Counter</h2>
    <?php
    // Number Counter: Print numbers from 1 to 10
    $i = 1;
    while ($i <= 10) {
        echo $i . " ";
        $i++;
    }

    echo "<br>";

    // Print only even numbers between 1 and 20
    $i = 2;
    while ($i <= 20) {
        echo $i . " ";
        $i += 2;
    }
    ?>

    <h2 id="activity2">Activity 2: Password Validator</h2>
    <?php
    // Password Validator: Use a do...while loop for user validation
    $password = '';
    do {
        $password = readline("Please enter the password: ");
        if ($password != "password123") {
            echo "Incorrect password.\n";
        }
    } while ($password != "password123");
    echo "Access Granted.";
    ?>

    <h2 id="activity3">Activity 3: Multiplication Table</h2>
    <?php
    // Multiplication Table: Display the multiplication table of 7
    for ($i = 1; $i <= 10; $i++) {
        echo "7 x $i = " . (7 * $i) . "<br>";
    }
    ?>

    <h2 id="activity4">Activity 4: Loop Control with Break and Continue</h2>
    <?php
    // Print numbers from 1 to 10, skip 5, and stop at 8
    for ($i = 1; $i <= 10; $i++) {
        if ($i == 5) {
            continue; // Skip number 5
        }
        if ($i == 9) {
            break; // Stop the loop at 8
        }
        echo $i . " ";
    }
    ?>

    <h2 id="activity5">Activity 5: Sum of Numbers</h2>
    <?php
    // Calculate the sum of all numbers from 1 to 100
    $sum = 0;
    $i = 1;
    while ($i <= 100) {
        $sum += $i;
        $i++;
    }
    echo "The sum of numbers from 1 to 100 is: $sum";
    ?>

    <h2 id="activity6">Activity 6: Array Iteration with Foreach</h2>
    <?php
    // Array Iteration: Favorite movies
    $movies = array("The Shawshank Redemption", "Inception", "The Dark Knight", "Interstellar", "Parasite");
    foreach ($movies as $index => $movie) {
        echo ($index + 1) . ". " . $movie . "<br>";
    }
    ?>

    <h2 id="activity7">Activity 7: Key-Value Pairs with Foreach</h2>
    <?php
    // Key-Value Pairs: Student information
    $student = array(
        "Name" => "Alice",
        "Age" => 20,
        "Grade" => "A",
        "City" => "Baguio"
    );
    foreach ($student as $key => $value) {
        echo "$key: $value<br>";
    }
    ?>

    <h2 id="activity8">Activity 8: Factorial Calculator</h2>
    <?php
    // Factorial Calculator
    $number = 5; // Change this number for different results
    $factorial = 1;
    for ($i = 1; $i <= $number; $i++) {
        $factorial *= $i;
    }
    echo "Factorial of $number is: $factorial";
    ?>

    <h2 id="activity9">Activity 9: FizzBuzz Challenge</h2>
    <?php
    // FizzBuzz Challenge
    for ($i = 1; $i <= 50; $i++) {
        if ($i % 3 == 0 && $i % 5 == 0) {
            echo "FizzBuzz ";
        } elseif ($i % 3 == 0) {
            echo "Fizz ";
        } elseif ($i % 5 == 0) {
            echo "Buzz ";
        } else {
            echo $i . " ";
        }
    }
    ?>

    <h2 id="activity10">Activity 10: Prime Number Checker</h2>
    <?php
    // Prime Number Checker
    $num = 17; // Change this number for different results
    $isPrime = true;
    if ($num < 2) {
        $isPrime = false;
    } else {
        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i == 0) {
                $isPrime = false;
                break;
            }
        }
    }
    echo "$num is " . ($isPrime ? "a prime number." : "not a prime number.");
    ?>

    <h2 id="activity11">Activity 11: Fibonacci Sequence</h2>
    <?php
    // Fibonacci Sequence
    $n = 10; // Number of Fibonacci numbers to generate
    $fib = [0, 1];
    for ($i = 2; $i < $n; $i++) {
        $fib[] = $fib[$i - 1] + $fib[$i - 2];
    }
    echo implode(" ", $fib);
    ?>

    <h2 id="activity12">Activity 12: Reverse a String</h2>
    <?php
    // Reverse a String
    $string = "Hello";
    $reversedString = "";
    for ($i = strlen($string) - 1; $i >= 0; $i--) {
        $reversedString .= $string[$i];
    }
    echo "Input: \"$string\"<br>";
    echo "Output: \"$reversedString\"";
    ?>
</body>
</html>
