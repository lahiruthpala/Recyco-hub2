<?php
$this->view('include/head') ?>

<body>

    <head>
        <link rel="stylesheet" href="<?= ROOT ?>/css/chat.css">
    </head>
    <?php $this->view('include/header') ?>
    <div style="display: flex;align-items: center;justify-content: center;">
        <div class="wrapper">
            <div class="container">
                <div class="left">
                    <div class="top">
                        <input type="text" placeholder="Search" />
                        <a href="javascript:;" class="search"></a>
                    </div>
                    <ul class="people">
                        <li class="person" data-chat="default" style="display: none;"></li>
                        <li class="person" data-chat="person1">
                            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/382994/thomas.jpg" alt="" />
                            <span class="name">Thomas Bangalter</span>
                            <span class="time">2:09 PM</span>
                            <span class="preview">I was wondering...</span>
                        </li>
                    </ul>
                </div>
                <div class="right">
                    <div class="top"><span>To: <span class="name"></span></span></div>
                    <div class="chat" data-chat="default">
                    </div>
                    <div class="chat" data-chat="person1">
                        <div class="conversation-start">
                            <span>Today, 6:48 AM</span>
                        </div>
                        <div class="bubble you">
                            Hello,
                        </div>
                        <div class="bubble you">
                            it's me.
                        </div>
                        <div class="bubble you">
                            I was wondering...
                        </div>
                    </div>
                    <div class="write">
                        <form id="message-form" style="display: flex;width: 100%;">
                            <a class="write-link attach"></a>
                            <input type="text" />
                            <a class="write-link smiley"></a>
                            <a class="write-link send" type="submit"></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div
    <script src="<?= ROOT ?>/js/loadcomponent.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?= ROOT ?>/js/chat.js"></script>
    <?php $this->view('include/footer') ?>