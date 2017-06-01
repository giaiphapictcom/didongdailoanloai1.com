<?php
$multiMenu = $this->requestAction('/common/multiMenu/39');
$multiMenu = substr($multiMenu, 4);
$multiMenu = substr($multiMenu, 0, -10);
?>
<script type="text/javascript">
    ddsmoothmenu.init({
        mainmenuid: "smoothmenu2",
        orientation: 'v',
        classname: 'ddsmoothmenu',
        contentsource: "markup"
    })
</script>
<?php echo $this->Html->css(array('jquery.fancybox-1.3.4', 'nivo-slider')); ?>
<?php echo $this->Html->script(array('jquery.fancybox-1.3.4', 'jquery.carouFredSel-6.1.0-packed')); ?>
<script type="text/javascript" language="javascript">
    $(function() {
        $('ul#user_interaction').carouFredSel({
            prev: "#prev1",
            next: "#next1",
            items: 4,
            scroll: {
                duration: 1000,
                timeoutDuration: 5000,
                items: 1,
                pauseOnHover: true
            },
            swipe: {
                onTouch: true,
                onMouse: true
            },
        })
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {

        $("a[rel=example_group]").fancybox({
            'transitionIn': 'fade',
            'transitionOut': 'fade',
            'autoSize': 'true'
        });

    });
</script>
<div id="content_left">
    <div class="titleright">Danh mục sản phẩm</div>
    <div class="box2">
        <div id="smoothmenu2" class="ddsmoothmenu">
            <ul>
                <?php echo $multiMenu; ?>
            </ul>
        </div>
    </div>
</div>
<div id="content_main">
    <h2 class="titlemain"><a>Sản phẩm mới</a><span class="title_c"></span></h2>
    <div class="list_carousel">
        <a href="#" id="prev1"><img src="<?php echo DOMAIN; ?>images/ad_scroll_back.png" /></a>
        <ul id="user_interaction">
            <?php
            foreach ($spm as $rows) {
                ?>
                <div class="bgproduct">
                    <div><a title="<?php echo $rows['Product']['name'] ?>" href="<?php echo DOMAIN; ?><?php echo $rows['Catalogue']['slug']; ?>/<?php echo $rows['Product']['slug']; ?>-<?php echo $rows['Product']['id']; ?>.html"><img src="<?php echo DOMAINAD; ?>timthumb.php?src=img/product/<?php echo $rows['Product']['images']; ?>&w=180&zc=1" class="bdimg" title="<?php echo $rows['Product']['name']; ?>" alt="<?php echo $rows['Product']['name']; ?>" /></a></div>
                    <div class="proName"><?php echo $rows['Product']['name']; ?></div>
                    <div class="price2">Mã sản phẩm : <?php echo $rows['Product']['code']; ?></div>
                    <div class="price"> 
                        <?php
                        if ($rows['Product']['type'] == 1) {
                            echo number_format($rows['Product']['price']) . ' vnđ';
                        } else {
                            echo "Liên hệ";
                        }
                        ?>
                    </div>
                </div>
                </li>
            <?php } ?>
        </ul>
        <a href="#" id="next1"><img src="<?php echo DOMAIN; ?>images/ad_scroll_forward.png" /></a>
    </div>
</div>
<div class="clear"></div>