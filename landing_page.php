<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking - TicketEase</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha256-KJ6Bni4CIlHpUPdbLg9cC65SzkQXsvF+DmaL+INdPTk=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/landing_page.css">

</head>




<body>
    <?php
    session_start();

    ?>
    <!--=======================B A C K G R O U N D - P H O T O =========================-->

    <div class="bus_background"> <!--Bus, Boxes Imagess-->
        <img src="IMG\background.png" alt="background_circle" id="background">
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
    <!--=======================END / N A V I G A T I O N - M E N U =========================-->

    <div class="ghost_button">
        <a href="home page.html" class="ghost_btn" aria-selected="true"><i class="fa-solid fa-ghost"></i></a>
    </div>


    <!--=======================T O P - H E A D E R S =========================-->

    <!--Two heading upper the Input container -->
    <div id="title">
        <h1 id="title_1">WHERE WOULD YOU </h1>
        <h1 id="title_2"><b>LIKE TO GO ?</b></h1>
    </div>
    <br>
    <!--=======================END / T O P - H E A D E R S =========================-->

    <!--=======================D E P A R T U R E - D R O P D O W N=========================-->
    <form action="" method="post" class="firstform">

        <div id="Ist_drop">
            <label id="label_1">From</label>
            <br>
            <!-- Departure-->
            <select name="src_name" id="src_id" required>
                <option value="Lahore">Lahore</option>
                <option value="Peshawar">Peshawar</option>
                <option value="Islamabad">Islamabad</option>
                <option value="Rawalpindi">Rawalpindi</option>
                <option value="Gujranwala">Gujranwala</option>
                <option value="Karachi">Karachi</option>
                <option value="Multan">Multan</option>
                <option value="Quetta">Quetta</option>
                <option value="Gilgit">Gilgit</option>
                <option value="Sialkot">Sialkot</option>
                <option value="Sargodha">Sargodha</option>
                <option value="Jhelum">Jhelum</option>
                <option value="Bahawalpur">Bahawalpur</option>
                <option value="Faisalabad">Faisalabad</option>
                <option value="Hyderabad">Hyderabad</option>
            </select>
            <div id="line_dep"></div>

            <i class="fa-solid fa-angles-right" id="arrival_icon"></i>


        </div>

        <!--===================================END / D E P A R T U R E - D R O P D O W N====================================-->

        <br>
        <div style="position: absolute; margin-top: -1.25%; margin-left: 34.5%; display: flex;  "><svg style=" height: 35px; width: auto;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path fill="#f1a0ff" d="M32 64C14.3 64 0 49.7 0 32S14.3 0 32 0l96 0c53 0 96 43 96 96l0 306.7 73.4-73.4c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3l-128 128c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 402.7 160 96c0-17.7-14.3-32-32-32L32 64z" />
            </svg> </div>

        <!--=======================================A R R I V A L - D R O P D O W N==========================================-->

        <div id="Sec_drop"> <!-- 2nd Dropdown Arival-->
            <label id="label_2">To</label>
            <br>
            <!-- Arival -->
            <div id="all_arrival">
                <select name="to_name" id="to_id" required>
                    <option value="Peshawar">Peshawar</option>
                    <option value="Lahore">Lahore</option>
                    <option value="Karachi">Karachi</option>
                    <option value="Multan">Multan</option>
                    <option value="Quetta">Quetta</option>
                    <option value="Gilgit">Gilgit</option>
                    <option value="Islamabad">Islamabad</option>
                    <option value="Faisalabad">Faisalabad</option>
                    <option value="Sialkot">Sialkot</option>
                    <option value="Sargodha">Sargodha</option>
                    <option value="Jhelum">Jhelum</option>
                    <option value="Bahawalpur">Bahawalpur</option>
                    <option value="Hyderabad">Hyderabad</option>
                    <option value="Rawalpindi">Rawalpindi</option>
                    <option value="Gujranwala">Gujranwala</option>
                </select>
                <div id="line_dep"></div>

                <i class="fa-solid fa-angles-left" id="departure_icon"></i>
            </div>
        </div>

        <div id="service_drop">
            <label id="label_4">Class</label>
            <br>
            <div id="services_container">
                <select name="srv_name" id="to_id" required>
                    <option value="Executive">Executive</option>
                    <option value="Business">Business</option>
                    <option value="VVIP">VVIP</option>
                </select>
                <div id="line_dep"></div>

                <i class="fas fa-bus" id="departure_icon"></i>
            </div>
        </div>

        <!--===================================END / A R R I V A L - D R O P D O W N====================================-->

        <div id="third_drop"> <!-- Links absolute-->
            <div id="date_background"></div>
            <label id="label_3">Date</label>
            <br>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <input type="date" min="today" name="date_name" id="date_id" required>

            <div id="dateContainer" style="display:none; margin-top: -4%; margin-left: 21%;">

                <div style=" position: absolute; margin-left: -4%; margin-top: 2%;">
                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="#f1a0ff" d="M32 96l320 0V32c0-12.9 7.8-24.6 19.8-29.6s25.7-2.2 34.9 6.9l96 96c6 6 9.4 14.1 9.4 22.6s-3.4 16.6-9.4 22.6l-96 96c-9.2 9.2-22.9 11.9-34.9 6.9s-19.8-16.6-19.8-29.6V160L32 160c-17.7 0-32-14.3-32-32s14.3-32 32-32zM480 352c17.7 0 32 14.3 32 32s-14.3 32-32 32H160v64c0 12.9-7.8 24.6-19.8 29.6s-25.7 2.2-34.9-6.9l-96-96c-6-6-9.4-14.1-9.4-22.6s3.4-16.6 9.4-22.6l96-96c9.2-9.2 22.9-11.9 34.9-6.9s19.8 16.6 19.8 29.6l0 64H480z" />
                    </svg>
                </div>
            </div>

            <!--================================================================================================================================================-->
            <br>

            <input name="submit" type="submit" value="GET DETAILS" id="submit_btn" style="margin-top:0;">

    </form>
    <br>



    <div class="table_background">
        <form action="passenger info.php" method="post" class="secondform" style="overflow: scroll;scrollbar-width: none;">


            <?php
            if (isset($_POST['submit'])) {
                $frm = $_POST['src_name'];
                $to = $_POST['to_name'];
                $srv = $_POST['srv_name'];

                $_SESSION["frm"] = $_POST['src_name'];
                $_SESSION["to"] = $_POST['to_name'];
                $_SESSION["dt"] = $_POST['date_name'];
                $_SESSION["srv"] = $_POST['srv_name'];

                $db = mysqli_connect('localhost', 'root', '', 'online_bus') or die("Could not connect to Database");

                $querry = "SELECT * FROM bus_details WHERE source='$frm' AND destination='$to' AND bus_class='$srv' ";


                if ($result = mysqli_query($db, $querry) or die("Could not execute querry")) {
                    print('   <p id="ticket_selection"> Select your ticket </p> <br> <table>
                
    <tr>
        <th>BUS Model</th>
        <th>FARE</th>
        <th>SEATS</th>
        <th>SERVICE</th>
        <th>SELECT</th>
    </tr>');

                    while ($row = mysqli_fetch_row($result)) {
                        print('<tr>
                    <td>' . $row[1] . '</td>
       
        <td align="center"><input type="hidden" value="' . $row[6] . '" name="fair_name">' . $row[6] . '</td>
        <td align="center"><input type="hidden" value="'  . $row[4] . '" name="seat_no">' . $row[4] . '</td>
        <td align="center"><input type="hidden" value="' . $row[5] . '" name="class_name">' . $row[5] . '</td>
        <td align="center"><input type="radio" name="radio_name" value="' . $row[1] . '"></td>
    </tr> ');
                    }
                    print('</table>');
                }
            }
            ?>

            <form action="passenger info.php" method="post">
                <input type="submit" value="Reserve Now" class="lastbutton">
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

    </div>

    <!--===================================L I N K S - FB / IG / TW==============================================-->


    <script>
        $(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();
            var maxDate = year + '-' + month + '-' + day;
            $('#date_id').attr('min', maxDate);
        });
    </script>

</body>

</html>