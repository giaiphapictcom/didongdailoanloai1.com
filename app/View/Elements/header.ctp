<?php echo $this->element('slidetruot'); ?>
<?php echo $this->Html->css(array('jquery.fancybox-1.3.4')); ?>
<?php echo $this->Html->script(array('jquery.fancybox-1.3.4')); ?>
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<?php echo $this->Html->script(array('organictabs.jquery')); ?>
<?php echo $this->Html->css(array('organictabs.jquery')); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $("a#example1").fancybox({
            'titlePosition': 'over',
            'transitionIn': 'elastic',
            'transitionOut': 'elastic',
            'height': '90%',
            'overlayColor': '#000',
            'overlayOpacity': 0.8
        });
		
		$("a#zalo").fancybox();

        $("#orgatab").organicTabs();
    });
</script>
<div id="header_outer">
    <div id="header">
        <div class="hd-logo">
            <?php
				$banner = $this->requestAction('/common/banner');
				if (!empty($banner['Banner']['images'])) {
					if (substr($banner['Banner']['images'], -3) == "swf") {
					?>
                    <embed src="<?php echo IMAGEAD; ?>banner/<?php echo $banner['Banner']['images']; ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent" width="<?php echo $banner['Banner']['width']; ?>" height="<?php echo $banner['Banner']['height']; ?>" scale="ExactFit"> </embed>
					<?php } else { ?>
                    <a href="<?php echo DOMAIN; ?>"><img src="<?php echo IMAGEAD; ?>banner/<?php echo $banner['Banner']['images']; ?>" alt="" title="" height="90" border="0" /></a>
                    <?php
					}
				}
			?>
		</div>
        <div id="flag">
            <div class="dt2">
                <?php echo $setting['Setting']['hotline']; ?>
			</div>
		</div>
        <div id="flag2">
            <a href="<?php echo DOMAIN; ?>product/shopingcart"><img src="<?php echo DOMAIN; ?>images/giohang.png" /></a>
		</div>
        <div id="flag1">
            <form method="post" name="f1" id="f1" action="<?php echo DOMAIN; ?>product/search">
                <input type="text" name="searchProduct" class="bgsearch" placeholder="Nhập từ tìm kiếm ..." />
                <input type="image" name="submit" src="<?php echo DOMAIN; ?>images/search.png" style="border: none;" />
			</form>
		</div>
		<div style="position: absolute; top: 0px; left: 0px;">
			<div class="menutop">
				<?php
					$menutop = $this->requestAction('/common/menutop');
					foreach($menutop as $rows) {
					?>
					<span><a href="<?php echo DOMAIN; ?><?php echo $rows['Catalogue']['id']; ?>/<?php echo $rows['Catalogue']['slug']; ?>.html"><?php echo $rows['Catalogue']['name']; ?></a></span> <span>|</span>
				<?php } ?>
				<span><a href="<?php echo DOMAIN; ?>lien-he.html">LIÊN HỆ</a></span>
			</div>
			<p style="font-weight: bold; line-height: 26px;">Liên hệ với chúng tôi</p>
			<div style="position: absolute; top: 68px; left: 0;">
				<a href="https://www.facebook.com/pages/ALO-J2/542806975814207?fref=ts"><img src="<?php echo DOMAIN; ?>images/facebook_32.png" /> </a> 
				<a href="https://twitter.com/aloj2vietnam"><img src="<?php echo DOMAIN; ?>images/twitter.png" /> </a> 
				<a href="<?php echo DOMAIN; ?>images/zaaloo.jpg" id="zalo"><img src="<?php echo DOMAIN; ?>images/zalo.jpg" /> </a> 
				<a href="https://www.youtube.com/channel/UCrhdFHzBMid1_yj3LyQlkpA/feed?view_as=public"><img src="<?php echo DOMAIN; ?>images/youtube.png" /> </a> 
			</div>
		</div>
        <div class="navbar_outer">
            <div class="navbar">
                <?php echo $this->element('menu'); ?>
			</div>
		</div>
        <div><img src="<?php echo DOMAIN ?>images/giaohang.png" /></div>
	</div>
</div>