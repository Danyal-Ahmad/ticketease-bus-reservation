<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - TicketEase</title>
    <link href="CSS/login_page.css" rel="stylesheet">
</head>
<script>
    function validate() {
        var n = document.getElementById('email_login_id').value;
        var p = document.getElementById('pass_login_id').value;
        <?php if (!empty($error_message)) : ?>
        document.getElementById('error').style.display = 'inline';
    <?php endif; ?>
        }
</script>

<body>
    <?php
    session_start(); // Start session for error message

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['eml'];
        $pswrd = $_POST['pass'];

        // Connect to database
        $db = mysqli_connect('localhost', 'root', '', 'online_bus') or die("Could not connect to Database");

        // Query to check user details
        $query = "SELECT * FROM user__details WHERE email='$name' AND password='$pswrd'";
        $result = mysqli_query($db, $query) or die("Could not execute query");

        // Query to check admin details
        $admin_query = "SELECT * FROM admin_details WHERE email='$name' AND password='$pswrd'";
        $admin_result = mysqli_query($db, $admin_query) or die("Could not execute query");

        // Check if user exists
        if (mysqli_num_rows($result) == 1) {
            // Redirect to landing page or do any other action
            header('Location: landing_page.php');
            exit;
        } elseif (mysqli_num_rows($admin_result) == 1) {
            // Redirect to admin dashboard
            header('Location: manage_bus.php');
            exit;
        } else {
            // Set error message for display in HTML
            $error_message = "Incorrect username or password";
        }
    }
    ?>

    <img src="IMG/login_background.png" id="login_background">
    <div id="container_back"></div>
    <img src="IMG/bus_overlay.png" id="img_logo">
    <div id="logo_background"></div>

    <div id="content_all">
        <h1>LOGIN</h1>
        <div class="container_login">
            <form autocomplete="off" action="login_page.php" method="post" onsubmit="return validate()">
                <label id="lable_1">Email</label><br>
                <input type="text" name="eml" id="email_login_id" placeholder="Enter your mail" minlength="8" maxlength="14" oninput="this.value = this.value.replace(/[^0-9_a-z]/g, '')" required>
                <input type="email" name="name" id="domain_login_id" value="@employ.ticketease.com" disabled>
                <br>
                <label id="lable_1">Password</label><br>
                <input type="password" name="pass" id="pass_login_id" maxlength="20" placeholder="•••••••••" required>
                <br>
                <?php if (isset($error_message)) : ?>
                    <span style="color: red; font-size: 15px; margin-top: 0%; transition: all 0.5s ease;" id="error"><?php echo $error_message; ?></span>
                <?php endif; ?>
                <div class="checkbox">
                    <p><input type="checkbox" id="checkbox_sigup" required>&nbsp;I agree to the <a href="t&c.html" class="a_checkbook">terms and conditions</a></p>
                </div>
                <div class="btnn"><br><br>
                    <input class="btn_login" type="submit" value="LOGIN">
                </div>
            </form>
            <a href="sign-up.html" id="btn_signup">Create your new account?</a>
        </div>
    </div>
</body>
</html>
