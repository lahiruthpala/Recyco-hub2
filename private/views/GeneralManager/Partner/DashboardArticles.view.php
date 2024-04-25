<head>
    <link rel="stylesheet" href="<?= ROOT ?>/css/horizontal.css">
</head>

<div class="scrollmain" id="ArticlePreview" style="display:none">
    <div class="scrollcontainer">
        <div class="scroll">
            <?php
            foreach($articles as $article) { ?>
            <div class="scrollcard" style="background-color:#16896E; padding:10px">
                <div class="scrollcard-image" style="padding:10">
                    <img src="<?=ROOT?>/images/Article/<?=$article->Article_ID?>.jpg" loading="lazy" class="responsive scrollimg" alt="Images">
                </div>
                <div class="scrollcard-inner">
                    <h3 class="text text-title" style="color: white;"><?=$article->Article_Title?></h3>
                    <p class="paragraph truncate" style="color: white;">
                    <?=$article->Description?>
                    </p>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<script src="<?= ROOT ?>/js/horizontal.js"></script>