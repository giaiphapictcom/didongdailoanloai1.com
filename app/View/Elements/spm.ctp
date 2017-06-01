<?php echo $this->Html->script(array('organictabs.jquery')); ?>
<?php echo $this->Html->css(array('organictabs.jquery')); ?>
<script>
    $(function() {
        $("#orgatab").organicTabs();
    });
</script>
<div style="margin: 15px auto;">
    <?php echo $this->element('search'); ?>
</div>
<div id="orgatab">
    <ul class="nav">
        <?php foreach ($spHome as $k => $row) { ?>
            <li><a href="#featured<?php echo $k; ?>" <?php if ($k == 0) {
            echo ' class="current"';
        } ?>><?php echo $row['dm']['Catalogue']['name'] ?></a></li>            
        <?php } ?>
    </ul>
    <div class="list-wrap">
            <?php foreach ($spHome as $k => $row) { ?>
            <div id="featured<?php echo $k; ?>" <?php if ($k != 0) {
                echo ' class="hide"';
            } ?>>
            <?php
            foreach ($row['sp'] as $rows) {
                ?>
                    <div class="bgproduct">
                        <div><a href="<?php echo DOMAIN; ?>chi-tiet-san-pham/<?php echo $rows['Product']['id']; ?>/<?php echo $rows['Product']['slug'] . ".html"; ?>"><img src="<?php echo IMAGEAD; ?>product/<?php echo $rows['Product']['images']; ?>" width="224" height="210" /></a></div>
                        <div align="center" class="proName"><?php echo $rows['Product']['name']; ?></div>
                        <div class="price"> 
                            <?php
                            if ($rows['Product']['type'] == 1) {
                                if($rows['Product']['price1'] > 0) {
                                    echo '<span class="old-price">' . number_format($rows['Product']['price']) . ' vnđ</span><br>';
                                    echo '<span class="new-price">' . number_format($rows['Product']['price1']) . ' vnđ</span>';
                                } else {
                                    echo '<span class="new-price">' . number_format($rows['Product']['price']) . ' vnđ</span>';
                                }                                
                            } else {
                                echo "Liên hệ";
                            }
                            ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>