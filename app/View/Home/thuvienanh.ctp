<?php echo $this->Html->script('jquery.ad-gallery'); ?>
<?php echo $this->Html->css('jquery.ad-gallery'); ?>
<div class="titleleft">Hình ảnh nhà máy</div>
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
<div class="clear"></div>
<div id="gallery" class="ad-gallery">
    <div class="ad-image-wrapper"> </div>
    <div class="ad-nav">
        <div class="ad-thumbs">
            <ul class="ad-thumb-list">
                <?php
                    foreach ($detailAlbum as $k => $field) {
                        ?>
                    <li> <a href="<?php echo IMAGEAD; ?>album/<?php echo $field['Album']['images']; ?>"> <img src="<?php echo IMAGEAD; ?>album/<?php echo $field['Album']['images']; ?>" class="image<?php echo $k; ?>" height="93" width="145" /> </a> </li>
                        <?php } ?>  
            </ul>
        </div>
    </div>
</div>
<div class="clear"></div>