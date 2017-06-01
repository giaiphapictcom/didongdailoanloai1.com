<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php
        if (isset($keywords_for_layout)) {
            echo "<meta name='keywords' content='" . $keywords_for_layout . "' /> ";
        }
        if (isset($description_for_layout)) {
            echo "<meta name='description' content='" . $description_for_layout . "' />";
        }
        ?>
        <title>
            <?php
            if (isset($title_for_layout)) {
                echo $title_for_layout;
            }
            ?>
        </title>
        <?php echo $this->Html->css(array('styles')); ?>
        <?php echo $this->Html->script(array('jquery.min')); ?>
        <link rel="icon" type="images/png" href="<?php echo DOMAIN; ?>images/logo.png" />
		<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
    </head>

    <body>
        <?php echo $this->element('header'); ?>
        <div id="wrapper_outer">
            <div id="wrapper">
                <div id="content_main">
                    <div class="boxmain">
                        <?php echo $this->element('slide'); ?>
                    </div>
                    <div class="boxmain">
					<div id="content_center"><?php echo $this->element('left'); ?></div>
					<div id="content_main">
                        <?php echo $content_for_layout; ?>
                    </div>
                </div>
                <div id="content_right"><?php echo $this->element('right'); ?></div>
            </div>
        </div>
        <div class="clear"></div>
            <?php echo $this->element('footer'); ?>
    </body>
</html>