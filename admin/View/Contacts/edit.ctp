<?php echo $this->Form->create(null, array('url' => DOMAINAD . 'contacts/edit', 'type' => 'post', 'name' => 'image', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
<!--                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>-->
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.image.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD; ?>contacts" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-category-add">
            <h2>Quản lý liên hệ</h2>
        </div>
        <div class="clr"></div>
    </div>
</div>
<div class="content-box">
    <div class="content-box-header">
        <div class="clear"></div>
    </div>
    <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
            <table width="100%" class="input">
                <tr>
                    <td width="149" class="label">Tiêu đề</td>
                    <td><?php echo $this->Form->input('Contact.name', array('class' => 'text-input medium-input')); ?>
                    	<input type="hidden" name="data[Contact][id]" id="data[][]" value="<?php echo $edit['Contact']['id']; ?>">
                    </td>
                </tr>
                <tr>
                    <td width="149" class="label">Email</td>
                    <td><?php echo $this->Form->input('Contact.email', array('class' => 'text-input medium-input', 'id' => 'idtitle', 'readonly')); ?></td>
                </tr>
                <tr>
                    <td width="149" class="label">Phone</td>
                    <td><?php echo $this->Form->input('Contact.phone', array('class' => 'text-input medium-input', 'readonly')); ?></td>
                </tr>
                <tr>
                    <td width="149" class="label">Tiêu đề</td>
                    <td><?php echo $this->Form->input('Contact.title', array('class' => 'text-input medium-input', 'readonly')); ?></td>
                </tr>
                <tr>
                    <td width="149" class="label">Nội dung</td>
                    <td><?php echo $this->Form->input('Contact.title', array('class' => 'text-input medium-input', 'rows' => 8, 'readonly')); ?></td>
                </tr>
                <tr>
                    <td class="label"></td>
                    <td><a class="button" href="#" onclick="javascript:history.back(); return false;">Quay lại</a></td>
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
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.image.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD; ?>contacts" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="clr"></div>
    </div>

</div>
<?php echo $this->Form->end(); ?>