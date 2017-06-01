<div class="titlepro">Search</div>
<div style="float: left; width: 670px;">
    <div class="boxmain">
        <?php foreach ($listNews as $rows) { ?>
            <div style="margin-bottom: 6px;">
                <div class="titleNews1"><a href="<?php echo DOMAIN; ?>chi-tiet-tin-tuc/<?php echo $rows['News']['id']; ?>"><?php echo $rows['News']['name']; ?></a></div>
                <div align="justify">
                    <?php if ($rows['News']['images'] != "") { ?>
                        <div style="float: left; margin-right: 5px;"><a href="<?php echo DOMAIN; ?>chi-tiet-tin-tuc/<?php echo $rows['News']['id']; ?>/<?php echo $rows['News']['slug'] . ".html"; ?>"><img src="<?php echo IMAGEAD; ?>news/<?php echo $rows['News']['images']; ?>" width="140" class="bdimg" /></a></div>
                    <?php } ?>
                    <div class="content"> <?php echo $rows['News']['shortdes']; ?></div>
                    <div align="right" class="detail"><a href="<?php echo DOMAIN; ?>chi-tiet-tin-tuc/<?php echo $rows['News']['id']; ?>/<?php echo $rows['News']['slug'] . ".html"; ?>"><?php echo __('chitiet'); ?></a></div>
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

<div style="float: right; width: 235px; margin-top: 20px;">
    <?php echo $this->element('right'); ?>
</div>