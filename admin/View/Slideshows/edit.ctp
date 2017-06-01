<?php echo $this->Form->create(null, array('url' => DOMAINAD . 'slideshows/edit', 'type' => 'post', 'enctype' => 'multipart/form-data', 'name' => 'image')); ?>

<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.image.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD ?>slideshows" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-category-add">
            <h2>Cập nhật slide show</h2>
        </div>
        <div class="clr"></div>
    </div>
</div>
<div class="content-box">
    <div class="content-box-header">
        <h3>&nbsp;</h3>
        <!--<ul class="content-box-tabs">
            <li><a href="#tab1" class="default-tab">Nội dung tiếng Việt</a></li>
            <li><a href="#tab2">Nội dung tiếng Anh</a></li>
        </ul>-->
        <div class="clear"></div>
    </div>
    <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
            <table width="100%" class="input">
                <tr>
                    <td class="label">&nbsp;</td>
                    <td>
                        <?php if (substr($edit['Slideshow']['images'], -3) == "swf") { ?>
                            <embed src="<?php echo IMAGEAD; ?>slide/<?php echo $edit['Slideshow']['images']; ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent" width="400" height="150" scale="ExactFit"> </embed>
                        <?php } else { ?>
                            <img src="<?php echo IMAGEAD; ?>slide/<?php echo $edit['Slideshow']['images']; ?>" height="150">
                        <?php } ?>
                        <input name="data[Slideshow][id]" type="hidden" id="oldimg" value="<?php echo $edit['Slideshow']['id']; ?>">
                    </td>
                </tr>
                <tr>
                    <td width="150" class="label">Chọn file</td>
                    <td>
                        <input name="userfile" type="file" id="userfile" size="50"></td>
                </tr>
                <tr>
                    <td class="label">Link</td>
                    <td><?php echo $this->Form->input('Slideshow.name', array('label' => '', 'class' => 'text-input medium-input')); ?></td>
               	</tr>
<!--                <tr>
                    <td class="label">Tiêu đề</td>
                    <td><?php echo $this->Form->input('Slideshow.content', array('label' => '', 'class' => 'text-input medium-input')); ?></td>
               	</tr>-->
            </table>
            <div class="clear"></div>
        </div>
        <div class="tab-content" id="tab2">
            <div class="clear"></div>
        </div>
    </div>
</div>
<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.image.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD ?>slideshows" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="clr"></div>
    </div>
</div>
<?php echo $this->Form->end(); ?>