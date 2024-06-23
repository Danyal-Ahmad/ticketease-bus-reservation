<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refund - TicketEase</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha256-KJ6Bni4CIlHpUPdbLg9cC65SzkQXsvF+DmaL+INdPTk=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/refund.css">
</head>

<body>


    <div id="container_bg"></div>

    <div class="navbar">
        <header>
        <ul class="naviagtion">
            <li><a href="landing_page.php">HOME</a></li>
            <li><a href="refund.php">REFUND</a></li>
            <li><a href="fares.html">FARES</a></li>
            <li><a href="services.html">SERVICES</a></li>
            <li><a href="about.html">ABOUT</a></li>
            <li><a href="login_page.php">LOGIN</a></li>
        </ul>
        </header>
    </div>

    <div class="container">
        <h3>Refund Request</h3>
        <form action="refund.php" method="post">
            <div class="input_field">
                <label for="ticket_number">Your Name</label>
                <input type="text" name="pname" id="ticket_number" required placeholder="Enter your name">
            </div>
            <br>
            <div class="input_field">
                <label for="email">Email</label>
                <input type="email" name="email_name" id="email" required placeholder="Enter your email">
            </div>
            <div class="input_field">
                <input type="submit" value="Request Refund">
            </div>
        </form>
    </div>

    <?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $passengerName = $_POST['pname']; 
        $passengerEmail = $_POST['email_name'];

        $mysqli = new mysqli('localhost', 'root', '', 'online_bus');

        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        $stmt = $mysqli->prepare("SELECT * FROM passenger_records WHERE passenger_name = ? AND passenger_email = ?");
        if ($stmt === false) {
            die('Error preparing statement: ' . $mysqli->error);
        }

        $stmt->bind_param('ss', $passengerName, $passengerEmail);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $stmt = $mysqli->prepare("DELETE FROM passenger_records WHERE passenger_name = ? AND passenger_email = ?");
            if ($stmt === false) {
                die('Error preparing statement: ' . $mysqli->error);
            }
            $stmt->bind_param('ss', $passengerName, $passengerEmail);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo '<script>alert("Your refund is in process!.");</script>';

                // // Send email confirmation
                // $to = $passengerEmail;
                // $subject = 'Refund Confirmation';
                // $message = 'Dear ' . $passengerName . ', your refund has been processed successfully. Please contact support for further assistance if needed.';
                // $headers = 'From: danyalahmaad.pjb@gmail.com'; // Replace with your email

                // // Uncomment the line below to send the email (requires a valid SMTP server setup)
                // // mail($to, $subject, $message, $headers);

                // // Example of sending email for testing (commented out)
                // // echo "<p>Email sent to $to: $message</p>";


                $stmt = $mysqli->prepare("UPDATE bus_details SET seats_available = seats_available + 1 WHERE bus_name = ?");
                if ($stmt === false) {
                    die('Error preparing statement: ' . $mysqli->error);
                }
                $bus_name = 'example_bus_name'; 
                $stmt->bind_param('s', $bus_name);
                $stmt->execute();
           
          
            echo '<script>alert("You have successfully refunded your ticket.");</script>';
        } else {
            echo '<script>alert("Error: Unable to process refund. Please try again later.");</script>';
        }
    } else {
        echo '<script>alert("No record found for the provided name and email. Please check your details and try again.");</script>';
    }
        $stmt->close();
        $mysqli->close();
    }
    ?>

</body>

</html>
