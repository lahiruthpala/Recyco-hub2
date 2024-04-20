<header class="layout__header">
    <div class="layout__header-row">
        <div
            style="display: flex; justify-content: center; align-items: center; margin-right: auto; height: 100%; align:center">
            <img src="<?= ROOT ?>/images/RecycoHub.png" style="height: 80%; border-radius: 99px; ">
            <span style="font-size: 30px; line-height: 1.5; font-weight: 600; color:green">RecycoHUB</span>
        </div>
      
        <div></div>
        <!-- Search-->
        <div class="textfield js-textfield textfield--expandable" style="margin-right: auto; margin-left: 10px;">
    <label class="button js-button button--icon" for="search">
        <i class="material-icons">search</i>
    </label>

    <div class="textfield__expandable-holder" style="display: block !important; border: none; background-color: #f0f0f0;width:500px">
        <input class="textfield__input" type="text" id="search" />
        <label class="textfield__label" style="color:black " for="search">Enter your query...</label>
        <ul id="product-list"></ul> <!-- Unordered list to display matching products -->
    </div>
</div>


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
                <a href="<?= ROOT . '/' . Auth::getRole() ?>/profile">
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
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("search").addEventListener("input", function() {
            var query = this.value;
            if (query.length >= 0) {
                var xhr = new XMLHttpRequest();
                var url = ROOT +'Ecommercesite/search'; // URL of the server-side script handling the search
                var method = 'POST';

                xhr.open(method, url, true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            var response = JSON.parse(xhr.responseText);
                             updateProductList(response); // Call function to update the product list
                        } else {
                            console.error('Error: ' + xhr.status);
                        }
                    }
                };

                   var data = 'query=' + encodeURIComponent(query);
                   xhr.send(data);
                  } else {
                  clearProductList(); // Clear the product list if query length is less than 3 characters
                   }
                 });
               });

// Function to update the product list
function updateProductList(products) {
var productList = document.getElementById('product-list');
// Clear existing product list
productList.innerHTML = '';
// Populate the product list with matching products
products.forEach(function(product) {
var listItem = document.createElement('li');
listItem.textContent = product.product_name; // Assuming 'name' is the property containing the product name
productList.appendChild(listItem);
});
}

// Function to clear the product list
function clearProductList() {
    var productList = document.getElementById('product-list');
    // Clear existing product list
    productList.innerHTML = '';
}
</script>
<script src="<?= ROOT ?>/js/Notification.js"></script> 