<?php $this->view('include/head') ?>
<head>
    <link rel="stylesheet" href="<?= ROOT ?>/css/progress.css">
</head>

<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">
        <header>
            <?php $this->view('include/header') ?>
        </header>
        <main class="mdl-layout__content">
            <div class="Progressbackground">
                <div class="mdl-card__title">
                    <h1 class="mdl-card__title-text">Current Progress</h1>
                </div>

                <div class="bar__container">
                    <ul class="bar" id="bar">
                    <li class="active">New</li>
                        <li class="<?php if($data->statusint >= 1) echo 'active'; ?>">Assigned</li>
                        <li class="<?php if($data->statusint >= 2) echo 'active'; ?>">Collected</li>
                        <li class="<?php if($data->statusint >= 3) echo 'active'; ?>">In whorehouse</li>
                        <li class="<?php if($data->statusint >= 4) echo 'active'; ?>">Sorting</li>
                        <li class="<?php if($data->statusint >= 5) echo 'active'; ?>">Sorted</li>
                    </ul>
                </div>
            </div>
            <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
                <div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <h1 class="mdl-card__title-text" id="tableTitle">Not Assigned</h1>
                    </div>
                    <section id="cards">
                        <form class="form form--basic" action="<?= ROOT ?>/Inventory/Assign" method="POST"
                            style="margin: 20px 2px 20px 30px;">
                            <div>
                                <div class="mdl-grid" style="justify-content: center;">
                                    <div>
                                        <div style="flex: ;display: flex;gap: 10px;color: aliceblue;">
                                            <h6>Inventory_ID -> </h6>
                                            <h6>
                                                <?php $var = $data->pagetype . "_ID";
                                                echo $data->$var; ?>
                                            </h6>
                                        </div>
                                        <div style="flex: ;display: flex;gap: 10px;color: aliceblue;">
                                            <h6>Batch ID -> </h6>
                                            <a class="ainblack" href="<?= ROOT ?>/Inventory/progress/Batch?id=<?= $data->Batch_ID; ?>">
                                                <h6>
                                                    <?= $data->Batch_ID; ?>
                                                </h6>
                                            </a>
                                        </div>
                                        <div style="flex: ;display: flex;gap: 10px;color: aliceblue;">
                                            <h6>Created BY -> </h6>
                                            <a class="ainblack" href="<?= ROOT ?>/ProfileInfo?id=<?= $data->Creator_ID; ?>">
                                                <h6>
                                                    <?= $data->Creator_Name; ?>
                                                </h6>
                                            </a>
                                        </div>
                                        <div style="flex: ;display: flex;gap: 10px;color: aliceblue;">
                                            <h6>Created Date -> </h6>
                                            <h6>
                                                <?= $data->Created_Date; ?>
                                            </h6>
                                        </div>
                                        <div style="flex: ;display: flex;gap: 10px;color: aliceblue;">
                                            <h6>Description -> </h6>
                                            <h6>
                                                <?= $data->Description; ?>
                                            </h6>
                                        </div>
                                    </div>
                                    <div style="margin-left: 10vw;">
                                        <div style="flex: ;display: flex;gap: 10px;color: aliceblue;">
                                            <h6>Assigned to -> </h6>
                                            <a class="ainblack" href="<?= isset($data->Collector_ID) ? ROOT . '/ProfileInfo?id=' . $data->Collector_ID : 'javascript:void(0)'; ?>">
                                                <h6>
                                                    <?= $data->Collector_Name ?? "Not assigned"; ?>
                                                </h6>
                                            </a>
                                        </div>
                                        <div style="flex: ;display: flex;gap: 10px;color: aliceblue;">
                                            <h6>Collected From -> </h6>
                                            <a class="ainblack" href="<?= isset($data->Customer_ID) ? ROOT . '/ProfileInfo?id=' . $data->Customer_ID : 'javascript:void(0)'; ?>">
                                                <h6>
                                                    <?= $data->customer_Name ?? "Not assigned"; ?>
                                                </h6>
                                            </a>
                                        </div>

                                        <div style="flex: ;display: flex;gap: 10px;color: aliceblue;">
                                            <h6>Waste weight -> </h6>
                                            <h6>
                                                <?= $data->Weight . "Kg" ?? "Not assigned"; ?>
                                            </h6>
                                        </div>
                                        <div style="flex: ;display: flex;gap: 10px;color: aliceblue;">
                                            <h6>Sorting Job -> </h6>
                                            <a class="ainblack" href="<?= isset($data->Sorting_Job_ID) ? ROOT . '/ProfileInfo?id=' . $data->Sorting_Job_ID : 'javascript:void(0)'; ?>">
                                                <h6>
                                                    <?= $data->Sorting_Job_ID ?? "Not assigned"; ?>
                                                </h6>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="<?= ROOT ?>/js/material.min.js"></script>
    <script src="<?= ROOT ?>/js/loadcomponent.js"></script>
    <script src="<?= ROOT ?>/js/progress.js"></script>
</body>

</html>