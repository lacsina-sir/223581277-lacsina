<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Input Example</title>
</head>
<body>
    <h1>PHP Input Handling Example</h1>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="name">Enter your name:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="age">Enter your age:</label><br>
        <input type="number" id="age" name="age" required><br><br>
        
        <input type="submit" value="Submit">
    </form>

    <?php
    // Initialize variables for storing user input
    $name = $age = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize and validate the input
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);

        // Check if the inputs are valid
        if (!empty($name) && !empty($age)) {
            // Display the captured input
            echo "<h2>Your Input:</h2>";
            echo "Name: " . htmlspecialchars($name) . "<br>";
            echo "Age: " . htmlspecialchars($age) . "<br>";
        } else {
            echo "<h2>Please fill in both fields.</h2>";
        }
    }
    ?>

    <p>
        Explanation:<br>
        HTML Form: The form uses the POST method, and the action is set to the same PHP file, which allows the form data to be sent to itself for processing.
    </p>
    <p>
        Handling Input: The $_POST superglobal is used to capture the input from the name and age fields.<br>
        Sanitizing Input: The filter_input() function is used to sanitize user input effectively.<br>
        Validation: Required fields are enforced, ensuring no empty submission.
    </p>
    <p>
        Displaying Input: The captured input is then displayed back to the user. This is just one way to handle input in PHP. Depending on your use case, you may need to consider using additional validation and security measures.
    </p>
</body>
</html>
