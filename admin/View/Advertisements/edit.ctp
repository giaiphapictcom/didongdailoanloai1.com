<?php echo $this->Form->create(null, array('url' => DOMAINAD . 'advertisements/edit', 'type' => 'post', 'enctype' => 'multipart/form-data', 'name' => 'image')); ?>

<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.image.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD ?>advertisements" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-category-add">
            <h2>Cập nhật quảng cáo</h2>
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
                    <td width="150" class="label">Tiêu đề</td>
                    <td>
                        <?php echo $this->Form->input('Advertisement.name', array('label' => '', 'class' => 'text-input medium-input', 'id' => '')); ?>
                    </td>
                </tr>
                <tr>
                    <td class="label">&nbsp;</td>
                    <td>
                        <?php if (substr($edit['Advertisement']['images'], -3) == "swf") { ?>
                            <embed src="<?php echo IMAGEAD; ?>logo/<?php echo $edit['Advertisement']['images']; ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent" width="400" height="150" scale="ExactFit"> </embed>
                        <?php } else { ?>
                            <img src="<?php echo IMAGEAD; ?>logo/<?php echo $edit['Advertisement']['images']; ?>"  width="150" />
                        <?php } ?>
                        <input name="oldimg" type="hidden" id="oldimg" value="<?php echo $edit['Advertisement']['images']; ?>">
                        <input name="data[Advertisement][id]" type="hidden" id="oldimg" value="<?php echo $edit['Advertisement']['id']; ?>">
                    </td>
                </tr>
                <tr>
                    <td width="150" class="label">Chọn file</td>
                    <td>
                        <input name="userfile" type="file" id="userfile" size="50"></td>
                </tr>
                <tr>
                    <td class="label">Link</td>
                    <td><?php echo $this->Form->input('Advertisement.link', array('label' => '', 'class' => 'text-input medium-input', 'id' => '')); ?></td>
               	</tr>
                <tr>
                    <td class="label">Xuất hiện</td>
                    <td>
                        <?php
                        $options = array(
                            1 => 'Quảng cáo',
                            5 => 'Quảng cáo dưới'
                        );
                        echo $this->Form->input('Advertisement.display', array('type' => 'select', 'options' => $options, 'class' => 'small-input', 'label' => false));
                        ?>
                    </td>
               	</tr>
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
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD ?>advertisements" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="clr"></div>
    </div>
</div>
<?php echo $this->Form->end(); ?>