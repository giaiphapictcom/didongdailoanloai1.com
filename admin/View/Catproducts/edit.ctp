<?php echo $this->Form->create(null, array('url' => DOMAINAD . 'catproducts/edit', 'type' => 'post', 'name' => 'frm',  'enctype'=>'multipart/form-data', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
<?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
<?php echo $this->Form->input('catId', array('type' => 'hidden', 'value' =>  $edit_vie['Catproduct']['parent_id'])); ?>
<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.frm.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.frm.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD ?>catproducts" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-category-add">
            <h2>Quản lý danh mục địa điểm bay</h2>
        </div>
        <div class="clr"></div>
    </div>
</div>
<div class="content-box">
    <div class="content-box-header">
        <h3>Sửa danh mục</h3>
        <!--<ul class="content-box-tabs">
            <li><a href="#tab1" class="default-tab">Nội dung tiếng Việt</a></li>
            <li><a href="#tab2">Nội dung tiếng Anh</a></li>
        </ul>-->
        <div class="clear"></div>
    </div>
    <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
            <table class="input">
                <tr>
                    <td width="120" class="label">Tên Danh mục:</td>
                    <td><?php echo $this->Form->input('Catproduct.name', array('value' => $edit_vie['Catproduct']['name'], 'class'=>'text-input medium-input')); ?></td>
                </tr>
                <tr>
                    <td width="120" class="label">Mã chuyến bay:</td>
                    <td><?php echo $this->Form->input('Catproduct.code', array('value' => $edit_vie['Catproduct']['code'], 'class'=>'text-input medium-input')); ?></td>
                </tr>
<!--               <tr>
                    <td width="120" class="label">Tên Danh mục (English):</td>
                    <td><?php echo $this->Form->input('Catproduct.name.eng', array('value' => $edit_eng['Catproduct']['name'], 'class'=>'text-input medium-input')); ?></td>
                </tr>-->
<!--                 <tr>
                    <td class="label">&nbsp;</td>
                    <td>
                        <img src="<?php echo IMAGEAD; ?>catproduct/<?php echo $edit_vie['Catproduct']['images']; ?>" height="100">
                        <input name="oldimg" type="hidden" id="imgid" value="<?php echo $edit_vie['Catproduct']['images']; ?>">
                    </td>
                </tr>
                <tr>
                    <td class="label">Hình ảnh đại diện:</td>
                    <td>&nbsp;
                        <input name="userfile" type="file" id="userfile" size="50"></td>
                </tr>-->
                <tr>
                    <td class="label">Thuộc danh mục:</td>
                    <td>
                        <?php
                        $options = array();
                         foreach ($list_cat as $k => $v) {
                            $options[$k] = $v;
                         }
                        echo $this->Form->input('Catproduct.parent_id', array('type'=>'select', 'options'=>$options, 'empty' => '--- Danh mục cha ---',  'class'=>'small-input', 'label'=>''));
                     ?>
                    </td>
                </tr>
                <tr>
                    <td width="120" class="label">Tiêu đề SEO:</td>
                    <td><?php echo $this->Form->input('Catproduct.title_seo',array('class'=>'text-input medium-input', 'id' => 'idtitle'));?></td>
                </tr>
                <tr>
                    <td width="120" class="label">Meta Keyword:</td>
                    <td><?php echo $this->Form->input('Catproduct.meta_key',array('class'=>'text-input medium-input', 'id' => 'idtitle'));?></td>
                </tr>
                <tr>
                    <td width="120" class="label">Meta Description:</td>
                    <td><?php echo $this->Form->input('Catproduct.meta_des',array('class'=>'text-input medium-input', 'id' => 'idtitle'));?></td>
                </tr>
                <tr>
                    <td class="label">Trang thái:</td>
                    <td><input type="radio" value="0" id="CatproductStatus0" name="data[Catproduct][status]" <?php if ($this->data['Catproduct']['status'] == 0) {
                            echo 'checked="checked"';
                        } ?>>
                        Chưa Active 
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" <?php if ($this->data['Catproduct']['status'] == 1) {
                            echo 'checked="checked"';
                        } ?> value="1" id="CatproductStatus1" name="data[Catproduct][status]">
                        Đã Active </td>
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
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.frm.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.frm.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD ?>catproducts" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="clr"></div>
    </div>
</div>
<?php echo $this->Form->end(); ?>