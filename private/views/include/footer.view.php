<script src="<?= ROOT ?>/js/Toastify"></script>
<script src="<?= ROOT ?>/js/material.min.js"></script>
<script src="<?= ROOT ?>/js/loadcomponent.js"></script>
<script src="<?= ROOT ?>/js/helper.js"></script>
<div style="display:block" id="PopupNotification">
    <?php
    $messages = message([], true);
    if ($messages !== false) {
        foreach ($messages as $msg) {
    ?>
        <h6 class="<?=$msg[1]; ?>"><?=$msg[0];?></h6>
    <?php }} ?>
</div>
</body>

</html>