<?php
$setting = $this->requestAction('/common/setting');
$multiMenu = $this->requestAction('/common/multiMenu');
$multiMenu = substr($multiMenu, 4);
$multiMenu = substr($multiMenu, 0, -10);

$multiCatproduct = $this->requestAction('/common/multiCatproduct');
$multiCatproduct = substr($multiCatproduct, 4);
$multiCatproduct = substr($multiCatproduct, 0, -10);
?>
<style>	
	ul#sitemap li {
		list-style: square;
		line-height: 20px;
		font-weight: bold;
	}
	ul#sitemap li ul li {
		list-style: circle;
		line-height: 20px;
		font-weight: bold;
	}
	ul#sitemap li ul li {
		margin-left: 30px;
		font-weight: bold;
	}
	a {
		color: #333;
		text-decoration: none;
	}
	a:hover {
		text-decoration: underline;
	}
</style>

<div class="titlemain">Sơ đồ web</div>
<div class="box">
    <div class="content">
        <ul id="sitemap">
            <li>
                <a href="<?php echo DOMAIN; ?>" class="sf-with-ul"><?php echo __('trangchu'); ?></a>
            </li>
            <li>
                <a href="<?php echo DOMAIN; ?>gioi-thieu.html" class="sf-with-ul"><?php echo __('gioithieu'); ?></a>
                <ul>
                    <?php
                    $menugt = $this->requestAction('/common/menugt');
                    foreach ($menugt as $rows) {
                        ?>
                        <li><a href="<?php echo DOMAIN; ?>gioi-thieu/<?php echo $rows['Post']['id']; ?>/<?php echo $rows['Post']['slug'] . ".html"; ?>"><?php echo $rows['Post']['name']; ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </li>
            <li>
                <a href="<?php echo DOMAIN; ?>san-pham.html" class="sf-with-ul"><?php echo __('sanpham'); ?></a>
                <ul>
                    <?php echo $multiCatproduct; ?>
                </ul>
            </li>
            <?php echo $multiMenu; ?>
            <li>
                <a href="<?php echo DOMAIN; ?>lien-he.html" class="sf-with-ul"><?php echo __('lienhe'); ?></a>
            </li>
        </ul>
    </div>
</div>