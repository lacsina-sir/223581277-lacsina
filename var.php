<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Variables</title>
</head>
<body>
    <h1>Variable Declaration</h1>
    <p>Syntax: <code>$variableName = value;</code></p>

    <h3>String</h3>
    <?php
        $lastName = "Rizal";
        $firstName = "Jose";

        echo "<p>";
        echo "Last Name: " . htmlspecialchars($lastName) . "<br>";
        echo "First Name: " . htmlspecialchars($firstName) . "<br>";
        echo "My name is " . htmlspecialchars($firstName) . " " . htmlspecialchars($lastName);
        echo "</p>";
    ?>

    <h3>Integer</h3>
    <?php
        $num1 = 10; // Declare as integer
        $num2 = 20; // Declare as integer
        
        $sum = $num1 + $num2;
        echo "<p>The sum of {$num1} and {$num2} is: " . $sum . "</p>";
    ?>

    <h3>Boolean</h3>
    <?php
        $stat = true;  // Use lowercase true
        $stat2 = false; // Use lowercase false

        echo "<p>Status 1: " . ($stat ? 'True' : 'False') . "<br>";
        echo "Status 2: " . ($stat2 ? 'True' : 'False') . "</p>";
    ?>

    <h3>Float</h3>
    <?php 
        $grade = 74.5;
        $bonus = 1;
        $total = $grade + $bonus;
        echo "<p>Total Score: " . $total . "</p>";
    ?>

    <h3>Array</h3>
    <?php 
        $list = array('Name', 75, true);

        echo "<p>Array Elements:</p>";
        echo "<ul>";
        echo "<li>" . htmlspecialchars($list[0]) . "</li>";
        echo "<li>" . htmlspecialchars($list[1]) . "</li>";
        echo "<li>" . ($list[2] ? 'True' : 'False') . "</li>";
        echo "</ul>";
    ?>
</body>
</html>
