<head>
    <link rel="stylesheet" href="<?= ROOT ?>/css/horizontal.css">
</head>

<div class="scrollmain" id="EventPreview">
    <div class="scrollcontainer">
        <div class="scroll">
            <?php
            foreach ($events as $event) { ?>
                <div class="scrollcard" style="background-color:#333; padding:10px">
                    <div class="scrollcard-image" style="padding:10">
                        <img src="<?= ROOT ?>/images/Events/<?= $event->Event_ID ?>.jpg" loading="lazy"
                            class="responsive scrollimg" alt="Images">
                    </div>
                    <div class="scrollcard-inner">
                        <h3 class="text text-title" style="color: white;"><?= $event->Event_Title ?></h3>
                        <p class="paragraph truncate" style="color: white;">
                            <?= $event->Description ?>
                        </p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<script src="<?= ROOT ?>/js/horizontal.js"></script>