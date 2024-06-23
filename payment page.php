<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - TicketEase</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha256-KJ6Bni4CIlHpUPdbLg9cC65SzkQXsvF+DmaL+INdPTk=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/payment_page.css">

</head>

<body>

    <div class="bus_background"> <!--Bus, Boxes Imagess-->
        <img src="IMG\payment_page.jpg" alt="background_img" id="background">
        <div id="container_bg"></div>
    </div>
    <div class="home_button">
        <a href="passenger info.php" class="back_button"><i class="fa-solid fa-chevron-left">&nbsp;B A C K&nbsp;</a></i>
    </div>

    <!--=======================END / B A C K G R O U N D - P H O T O =========================-->
 <!--=======================N A V I G A T I O N - M E N U =========================-->

 <header> <!--Naviagtion Menu -->
 <ul class="naviagtion">
            <li><a href="landing_page.php">HOME</a></li>
            <li><a href="refund.php">REFUND</a></li>
            <li><a href="fares.html">FARES</a></li>
            <li><a href="services.html">SERVICES</a></li>
            <li><a href="about.html">ABOUT</a></li>
            <li><a href="login_page.php">LOGIN</a></li>
        </ul>
    </header>  
 
   <?php
    session_start();
    if (isset($_POST['genderId']) && !empty($_POST['genderId'])) {
        $_SESSION["gender"] = $_POST['genderId'];
    } else {
        
        $_SESSION["gender"] = ""; 
    }
    
    $_SESSION['no'] = $_POST["num_name"];
    $a = 1;
    while ($a <= $_POST["num_name"]) {
        $_SESSION['seat' . $a] = $_POST['seat_' . $a];
        $_SESSION['pname' . $a] = $_POST['col2_' . $a];
        $_SESSION['pconno' . $a] = $_POST['col3_' . $a];
        $_SESSION['page' . $a] = $_POST['col4_' . $a];

        $_SESSION['seat'] = $_POST['seat_' . $a];
        $_SESSION['pname'] = $_POST['col2_' . $a];
        $_SESSION['pconno'] = $_POST['col3_' . $a];
        $_SESSION['page'] = $_POST['col4_' . $a];
        // print($_POST['col2_' . $a]);
        // print("&emsp;");
        // print($_POST['col3_' . $a]);
        // print("&emsp;");
        // print($_POST['col4_' . $a]);
        $a++;
        // print("<br>");
    }

 

    $z = $_POST['num_name'];
    $_SESSION["hdcunt"] = $_POST['num_name'];
    $x = $_SESSION['bsnm'];
    
    

    $db = mysqli_connect('localhost', 'root', '', 'online_bus') or die("Could not connect to Database");

    $querry = "UPDATE bus_details SET seats_available = seats_available - $z WHERE bus_name = '$x'";
    $result = mysqli_query($db, $querry) or die("Could not execute querry" . mysqli_error($db));


    ?>

    <script>
          document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input');
            inputs.forEach(input => {
                input.setAttribute('autocomplete', 'off');
                input.setAttribute('autofill', 'off');
                input.setAttribute('readonly', true);
                setTimeout(() => {
                    input.removeAttribute('readonly');
                }, 100);
            });
        });
        function validate() {
            var a, b, c;
            a = document.getElementById("pin_id").value;
            b = document.getElementById("cardNumber_id").value;
            c = document.getElementById("exDate_id").value;
            d = document.getElementById("cvvPass_id").value;
            if (isNaN(a)) {
                alert("Please enter a valid number");
                return false;
            }
            if (isNaN(b)) {
                alert("Please enter a valid number");
                return false;
            }
            if (isNaN(d)) {
                alert("Please enter a valid number");
                return false;
            }

            var currentDate = new Date();
            var day = ("0" + currentDate.getDate()).slice(-2);
            var month = ("0" + (currentDate.getMonth() + 1)).slice(-2);
            var year = currentDate.getFullYear();
            var z = parseInt(year.toString() + month.toString() + day.toString());

            var ne = parseInt(c.replace(/-/g, ''));
            if (ne < z) {
                alert("Please enter a valid card date");
                return false;
            }


        }
    </script>


    <div>

    <div class="bus_cricle"> <img src="IMG\user.png" alt="bus_icon" class="bus_icon"></div>
        <div class="contuner">
            <h3>Contact Information</h3>
            <form action="passenger_records.php" autocomplete="off" method="post" onsubmit="return validate()">

             <div class="person_name">
                <label for="name">Name</label> <br>
                <input type="text" name="myName"  id="name_id" required placeholder="Enter your name">
                </div>


                <div id="gender_radio">
                        <label>Gender</label> <br>
                        <label for="genderMale" id="gender_label"><input type="radio" value="Male" name="genderId" required> Male</label> 
                        <label for="genderFemale" id="gender_label"><input type="radio" value="Female" name="genderId" required> Female</label>
                </div>
                
                <div id="person_address">
                 <label for="address">Address</label> <br>
                 <textarea name="myText" autocomplete="false" id="address" minlength="8" maxlength="60" placeholder="Enter your home address"></textarea>
                </div>


                <div id="person_email">
                 <label  for="email">Email</label> <br>
                 <input type="text" autocomplete="false" name="email_name" id="email_id" required placeholder="Enter your mail">
                </div>

                <div id="person_zipcode">
                 <label for="zipcode" >Zip-Code</label> <br>
                 <input type="number" autocomplete="false" name="pin_name" id="pin_id" required placeholder="111111" minlength="6" maxlength="6">
                </div>
                </div>


                <div class="bus_cricle_2"> <img src="IMG\card.png" alt="bus_icon" class="bus_icon_2"></div>
            
                <div class="contuner_2">
                <h3>Payment Info</h3>

                <div id="payment_gateway">
                <label for="payment">Payment Method</label> <br>
                   <select name="myCard" id="payment">
                        <option value="masterCard">Master Card</option>
                        <option value="debitCard">Debit Card</option>
                    </select>
                </div>

                <div id="card_number">
                    <label for="card number">Card Number</label> <br>
                    <input type="number" name="cardNumber_name" id="cardNumber_id" required placeholder="1111-2222-3333-4444" minlength="16" maxlength="16">
                </div>

                <div id="card_date">
                <label for="expiry date">Expiry Date </label> <br>
                 <input  type="date" name="exDate_nam" id="exDate_id" placeholder="mm / yyyy"min="2024-01" required>
                </div>

                <div id="card_cvc">
                <label>CVC</label> <br>
                <input type="password" name="cvvPass_name" id="cvvPass_id" minlength="3" maxlength="3" required placeholder="123">
                </div>

                <br>
                <input type="submit" value="pay now">
                <input type="reset" value="reset">
            </form>
        </div>

        <div class="navigation_menu_align">
        <ul class="social_navigation">
            <li ><a href="https://www.facebook.com" class="facebook"><i id="soical_icon" class="fa fa-facebook"></i>&nbsp;Facebook</a></li>
            <li ><a href="https://www.instagram.com" class="instagram"><i id="soical_icon" class="fa fa-instagram"></i>&nbsp;Instagram</a></li>
            <li ><a href="https://www.x.com" class="twitter" ><i  id="soical_icon" class="fa-regular fa-x"></i>&nbsp;Twitter</a></li>
        </ul>
    </div>
    
</body>

</html>