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
                <h1 class="title">--ID-- Track</h1>

                <div class="bar__container">
                    <ul class="bar" id="bar">
                        <li class="active">New</li>
                        <li>Assigned</li>
                        <li>Collected</li>
                        <li>In whorehouse</li>
                        <li>Sorting</li>
                        <li>Sorted</li>
                        <li>Ready To Sell</li>
                        <li>Sold</li>
                    </ul>
                </div>
            </div>
            <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
                <div class="mdl-card mdl-shadow--2dp">
                    <!-- <div class="mdl-layout__header-row">
                        <button id="stock" onclick="loadComponent('newsortingjobs')"
                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                            style="border-radius: 99px; margin-left: 1VW;"
                            data-upgraded=",MaterialButton,MaterialRipple">New Sorting Job<span
                                class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span></button>
                        <button onclick="loadComponent('SortingJobs')"
                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                            style="border-radius: 99px; margin-left: 1VW;"
                            data-upgraded=",MaterialButton,MaterialRipple">Pending Sorting Jobs<span
                                class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span></button>
                        <button onclick="loadComponent('SortedJobs')"
                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                            style="border-radius: 99px; margin-left: 1VW;"
                            data-upgraded=",MaterialButton,MaterialRipple">Finished Sorting Jobs<span
                                class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span></button>
                    </div> -->
                    <div class="mdl-card__title">
                        <h1 class="mdl-card__title-text" id="tableTitle">Not Assigned</h1>
                    </div>
                    <section id="cards">
                        <div class="card">
                            <h3 class="card__title">Competencia</h3>
                            <p class="card__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, alias
                                consectetur, iusto
                                non aut, voluptate recusandae saepe amet aperiam libero voluptatum, numquam quia totam.
                                Autem
                                iure nihil
                                iusto quos, consectetur.</p>
                            <div class="actions">
                                <a href="#" class="btn next">Next</a>
                            </div>
                        </div>

                        <div class="card">
                            <h3 class="card__title">Tu público</h3>
                            <p class="card__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, alias
                                consectetur, iusto
                                non aut, voluptate recusandae saepe amet aperiam libero voluptatum, numquam quia totam.
                                Autem
                                iure nihil
                                iusto quos, consectetur.</p>
                            <div class="actions">
                                <a href="#" class="btn prev">Prev</a>
                                <a href="#" class="btn next">Next</a>
                            </div>
                        </div>

                        <div class="card">
                            <h3 class="card__title">Producto o servicio</h3>
                            <p class="card__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, alias
                                consectetur, iusto
                                non aut, voluptate recusandae saepe amet aperiam libero voluptatum, numquam quia totam.
                                Autem
                                iure nihil
                                iusto quos, consectetur.</p>
                            <div class="actions">
                                <a href="#" class="btn prev">Prev</a>
                                <a href="#" class="btn next">Next</a>
                            </div>
                        </div>

                        <div class="card">
                            <h3 class="card__title">Comunicación</h3>
                            <p class="card__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, alias
                                consectetur, iusto
                                non aut, voluptate recusandae saepe amet aperiam libero voluptatum, numquam quia totam.
                                Autem
                                iure nihil
                                iusto quos, consectetur.</p>
                            <div class="actions">
                                <a href="#" class="btn prev">Prev</a>
                                <a href="#" class="btn next">Next</a>
                            </div>
                        </div>

                        <div class="card">
                            <h3 class="card__title">Informe</h3>
                            <p class="card__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, alias
                                consectetur, iusto
                                non aut, voluptate recusandae saepe amet aperiam libero voluptatum, numquam quia totam.
                                Autem
                                iure nihil
                                iusto quos, consectetur.</p>

                            <div class="actions">
                                <a href="#" class="btn prev">Prev</a>
                                <a href="#" class="btn next">Next</a>
                            </div>
                        </div>

                        <div class="card">
                            <h3 class="card__title">Informe</h3>
                            <p class="card__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, alias
                                consectetur, iusto
                                non aut, voluptate recusandae saepe amet aperiam libero voluptatum, numquam quia totam.
                                Autem
                                iure nihil
                                iusto quos, consectetur.</p>

                            <div class="actions">
                                <a href="#" class="btn prev">Prev</a>
                                <a href="#" class="btn next">Next</a>
                            </div>
                        </div>

                        <div class="card">
                            <h3 class="card__title">Informe</h3>
                            <p class="card__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, alias
                                consectetur, iusto
                                non aut, voluptate recusandae saepe amet aperiam libero voluptatum, numquam quia totam.
                                Autem
                                iure nihil
                                iusto quos, consectetur.</p>

                            <div class="actions">
                                <a href="#" class="btn prev">Prev</a>
                                <a href="#" class="btn next">Next</a>
                            </div>
                        </div>

                        <div class="card">
                            <h3 class="card__title">Informe</h3>
                            <p class="card__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, alias
                                consectetur, iusto
                                non aut, voluptate recusandae saepe amet aperiam libero voluptatum, numquam quia totam.
                                Autem
                                iure nihil
                                iusto quos, consectetur.</p>

                            <div class="actions">
                                <a href="#" class="btn prev">Prev</a>
                            </div>
                        </div>
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