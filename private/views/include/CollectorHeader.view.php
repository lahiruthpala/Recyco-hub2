<header class="layout__header">
    <div class="layout__header-row">
        <div
            style="display: flex; justify-content: center; align-items: center; margin-right: auto; height: 100%; align:center">
            <img src="<?= ROOT ?>/images/RecycoHub.png" style="height: 80%; border-radius: 99px; ">
            <span style="font-size: 30px; line-height: 1.5; font-weight: 600; color:green">RecycoHUB</span>
        </div>
        <!-- <div style="display: flex; margin-right:auto; gap:30px; justify-content: space-between;">
            <a href="<?= ROOT ?>/GeneralManager">Inventory</a>
            <a href="<?= ROOT ?>/SortingManager">Sorting Jobs</a>
            //<?php if (Auth::getRole() == 'GeneralManager'): ?>
                <a href="<?= ROOT ?>/GeneralManager/partnership">Partnership</a>
            //<?php endif; ?>
            <a href="<?= ROOT ?>/GeneralManager/collector">Collection</a>
            //<?php if (Auth::getRole() == 'GeneralManager'): ?>
                <a href="<?= ROOT ?>/Store">Store</a>
            //<?php endif; ?>
        </div> -->
        <div></div>
        <div class="material-icons badge badge--overlap button--icon notification" id="notification" data-badge="4">
            notifications_none
        </div>
        <!-- Notifications dropdown-->
        <ul class="menu list js-menu js-ripple-effect menu--bottom-right shadow--2dp notifications-dropdown"
            for="notification">
            <ul id="notificationList" style="padding: 1px;"></ul>
            <li class="list__item list__item--border-top">
                <button href="#" class="button js-button js-ripple-effect">ALL
                    NOTIFICATIONS</button>
            </li>
        </ul>

        <div class="avatar-dropdown" id="icon">
            <span>
                <?= Auth::getUserName() ?>
            </span>
            <img src="<?= ROOT ?>/images/Icon_header.png">
        </div>
        <!-- Account dropdawn-->
        <ul class="menu list menu--bottom-right js-menu js-ripple-effect shadow--2dp account-dropdown" for="icon">
            <li class="list__item list__item--two-line">
                <span class="list__item-primary-content">
                    <span class="material-icons list__item-avatar"></span>
                    <span>
                        <?= Auth::getUserName() ?>
                    </span>
                    <span class="list__item-sub-title">
                        <?= Auth::getEmail() ?>
                    </span>
                </span>
            </li>
            <li class="list__item--border-top"></li>
            <li class="menu__item list__item">
                <a href="<?= ROOT . '/' . Auth::getRole() . '/profile/' . Auth::getUser_ID()?>">
                    <span class="list__item-primary-content">
                        <i class="material-icons list__item-icon">account_circle</i>
                        My account
                    </span>
                </a>
            </li>
            <li class="menu__item list__item">
                <span class="list__item-primary-content">
                    <i class="material-icons list__item-icon">check_box</i>
                    My tasks
                </span>
                <span class="list__item-secondary-content">
                    <span class="label background-color--primary">3 new</span>
                </span>
            </li>
            <li class="menu__item list__item">
                <span class="list__item-primary-content">
                    <i class="material-icons list__item-icon">perm_contact_calendar</i>
                    My events
                </span>
            </li>
            <li class="list__item--border-top"></li>
            <li class="menu__item list__item">
                <span class="list__item-primary-content">
                    <i class="material-icons list__item-icon">settings</i>
                    Settings
                </span>
            </li>
            <a href="<?= ROOT ?>/Logout">
                <li class="menu__item list__item">
                    <span class="list__item-primary-content">
                        <i class="material-icons list__item-icon text-color--secondary">exit_to_app</i>
                        Log out
                    </span>
                </li>
            </a>
        </ul>

        <button id="more" class="button js-button button--icon">
            <i class="material-icons">more_vert</i>
        </button>

        <ul class="menu menu--bottom-right js-menu js-ripple-effect shadow--2dp settings-dropdown" for="more">
            <li class="menu__item">
                Settings
            </li>
            <a class="menu__item" href="https://github.com/CreativeIT/getmdl-dashboard/issues">
                Support
            </a>
            <li class="menu__item">
                Log out
            </li>
        </ul>
    </div>
</header>
<script src="<?= ROOT ?>/js/Notification.js"></script>