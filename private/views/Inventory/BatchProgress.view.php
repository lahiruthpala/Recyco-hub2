<?php $this->view('include/head') ?>

<head>
    <link rel="stylesheet" href="<?= ROOT ?>/css/progress.css">
</head>

<body>
    <div class="layout js-layout layout--fixed-header is-small-screen">
        <header>
            <?php $this->view('include/header') ?>
        </header>
        <main class="layout__content">
            <div class="Progressbackground">
                <h6 class="title">Current Progress</h6>
                <div class="bar__container">
                    <ul class="bar" id="bar">
                        <li class="active">New</li>
                        <li class="<?php if ($data[0]->statusint >= 1)
                            echo 'active'; ?>">Assigned</li>
                        <li class="<?php if ($data[0]->statusint >= 2)
                            echo 'active'; ?>">Collected</li>
                        <li class="<?php if ($data[0]->statusint >= 3)
                            echo 'active'; ?>">In_Warehouse</li>
                        <li class="<?php if ($data[0]->statusint >= 4)
                            echo 'active'; ?>">Sorting</li>
                        <li class="<?php if ($data[0]->statusint >= 5)
                            echo 'active'; ?>">Sorted</li>
                        <li class="<?php if ($data[0]->statusint >= 6)
                            echo 'active'; ?>">Ready To Sell</li>
                        <li class="<?php if ($data[0]->statusint >= 7)
                            echo 'active'; ?>">Sold</li>
                    </ul>
                </div>
            </div>
            <div class="cell cell--12-col-desktop cell--12-col-tablet cell--4-col-phone">
                <h6 class="card__title-text" id="tableTitle" style="color: black;margin: 15px;font-size: 15px;">
                    Assigned Details
                </h6>
                <form class="form form--basic" method="POST">
                    <div class="grid" style="background-color: white;color: black;border-radius: 20px;">
                        <div style="margin: 0 15px 20px 40px;">
                            <div style="display: flex;flex-direction: column;margin-top: 27px;">
                                <h6 style="margin: 0px;">Batch_ID</h6>
                                <h6 style="margin: 0;font-weight: bold;">
                                    <?php $var = $data[0]->pagetype . "_ID";
                                    echo $data[0]->$var; ?>
                                </h6>
                            </div>
                            <div style="display: flex;flex-direction: column;margin-top: 27px;">
                                <h6 style="margin: 0px;">Created BY</h6>
                                <a>
                                    <h6 style="margin: 0;font-weight: bold;">
                                        <?= $data[0]->User_ID; ?>
                                    </h6>
                                </a>
                            </div>
                            <div style="display: flex;flex-direction: column;margin-top: 27px;">
                                <h6 style="margin: 0px;">Created Date</h6>
                                <h6 style="margin: 0;font-weight: bold;">
                                    <?= $data[0]->Date; ?>
                                </h6>
                            </div>
                        </div>
                        <div style="margin-left: 10vw;">
                            <div style="display: flex;flex-direction: column;margin-top: 27px;">
                                <h6 style="margin: 0px;">Description</h6>
                                <h6 style="margin: 0;font-weight: bold;">
                                    <?= $data[0]->Description; ?>
                                </h6>
                            </div>
                            <div style="display: flex;flex-direction: column;margin-top: 27px;">
                                <h6 style="margin: 0px;">Assigned to</h6>
                                <a>
                                    <h6 style="margin: 0;font-weight: bold;">
                                        <?= $data[0]->Collector_Name ?? "Not assigned"; ?>
                                    </h6>
                                </a>
                            </div>
                        </div>
                        <button type="button" onclick="generateQRCodesAndPrint()"
                                class="button js-button button--raised js-ripple-effect button--colored-teal"
                                style="border-radius: 99px;align-self: end;margin: 0 25px 25px auto;background-color: #027855;" id="Assignbutton" readonly>
                                <img style="padding: 2px 10px 6px 0;" src="<?=ROOT?>/images/Printer.svg">Print the Document</button>
                    </div>
            </div>
            <div class="card__supporting-text no-padding" id="NewInventory" style="display: block;">
                <table class="data-table js-data-table" style="width: 100%; table-layout: fixed;">
                    <thead>
                        <tr>
                            <th class="data-table__cell--header">Inventory_ID</th>
                            <th class="data-table__cell--header" style="text-align: center;">Status
                            </th>
                        </tr>
                    </thead>
                    <?php
                    if (is_array($rows) && !empty($rows)) {
                        $id = 1; // Initialize ID counter
                        foreach ($rows as $row) {
                            ?>
                            <tr onclick="loadScreen('Inventory/InventoryProgress', '<?= $row->Inventory_ID ?>')">
                                <td class="data-table__cell--non-numeric" name="Inventory_ID" id="batch<?= $id ?>">
                                    <?= $row->Inventory_ID ?>
                                </td>
                                <td class="data-table__cell--non-numeric" style="text-align: center;">
                                    <span class="label label--mini" style="background-color: <?= statuscolor($row->Status) ?>">
                                        <?= $row->Status ?>
                                    </span>
                                </td>
                            </tr>
                            <?php
                            $id++; // Increment ID for the next row
                        }
                    } else {
                        echo "No data available.";
                    }
                    ?>
                </table>
            </div>
            </form>
    </div>
    </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"
        integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/"
        crossorigin="anonymous"></script>
    <script src="<?= ROOT ?>/js/material.min.js"></script>
    <script src="<?= ROOT ?>/js/loadcomponent.js"></script>
    <script src="<?= ROOT ?>/js/progress.js"></script>
    <script>
        function generateQRCodesAndPrint() {
            // Select all elements with the attribute name='Inventory_ID'
            const inventoryElements = document.querySelectorAll("[name='Inventory_ID']");

            // Extract inner HTML content and convert it to an array of IDs
            const ids = Array.from(inventoryElements).map(element => element.innerHTML.trim());

            // Create a new jsPDF instance
            const pdf = new jsPDF({
                orientation: 'landscape', // Landscape orientation for 5 rows and 3 columns
                unit: 'mm',
                format: 'a4',
            });

            const qrCodeWidth = 30; // Adjust the width of each QR code based on your requirements
            const qrCodeHeight = 30; // Adjust the height of each QR code based on your requirements
            const gapX = 10; // Adjust the horizontal gap between QR codes
            const gapY = 10; // Adjust the vertical gap between QR codes
            const marginLeft = 10; // Adjust the left margin
            const marginTop = 10; // Adjust the top margin

            // Loop through each ID and generate a QR code
            for (let i = 0; i < ids.length; i++) {
                const row = i % 5; // Determine the row (0 to 4)
                const col = Math.floor(i / 5); // Determine the column (0 to 2)

                // Calculate position on the page with gaps and margins
                const x = marginLeft + col * (qrCodeWidth + gapX);
                const y = marginTop + row * (qrCodeHeight + gapY);

                // Create a div to generate the QR code
                const qrCodeContainer = document.createElement("div");
                qrCodeContainer.id = `qrcode-${i}`;
                document.body.appendChild(qrCodeContainer);

                // Generate the QR code
                const qrCode = new QRCode(qrCodeContainer, {
                    text: ids[i],
                    width: qrCodeWidth,
                    height: qrCodeHeight,
                });

                // Add a page to the PDF for each QR code (except the first one)
                if (i > 0 && i % 15 === 0) {
                    pdf.addPage();
                }

                // Get the data URL of the QR code and add it to the PDF
                const qrCodeDataURL = qrCodeContainer.firstChild.toDataURL("image/png");
                pdf.addImage(qrCodeDataURL, "PNG", x, y, qrCodeWidth, qrCodeHeight); // Adjust dimensions based on your requirements
            }

            // Save the PDF (optional step)
            // pdf.save("qrcodes.pdf");

            // Open the print dialog
            pdf.autoPrint();

            // Print the PDF document
            pdf.output('dataurlnewwindow');
        }

    </script>
</body>

</html>