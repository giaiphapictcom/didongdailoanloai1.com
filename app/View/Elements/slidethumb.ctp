<?php echo $this->Html->script('jquery.ad-gallery'); ?>
<?php echo $this->Html->css('jquery.ad-gallery'); ?>
<script type="text/javascript">
    $(function() {
        var galleries = $('.ad-gallery').adGallery();
        $('#toggle-slideshow').click(
        function() {
            galleries[0].slideshow.toggle();
            return false;
        }
    );
        $('#toggle-description').click(
        function() {
            if(!galleries[0].settings.description_wrapper) {
                galleries[0].settings.description_wrapper = $('#descriptions');
            } else {
                galleries[0].settings.description_wrapper = false;
            }
            return false;
        }
    );
    });
</script>
<div id="gallery" class="ad-gallery">
    <div class="ad-image-wrapper"> </div>
    <div class="ad-nav">
        <div class="ad-thumbs">
            <ul class="ad-thumb-list">
                <?php
                    $slideshow = $this->requestAction('/comment/slideshow');
                    foreach ($slideshow as $k => $field) {
                        ?>
                    <li> <a href="<?php echo IMAGEAD; ?>slide/<?php echo $field['Slideshow']['images']; ?>"> <img src="<?php echo IMAGEAD; ?>slide/<?php echo $field['Slideshow']['images']; ?>" class="image<?php echo $k; ?>" height="93" width="145" /> </a> </li>
                        <?php } ?>  
            </ul>
        </div>
    </div>
</div>