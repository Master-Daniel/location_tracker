<?php
// Database connection details
$servername = "localhost";
$username = "location";
$password = "PNFjC+nU3A2GENaq";
$dbname = "location_tracker";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process location data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    // Insert data into database
    $sql = "INSERT INTO device_locations (latitude, longitude, timestamp)
            VALUES ('$latitude', '$longitude', NOW())";

    if ($conn->query($sql) === TRUE) {
        // echo "Location saved successfully";
    } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
