<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    // Perform validation and sanitization of form inputs

    // Process the form data (you can add your own logic here)
    $servername = "localhost:3306";
    $username = "omaopcom_root";
    $password = "16@Kehinde123";
    $database = "omaopcom_root";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create the table if it doesn't exist
    $createTableQuery = "CREATE TABLE IF NOT EXISTS form_response (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        phone VARCHAR(20) NOT NULL,
        message TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    if ($conn->query($createTableQuery) === TRUE) {
        // Table created successfully, proceed with inserting the form data
        
        // Prepare the insert statement
        $insertQuery = "INSERT INTO form_response(name, email, phone, message) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ssss", $name, $email, $phone, $message);
        
        if ($stmt->execute()) {
            echo "Form data saved successfully.";
        } else {
            echo "Error inserting data: " . $stmt->error;
        }
        
        // Close the statement
        $stmt->close();
    } else {
        echo "Error creating table: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
