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

        // Prepare SQL statement with parameters
        $sql = "INSERT INTO device_locations (latitude, longitude, timestamp) VALUES (?, ?, NOW())";

        // Create prepared statement
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Bind parameters to the statement
            $stmt->bind_param("dd", $latitude, $longitude);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Location saved successfully";
            } else {
                echo "Error executing statement: " . $stmt->error;
            }
        } else {
            echo "Error preparing statement: " . $conn->error;
        }

        // Close statement
        $stmt->close();
    }
?>
