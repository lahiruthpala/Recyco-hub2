<header class="layout__header">
    <div class="layout__header-row">
        <div
            style="display: flex; justify-content: center; align-items: center; margin-right: auto; height: 100%; align:center">
            <img src="<?= ROOT ?>/images/RecycoHub.png" style="height: 80%; border-radius: 99px; ">
            <a href="<?=ROOT?>"><span style="font-size: 30px; line-height: 1.5; font-weight: 600; color:green">RecycoHUB</span></a>
        </div>
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
            <img src="<?= ROOT ?>/images/Users/<?=Auth::getUser_ID()?>.jpg" style="border-radius: 90px;">
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
    </div>
</header>