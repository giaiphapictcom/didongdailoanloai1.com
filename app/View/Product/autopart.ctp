<div class="boxmain">
    <h2 class="titlemain"><a><?php echo $typeName['Atribute']['name']; ?></a><span class="title_c"></span></h2>
    <div class="paddtop">
        <?php
        foreach ($listProduct as $rows) {
            ?>
            <div class="bgproduct">
                <div class="boximg"><a title="<?php echo $rows['Product']['name'] ?>" href="<?php echo DOMAIN; ?><?php echo $rows['Catalogue']['slug']; ?>/<?php echo $rows['Product']['slug']; ?>-<?php echo $rows['Product']['id']; ?>.html" class="preview" rel="<?php echo DOMAINAD; ?>timthumb.php?src=img/product/<?php echo $rows['Product']['images']; ?>&w=350&zc=1"><img src="<?php echo DOMAINAD; ?>timthumb.php?src=img/product/<?php echo $rows['Product']['images']; ?>&w=182&zc=1" class="bdimg" title="<?php echo $rows['Product']['name']; ?>" alt="<?php echo $rows['Product']['name']; ?>" /></a></div>
                <div class="proName"><a title="<?php echo $rows['Product']['name'] ?>" href="<?php echo DOMAIN; ?><?php echo $rows['Catalogue']['slug']; ?>/<?php echo $rows['Product']['slug']; ?>-<?php echo $rows['Product']['id']; ?>.html"><?php echo $rows['Product']['name']; ?></a></div>
                <div class="price1">Mã hàng: 
                    <?php echo $rows['Product']['code'];
                    ?>
                </div>
                <div class="blk-star">
                    <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
                </div>
                <div class="price2">
                    <a href="<?php echo DOMAIN; ?>lien-he.html"><img src="<?php echo DOMAIN; ?>images/lienhe.png" /></a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<div class="clear"></div>
<div class="pagination" style="text-align: center; margin: 4px auto;">
    <?php
    echo $this->Paginator->prev('«  ', null, null, array('class' => 'disabled'));
    echo $this->Paginator->numbers() . " ";
    echo $this->Paginator->next('  »', null, null, array('class' => 'disabled'));
    ?>
</div>