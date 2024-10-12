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

        // Database credentials
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

        // Prepare a SQL statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM books WHERE title LIKE ?");
        $searchParam = "%" . $searchQuery . "%";
        $stmt->bind_param("s", $searchParam);
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
            echo "No results found for: " . htmlspecialchars($searchQuery);
        }

        // Close the prepared statement and database connection
        $stmt->close();
        $conn->close();
    }
    ?>

    <h3>Database Connection</h3>    
    <ul>
        <li>Step 1: Create the Database and Table</li>
        <p>Run the following SQL commands to set up the database and table:</p>
        <code>
            -- Create the database<br>
            CREATE DATABASE search_db;<br>
            -- Use the database<br>
            USE search_db;<br>
            -- Create a sample table<br>
            CREATE TABLE books (<br>
            id INT AUTO_INCREMENT PRIMARY KEY,<br>
            title VARCHAR(255) NOT NULL,<br>
            author VARCHAR(255) NOT NULL,<br>
            year_published YEAR NOT NULL<br>
            );<br>
            -- Insert some sample data<br>
            INSERT INTO books (title, author, year_published) VALUES<br>
            ('PHP for Beginners', 'John Doe', 2020),<br>
            ('Advanced PHP Programming', 'Jane Smith', 2019),<br>
            ('Learning MySQL', 'Alex Johnson', 2018),<br>
            ('Web Development with PHP and MySQL', 'Emily Davis', 2021);
        </code>
        <li>Step 2: PHP Code for Database Search Using $_GET</li>
        <p>Below is a PHP script that connects to the database and allows you to search for book titles using a query parameter.</p>
        <a href="search.txt">Source Code</a>
    </ul>

    <h3>Explanation:</h3>
    <p>
        <strong>Database Connection:</strong><br>
        The PHP script connects to the MySQL database using mysqli. Replace localhost, root, and the password with your actual database connection credentials.
    </p>
    <p>
        <strong>SQL Query:</strong><br>
        The script uses a SELECT statement to search the books table for titles that match the query input using LIKE '%$searchQuery%'.
    </p>
    <p>
        <strong>Displaying Results:</strong><br>
        If any matching book titles are found, they are displayed in a list format. If no results are found, a message is displayed instead.
    </p>
    <p>
        <strong>Step 3: Run and Test the Code:</strong><br>
        Host the PHP file on a local or remote server with MySQL installed. Visit the page in a browser and enter a book title (e.g., "PHP") in the search box. You should see results from the books table that match the search term.
    </p>
</body>
</html>
