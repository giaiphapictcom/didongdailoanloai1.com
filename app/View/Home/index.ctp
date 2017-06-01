<div class="boxmain">
	<div class="box-title">
		<div class="titlemain"><a href="<?php echo DOMAIN; ?>product/listproduct">Sản phẩm bán chạy</a></div>
	</div>
	<?php
		$sphot = $this->requestAction('/common/sphot');
        foreach ($sphot as $rows) {
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

<div class="boxmain">
    <?php
		$quangcao = $this->requestAction('/common/quangcao');
		foreach ($quangcao as $field) {
			if ($field['Advertisement']['display'] == 1) {
			?>
            <div class="paddbottom">
                <a href="<?php echo $field['Advertisement']['link']; ?>" target="_blank"><img src="<?php echo IMAGEAD; ?>logo/<?php echo $field['Advertisement']['images']; ?>"  alt="<?php echo $field['Advertisement']['name']; ?>" /></a>
			</div>
            <?php
			}
		}
	?>
</div>

<?php foreach ($spHome as $row) { ?>
    <div class="boxmain">
        <div class="box-title">
            <div class="titlemain"><a href="<?php echo DOMAIN; ?><?php echo $row['dm']['Catalogue']['slug']; ?>-<?php echo $row['dm']['Catalogue']['id']; ?>.html"><?php echo $row['dm']['Catalogue']['name']; ?></a></div>
            <div class="sub-menu">
                <?php
					foreach ($row['mncon'] as $row1) {
					?>
                    <a href="<?php echo DOMAIN; ?><?php echo $row1['Catalogue']['slug']; ?>-<?php echo $row1['Catalogue']['id']; ?>.html"><?php echo $row1['Catalogue']['name']; ?></a>
				<?php } ?>
			</div>
		</div>
        <?php
			foreach ($row['sp'] as $rows) {
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
<?php } ?>

<div class="boxmain">
    <div class="box-title">
        <div class="titlemain"><a href="<?php echo DOMAIN; ?>63/tin-tuc.html">Tin tức</a></div>
	</div>
    <div>
        <?php
			$tinhot = $this->requestAction('/common/tinhot');
			foreach ($tinhot as $rows) {
			?>
            <div class="box-new">
                <?php if ($rows['News']['images'] != "") { ?>
                    <div><a href="<?php echo DOMAIN; ?>chi-tiet-tin/<?php echo $rows['News']['id']; ?>/<?php echo $rows['News']['slug'] . ".html"; ?>"><img src="<?php echo IMAGEAD; ?>news/<?php echo $rows['News']['images']; ?>" class="bdimg1" /></a></div>
				<?php } ?>
                <div class="titleNews"><a href="<?php echo DOMAIN; ?>chi-tiet-tin/<?php echo $rows['News']['id']; ?>/<?php echo $rows['News']['slug'] . ".html"; ?>"><?php echo $rows['News']['name']; ?></a></div>
                <div class="content"> <?php echo $rows['News']['shortdes']; ?></div>
			</div>
		<?php } ?>
	</div>
	</div>	