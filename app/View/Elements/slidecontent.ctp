<?php echo $this->Html->css('slidecontent'); ?>
<?php echo $this->Html->script(array('jquery-ui-1.9.0.custom.min', 'jquery-ui-tabs-rotate')); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $("#featured").tabs({fx: {opacity: "toggle"}}).tabs("rotate", 5000, true);
    });
</script>
<div id="featured" >
		  <ul class="ui-tabs-nav">
        <?php
        $tinnoibat = $this->requestAction('/common/tinnoibat');
        foreach ($tinnoibat as $k => $rows) {
            ?>
            <li class="ui-tabs-nav-item" id="nav-fragment-1"><a href="#fragment-<?php echo $k + 1; ?>"><img src="<?php echo IMAGEAD; ?>news/<?php echo $rows['News']['images']; ?>" alt="" /><span><?php echo $rows['News']['name']; ?></span></a></li>
        <?php } ?>
    </ul>

    <?php
    foreach ($tinnoibat as $k => $rows) {
        ?>
        <div id="fragment-<?php echo $k + 1; ?>" class="ui-tabs-panel" style="">
            <img src="<?php echo IMAGEAD; ?>news/<?php echo $rows['News']['images']; ?>" alt="" />
            <div class="info" >
                <h2><a href="#" ><?php echo $rows['News']['name']; ?></a></h2>
                <p><?php echo String::truncate($rows['News']['shortdes'], 250); ?></p>
            </div>
        </div>
    <?php } ?>
</div>