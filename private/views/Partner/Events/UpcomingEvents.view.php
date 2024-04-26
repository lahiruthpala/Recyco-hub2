<div class="card__supporting-text no-padding" id="UpcomingEvents" style="display: block;">
    <div style="display: flex;flex-direction: row;flex-wrap: wrap;">
        <?php
        if (is_array($Events) && !empty($Events)) {
            foreach ($Events as $Event) {
                // Your table row generation code here
                ?>
                <div class="cell cell--4-col-desktop cell--4-col-tablet cell--2-col-phone">
                    <div class="card shadow--2dp" style="background-color: #444;">
                        <div class="card__title">
                            <h2 class="card__title-text">
                                <?= $Event->Event_Title ?>
                            </h2>
                        </div>
                        <canvas id="<?= $Event->Event_ID?>_img"></canvas>
                        <script>
                            var img = new Image();
                            img.onload = function () {
                                var canvas = document.getElementById('<?=$Event->Event_ID?>_img');
                                var ctx = canvas.getContext('2d');
                                canvas.width = 1200;
                                canvas.height = 630;
                                ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
                                var resizedImg = canvas.toDataURL('image/jpeg', 1.0);
                                // Use the resizedImg as needed
                            };
                            img.onerror = function () {
                                console.error('Failed to load image: <?= ROOT ?>/images/Events/<?= $Event->Event_ID ?>.jpg');
                            };
                            img.src = "<?= ROOT ?>/images/Events/<?= $Event->Event_ID ?>.jpg";
                        </script>
                        <div class="card__supporting-text card--expand">
                            <?= $Event->Description ?><br><br>
                        </div>
                        <div class="card__actions">
                            <a style="background-color: #16C784; border-radius: 20px; margin-left: 10px;"
                                class="button js-button button--raised js-ripple-effect button--colored-green"
                                href="<?= ROOT ?>/Partner/EditEvent/<?= $Event->Event_ID ?>">
                                Edit
                            </a>
                            <a style="background-color: #16C784; border-radius: 20px;"
                                class="button js-button button--raised js-ripple-effect button--colored-green"
                                href="<?= ROOT ?>/Partner/EventDelete/<?= $Event->Event_ID ?>">
                                Delete
                            </a>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            // If $rows is not an array or is empty
            echo "No data available.";
        }
        ?>
    </div>
</div>