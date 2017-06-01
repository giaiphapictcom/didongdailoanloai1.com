<div class="boxmain">
    <div class="box-title">
        <div class="titlemain"><?php echo $typeName['Catalogue']['name']; ?></div>
    </div>
        <?php
        foreach ($listProduct as $rows) {
            ?>
            <div class="bgproduct">
                <div class="boximg"><a title="<?php echo $rows['Product']['name'] ?>" href="<?php echo DOMAIN; ?><?php echo $rows['Catalogue']['slug']; ?>/<?php echo $rows['Product']['slug']; ?>-<?php echo $rows['Product']['id']; ?>.html"><img src="<?php echo DOMAINAD; ?>timthumb.php?src=img/product/<?php echo $rows['Product']['images']; ?>&w=216&h=226" class="bdimg" title="<?php echo $rows['Product']['name']; ?>" alt="<?php echo $rows['Product']['name']; ?>" /></a>
					<?php if ($rows['Product']['price1'] != "") { ?>
                    <div class="saleoff">
                        <?php
                        echo round(($rows['Product']['price1'] - $rows['Product']['price']) / $rows['Product']['price1'] * 100, 0) . " %";
                        ?>
                    </div>
                <?php } ?>
					</div>
                <div class="proName"><a title="<?php echo $rows['Product']['name'] ?>" href="<?php echo DOMAIN; ?><?php echo $rows['Catalogue']['slug']; ?>/<?php echo $rows['Product']['slug']; ?>-<?php echo $rows['Product']['id']; ?>.html"><?php echo $rows['Product']['name']; ?></a></div>
                <div class="proName">Mã: 
                    <?php echo $rows['Product']['code'];
                    ?>
                </div>
                <div class="price">
                    <?php
                    if ($rows['Product']['type'] == 1) {
                        echo number_format($rows['Product']['price']) . ' vnđ';
                    } else {
                        echo "Liên hệ";
                    }
                    ?>
                </div>
					<?php
						if ($rows['Product']['price1'] > 1) {
					?>
					<div class="price1">
						<?php
							echo number_format($rows['Product']['price1']) . ' vnđ';
						?>
					</div>
					<?php } ?>
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