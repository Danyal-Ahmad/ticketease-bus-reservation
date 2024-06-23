<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket - TicketEase</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha256-KJ6Bni4CIlHpUPdbLg9cC65SzkQXsvF+DmaL+INdPTk=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="CSS/ticket page.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
</head>

<body>
    <?php session_start(); ?>
    <div class="bus_background"> <!--Bus, Boxes Images-->
        <!-- <img src="IMG/ticket_background.png" alt="background_img" id="background"> -->
        <div id="container_bg"></div>
    </div>

    <div class="ticket_bg"></div>
    <div class="ticket_fg"></div>

    <div class="container">
        <div id="printableArea" class="printableArea">

            <br>
            <div class="logo">
                <img src="IMG/logo.png" alt="logo" class="watermark"> <br>
                <h3>- Your Ticket | @TICKETEASE -</h3>
            </div>
            <br>
            <table>
                <tr>
                    <th style="display: flex; margin-left:47%; font-size:18px; width:200%; margin-bottom: 10px;">
                        <?php print($_SESSION['frm']) ?> &nbsp&nbsp&nbsp<p>→</p>&nbsp&nbsp&nbsp <?php print($_SESSION['to']) ?>
                    </th>
                </tr>


                <tr>
                    <br>
                    <th>Passenger</th>
                    <th style="float:right;">Seat No.</th>
                </tr>
                <tr>
                    <td>
                        <?php
                        $a = 1;
                        while ($a <= $_SESSION['hdcunt']) {
                            print("<tr>");
                            print("<td>" . $_SESSION['pname' . $a] . "</td>");
                            $a++;
                        }
                        ?>

                        <?php
                        $a = 1;
                        while ($a <= $_SESSION['hdcunt']) {
                            print("<td style='float:right;'>" . $_SESSION['seat' . $a] . "</td>");
                            $a++;
                            print("</tr>");
                        }
                        ?>

                <tr>
                    <th>Fare</th>
                    <th style="float:right;">Passenger Count</th>
                </tr>
                <tr>
                    <td><?php print(($_SESSION['fph']) * ($_SESSION['hdcunt'])) ?></td>
                    <td style="float:right;"><?php print($_SESSION['hdcunt']) ?></td>
                </tr>


                <tr>
                    <th>Date</th>
                    <th style="float:right;">Bus Model</th>
                </tr>

                <tr>
                    <td><?php print($_SESSION['dt']) ?></td>
                    <td style="float:right;"><?php print($_SESSION['bsnm']) ?></td>
                </tr>

                <tr>
                    <th>Bus Class</th>
                    <th style="float:right;">Pessanger Contact</th>
                </tr>

                <tr>
                    <td><?php print($_SESSION['buss_class']) ?></td>
                    <?php
                    $a = 1;
                    while ($a <= $_SESSION['hdcunt']) {
                        print("<td  style='float:right;'>" . $_SESSION['pconno' . $a] . "</td>");
                        $a++;
                    }
                    ?>
                </tr>

                <tr>
                    <th>Ticket Number
                    <th>
                </tr>
                <tr>
                    <td><?php print($_SESSION['ticket_number']) ?></td>
                </tr>

                <tr>
                    <th style="display:flex; width:200%;  margin-left: 1%">-------------------------------<i class="fa fa-cut" style="font-size:20px; "></i>--------------------------------</th>
                </tr>

                <tr>
                    <td style="display: block; width: 200%; margin-top: -10px;"><canvas id="barcode"></canvas></td>
                </tr>
            </table>

            <ol>
                <li>Arrive at the terminal 30 minutes before bus departure.</li>
                <li>Tickets cannot be changed.</li>
                <li>You can easily refund your ticket if needed.</li>
                <li>Please keep your ticket safe.</li>
                <li>Boarding begins 15 minutes before departure time.</li>
                <li>Check the bus schedule for any updates before your journey.</li>
                <li>Ensure you have a valid ID with you when boarding.</li>
                <li>Consider bringing a light snack and water for the journey.</li>
                <li>Respect the driver and fellow passengers during your trip.</li>
            </ol>
        </div>


    </div>
    </div>

    <div class="ticket_printing">
        <p class="btn_discription">Click blew to print your ticket</p>
        <input type="button" onclick="printDiv('printableArea')" value="Print Ticket" />
    </div>
    <br>


    <script>
        function printDiv(divId) {
            var printContents = document.getElementById(divId).innerHTML;
            var originalContents = document.body.innerHTML;

            // Create a new window for printing
            var printWindow = window.open('', 'Print Window', 'height=400,width=600');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Print Ticket - TicketEase</title>');
            printWindow.document.write('<link rel="stylesheet" href="ticket page.css">');
            printWindow.document.write('</head><body>');
            printWindow.document.write(printContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();

            // Wait for content to load before printing
            printWindow.onload = function() {
                printWindow.focus();
                renderBarcode(printWindow); // Render barcode in the print window
                printWindow.print();
                printWindow.close();
            };

            // Redirect after printing (if needed)
            setTimeout(function() {
                window.location.href = 'landing_page.php';
            }, 10000);
        }

        function renderBarcode(printWindow) {
            var barcodeCanvas = printWindow.document.getElementById("barcode");
            if (barcodeCanvas) {
                var seat = barcodeCanvas.getAttribute("data-seat");
                var dt = barcodeCanvas.getAttribute("data-date");
                var bsnm = barcodeCanvas.getAttribute("data-bus");
                var barcodeText = seat + " " + dt + " " + bsnm;

                JsBarcode(barcodeCanvas, barcodeText, {
                    format: "CODE128",
                    lineColor: "#F58265",
                    width: 2.5,
                    height: 70,
                    displayValue: false,
                    background: "transparent"
                });
            }
        }

        // Initial rendering of barcode when the page loads
        window.onload = function() {
            var barcodeCanvas = document.getElementById("barcode");
            if (barcodeCanvas) {
                var seat = barcodeCanvas.getAttribute("data-seat");
                var dt = barcodeCanvas.getAttribute("data-date");
                var bsnm = barcodeCanvas.getAttribute("data-bus");
                var barcodeText = seat + " " + dt + " " + bsnm;

                JsBarcode(barcodeCanvas, barcodeText, {
                    format: "CODE128",
                    lineColor: "#F58265",
                    width: 2.5,
                    height: 70,
                    displayValue: false,
                    background: "transparent"
                });
            }
        };
    </script>

</body>

</html>