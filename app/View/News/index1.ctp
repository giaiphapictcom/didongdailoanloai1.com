<div id="content_left">
<ul id="menu1">
<?php foreach($dmmnl as $row) { ?>
<li><a href="<?php echo DOMAIN; ?>tin-tuc/<?php echo $row['Catalogue']['id'];?>/<?php echo $row['Catalogue']['slug'];?>.html"><?php echo $row['Catalogue']['name'];?></a></li>
<?php } ?>
</ul>
</div>
<div class="boxmain">
    <div class="titlemain"><?php echo $tieude['Catalogue']['name']; ?></div>
    <div class="box1 padd4all">
        <?php foreach ($listNews as $rows) { ?>
            <div style="margin-bottom: 6px;">
                <div align="justify">
                    <?php if ($rows['News']['images'] != "") { ?>
                        <div style="float: left; margin-right: 15px;"><a href="<?php echo DOMAIN; ?>chi-tiet-tin-tuc/<?php echo $rows['News']['id']; ?>/<?php echo $rows['News']['slug'] . ".html"; ?>"><img src="<?php echo IMAGEAD; ?>news/<?php echo $rows['News']['images']; ?>" width="170" class="bdimg" /></a></div>
                    <?php } ?>
                    <div class="titleNews1"><a href="<?php echo DOMAIN; ?>chi-tiet-tin-tuc/<?php echo $rows['News']['id']; ?>"><?php echo $rows['News']['name']; ?></a></div>
                    <div class="content"> <?php echo $rows['News']['shortdes']; ?></div>
                    <div class="detail"><a href="<?php echo DOMAIN; ?>chi-tiet-tin-tuc/<?php echo $rows['News']['id']; ?>/<?php echo $rows['News']['slug'] . ".html"; ?>"><?php echo __('chitiet'); ?></a></div>
                </div>
                <div class="gachngan"></div>
            </div>
        <?php } ?>
    </div>
    <div class="clear"></div>
    <div class="pagination" style="text-align: center; margin: 4px auto;">
        <?php
        echo $this->Paginator->prev('«  ', null, null, array('class' => 'disabled'));
        echo $this->Paginator->numbers() . " ";
        echo $this->Paginator->next('  »', null, null, array('class' => 'disabled'));
        ?>
    </div>
</div>