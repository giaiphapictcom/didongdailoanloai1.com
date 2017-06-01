<div class="titlemain"><?php echo $video[0]['Video']['name']; ?></div>
<div class="row1">
    <div style="margin: 0 auto; text-align:  center;">
        <embed width="1000" height="562" wmode="transparent" type="application/x-shockwave-flash" src="http://www.youtube.com/v/<?php echo $video[0]['Video']['youtube']; ?>&autoplay=0&rel=0&loop=0">
    </div>
    <div class="">
        <?php foreach ($video as $rows) { ?>
            <div class="tinhot"><a href="<?php echo DOMAIN; ?>album/detailvideo/<?php echo $rows['Video']['id']; ?>"><?php echo $rows['Video']['name']; ?></a></div>
            <?php } ?>
    </div>
</div>