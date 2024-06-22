<?php
// Process location data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    // Write location data to a text file in the same directory
    $file = 'location.txt';
    $data = "Latitude: $latitude, Longitude: $longitude\n";

    if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX) !== false) {
        echo "Location saved to file successfully";
    } else {
        echo "Error saving location to file";
    }
}
?>
