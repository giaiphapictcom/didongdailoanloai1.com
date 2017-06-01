<meta property="og:locale" content="vi_VN" />
<meta property="og:title" content="<?php echo $detailProduct['Product']['name']; ?>" />
<meta property="og:type" content="article" />
<meta property="og:url" content="<?php echo DOMAIN . $this->request->url; ?>" />
<meta property="og:image" content="<?php echo IMAGEAD; ?>product/<?php echo $detailProduct['Product']['images']; ?>" />
<div class="boxmain">
    <div>
        <div class="box-title">
            <div class="titlemain"><?php echo __('chitietsanpham'); ?></div>
        </div>
        <div style="position: relative;">
            <div style="float: left; margin-right: 20px; width: 350px; min-height: 240px;">
                <div id="gallery_01" style="text-align: center;">
                    <a href="<?php echo IMAGEAD; ?>product/<?php echo $detailProduct['Product']['images']; ?>" id="example1" title="<?php echo $detailProduct['Product']['name']; ?>">
                        <img src="<?php echo IMAGEAD; ?>product/<?php echo $detailProduct['Product']['images']; ?>" width="250" style="padding:4px; margin-right: 12px; max-height: 350px;" />
                    </a>
                </div>
            </div>
            <div class="" style="font-size:18px; line-height: 30px; margin: 10px 0px; color: #B80101;"><?php echo $detailProduct['Product']['name']; ?></div>
            <div class="" style="font-weight: bold; font-size: 14px; margin-bottom: 12px;">Mã sản phẩm : <?php echo $detailProduct['Product']['code']; ?></div>
            <div style="font-size: 20px; line-height: 30px;">
                <?php
                if ($detailProduct['Product']['type'] == 1) {
                    echo '<span class="new-price" style="font-size: 24px; line-height: 30px;">Giá: ' . number_format($detailProduct['Product']['price']) . ' vnđ</span>';
                } else {
                    echo "Giá : Liên hệ";
                }
                ?>
            </div>
			<div class="" style="font-weight: bold; font-size: 14px; margin-bottom: 12px; padding-top: 12px;">Tình trạng : <?php if($detailProduct['Product']['status'] == 1) {echo 'Còn hàng'; } else {echo 'Hết hàng'; } ?></div>
            <div style="width: 200px; padding-top: 15px; float: left;">
                <div class="addthis_toolbox addthis_default_style ">
                    <a class="addthis_button_preferred_1"></a>
                    <a class="addthis_button_preferred_2"></a>
                    <a class="addthis_button_preferred_3"></a>
                    <a class="addthis_button_preferred_4"></a>
                    <a class="addthis_button_compact"></a>
                    <a class="addthis_counter addthis_bubble_style"></a>
                </div>
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-51412cd84e8e0d7f"></script>
            </div><br><br>
			<div class="" style="margin-top: 20px;"><a href="<?php echo DOMAIN; ?>gio-hang/<?php echo $detailProduct['Product']['id']; ?>"><img src="<?php echo DOMAIN; ?>images/cart1.png" /></a></div>
            <div class="clear"></div><br>

            <div style="position: absolute; right: 0px; top: -49px; width: 300px;">
                <div class="titleright"><?php echo __('hotrotructuyen'); ?></div>
                <div class="box1 padd4all">
                    <div class="dt1">
                        <?php echo $setting['Setting']['hotline']; ?>
                    </div>
                    <?php
                    $support = $this->requestAction('/common/support');
                    foreach ($support as $rows) {
                        ?>
                        <div class="">
                            <div class="titleNews1"><?php echo $rows['Support']['name']; ?></div>
                            <div style="padding: 12px;">
                                <?php if ($rows['Support']['yahoo'] != "") { ?><a href="ymsgr:sendIM?<?php echo $rows['Support']['yahoo']; ?>"> <img src="http://opi.yahoo.com/online?u=<?php echo $rows['Support']['yahoo']; ?>&t=1" mce_src="http://opi.yahoo.com/online?u=<?php echo $rows['Support']['yahoo']; ?>&t=1"></a> &nbsp;
                                <?php } ?>
                                <?php if ($rows['Support']['skype'] != "") { ?>
                                    <a href="skype:<?php echo $rows['Support']['skype']; ?>?call"><img src="<?php echo DOMAIN; ?>images/skype.png" height="30" /></a>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>

        <div id="orgatab" style="margin-top: 20px;">
            <ul class="nav">
                <li><a href="#featured1" class="current">Thông tin chung</a></li>
                <li><a href="#featured3">Comment sản phẩm</a></li>
            </ul>
            <div class="list-wrap" style="padding: 12px;">
                <div id="featured1">
                    <?php echo $detailProduct['Product']['content']; ?>
                </div>
                <div id="featured3" class="hide" style="min-height: 300px;">
                    <fb:comments href="<?php echo DOMAIN . '/' . $this->request->url; ?>" width="474"></fb:comments>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="boxmain">
    <div class="box-title">
        <div class="titlemain"><?php echo __('sanphamcungloai'); ?></div>
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
<div class="clear"></div>