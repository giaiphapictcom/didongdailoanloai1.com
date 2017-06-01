<script type="text/javascript">

    $(function () {

        var i = $('input').size() + 1;

        $('a.add').click(function () {

            $('<p style="padding-left: 9px;" id="anh' + i + '"><input name="userfileplus[]" id="userfile" type="file"  size="50"></p>').animate({opacity: "show"}, "slow").appendTo('#themanh');
            i++;
        });

        $('a.remove').click(function () {

            if (i > 2) {
                $('#anh' + i + ':last').animate({opacity: "hide"}, "slow").remove();
                i--;
            }

        });

    });

</script>
<?php echo $this->Form->create(null, array('url' => DOMAINAD . 'products/add', 'type' => 'post', 'enctype' => 'multipart/form-data', 'name' => 'image', 'inputDefaults' => array('label' => false, 'div' => false))); ?>

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
            <h2>Thêm mới sản phẩm</h2>
        </div>
        <div class="clr"></div>
    </div>
</div>
<div class="content-box"><!-- Start Content Box -->
    <div class="content-box-header">
        <h3>Thêm mới sản phẩm</h3>
        <div class="clear"></div>
    </div>
    <!-- End .content-box-header -->
    <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
            <table class="input">
                <tr>
                    <td width="120" class="label">Tên sản phẩm:</td>
                    <td><?php echo $this->Form->input('Product.name', array('label' => '', 'class' => 'text-input medium-input')); ?></td>
                </tr>
                <tr>
                    <td width="120" class="label">Mã sản phẩm:</td>
                    <td><?php echo $this->Form->input('Product.code', array('label' => '', 'class' => 'text-input medium-input')); ?></td>
                </tr>
<!--                <tr>
                    <td width="120" class="label">Size sản phẩm:</td>
                    <td><?php echo $this->Form->input('Product.size', array('label' => '', 'class' => 'text-input medium-input')); ?></td>
                </tr>-->
<!--                <tr>
                    <td width="120" class="label">Tên sản phẩm (English):</td>
                    <td><?php echo $this->Form->input('Product.name.eng', array('label' => '', 'class' => 'text-input medium-input')); ?></td>
                </tr>-->
                <tr>
                    <td class="label">Thuộc danh mục:</td>
                    <td>
                        <?php
                        $options = array();
                        foreach ($list_cat as $k => $v) {
                            $options[$k] = $v;
                        }
                        echo $this->Form->input('Product.cat_id', array('type' => 'select', 'options' => $options, 'class' => 'small-input', 'label' => ''));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="label">Kiểu tiền</td>
                    <td>
                        <?php
                        $options      = array(
                            1 => 'VND'
                        );
                        echo $this->Form->input('Product.type', array('type' => 'select', 'name' => 'data[Product][type]', 'options' => $options, 'empty' => 'Liên hệ', 'class' => 'small-input'));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="label">Giá :</td>
                    <td><?php echo $this->Form->input('Product.price', array('class' => 'text-input medium-input')); ?></td>
                </tr>
				<tr>
                    <td class="label">Giá cũ:</td>
                    <td><?php echo $this->Form->input('Product.price1', array('class' => 'text-input medium-input')); ?></td>
                </tr>
                <tr>
                    <td class="label">Trang thái:</td>
                    <td><input type="radio" value="0" id="ProductStatus0" name="data[Product][status]">
                        Chưa Active a
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" checked="checked" value="1" id="ProductStatus1" name="data[Product][status]">
                        Đã Active </td>
                </tr>
                <tr>
                    <td class="label">Hình ảnh đại diện:</td>
                    <td>&nbsp;
                        <input name="userfile" type="file" id="userfile" size="50"></td>
                </tr>
<!--                <tr>
                    <td class="label">Hình ảnh liên quan:</td>
                    <td>&nbsp;
                        <input name="userfileplus[]" type="file" id="userfile" size="50" multiple="multiple"/></td>
                </tr>
                <tr>
                    <td class="label"></td>
                    <td>
                        <div id="themanh"></div>
                    </td>
                </tr>
                <tr>
                    <td class="label"></td>
                    <td>
                        <a href="#anh" class="add">Thêm ảnh</a> &nbsp;&nbsp; <a href="#anh" class="remove">Xóa bớt ảnh</a>
                    </td>
                </tr>-->
<!--                <tr>
                    <td class="label">Tóm tắt sản phẩm</td>
                    <td>
                <?php
                $CKEditor     = new CKEditor();
                CKFinder::SetupCKEditor($CKEditor);
                $initialValue = '';
                echo $CKEditor->editor("data[Product][shortdes]", $initialValue, "");
                ?>                    
                    </td>
                </tr>-->
                <tr>
                    <td class="label">Mô tả sản phẩm</td>
                    <td>
                        <?php
                        $CKEditor     = new CKEditor();
                        CKFinder::SetupCKEditor($CKEditor);
                        $initialValue = '';
                        echo $CKEditor->editor("data[Product][content]", $initialValue, "");
                        ?>                    
                    </td>
                </tr>
<!--                <tr>
                    <td class="label">Thông số kỹ thuật</td>
                    <td>
                        <?php
                        $CKEditor     = new CKEditor();
                        CKFinder::SetupCKEditor($CKEditor);
                        $initialValue = "";
                        echo $CKEditor->editor("data[Product][thongso]", $initialValue, "");
                        ?>
                    </td>
                </tr>-->
<!--                <tr>
                    <td class="label">Mô tả sản phẩm (English)</td>
                    <td>
                <?php
                $CKEditor     = new CKEditor();
                CKFinder::SetupCKEditor($CKEditor);
                $initialValue = '';
                echo $CKEditor->editor("data[Product][content][eng]", $initialValue, "");
                ?>                    
                    </td>
                </tr>-->
                <tr>
                    <td class="label">Title Seo</td>
                    <td><?php echo $this->Form->input('Product.title_seo', array('label' => '', 'class' => 'text-input medium-input')); ?></td>
                </tr>
                <tr>
                    <td class="label">Meta keyword</td>
                    <td><?php echo $this->Form->input('Product.meta_key', array('label' => '', 'class' => 'text-input medium-input')); ?></td>
                </tr>
                <tr>
                    <td class="label">Meta description</td>
                    <td><?php echo $this->Form->input('Product.meta_des', array('label' => '', 'class' => 'text-input medium-input')); ?></td>
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
            <h2>Thêm mới sản phẩm</h2>
        </div>
        <div class="clr"></div>
    </div>
</div>
<?php echo $this->Form->end(); ?>