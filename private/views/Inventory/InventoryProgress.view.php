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
                        <li class="<?php if ($data->statusint >= 1)
                            echo 'active'; ?>">Assigned</li>
                        <li class="<?php if ($data->statusint >= 2)
                            echo 'active'; ?>">Collected</li>
                        <li class="<?php if ($data->statusint >= 3)
                            echo 'active'; ?>">In_Warehouse</li>
                        <li class="<?php if ($data->statusint >= 4)
                            echo 'active'; ?>">Sorting</li>
                        <li class="<?php if ($data->statusint >= 5)
                            echo 'active'; ?>">Sorted</li>
                    </ul>
                </div>
            </div>
            <div class="cell cell--12-col-desktop cell--12-col-tablet cell--4-col-phone">
                <h6 class="card__title-text" id="tableTitle" style="color: black;margin: 15px;font-size: 15px;">
                    Inventory Details
                </h6>
                <form class="form form--basic" method="POST">
                    <div class="grid" style="background-color: white;color: black;border-radius: 20px;">
                        <div style="margin: 0 15px 20px 40px;">
                            <div style="display: flex;flex-direction: column;margin-top: 27px;">
                                <h6 style="margin: 0px;">Inventory_ID</h6>
                                <h6  style="margin: 0;font-weight: bold;">
                                    <?php $var = $data->pagetype . "_ID";
                                    echo $data->$var; ?>
                                </h6>
                            </div>
                            <div style="display: flex;flex-direction: column;margin-top: 27px;">
                                <h6>Batch ID</h6>
                                <a class="linkinfo"
                                    href="<?= ROOT ?>/Inventory/BatchProgress?id=<?= $data->Batch_ID; ?>">
                                    <h6  style="margin: 0;font-weight: bold;">
                                        <?= $data->Batch_ID; ?>
                                    </h6>
                                </a>
                            </div>
                            <div style="display: flex;flex-direction: column;margin-top: 27px;">
                                <h6 style="margin: 0px;">Created BY</h6>
                                <a class="linkinfo" href="<?= ROOT ?>/ProfileInfo?id=<?= $data->Creator_ID; ?>">
                                    <h6  style="margin: 0;font-weight: bold;">
                                        <?= $data->Creator_Name; ?>
                                    </h6>
                                </a>
                            </div>
                            <div style="display: flex;flex-direction: column;margin-top: 27px;">
                                <h6 style="margin: 0px;">Created Date</h6>
                                <h6  style="margin: 0;font-weight: bold;">
                                    <?= $data->Created_Date; ?>
                                </h6>
                            </div>
                            <div style="display: flex;flex-direction: column;margin-top: 27px;">
                                <h6 style="margin: 0px;">Description</h6>
                                <h6  style="margin: 0;font-weight: bold;">
                                    <?= $data->Description; ?>
                                </h6>
                            </div>
                        </div>
                        <div style="margin-left: 10vw;">
                            <div style="display: flex;flex-direction: column;margin-top: 27px;">
                                <h6 style="margin: 0px;">Assigned to</h6>
                                <a class="linkinfo"
                                    href="<?= isset($data->Collector_ID) ? ROOT . '/ProfileInfo?id=' . $data->Collector_ID : 'javascript:void(0)'; ?>">
                                    <h6  style="margin: 0;font-weight: bold;">
                                        <?= $data->Collector_Name ?? "Not assigned"; ?>
                                    </h6>
                                </a>
                            </div>
                            <div style="display: flex;flex-direction: column;margin-top: 27px;">
                                <h6 style="margin: 0px;">Collected From</h6>
                                <a class="linkinfo"
                                    href="<?= isset($data->Customer_ID) ? ROOT . '/ProfileInfo?id=' . $data->Customer_ID : 'javascript:void(0)'; ?>">
                                    <h6  style="margin: 0;font-weight: bold;">
                                        <?= $data->customer_Name ?? "Not assigned"; ?>
                                    </h6>
                                </a>
                            </div>

                            <div style="display: flex;flex-direction: column;margin-top: 27px;">
                                <h6 style="margin: 0px;">Waste weight</h6>
                                <h6  style="margin: 0;font-weight: bold;">
                                    <?= $data->Weight . "Kg" ?? "Not assigned"; ?>
                                </h6>
                            </div>
                            <div style="display: flex;flex-direction: column;margin-top: 27px;">
                                <h6 style="margin: 0px;">Sorting Job</h6>
                                <a class="linkinfo"
                                    href="<?= isset($data->Sorting_Job_ID) ? ROOT . '/SortingManager/SortingJobProgress?id=' . $data->Sorting_Job_ID : 'javascript:void(0)'; ?>">
                                    <h6  style="margin: 0;font-weight: bold;">
                                        <?= $data->Sorting_Job_ID ?? "Not assigned"; ?>
                                    </h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
                </section>
            </div>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="<?= ROOT ?>/js/material.min.js"></script>
    <script src="<?= ROOT ?>/js/loadcomponent.js"></script>
    <script src="<?= ROOT ?>/js/progress.js"></script>
</body>

</html>