<?php echo $this->Form->create(null, array( 'url' => DOMAINAD.'products/editsub', 'type' => 'post','enctype'=>'multipart/form-data','name'=>'image', 'inputDefaults' => array('label' => false,'div' => false))); ?>

<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.image.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD; ?>products" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-category-add">
            <h2>Cập nhật option</h2>
        </div>
        <div class="clr"></div>
    </div>
</div>
<div class="content-box"><!-- Start Content Box -->
    <div class="content-box-header">
        <h3>Cập nhật option</h3>
        <div class="clear"></div>
    </div>
    <!-- End .content-box-header -->
    <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
            <table class="input">
                <tr>
                    <td width="120" class="label">Tên sản phẩm:</td>
                    <td><?php echo $this->Form->input('Subproduct.name.vie', array('value' => $edit_vie['Subproduct']['name'], 'label' => '', 'class' => 'text-input medium-input')); ?></td>
                </tr>
                <tr>
                    <td width="120" class="label">Tên sản phẩm (English):</td>
                    <td><?php echo $this->Form->input('Subproduct.name.eng', array('value' => $edit_eng['Subproduct']['name'], 'label' => '', 'class' => 'text-input medium-input')); ?></td>
                </tr>
                <tr>
                    <td class="label">&nbsp;</td>
                    <td>
                        <img src="<?php echo IMAGEAD; ?>product/<?php echo $edit_vie['Subproduct']['images']; ?>" height="100">
                        <?php echo $this->Form->input('Subproduct.id', array('type' => 'hidden', 'value' => $edit_vie['Subproduct']['id'])); ?>
                        <?php echo $this->Form->input('Subproduct.product_id', array('type' => 'hidden', 'value' => $edit_vie['Subproduct']['product_id'])); ?>
                    </td>
                </tr>
                <tr>
                    <td class="label">Hình ảnh đại diện:</td>
                    <td>&nbsp;
                        <input name="userfile" type="file" id="userfile" size="50"></td>
                </tr>
                <tr>
                    <td class="label">Mô tả sản phẩm</td>
                    <td>
                        <?php
                        $CKEditor = new CKEditor();
                        CKFinder::SetupCKEditor($CKEditor);
                        $initialValue = $edit_vie['Subproduct']['content'];
                        echo $CKEditor->editor("data[Subproduct][content][vie]", $initialValue, "");
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="label">Mô tả sản phẩm (English)</td>
                    <td>
                        <?php
                        $CKEditor = new CKEditor();
                        CKFinder::SetupCKEditor($CKEditor);
                        $initialValue = $edit_eng['Subproduct']['content'];
                        echo $CKEditor->editor("data[Subproduct][content][eng]", $initialValue, "");
                        ?>
                    </td>
                </tr>
            </table>
            <div class="clear"></div>
        </div>
        <!-- End #tab1 -->
        <div class="tab-content" id="tab2">
            <div class="clear"></div>
            <!-- End .clear --> 
        </div>
        <!-- End #tab2 --> 
    </div>
    <!-- End .content-box-content --> 
</div>
<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.image.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD; ?>products" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-category-add">
            <h2>Thêm mới option</h2>
        </div>
        <div class="clr"></div>
    </div>
</div>
<?php echo $this->Form->end(); ?>