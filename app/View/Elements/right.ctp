<div class="boxright">
    <div class="titleright">Giờ làm việc</div>
    <div style="text-align: center; font-weight: bold; margin-top: 12px;">
        <p>
            <span style="color: #B80101;">Từ thứ 2 - Thứ 7</span><br>
            <span>8h00 - 17h00</span>
        </p><br>
        <p>
            <span style="color: #B80101;">Chủ nhật</span><br>
            <span>8h00 - 12h00</span>
        </p>
    </div>
</div>

<div class="boxright">
    <div class="titleright">Phụ tùng ô tô</div>
    <?php
    $thuoctinh = $this->requestAction('/common/thuoctinh');
    foreach ($thuoctinh as $k => $field) {
        if ($field['Atribute']['id'] == 3) {
            foreach ($field['children'] as $i => $rows) {
                ?>
                <div class="titleNews1"><a href="<?php echo DOMAIN; ?>phu-tung-o-to/<?php echo $rows['Atribute']['id']; ?>-<?php echo $rows['Atribute']['slug']; ?>.html/"><?php echo $rows['Atribute']['name']; ?></a></div>
                <?php
            }
        }
    }
    ?>
</div>

<div class="boxright">
    <div class="titleright"><?php echo __('hotrotructuyen'); ?></div>
    <div class="" style="border: 1px solid #CCC;;">
        <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">		
            <?php
            $support = $this->requestAction('/common/support');
            foreach ($support as $rows) {
                ?>
                <tr>
                    <td class="bgsupport">
                        <div class="titlesupport"><?php echo $rows['Support']['name']; ?></div>
                        <div>
                            <?php if ($rows['Support']['yahoo'] != "") { ?><a href="ymsgr:sendIM?<?php echo $rows['Support']['yahoo']; ?>"> <img src="http://opi.yahoo.com/online?u=<?php echo $rows['Support']['yahoo']; ?>&t=1" mce_src="http://opi.yahoo.com/online?u=<?php echo $rows['Support']['yahoo']; ?>&t=1"></a> &nbsp;
                            <?php } ?>
                            <?php if ($rows['Support']['skype'] != "") { ?>
                                <a href="skype:<?php echo $rows['Support']['skype']; ?>?call"><img src="<?php echo DOMAIN; ?>images/skype.png" height="20" /></a>
                            <?php } ?>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

<div class="boxright">
    <div class="box1">
        <div class="titleright">Sản phẩm mới</div>
        <marquee direction="up" height="326" scrollamount="2">
            <?php
            $sphot = $this->requestAction('/common/spmoi');
            foreach ($sphot as $rows) {
                ?>
                <div class="box-sp">
                    <div align="center">
                        <a title="<?php echo $rows['Product']['name'] ?>" href="<?php echo DOMAIN; ?><?php echo $rows['Catalogue']['slug']; ?>/<?php echo $rows['Product']['slug']; ?>-<?php echo $rows['Product']['id']; ?>.html"><img src="<?php echo DOMAINAD; ?>timthumb.php?src=img/product/<?php echo $rows['Product']['images']; ?>&w=192&zc=1" /></a>
                    </div>
                    <div class="proName">
                        <a title="<?php echo $rows['Product']['name'] ?>" href="<?php echo DOMAIN; ?><?php echo $rows['Catalogue']['slug']; ?>/<?php echo $rows['Product']['slug']; ?>-<?php echo $rows['Product']['id']; ?>.html"><?php echo $rows['Product']['name']; ?></a><br>
                    </div>
                    <div class="price1">
                        <?php
                        if ($rows['Product']['type'] == 1) {
                            echo number_format($rows['Product']['price']) . ' đ';
                        } else {
                            echo "Liên hệ";
                        }
                        ?>
                    </div>
                </div>
            <?php } ?>
        </marquee>
    </div>
</div>

<div class="boxright">
    <div class="box1">
        <div class="titleright">Tin tức</div>
        <?php
        $tinhot = $this->requestAction('/common/tinhot');
        foreach ($tinhot as $rows) {
            ?>
            <div style="margin: 10px 0px;">
                <?php if ($rows['News']['images'] != "") { ?>
                    <div style="float: left; margin-right: 6px;"><a href="<?php echo DOMAIN; ?>chi-tiet-tin/<?php echo $rows['News']['id']; ?>/<?php echo $rows['News']['slug'] . ".html"; ?>"><img src="<?php echo IMAGEAD; ?>news/<?php echo $rows['News']['images']; ?>" width="70" class="bdimg1" /></a></div>
                <?php } ?>
                <div class="titleNews"><a href="<?php echo DOMAIN; ?>chi-tiet-tin/<?php echo $rows['News']['id']; ?>/<?php echo $rows['News']['slug'] . ".html"; ?>"><?php echo $rows['News']['name']; ?></a></div>
                <div class="clear"></div>
            </div>
        <?php } ?>
    </div>
</div>

<div class="boxright">
    <div class="titleright">Thống kê truy cập</div>
    <div style="padding: 20px 0px;" class="box1">
        <script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
<a href="http://www.histats.com" target="_blank" title="" ><script  type="text/javascript" >
try {Histats.start(1,3032417,4,422,192,115,"00011111");
Histats.track_hits();} catch(err){};
</script></a>
<noscript><a href="http://www.histats.com" target="_blank"><img  src="http://sstatic1.histats.com/0.gif?3032417&101" alt="" border="0"></a></noscript>

    </div>
</div>

<div class="boxright">
    <div class="titleright">Phụ tùng ô tô</div>
    <?php
    $quangcao = $this->requestAction('/common/quangcao');
    foreach ($quangcao as $k => $field) {
        if ($field['Advertisement']['display'] == 2) {
            ?>
            <div class="paddbottom">
                <a href="<?php echo $field['Advertisement']['link']; ?>"><img src="<?php echo IMAGEAD; ?>logo/<?php echo $field['Advertisement']['images']; ?>" alt="<?php echo $field['Advertisement']['name']; ?>" /></a>
            </div>
            <?php
        }
    }
    ?>
</div>