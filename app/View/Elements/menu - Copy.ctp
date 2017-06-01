<?php
echo $this->Html->css(array('ddsmoothmenu'));
echo $this->Html->script(array('ddsmoothmenu'));
$setting = $this->requestAction('/common/setting');
$multiMenu = $this->requestAction('/common/multiMenu');
$multiMenu = substr($multiMenu, 4);
$multiMenu = substr($multiMenu, 0, -10);
?>

<script type="text/javascript">
    ddsmoothmenu.init({
        mainmenuid: "smoothmenu3",
        orientation: 'h',
        classname: 'ddsmoothmenu3',
        contentsource: "markup"
    })
</script>

<div class="navbar">
    <div id="smoothmenu3" class="ddsmoothmenu3">
        <ul>
            <?php echo $multiMenu; ?>
        </ul>
    </div>
</div>