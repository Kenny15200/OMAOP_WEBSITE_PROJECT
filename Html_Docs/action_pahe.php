$servername = "localhost";
$username = "omaopcom_root";
$password = "16@Kehinde123";
$database = "omaopcom_root";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database, 3306);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Perform database operations

// Close the database connection
mysqli_close($conn);

