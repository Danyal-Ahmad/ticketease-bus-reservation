<?php
session_start();

// Handle form submission for new record insertion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email_name'])) {
    // Handle form submission and database insertion
    $_SESSION['email_name'] = $_POST['email_name'];
    $_SESSION['myText'] = $_POST['myText'];
    $_SESSION['cardNumber_name'] = $_POST['cardNumber_name'];
    $_SESSION['dt'] = date("Y-m-d H:i:s");

    $mysqli = new mysqli('localhost', 'root', '', 'online_bus');
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Generate unique ticket number
    $timestamp = time();
    $unique_part = uniqid();
    $ticketNo = $timestamp . $unique_part;

    $_SESSION['ticket_number'] = $ticketNo;

    // Prepare SQL statement for insertion
    $stmt = $mysqli->prepare("INSERT INTO passenger_records (ticket_number, bus_name, seat_number, bus_fare, bus_route, bus_class, passenger_name, passenger_gender, contact_number, passenger_email, passenger_address, age, card_number, booking_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die('Error preparing statement: ' . $mysqli->error);
    }

    // Bind parameters and execute insertion
    $ticketNumber = $_SESSION['ticket_number'];
    $busName = $_SESSION['bsnm']; // Replace with actual session variable name
    $seatNumber = $_SESSION['seat']; // Replace with actual session variable name
    $busFare = $_SESSION["fph"]; // Replace with actual session variable name
    $busRoute = $_SESSION['frm'] . ' to ' . $_SESSION['to']; // Replace with actual session variable name
    $busClass = $_SESSION["buss_class"]; // Replace with actual session variable name
    $passengerName = $_SESSION['pname']; // Replace with actual session variable name
    $passengerGender = $_POST['genderId']; // Assuming it comes from form POST data
    $contactNumber = $_SESSION['pconno']; // Replace with actual session variable name
    $passengerEmail = $_SESSION['email_name'];
    $passengerAddress = $_SESSION['myText'];
    $age = $_SESSION['page']; // Replace with actual session variable name
    $cardNumber = $_SESSION['cardNumber_name'];
    $bookingDate = $_SESSION['dt'];

    $stmt->bind_param('ssisssssssssss', $ticketNumber, $busName, $seatNumber, $busFare, $busRoute, $busClass, $passengerName, $passengerGender, $contactNumber, $passengerEmail, $passengerAddress, $age, $cardNumber, $bookingDate);

    $stmt->execute();

    // Check if insertion was successful
    if ($stmt->affected_rows <= 0) {
        echo "Error: Unable to process payment. " . $stmt->error;
        $stmt->close();
        $mysqli->close();
        exit();
    }

    // Success message
    echo "Payment processed successfully.";
    $stmt->close();
    $mysqli->close();

    // Redirect to ticket page or display further instructions
    header("Location: ticket_page.php");
    exit();
}

// Database connection for fetching and deleting records
$mysqli = new mysqli('localhost', 'root', '', 'online_bus');
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if delete request is made
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['record_id'])) {
    $record_id = $_POST['record_id'];

    $stmt = $mysqli->prepare("DELETE FROM passenger_records WHERE id = ?");
    if ($stmt === false) {
        die('Error preparing delete statement: ' . $mysqli->error);
    }

    $stmt->bind_param('i', $record_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // Record deleted successfully, redirect to prevent resubmission
        $stmt->close();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Error: Unable to delete record. " . $stmt->error;
    }

    $stmt->close();
}

// Fetch all passenger records
$sql = "SELECT * FROM passenger_records";
$result = $mysqli->query($sql);

if ($result === false) {
    die('Error executing query: ' . $mysqli->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passenger Records</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha256-KJ6Bni4CIlHpUPdbLg9cC65SzkQXsvF+DmaL+INdPTk=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/passenger_records.css">
</head>
<body>
<div id="container_bg"></div>

<header>
    <ul class="naviagtion">
        <li><a href="manage_bus.php">BUS RECORDS</a></li>
        <li><a href="login_page.php">LOGIN</a></li>
    </ul>
</header>
        
<div class="bus_list_table">
    <h2>Passenger Records</h2>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ticket Number</th>
                    <th>Passenger Name</th>
                    <th>Passenger Age</th>
                    <th>Gender</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Bus Name</th>
                    <th>Bus Class</th>
                    <th>Bus Fare</th>
                    <th>Seat Number</th>
                    <th>Bus Route</th>
                    <th>Booking Date</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['ticket_number']); ?></td>
                        <td><?php echo htmlspecialchars($row['passenger_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['age']); ?></td>
                        <td><?php echo htmlspecialchars($row['passenger_gender']); ?></td>
                        <td><?php echo htmlspecialchars($row['contact_number']); ?></td>
                        <td><?php echo htmlspecialchars($row['passenger_email']); ?></td>
                        <td><?php echo htmlspecialchars($row['passenger_address']); ?></td>
                        <td><?php echo htmlspecialchars($row['bus_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['bus_class']); ?></td>
                        <td><?php echo htmlspecialchars($row['bus_fare']); ?></td>
                        <td><?php echo htmlspecialchars($row['seat_number']); ?></td>
                        <td><?php echo htmlspecialchars($row['bus_route']); ?></td>
                        <td><?php echo htmlspecialchars($row['booking_date']); ?></td>
                        <td>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return confirm('Are you sure you want to delete this record?');">
                                <input type="hidden" name="record_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                <button type="submit" class="delete-btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>

        </table>
        <form id="resequence-form" action="passenger_resequence.php" class="resequence-form" method="post">
        <button type="submit">Re-sequence IDs</button>
    </form>
    <?php else: ?>
        <p>No records found.</p>
    <?php endif; ?>
</div>
  
<div class="navigation_menu_align">
    <ul class="social_navigation">
        <li><a href="https://www.facebook.com" class="facebook"><i id="social_icon" class="fa fa-facebook"></i>&nbsp;Facebook</a></li>
        <li><a href="https://www.instagram.com" class="instagram"><i id="social_icon" class="fa fa-instagram"></i>&nbsp;Instagram</a></li>
        <li><a href="https://www.x.com" class="twitter"><i id="social_icon" class="fa-regular fa-x"></i>&nbsp;Twitter</a></li>
    </ul>
</div>

</body>
</html>

<?php
$mysqli->close();
?>
