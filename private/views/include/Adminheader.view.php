<header class="layout__header">
    <div class="layout__header-row">
        <div
            style="display: flex; justify-content: center; align-items: center; margin-right: auto; height: 100%; align:center">
            <img src="<?= ROOT ?>/images/RecycoHub.png" style="height: 80%; border-radius: 99px; ">
            <span style="font-size: 30px; line-height: 1.5; font-weight: 600; color:green">RecycoHUB</span>
        </div>
        <div style="display: flex; margin-right:auto; gap:30px">
            <a href="<?= ROOT ?>/Admin/AccountManagement" <?= setActiveTab(2) ?>>Account Management</a>
            <a href="<?= ROOT ?>/Admin/SortingCenter" <?= setActiveTab(3) ?>>Sorting Center Management</a>
            <a href="<?= ROOT ?>/GeneralManager/collector" <?= setActiveTab(4) ?>>Complaint Management</a>
            <a href="<?= ROOT ?>/Dashboard" <?= setActiveTab(5) ?>>Other</a>
        </div>
        <div></div>
        <!-- Search-->
        <!-- <div class="textfield js-textfield textfield--expandable">
                    <label class="button js-button button--icon" for="search">
                        <i class="material-icons">search</i>
                    </label>

                    <div class="textfield__expandable-holder">
                        <input class="textfield__input" type="text" id="search" />
                        <label class="textfield__label" for="search">Enter your query...</label>
                    </div>
                </div> -->

        <div class="material-icons badge badge--overlap button--icon notification" id="notification"
            data-badge="4">
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
        <ul class="menu list menu--bottom-right js-menu js-ripple-effect shadow--2dp account-dropdown"
            for="icon">
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
                <span class="list__item-primary-content">
                    <i class="material-icons list__item-icon">account_circle</i>
                    My account
                </span>
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

        <ul class="menu menu--bottom-right js-menu js-ripple-effect shadow--2dp settings-dropdown"
            for="more">
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
<script>

</script>