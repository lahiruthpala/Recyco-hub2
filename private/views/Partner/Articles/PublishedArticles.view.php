<div class="card__supporting-text no-padding" id="PublishedArticles" style="display: block;">
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
                        var <?='img'.$article->Article_ID ?> = new Image();
                        <?='img'.$article->Article_ID ?>.onload = function () {
                            var canvas = document.getElementById('<?= $article->Article_ID ?>_img');
                            var ctx = canvas.getContext('2d');
                            canvas.width = 1200;
                            canvas.height = 630;
                            ctx.drawImage(<?='img'.$article->Article_ID ?>, 0, 0, canvas.width, canvas.height);
                            var resizedImg = canvas.toDataURL('image/jpeg', 1.0);
                            // Use the resizedImg as needed
                        };
                        <?='img'.$article->Article_ID ?>.onerror = function () {
                            console.error('Failed to load image: <?= ROOT ?>/images/Article/<?= $article->Article_ID ?>.jpg');
                        };
                        <?='img'.$article->Article_ID ?>.src = "<?= ROOT ?>/images/Article/<?= $article->Article_ID ?>.jpg";
                    </script>
                    <div class="card__supporting-text card--expand">
                        <?= $article->Description ?><br><br>
                    </div>
                    <div class="card__actions" style="display: flex;justify-content: end;">
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
            // If $rows is not an array or is empty
            echo "No data available.";
        }
        ?>
    </div>
</div>