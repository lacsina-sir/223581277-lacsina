<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Database Search Example</title>
</head>
<body>
    <h1>Search Books in the Database</h1>
    
    <!-- A simple form that sends data via the GET method -->
    <form method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="search">Search for a book title:</label><br>
        <input type="text" id="search" name="query" required><br><br>
        <input type="submit" value="Search">
    </form>

    <?php
    // Check if the 'query' parameter is set in the URL
    if (isset($_GET['query'])) {
        // Retrieve and sanitize the input
        $searchQuery = htmlspecialchars($_GET['query']);

        // Connect to the database
        $servername = "localhost";
        $username = "root"; // Replace with your database username
        $password = "052781"; // Replace with your database password
        $dbname = "search_db"; // The database we created earlier

        // Create a connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare a SQL statement to search for book titles matching the query
        $sql = "SELECT * FROM books WHERE title LIKE ?";
        
        // Prepare the statement
        $stmt = $conn->prepare($sql);
        $likeQuery = '%' . $searchQuery . '%';
        $stmt->bind_param("s", $likeQuery); // "s" indicates the type (string)

        // Execute the statement
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if any results were found
        if ($result->num_rows > 0) {
            echo "<h2>Search Results:</h2>";
            echo "<ul>";

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<li>" . htmlspecialchars($row["title"]) . " by " . htmlspecialchars($row["author"]) . " (" . htmlspecialchars($row["year_published"]) . ")</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No results found for: " . htmlspecialchars($searchQuery) . "</p>";
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>
