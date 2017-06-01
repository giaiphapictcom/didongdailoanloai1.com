<?php echo $this->Html->css('nivo-slider'); ?>
<div class="titlemain"><?php echo $tieude['Catalbum']['name']; ?></div>
<div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">
        <?php
        foreach ($detailAlbum as $field) {
            ?>
        <img src="<?php echo IMAGEAD; ?>album/<?php echo $field['Album']['images']; ?>" width="1000" />
        <?php } ?>
    </div>
</div>
<?php echo $this->Html->script('jquery.nivo.slider'); ?>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
</script>
<div class="titlemain">Bộ sưu tập khác</div>
<div>
    <?php foreach($khac as $rows) { ?>
    <div style="float: left; margin: 8px;">
        <a href="<?php echo DOMAIN; ?>bo-suu-tap/<?php echo $rows['Catalbum']['id']; ?>/<?php echo $rows['Catalbum']['slug'] . ".html"; ?>"><img src="<?php echo IMAGEAD; ?>gallery/<?php echo $rows['Catalbum']['images']; ?>" class="bdimg1" /></a>
    </div>
    <?php } ?>
</div>