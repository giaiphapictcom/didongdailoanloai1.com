<div class="boxmain">
    <div class="box-title">
        <div class="titlemain"><?php echo $detailNews['News']['name']; ?></div>
    </div>
    <div class="content">
        <?php echo $detailNews['News']['content']; ?>
    </div>
    <p class="detail" style="text-align:right;"><a href="#" onclick="javascript:history.back();">[Quay lại]</a></p></td>
<br>

<div class="boxmain">
    <h3>Các tin liên quan</h3>
    <?php foreach ($tinkhac as $rows) { ?>
        <div class="tinhot"><a href="<?php echo DOMAIN; ?>chi-tiet-tin/<?php echo $rows['News']['id']; ?>/<?php echo $rows['News']['slug'] . ".html"; ?>"><?php echo $rows['News']['name']; ?></a></div>
        <?php } ?>
</div>
</div>