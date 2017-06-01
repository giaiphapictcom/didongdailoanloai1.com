<div id="content_left">
<ul id="menu1">
<?php foreach($dmmnl as $row) { ?>
<li><a href="<?php echo DOMAIN; ?>tin-tuc/<?php echo $row['Catalogue']['id'];?>/<?php echo $row['Catalogue']['slug'];?>.html"><?php echo $row['Catalogue']['name'];?></a></li>
<?php } ?>
</ul>
</div>
<div class="boxmain">
    <div class="titlemain"><?php echo $detailNews['News']['name']; ?></div>
    <div class="box1 padd4all">
        <div class="content">
            <?php echo $detailNews['News']['content']; ?>
        </div>
        <p class="detail" style="text-align:right;"><a href="#" onclick="javascript:history.back();">[Quay lại]</a></p></td>
        <br>
        <h3>Các tin liên quan</h3>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <?php foreach ($tinkhac as $rows) { ?>
                <tr>
                    <td class="tinhot"><a href="<?php echo DOMAIN; ?>chi-tiet-tin-tuc/<?php echo $rows['News']['id']; ?>"><?php echo $rows['News']['name']; ?></a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>