<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passengers - TicketEase</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha256-KJ6Bni4CIlHpUPdbLg9cC65SzkQXsvF+DmaL+INdPTk=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/passenger_info.css">
</head>

<body>
    <!--=======================B A C K G R O U N D - P H O T O =========================-->
    <div class="bus_background"> <!--Bus, Boxes Imagess-->
        <img src="IMG\passenger_info.png" alt="background_img" id="background">
        <div id="container_bg"></div>
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
    
    <div class="bus_cricle"> <img src="IMG\bus_icon.png" alt="bus_icon" class="bus_icon"></div>
    <div class="container_pssngr_1">
        <?php
        session_start();
        $a = $_SESSION['frm'];
        $b = $_SESSION['to'];
        $c = $_SESSION['dt'];
        $h = $_POST['radio_name'];
        $e = $_POST['fair_name'];
        $f = $_POST['class_name'];

        
        print("<h3> BUS DETAIL  </h3>");
        print(" <label>From </label> " . $a);
        print("<br>");
        print("<label>To </label>" . $b);
        print("<br>");
        print(" <label>Date </label>" . $c);
        print("<br>");
        print("<label>Bus Model </label> " . $h);
        print("<br>");
        print("<label>Bus Class </label> " . $f);
        print("<br>");
        print("<label>Bus Fare </label>" . $e);
        $_SESSION["fph"] = $_POST['fair_name'];
        $_SESSION["bsnm"] = $_POST['radio_name'];
        $_SESSION["buss_class"] = $_POST['class_name'];
      
        
        

        ?>
    </div>

    <form action="payment page.php" method="post" onsubmit=" return validate()">
    <script>
 var d, count = 1;

function addrw() {
    d = document.getElementById('num_id').value;
    var mytab = document.getElementById('t1');
    var v;
    if (d > 9) {
        alert('Please enter a number up to 9.');
        return false;
    }
    if (count <= d) {
        v = 1;
        while (count <= d) {
            var r1 = mytab.insertRow();
            var c1 = r1.insertCell();
            var c2 = r1.insertCell();
            var c3 = r1.insertCell();
            var c4 = r1.insertCell();
            var c5 = r1.insertCell();

            c1.innerHTML = v;
            c2.innerHTML = "<input type='number' style='width: 100px;'  pattern='[0-9]{0,2}' min='1' max='60' oninput='this.value = this.value.replace(/[^\d]/g, '').substr(0, 2);' name='seat_" + v + "' required> </input>";
            c3.innerHTML = "<input type='text' style='text-transform: uppercase;' 'pattern='[A-Za-z]+'  name='col2_" + v + "' required>";
            c4.innerHTML = "<input type='tel' pattern='[0-9]{11}' min='11' max='11' oninput='this.value = this.value.replace(/[^\d]/g, '').substr(0, 11);' name='col3_" + v + "' id='col3_" + v + "' required></input>";
            c5.innerHTML = "<input type='number' style='width: 100px;'  pattern='[0-9]{2}' min='1' max='60' oninput='this.value = this.value.replace(/[^\d]/g, '').substr(0, 2);'  name='col4_" + v + "' required> </input>";
            count++;
            v++;
        }
    } else {
        alert('No number has been entered.');
    }
    return false;
}

function delrw() {
    var c = document.getElementById('num_id').value;
    document.getElementById('t1').deleteRow(c - 1); // deleteRow() index starts from 0, so subtract 1 from c
    count--; // decrement count as row is deleted
    document.getElementById('num_id').value = count; // update the number input with the new count
}

function validate() {
    var i, s;
    for (i = 1; i <= count; i++) { // use count instead of d to loop through existing rows
        s = document.getElementById('col3_' + i).value;
        if (isNaN(s) || s.length !== 11) { // check if the phone number is not a number or not exactly 11 digits
            alert('Please enter a valid 11-digit phone number.');
            return false;
        }
    }
    return true;
}


    </script>
    <div class="bus_cricle2"> <img src="IMG\passenger.png" alt="bus_icon" class="bus_icon"></div>
    <div class="container_pssngr_2">
        <h3 id="h3_id"> number of passengers </h3>
        <input type="number" id="num_id" name="num_name" oninput="this.value = this.value.replace(/[^\d]/g, '').substr(0, 2)"  min="1" max="9" step="1" pattern="[0-9]" placeholder="Enter the number of passengers" required>
        <input type="button" value="GET ROWS" id="gtrws_id" onclick="addrw()">
        <table id="t1">
            <tr>
                <td style="font-size: 12px;">Sr No.</td>
                <td>Seat Number</td>
                <td>Passenger Name</td>
                <td>Contact Number</td>
                <td>Age</td>
            </tr>
        </table>
        <br><br>
        <input type="submit" class="btn_pssngr" value="BOOK NOW">
        <input type="button" value="DELETE ROW" id="delrw_id" onclick="delrw()">
        </form>
    </div>
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
