<?php echo $this->Form->create(null, array( 'url' => DOMAINAD.'news/edit','type' => 'post','enctype'=>'multipart/form-data','name'=>'image',  'inputDefaults' => array('label' => false,'div' => false))); ?>
<?php echo $this->Form->input('News.id', array('type' => 'hidden')); ?>
<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.image.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD?>news" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-category-add">
            <h2>Cập nhật tin tức</h2>
        </div>
        <div class="clr"></div>
    </div>
</div>
<div class="content-box"><!-- Start Content Box -->
    <div class="content-box-header">
        <h3>Cập nhật tin tức</h3>
        <div class="clear"></div>
    </div>
    <!-- End .content-box-header -->
    <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
            <table width="100%" class="input">
                <tr>
                    <td width="145" class="label">Tên tin tức:</td>
                    <td><?php echo $this->Form->input('News.name',array('value'=> $edit_vie['News']['name'],'class'=>'text-input medium-input'));?></td>
                </tr>
<!--                <tr>
                    <td width="145" class="label">Tên tin tức (English):</td>
                    <td><?php echo $this->Form->input('News.name.eng',array('value'=> $edit_eng['News']['name'],'class'=>'text-input medium-input'));?></td>
                </tr>-->
                <tr>
                    <td class="label">Thuộc danh mục:</td>
                    <td>
                        <?php
                        $options = array();
                         foreach ($list_cat as $k => $v) {
                            $options[$k] = $v;
                         }
                        echo $this->Form->input('News.cat_id', array('type'=>'select', 'options'=>$options, 'class'=>'small-input', 'label'=>''));
                     ?>
                    </td>
                </tr>
                <tr>
                    <td class="label">Trang thái:</td>
                    <td><input type="radio" value="0" id="NewsStatus0" name="data[News][status]">
                        Chưa Active a
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" checked="checked" value="1" id="NewsStatus1" name="data[News][status]">
                        Đã Active </td>
                </tr>
                <tr>
                    <td class="label">&nbsp;</td>
                    <td>
                        <img src="<?php echo IMAGEAD; ?>news/<?php echo $edit_vie['News']['images']; ?>" height="100">
                    </td>
                </tr>
                <tr>
                    <td class="label">Hình ảnh đại diện:</td>
                    <td>&nbsp;
                        <input name="userfile" type="file" id="userfile" size="50"></td>
                </tr>
                <tr>
                    <td class="label">Tóm tắt</td>
                    <td><?php
                            $CKEditor = new CKEditor();
                            CKFinder::SetupCKEditor( $CKEditor ) ;
                            $initialValue = $edit_vie['News']['shortdes'];
                            echo $CKEditor->editor("data[News][shortdes]", $initialValue, "compact");
                        ?></td>
                </tr>
<!--                <tr>
                    <td class="label">Tóm tắt (English)</td>
                    <td><?php
                            $CKEditor = new CKEditor();
                            CKFinder::SetupCKEditor( $CKEditor ) ;
                            $initialValue = $edit_eng['News']['shortdes'];
                            echo $CKEditor->editor("data[News][shortdes][eng]", $initialValue, "compact");
                        ?></td>
                </tr>-->
                <tr>
                    <td class="label">Nội dung</td>
                    <td><?php
                            $CKEditor = new CKEditor();
                            CKFinder::SetupCKEditor( $CKEditor ) ;                            
                            $initialValue = $edit_vie['News']['content'];
                            echo $CKEditor->editor("data[News][content]", $initialValue, "");
                        ?></td>
                </tr>
<!--                <tr>
                    <td class="label">Nội dung (English)</td>
                    <td><?php
                            $CKEditor = new CKEditor();
                            CKFinder::SetupCKEditor( $CKEditor ) ;                            
                            $initialValue = $edit_eng['News']['content'];
                            echo $CKEditor->editor("data[News][content][eng]", $initialValue, "");
                        ?></td>
                </tr>-->
                <tr>
                    <td class="label">Title Seo</td>
                    <td><?php echo $this->Form->input('News.title_seo',array('label'=>'','class'=>'text-input medium-input',  'inputDefaults' => array('label' => false,'div' => false)));?></td>
                </tr>
                <tr>
                    <td class="label">Meta keyword</td>
                    <td><?php echo $this->Form->input('News.meta_key',array('label'=>'','class'=>'text-input medium-input'));?></td>
                </tr>
                <tr>
                    <td class="label">Meta description</td>
                    <td><?php echo $this->Form->input('News.meta_des',array('label'=>'','class'=>'text-input medium-input'));?></td>
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
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD?>news" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-category-add">
            <h2>Cập nhật tin tức</h2>
        </div>
        <div class="clr"></div>
    </div>
</div>
<?php echo $this->Form->end(); ?>