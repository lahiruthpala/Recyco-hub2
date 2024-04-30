<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="<?= ROOT ?>/js/Toastify.js"></script>
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