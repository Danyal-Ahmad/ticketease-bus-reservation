<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha256-KJ6Bni4CIlHpUPdbLg9cC65SzkQXsvF+DmaL+INdPTk=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Admin Dashboard - Manage Bus Details</title>
    <link rel="stylesheet" href="CSS/manage_bus.css">
</head>

<body>
    <div id="container_bg"></div>

    <header>
        <ul class="naviagtion">
            <li><a href="passenger_records.php">PASSENGER RECORDS</a></li>
            <li><a href="login_page.php">LOGIN</a></li>
        </ul>
    </header>

    <div class="add-bus-group">
        <div class="bus_cricle"><i class="fa fa-plus" style="font-size: 60px;" aria-hidden="true"></i></div> <br>
        <h2>Add Bus Details</h2>
        <form id="add-bus-form" method="post">
            <div class="form-group">
                <label for="bus-name">Bus Name</label> <br>
                <input type="text" id="bus-name" value="FM - " name="bus_name" required>
            </div>
            <div class="form-group">
                <label for="source">Source</label> <br>
                <input type="text" id="source" name="source" required>
            </div>
            <div class="form-group">
                <label for="destination">Destination</label> <br>
                <input type="text" id="destination" name="destination" required>
            </div>
            <div class="form-group">
                <label for="seats-available">Seats Available</label> <br>
                <input type="number" min="0" id="seats-available" name="seats_available" required>
            </div>
            <div class="form-group">
                <label for="bus-class">Bus Class</label> <br>
                <select id="bus-class" name="bus_class" required>
                    <option value="executive">Executive</option>
                    <option value="business">Business</option>
                    <option value="VVIP">VVIP</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fare">Fare</label> <br>
                <input type="number" min="0" id="fare" name="fare" required>
            </div>
            <div class="form-group">
                <label for="travel-duration">Travel Duration</label> <br>
                <div style="display: flex; width: 300px">
                    <select id="travel-hours" name="travel_hours" style="flex: 1; margin-right: 10px;" required>
                        <?php
                        for ($i = 0; $i <= 24; $i++) {
                            printf("<option value='%s'>%02d H</option>", $i . 'H', $i);
                        }
                        ?>
                    </select>
                    <select id="travel-minutes" name="travel_minutes" style="flex: 1;" required>
                        <?php
                        for ($i = 0; $i <= 60; $i++) {
                            printf("<option value='%s'>%02d M</option>", $i . 'M', $i);
                        }
                        ?>
                    </select>
                </div>
            </div>
            <button type="submit">Add Bus</button>
        </form>
    </div>

    <div class="update-bus-group">
        <div class="bus_cricle"><i class="fas fa-pencil-alt" style="font-size: 60px;" aria-hidden="true"></i></div> <br>
        <h2>Update Bus Details</h2>
        <form id="update-bus-form" method="post">
            <div class="form-group">
                <label for="update-bus-id">Bus ID</label>
                <input type="number" id="update-bus-id" name="update_bus_id" required>
            </div>
            <div class="form-group">
                <label for="update-type">Update Type</label>
                <select id="update-type" name="update_type" required>
                    <option value="fare">Update Fare</option>
                    <option value="seats_available">Update Seats Available</option>
                </select>
            </div>
            <div class="form-group">
                <label for="update-value">New Value</label>
                <input type="number" min="0" id="update-value" name="update_value" required>
            </div>
            <button type="submit">Update</button>
        </form>
    </div>

    <div class="remove-bus-group">
        <br>
        <h2>Remove Bus Details</h2>
        <form id="remove-bus-form" method="post">
            <div class="form-group">
                <label for="delete-bus-id">Bus ID</label> <br>
                <input type="number" min="0" id="delete-bus-id" name="delete_bus" required>
            </div>
            <button type="submit">Remove Bus</button>
            </div>
            
        </form>
        
       
   <center>
    <div class="bus_list_table">
        <table>
            <thead>
                <tr>
                    <th>Bus ID</th>
                    <th>Bus Name</th>
                    <th>Source</th>
                    <th>Destination</th>
                    <th>Seats Available</th>
                    <th>Bus Class</th>
                    <th>Fare</th>
                    <th>Travel Duration</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // PHP code for fetching and displaying bus details
                $success_message = '';
                $error_message = '';

                // Handle form submission to add new bus
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['bus_name'])) {
                    $mysqli = new mysqli('localhost', 'root', '', 'online_bus');

                    if ($mysqli->connect_error) {
                        die("Connection failed: " . $mysqli->connect_error);
                    }

                    $busName = $_POST['bus_name'];
                    $source = $_POST['source'];
                    $destination = $_POST['destination'];
                    $seatsAvailable = $_POST['seats_available'];
                    $busClass = $_POST['bus_class'];
                    $fare = $_POST['fare'];
                    $travelHours = $_POST['travel_hours'];
                    $travelMinutes = $_POST['travel_minutes'];

                    $travelDuration = $travelHours . ' ' . $travelMinutes;

                    $stmt = $mysqli->prepare("INSERT INTO bus_details (bus_name, source, destination, seats_available, bus_class, fare, travel_duration) VALUES (?, ?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param('sssisds', $busName, $source, $destination, $seatsAvailable, $busClass, $fare, $travelDuration);

                    if ($stmt->execute()) {
                        $success_message = "Bus added successfully.";
                    } else {
                        $error_message = "Error adding bus: " . $stmt->error;
                    }

                    $stmt->close();
                    $mysqli->close();
                }

                // Handle form submission to update fare or seats available
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_bus_id'])) {
                    $mysqli = new mysqli('localhost', 'root', '', 'online_bus');

                    if ($mysqli->connect_error) {
                        die("Connection failed: " . $mysqli->connect_error);
                    }

                    $busId = $_POST['update_bus_id'];
                    $updateType = $_POST['update_type'];
                    $updateValue = $_POST['update_value'];

                    $stmt = null;
                    if ($updateType == 'fare') {
                        $stmt = $mysqli->prepare("UPDATE bus_details SET fare = ? WHERE id_bus = ?");
                        $stmt->bind_param('di', $updateValue, $busId);
                    } elseif ($updateType == 'seats_available') {
                        $stmt = $mysqli->prepare("UPDATE bus_details SET seats_available = ? WHERE id_bus = ?");
                        $stmt->bind_param('ii', $updateValue, $busId);
                    }

                    if ($stmt && $stmt->execute()) {
                        $success_message = "Bus details updated successfully.";
                    } else {
                        $error_message = "Error updating bus details: " . $stmt->error;
                    }

                    $stmt->close();
                    $mysqli->close();
                }

                // Handle form submission to remove bus
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_bus'])) {
                    $mysqli = new mysqli('localhost', 'root', '', 'online_bus');

                    if ($mysqli->connect_error) {
                        die("Connection failed: " . $mysqli->connect_error);
                    }

                    $busId = $_POST['delete_bus'];

                    $stmt = $mysqli->prepare("DELETE FROM bus_details WHERE id_bus = ?");
                    $stmt->bind_param('i', $busId);

                    if ($stmt->execute()) {
                        $success_message = "Bus removed successfully.";
                    } else {
                        $error_message = "Error removing bus: " . $stmt->error;
                    }

                    $stmt->close();
                    $mysqli->close();
                }

                // Display success or error messages
                if (!empty($success_message)) {
                    echo "<p class='success-message'>$success_message</p>";
                }
                if (!empty($error_message)) {
                    echo "<p class='error-message'>$error_message</p>";
                }

                // Fetch and display bus details
                $mysqli = new mysqli('localhost', 'root', '', 'online_bus');

                if ($mysqli->connect_error) {
                    die("Connection failed: " . $mysqli->connect_error);
                }

                $result = $mysqli->query("SELECT * FROM bus_details");

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['id_bus']}</td>
                            <td>{$row['bus_name']}</td>
                            <td>{$row['source']}</td>
                            <td>{$row['destination']}</td>
                            <td>{$row['seats_available']}</td>
                            <td>{$row['bus_class']}</td>
                            <td>{$row['fare']}</td>
                            <td>{$row['travel_duration']}</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No bus details available.</td></tr>";
                }

                $mysqli->close();
                ?>
            </tbody>
        </table>
        <form id="resequence-form" action="resequence.php" class="resequence-form" method="post">
        <button type="submit">Re-sequence IDs</button>
    </form>
    </div>
    </center>
    <br>
    <div class="navigation_menu_align">
                <ul class="social_navigation">
                    <li><a href="https://www.facebook.com" class="facebook"><i id="soical_icon" class="fa fa-facebook"></i>&nbsp;Facebook</a></li>
                    <li><a href="https://www.instagram.com" class="instagram"><i id="soical_icon" class="fa fa-instagram"></i>&nbsp;Instagram</a></li>
                    <li><a href="https://www.x.com" class="twitter"><i id="soical_icon" class="fa-regular fa-x"></i>&nbsp;Twitter</a></li>
                </ul>
            </div>


</body>

</html>
