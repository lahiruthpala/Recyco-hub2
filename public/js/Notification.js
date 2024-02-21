function loadDoc() {
    setInterval(function () {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4) {
                if (this.status == 200) {
                    notification_data = JSON.parse(this.responseText);
                    console.log(notification_data);
                    document.getElementById("notification").setAttribute("data-badge", notification_data.success.length || 0);
                    // Get the <ul> element by its ID
                    var notificationList = document.getElementById("notificationList");
                    notificationList.innerHTML = '';
                    // Iterate over the first 5 notifications and add them to the list
                    for (var i = 0; i < 5 && i < notification_data.success.length; i++) {
                        var notification = notification_data.success[i];

                        // Create a new <li> element
                        var listItem = document.createElement("li");
                        listItem.className = "menu__item list__item list__item--border-top";

                        // Create and append the span element with the notification text
                        var spanElement = document.createElement("span");
                        spanElement.className = "list__item-primary-content";
                        var notificationText = document.createTextNode("You have a new notification: " + notification.Title);
                        spanElement.appendChild(notificationText);

                        listItem.appendChild(spanElement);

                        // Append the <li> element to the <ul> element
                        notificationList.appendChild(listItem);
                    }
                } else {
                    console.error("Error fetching notifications. Status: " + this.status);
                }
            }
        };
        xhttp.open("POST", ROOT + '/Notification/getNotifications', true);
        xhttp.send();
    }, 10000); // Adjust the interval duration (in milliseconds) as needed
}

loadDoc();