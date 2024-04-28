<header class="layout__header">
    <div class="layout__header-row">
        <div
            style="display: flex; justify-content: center; align-items: center; margin-right: auto; height: 100%; align:center">
            <img src="<?= ROOT ?>/images/RecycoHub.png" style="height: 80%; border-radius: 99px; ">
            <span style="font-size: 30px; line-height: 1.5; font-weight: 600; color:green">RecycoHUB</span>
        </div>
        <div style="display: flex; margin-right:auto; gap:30px; justify-content: space-between;">
            <a href="<?= ROOT ?>/GeneralManager" <?= setActiveTab(1) ?>>Inventory</a>
            <?php if (Auth::getRole() == 'SortingManager'): ?>
                <a href="<?= ROOT ?>/SortingManager" <?= setActiveTab(2) ?>>Sorting Jobs</a>
            <?php endif; ?>
            <?php if (Auth::getRole() == 'GeneralManager'): ?>
                <a href="<?= ROOT ?>/GeneralManager/partnership" <?= setActiveTab(3) ?>>Partnership</a>
            <?php endif; ?>
            <a href="<?= ROOT ?>/GeneralManager/collector" <?= setActiveTab(4) ?>>Collection</a>
            <?php if (Auth::getRole() == 'GeneralManager'): ?>
                <a href="<?= ROOT ?>/Ecommercesite" <?= setActiveTab(5) ?>>Store</a>
            <?php endif; ?>
        </div>
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
                <a href="<?= ROOT . '/' . Auth::getRole() ?>/profile">
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