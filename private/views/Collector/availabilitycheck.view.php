
<div class="card__supporting-text no-padding" id="check" style="display: none;">
    <p style="margin-right: 10px; color: black; margin-left: 500px; font-size: 30px;">Are you available tomorrow?</p>
    <div style="margin-top: 60px; display: flex; margin-left: 530px;">
        <div style="margin-top: 10px; display: flex; margin-left:90px">
            <a  href="<?= ROOT ?>/Collector/setstatus/Active"
               style="flex: 3; font-size: 20px; padding: 10px 20px; background-color:#139571; color: white; border: none; margin-right: 10px; text-align: center; display: inline-block;">Yes</a>
            <a  href="<?= ROOT ?>/Collector/setstatus/suspended"
               style="flex: 3; font-size: 20px; padding: 10px 20px; background-color:#CC3A2B; color: white; border: none; text-align: center; display: inline-block;">No</a>
        </div>
    </div>
    <?php
    if (is_array($rows) && !empty($rows)) :
        ?>
        <?php foreach ($rows as $row) :
                    ?>   
    <p style="margin-right: 10px; color: black; margin-left: 450px; font-size: 30px;">Your availability status for next day <span class="label label--mini color--light-blue margin-left:20px"><?= $row->Status ?></span></p>
    
                                
    <?php endforeach; ?>
     <?php else: ?>
        <p>status not available.</p>
    <?php endif; ?>
                    
</div>



