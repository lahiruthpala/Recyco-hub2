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
            <div class="cell cell--12-col-desktop cell--12-col-tablet cell--4-col-phone">
                <div class="card__title">
                    <h1 class="card__title-text" id="tableTitle">
                        <?= $data[0]->Type ?>
                    </h1>
                </div>
                <section id="cards" class="info">
                    <form class="form form--basic" method="POST" style="margin: 20px 2px 20px 30px;">
                        <div>
                            <div class="grid" style="justify-content: center;">
                                <div>
                                    <div style="flex: ;display: flex;gap: 10px;">
                                        <h6>Type -> </h6>
                                        <h6>
                                            <?= $data[0]->Type; ?>
                                        </h6>
                                    </div>
                                    <div style="flex: ;display: flex;gap: 10px;">
                                        <h6>Total Weight -> </h6>
                                        <h6>
                                            <?= $data[0]->Weight; ?>
                                        </h6>
                                    </div>
                                    <div style="flex: ;display: flex;gap: 10px;">
                                        <h6>Buying Price -> </h6>
                                        <h6>
                                            <?= $data[0]->Buying_Price ?? "No price  set yet."; ?>
                                        </h6>
                                    </div>
                                </div>
                                <div style="margin-left: 10vw;">
                                    <div style="flex: ;display: flex;gap: 10px;">
                                        <h6>Description -> </h6>
                                        <h6 style="max-width: 500px;">
                                            <?= $data[0]->Description ?? "Inventory Type is not Identified"; ?>
                                        </h6>
                                    </div>
                                    <div style="flex: ;display: flex;gap: 10px;">
                                        <h6>Status -> </h6>
                                        <h6>
                                            <?= $data[0]->Status ?? "Not Accepting"; ?>
                                        </h6>
                                    </div>
                                    <div style="flex: ;display: flex;gap: 10px;">
                                        <h6>Selling Price -> </h6>
                                        <h6>
                                            <?= $data[0]->Selling_Price ?? "No price  set yet."; ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card__supporting-text no-padding" id="NewInventory" style="display: block;">
                                <table class="data-table js-data-table" style="width: 100%; table-layout: fixed;">
                                    <thead>
                                        <th class="data-table__cell--header">Inventory_ID</th>
                                        <th class="data-table__cell--header">Status</th>
                                    </thead>
                                    <?php
                                    if (is_array($rows) && !empty($rows)) {
                                        $id = 1; // Initialize ID counter
                                        foreach ($rows as $row) {
                                            ?>
                                            <tr
                                                onclick="loadScreen('Inventory/InventoryProgress', '<?= $row->Inventory_ID ?>')">
                                                <td class="data-table__cell--non-numeric" name="Inventory_ID"
                                                    id="batch<?= $id ?>">
                                                    <?= $row->Inventory_ID ?>
                                                </td>
                                                <td class="data-table__cell--non-numeric">
                                                    <span class="label label--mini color--<?= statuscolor($row->Status) ?>">
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
                        </div>
                    </form>
                </section>
            </div>
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

            // // Open the print dialog
            // pdf.autoPrint();

            // Print the PDF document
            pdf.save('test.pdf');
        }

    </script>
</body>

</html>