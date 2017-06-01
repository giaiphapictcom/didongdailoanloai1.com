<div class="titlepro"><?php echo $tieude['Catalogue']['name']; ?></div>

<div class="boxmain" style="margin-top: 20px;">
    <?php foreach ($listNews as $rows) { ?>
        <div class="bgproduct">
            <div align="justify">
                <?php if ($rows['News']['images'] != "") { ?>
                    <div style="float: left; margin-right: 15px;"><a href="<?php echo DOMAIN; ?>chi-tiet-tin-tuc/<?php echo $rows['News']['id']; ?>/<?php echo $rows['News']['slug'] . ".html"; ?>"><img src="<?php echo IMAGEAD; ?>news/<?php echo $rows['News']['images']; ?>" width="103" class="bdimg" /></a></div>
                <?php } ?>
                <div class="titleNews"><a href="<?php echo DOMAIN; ?>chi-tiet-tin-tuc/<?php echo $rows['News']['id']; ?>"><?php echo $rows['News']['name']; ?></a></div>
                <div class="content"> <?php echo $rows['News']['shortdes']; ?></div>
                <div class="detail"><a href="<?php echo DOMAIN; ?>chi-tiet-tin-tuc/<?php echo $rows['News']['id']; ?>/<?php echo $rows['News']['slug'] . ".html"; ?>"><?php echo __('chitiet'); ?></a></div>
            </div>
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