<div style="display:none" id="popupnotification">
    <?php if (message()): ?>
        <div id="errors">
            <?= message([], true)[0] ?>
        </div>
        <div id="success">

        </div>
    <?php endif; ?>
</div>
<header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
        <div
            style="display: flex; justify-content: center; align-items: center; margin-right: auto; height: 100%; align:center">
            <img src="<?= ROOT ?>/images/RecycoHub.png" style="height: 80%; border-radius: 99px; ">
            <span style="font-size: 30px; line-height: 1.5; font-weight: 600; color:green">RecycoHUB</span>
        </div>
        <div style="display: flex; margin-right:auto; gap:30px">
            <a href="<?= ROOT ?>/Dashboard">Dashboard</a>
            <a href="<?= ROOT ?>/GeneralManager">Inventory</a>
            <a href="<?= ROOT ?>/SortingManager">Sorting Jobs</a>
            <a href="<?= ROOT ?>/GeneralManager/partnership">Partnership</a>
            <a href="<?= ROOT ?>/GeneralManager/collector">Collection</a>
            <a href="<?= ROOT ?>/Dashboard">Store</a>
        </div>
        <div></div>
        <!-- Search-->
        <!-- <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                    <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
                        <i class="material-icons">search</i>
                    </label>

                    <div class="mdl-textfield__expandable-holder">
                        <input class="mdl-textfield__input" type="text" id="search" />
                        <label class="mdl-textfield__label" for="search">Enter your query...</label>
                    </div>
                </div> -->

        <div class="material-icons mdl-badge mdl-badge--overlap mdl-button--icon notification" id="notification"
            data-badge="4">
            notifications_none
        </div>
        <!-- Notifications dropdown-->
        <ul class="mdl-menu mdl-list mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right mdl-shadow--2dp notifications-dropdown"
            for="notification">
            <ul id="notificationList" style="padding: 1px;"></ul>
            <li class="mdl-list__item list__item--border-top">
                <button href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">ALL
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
        <ul class="mdl-menu mdl-list mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-shadow--2dp account-dropdown"
            for="icon">
            <li class="mdl-list__item mdl-list__item--two-line">
                <span class="mdl-list__item-primary-content">
                    <span class="material-icons mdl-list__item-avatar"></span>
                    <span>
                        <?= Auth::getUserName() ?>
                    </span>
                    <span class="mdl-list__item-sub-title">
                        <?= Auth::getEmail() ?>
                    </span>
                </span>
            </li>
            <li class="list__item--border-top"></li>
            <li class="mdl-menu__item mdl-list__item">
                <span class="mdl-list__item-primary-content">
                    <i class="material-icons mdl-list__item-icon">account_circle</i>
                    My account
                </span>
            </li>
            <li class="mdl-menu__item mdl-list__item">
                <span class="mdl-list__item-primary-content">
                    <i class="material-icons mdl-list__item-icon">check_box</i>
                    My tasks
                </span>
                <span class="mdl-list__item-secondary-content">
                    <span class="label background-color--primary">3 new</span>
                </span>
            </li>
            <li class="mdl-menu__item mdl-list__item">
                <span class="mdl-list__item-primary-content">
                    <i class="material-icons mdl-list__item-icon">perm_contact_calendar</i>
                    My events
                </span>
            </li>
            <li class="list__item--border-top"></li>
            <li class="mdl-menu__item mdl-list__item">
                <span class="mdl-list__item-primary-content">
                    <i class="material-icons mdl-list__item-icon">settings</i>
                    Settings
                </span>
            </li>
            <a href="<?= ROOT ?>/Logout">
                <li class="mdl-menu__item mdl-list__item">
                    <span class="mdl-list__item-primary-content">
                        <i class="material-icons mdl-list__item-icon text-color--secondary">exit_to_app</i>
                        Log out
                    </span>
                </li>
            </a>
        </ul>

        <button id="more" class="mdl-button mdl-js-button mdl-button--icon">
            <i class="material-icons">more_vert</i>
        </button>

        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-shadow--2dp settings-dropdown"
            for="more">
            <li class="mdl-menu__item">
                Settings
            </li>
            <a class="mdl-menu__item" href="https://github.com/CreativeIT/getmdl-dashboard/issues">
                Support
            </a>
            <li class="mdl-menu__item">
                Log out
            </li>
        </ul>
    </div>
</header>
<script src="<?= ROOT ?>/js/Notification.js"></script>