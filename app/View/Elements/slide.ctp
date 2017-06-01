<?php echo $this->Html->css('nivo-slider'); ?>
<div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">
        <?php
        $slideshow = $this->requestAction('/common/slideshow');
        foreach ($slideshow as $field) {
            ?>
            <a href="<?php echo $field['Slideshow']['link']; ?>"><img src="<?php echo IMAGEAD; ?>slide/<?php echo $field['Slideshow']['images']; ?>" data-thumb="<?php echo IMAGEAD; ?>slide/<?php echo $field['Slideshow']['images']; ?>" alt="" /></a>
        <?php } ?>
    </div>
</div>
<?php echo $this->Html->script('jquery.nivo.slider'); ?>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider({
        });
    });
</script>