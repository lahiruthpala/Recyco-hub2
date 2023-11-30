<script>
    document.getElementById('continue').addEventListener('click', function () {
        // Use AJAX to load a new componen
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // Replace the content of the 'content' section with the new component
                document.getElementById('content').innerHTML = this.responseText;
            }
        };
        xhttp.open('GET', 'GeneralManager/addNewInventory', true);
        xhttp.send();
    });
</script>
<div class="mdl-card mdl-card__login mdl-shadow--2dp">
    <div class="mdl-card__supporting-text color--dark-gray">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                <span class="mdl-card__title-text text-color--smooth-gray">Recyco-HUB</span>
            </div>
            <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                <span class="login-name text-color--white">Forgot password?</span>
                <span class="login-secondary-text text-color--smoke">Enter your email below to recieve your
                    password</span>
            </div>
            <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size is-upgraded"
                    data-upgraded=",MaterialTextfield">
                    <input class="mdl-textfield__input" type="text" id="e-mail">
                    <label class="mdl-textfield__label" for="e-mail">Email</label>
                </div>
            </div>
            <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone submit-cell">
                <div class="mdl-layout-spacer"></div>
                <buttons id="continue" class="mdl-button mdl-js-button mdl-button--raised color--light-blue">
                    Continue
                </buttons>
            </div>
        </div>
    </div>
</div>