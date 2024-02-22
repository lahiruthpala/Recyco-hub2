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
                <div class="card__title">
                    <h1 class="card__title-text">Current Progress</h1>
                </div>

                <div class="bar__container">
                    <ul class="bar" id="bar">
                        <li class="active">New</li>
                        <li class="<?php if ($data->statusint >= 1)
                            echo 'active'; ?>">Assigned</li>
                        <li class="<?php if ($data->statusint >= 2)
                            echo 'active'; ?>">Collected</li>
                        <li class="<?php if ($data->statusint >= 3)
                            echo 'active'; ?>">In whorehouse</li>
                        <li class="<?php if ($data->statusint >= 4)
                            echo 'active'; ?>">Sorting</li>
                        <li class="<?php if ($data->statusint >= 5)
                            echo 'active'; ?>">Sorted</li>
                    </ul>
                </div>
            </div>
            <div class="cell cell--12-col-desktop cell--12-col-tablet cell--4-col-phone">
                <div class="card__title">
                    <h1 class="card__title-text" id="tableTitle"><?=$data->Status?></h1>
                </div>
                <section id="cards" style="background-color: var(--light-gray);border-radius: 0 0 15px 15px;"">
                    <form class="form form--basic" action="<?= ROOT ?>/Inventory/Assign" method="POST">
                        <div>
                            <div class="grid" style="justify-content: center;">
                                <div>
                                    <div style="flex: ;display: flex;gap: 10px;color: aliceblue;">
                                        <h6>Inventory_ID -> </h6>
                                        <h6 style="font-weight: 300;">
                                            <?php $var = $data->pagetype . "_ID";
                                            echo $data->$var; ?>
                                        </h6>
                                    </div>
                                    <div style="flex: ;display: flex;gap: 10px;color: aliceblue;">
                                        <h6>Batch ID -> </h6>
                                        <a class="linkinfo"
                                            href="<?= ROOT ?>/Inventory/progress/Batch?id=<?= $data->Batch_ID; ?>">
                                            <h6>
                                                <?= $data->Batch_ID; ?>
                                            </h6>
                                        </a>
                                    </div>
                                    <div style="flex: ;display: flex;gap: 10px;color: aliceblue;">
                                        <h6>Created BY -> </h6>
                                        <a class="linkinfo" href="<?= ROOT ?>/ProfileInfo?id=<?= $data->Creator_ID; ?>">
                                            <h6>
                                                <?= $data->Creator_Name; ?>
                                            </h6>
                                        </a>
                                    </div>
                                    <div style="flex: ;display: flex;gap: 10px;color: aliceblue;">
                                        <h6>Created Date -> </h6>
                                        <h6 style="font-weight: 300;">
                                            <?= $data->Created_Date; ?>
                                        </h6>
                                    </div>
                                    <div style="flex: ;display: flex;gap: 10px;color: aliceblue;">
                                        <h6>Description -> </h6>
                                        <h6 style="font-weight: 300;">
                                            <?= $data->Description; ?>
                                        </h6>
                                    </div>
                                </div>
                                <div style="margin-left: 10vw;">
                                    <div style="flex: ;display: flex;gap: 10px;color: aliceblue;">
                                        <h6>Assigned to -> </h6>
                                        <a class="linkinfo"
                                            href="<?= isset($data->Collector_ID) ? ROOT . '/ProfileInfo?id=' . $data->Collector_ID : 'javascript:void(0)'; ?>">
                                            <h6>
                                                <?= $data->Collector_Name ?? "Not assigned"; ?>
                                            </h6>
                                        </a>
                                    </div>
                                    <div style="flex: ;display: flex;gap: 10px;color: aliceblue;">
                                        <h6>Collected From -> </h6>
                                        <a class="linkinfo"
                                            href="<?= isset($data->Customer_ID) ? ROOT . '/ProfileInfo?id=' . $data->Customer_ID : 'javascript:void(0)'; ?>">
                                            <h6>
                                                <?= $data->customer_Name ?? "Not assigned"; ?>
                                            </h6>
                                        </a>
                                    </div>

                                    <div style="flex: ;display: flex;gap: 10px;color: aliceblue;">
                                        <h6>Waste weight -> </h6>
                                        <h6 style="font-weight: 300;">
                                            <?= $data->Weight . "Kg" ?? "Not assigned"; ?>
                                        </h6>
                                    </div>
                                    <div style="flex: ;display: flex;gap: 10px;color: aliceblue;">
                                        <h6>Sorting Job -> </h6>
                                        <a class="linkinfo"
                                            href="<?= isset($data->Sorting_Job_ID) ? ROOT . '/SortingManager/SortingJobProgress?id=' . $data->Sorting_Job_ID : 'javascript:void(0)'; ?>">
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
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="<?= ROOT ?>/js/material.min.js"></script>
    <script src="<?= ROOT ?>/js/loadcomponent.js"></script>
    <script src="<?= ROOT ?>/js/progress.js"></script>
</body>

</html>