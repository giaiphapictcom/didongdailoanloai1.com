<?php echo $this->Form->create(null, array('url' => DOMAINAD . 'catalogues/edit', 'type' => 'post', 'name' => 'frm', 'enctype' => 'multipart/form-data', 'inputDefaults' => array('label' => false, 'div' => false, 'legend' => false))); ?>
<?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
<?php echo $this->Form->input('catId', array('type' => 'hidden', 'value' => $edit_vie['Catalogue']['parent_id'])); ?>
<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.frm.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.frm.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD ?>catalogues" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-category-add">
            <h2>Quản lý danh mục menu</h2>
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
                    <td><?php echo $this->Form->input('Catalogue.name', array('value' => $edit_vie['Catalogue']['name'], 'class' => 'text-input medium-input')); ?></td>
                </tr>
<!--                <tr>
                    <td width="120" class="label">Tên Danh mục (English):</td>
                    <td><?php echo $this->Form->input('Catalogue.name.eng', array('value' => $edit_eng['Catalogue']['name'], 'class' => 'text-input medium-input')); ?></td>
                </tr>-->
                <tr>
                    <td class="label">Nhóm danh mục</td>
                    <td>
                        <?php
                        $options = array();
                        foreach ($list_cat as $k => $v) {
                            $options[$k] = $v;
                        }
                        echo $this->Form->input('Catalogue.parent_id', array('type' => 'select', 'options' => $options, 'empty' => '--- Danh mục cha ---', 'class' => 'small-input', 'label' => ''));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="label">Loại menu:</td>
                    <td>
                        <?php
                        $options = array(
                            1 => 'Tin tức',
                            2 => 'Sản phẩm',
                        );
                        echo $this->Form->input('Catalogue.type', array('type' => 'radio', 'options' => $options, 'class' => 'radio'));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="label">Trang thái:</td>
                    <td>
                        <?php
                        $options = array(
                            1 => 'Đã Active',
                            0 => 'Chưa Actice',
                        );
                        echo $this->Form->input('Catalogue.status', array('type' => 'radio', 'options' => $options, 'class' => 'radio'));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td width="120" class="label">Liên kết tĩnh</td>
                    <td><?php echo $this->Form->input('Catalogue.link', array('value' => $edit_vie['Catalogue']['link'], 'class' => 'text-input medium-input')); ?></td>
                </tr>
<!--                 <tr>
                    <td class="label">&nbsp;</td>
                    <td>
                        <img src="<?php echo IMAGEAD; ?>danhmuc/<?php echo $edit_vie['Catalogue']['images']; ?>" height="100">
                    </td>
                </tr>
                <tr>
                    <td class="label">Hình ảnh đại diện:</td>
                    <td>&nbsp;
                        <input name="userfile" type="file" id="userfile" size="50"></td>
                </tr>-->
                <tr>
                    <td width="120" class="label">Tiêu đề SEO:</td>
                    <td><?php echo $this->Form->input('Catalogue.title_seo', array('class' => 'text-input medium-input', 'id' => 'idtitle')); ?></td>
                </tr>
                <tr>
                    <td width="120" class="label">Meta Keyword:</td>
                    <td><?php echo $this->Form->input('Catalogue.meta_key', array('class' => 'text-input medium-input', 'id' => 'idtitle')); ?></td>
                </tr>
                <tr>
                    <td width="120" class="label">Meta Description:</td>
                    <td><?php echo $this->Form->input('Catalogue.meta_des', array('class' => 'text-input medium-input', 'id' => 'idtitle')); ?></td>
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
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD ?>catalogues" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="clr"></div>
    </div>
</div>
<?php echo $this->Form->end(); ?>