<form class="form form--basic" method="POST">
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone form__article"
            style="margin-top: 3%; margin-bottom: 5%;">
            <div style="display: flex; justify-content: center; align-items: center;">
                <div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">

                        <input class="mdl-textfield__input" type="text" id="floating-last-name"
                            placeholder="Assign Line" name="Artical_Title"
                            value="<?= isset($article->Artical_Title) ? $article->Artical_Title : '' ?>">
                        <label class="mdl-textfield__label" for="floating-last-name"></label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                        <input class="mdl-textfield__input" type="text" id="floating-e-mail" placeholder="Discription"
                            name="Discription" value="<?= isset($article->Discription) ? $article->Discription : '' ?>">
                        <label class="mdl-textfield__label" for="floating-e-mail"></label>
                    </div>
                    <div class="mdl-card__actions">
                        <a style="background-color: #4c504e; border-radius: 20px; margin-left: 10px;"
                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-light-blue pull-right"
                            href='http://localhost:8380/Recyco-hub2/private/views/Include/qrscaner2/index.view.php'>
                            Add Inventory
                        </a>

                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                        <input class="mdl-textfield__input" type="text" id="password" placeholder="Password">
                        <label class="mdl-textfield__label" for="password"></label>
                    </div>
                    <div class="mdl-card__actions">
                        <a
                            style="margin-left: 240px; background-color: #16C784; border-radius: 20px; margin-left: 10px;">
                            <button type="submit" style="border-radius: 20px;"
                                class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green pull-right">
                                Create</button>
                        </a>

                    </div>
                </div>
                <div>
                </div>
            </div>
        </div>
        <div style="width: 30%; height: 30%; margin-left: 10%; margin-top: 3%;"
            class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
            <div class="mdl-card mdl-shadow--2dp trending">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Inventory</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <ul class="mdl-list">
                        <?php
                        if (is_array($inventories) && !empty($inventories)) {
                            foreach ($inventories as $inventory) {
                                ?>
                                <li class="mdl-list__item">
                                    <span class="mdl-list__item-primary-content list__item-text"><?=$inventory?></span>
                                </li>
                                <?php
                            }
                        } else {
                            // If $rows is not an array or is empty
                            echo "No Inventory available.";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</form>