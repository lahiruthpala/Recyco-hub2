<div class="card__supporting-text no-padding" id="DraftArticles" style="display: none;">
    <div style="display: flex;flex-direction: row;flex-wrap: wrap;justify-content: center;">
        <?php
        if (is_array($articles) && !empty($articles)) {
            foreach ($articles as $article) {
                // Your table row generation code here
                ?>
                <div class="card shadow--2dp" style="background-color: #444;max-height: 500px;max-width: 400px;margin: 16px;">
                    <div class="card__title">
                        <h2 class="card__title-text">
                            <?= $article->Article_Title ?>
                        </h2>
                    </div>
                    <canvas id="<?= $article->Article_ID ?>_img"></canvas>
                    <script>
                        var img = new Image();
                        img.onload = function () {
                            var canvas = document.getElementById('<?= $article->Article_ID ?>_img');
                            var ctx = canvas.getContext('2d');
                            canvas.width = 1200;
                            canvas.height = 630;
                            ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
                            var resizedImg = canvas.toDataURL('image/jpeg', 1.0);
                            // Use the resizedImg as needed
                        };
                        img.onerror = function () {
                            console.error('Failed to load image: <?= ROOT ?>/images/Article/<?= $article->Article_ID ?>.jpg');
                        };
                        img.src = "<?= ROOT ?>/images/Article/<?= $article->Article_ID ?>.jpg";
                    </script>
                    <div class="card__supporting-text card--expand">
                        <?= $article->Description ?><br><br>
                    </div>
                    <div class="card__actions">
                        <a style="background-color: #16C784; border-radius: 20px; margin-left: 10px;"
                            class="button js-button button--raised js-ripple-effect button--colored-green"
                            href="<?= ROOT ?>/Partner/EditArticle/<?= $article->Article_ID ?>">
                            Edit
                        </a>
                        <a style="background-color: #16C784; border-radius: 20px;"
                            class="button js-button button--raised js-ripple-effect button--colored-green"
                            href="<?= ROOT ?>/Partner/ArticleDelete/<?= $article->Article_ID ?>">
                            Delete
                        </a>
                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <img src='<?= ROOT ?>/images/NoArticles.jpg'>
            <?php
        }
        ?>
    </div>
</div>