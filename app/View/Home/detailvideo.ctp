<div class="title-home">
    <span class="title-home1"><?php echo $detailVideo['Video']['name']; ?></span><span class="title-home2"></span>
</div>
<div class="row1">
    <div style="margin: 20px auto; text-align:  center;">
        <embed width="610" height="432" wmode="transparent" type="application/x-shockwave-flash" src="http://www.youtube.com/v/<?php echo $detailVideo['Video']['youtube']; ?>&autoplay=0&rel=0&loop=0">
    </div>
    <p class="titleNews1" style="text-align:right;"><a href="#" onclick="javascript:history.back(); return false;">[Quay lại]</a></p></td>
</div>
<br>
<h3>Các video khác</h3>
<?php foreach ($tinkhac as $rows) { ?>
<div class="tinhot"><a href="<?php echo DOMAIN; ?>home/detailvideo/<?php echo $rows['Video']['id']; ?>"><?php echo $rows['Video']['name']; ?></a></div>
<?php } ?>
