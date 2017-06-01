<?php
echo $setting['Setting']['analytics'];
?>
<?php echo $this->Html->script(array('carouFredSel')); ?>
<script type="text/javascript">
    $(function () {
        $("img").each(function () {
            if ($(this).attr("alt") != undefined) {
                if ($(this).attr("alt") == "") {
                    $(this).attr("alt", "aloj2");
                }
            } else {
                $(this).attr("alt", "aloj2");
            }
        });
        
         $('.slider-logo1').carouFredSel({
            align: true,
            auto: true,
            width: 1174,
            items: {
                width: 'variable',
                visible: 1,
                duration: 1500,
                timeoutDuration: 5000
            }
        });

    });
</script>
<div style="width: 1174px; margin: auto; margin-bottom: 20px;">
    <div class="box-title">
        <div class="titlemain">Đối tác</div>
    </div>
    <div class="slider-logo1">
        <?php
        $quangcao = $this->requestAction('/common/quangcao');
        foreach ($quangcao as $field) {
            if ($field['Advertisement']['display'] == 5) {
            ?>
            <div class="paddbottom2">
                <a href="<?php echo $field['Advertisement']['link']; ?>" target="_blank"><img src="<?php echo IMAGEAD; ?>logo/<?php echo $field['Advertisement']['images']; ?>"  alt="<?php echo $field['Advertisement']['name']; ?>" /></a>
            </div>
            <?php
        }}
        ?>
    </div>
</div>
<div id="footer_outer">
    <div id="footer">
        <div class="ft-address"><?php echo $setting['Setting']['address']; ?></div>
        <div class="ft-share">
            <div class="box-col-1" style=" padding-top: 40px;">
                <?php
					
				?>
            </div>
            <div class="box-col-1">
                <h4>Danh mục sản phẩm</h4>
               <?php
					$menuft2 = $this->requestAction('/common/menuft1');
					foreach($menuft2 as $rows) {
				?>
                <div class="tinhot1"><a href="<?php echo DOMAIN; ?><?php echo $rows['Catalogue']['slug']; ?>-<?php echo $rows['Catalogue']['id']; ?>.html"><?php echo $rows['Catalogue']['name']; ?></a></div>
					<?php } ?>
            </div>
        </div>
    </div>
</div>
<div class="ft-link">
    <a href=""  style="color: #F3F3F3; line-height: 32px;"><?php echo $setting['Setting']['url']; ?></a>
</div>