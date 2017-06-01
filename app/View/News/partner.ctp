<div class="titlepro"><?php echo __('doitac'); ?></div>
<div class="boxmain" style="margin-top: 20px;">
        <?php
        $quangcao = $this->requestAction('/common/quangcao');
        foreach ($quangcao as $field) {
            if ($field['Advertisement']['display'] == 1) {
                ?>
                <div class="partner">
                    <a href="<?php echo $field['Advertisement']['link']; ?>" target="_blank"><img src="<?php echo IMAGEAD; ?>logo/<?php echo $field['Advertisement']['images']; ?>" /></a>
                </div>
        <?php }} ?>
    </div>