<div class="hotline">
    <div style="font-size: 18px; font-weight: bold;">Hotline: banvere.vn</div>
    <div style="font-size: 14px; margin-left: 60px; border-left: 1px solid #CCC; padding-left: 20px;">
        <?php echo $setting['Setting']['hotline']; ?>
    </div>
    <div class="yahooHotline">
        <a style="color: #143B85; font-weight: bold; font-size: 12px;" href="ymsgr:sendim?abayhn8">Ms Vân Online</a>
    </div>
</div>
<?php
$quangcao = $this->requestAction('/common/quangcao');
foreach ($quangcao as $field) {
    if ($field['Advertisement']['display'] == 2) {
        ?>
        <div class="paddbottom">
            <a href="<?php echo $field['Advertisement']['link']; ?>" target="_blank"><img src="<?php echo IMAGEAD; ?>logo/<?php echo $field['Advertisement']['images']; ?>" width="198" /></a>
        </div>
    <?php
    }
}
?>