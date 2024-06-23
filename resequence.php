<?php
// Connect to your database
$mysqli = new mysqli('localhost', 'root', '', 'online_bus');

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// SQL statement to re-sequence id_bus
$sql = "SET @num := 0;
        UPDATE bus_details SET id_bus = @num := @num + 1;
        ALTER TABLE bus_details AUTO_INCREMENT = 1;";

if ($mysqli->multi_query($sql)) {
    // IDs re-sequenced successfully
    $mysqli->close();
    // Redirect back to the previous page
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
} else {
    echo "Error re-sequencing IDs: " . $mysqli->error;
}

$mysqli->close();
?>
