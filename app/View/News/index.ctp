<div class="boxmain">
    <div class="box-title">
        <div class="titlemain"><?php echo $tieude['Catalogue']['name']; ?></div>
    </div>
    <div class="">
        <?php foreach ($listNews as $rows) { ?>
            <div class="box-new">
                <div align="justify">
                    <?php if ($rows['News']['images'] != "") { ?>
                        <div><a href="<?php echo DOMAIN; ?>chi-tiet-tin/<?php echo $rows['News']['id']; ?>/<?php echo $rows['News']['slug'] . ".html"; ?>"><img src="<?php echo IMAGEAD; ?>news/<?php echo $rows['News']['images']; ?>" class="bdimg1" /></a></div>
                    <?php } ?>
                    <div class="titleNews"><a href="<?php echo DOMAIN; ?>chi-tiet-tin/<?php echo $rows['News']['id']; ?>/<?php echo $rows['News']['slug'] . ".html"; ?>"><?php echo String::truncate($rows['News']['name'], 120); ?></a></div>
                    <div class="content"> <?php echo String::truncate($rows['News']['shortdes'], 280); ?></div>
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
</div>