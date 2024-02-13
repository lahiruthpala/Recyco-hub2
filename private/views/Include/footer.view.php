<script src="<?= ROOT ?>/js/Toastify"></script>
<script src="<?= ROOT ?>/js/material.min.js"></script>
<script src="<?= ROOT ?>/js/helper.js"></script>
<div style="display:none" id="popupnotification">
    <?php while (message()) {
        $msg = message([], true)[0];
        var_dump($msg);
        if ($msg[1] == 'success') { ?>
            <div id="success">
                <h3>
                    <?= $msg[0] ?>
                </h3>
            </div>
        <?php } else { ?>
            <div id="error">
                <h3>
                    <?= $msg[0] ?>
                </h3>
            </div>
        <?php } ?>
    <?php } ?>
</div>
</body>

</html>