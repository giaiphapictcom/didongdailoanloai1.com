<script type="text/javascript">
    function changepos() {
        document.frm1.action = "<?php echo DOMAINAD; ?>products/changepos";
        document.frm1.submit();
    }
    function process() {
        document.frm1.action = "<?php echo DOMAINAD; ?>products/process";
        document.frm1.submit();
    }
    function MM_jumpMenu(targ, selObj, restore) { //v3.0
        eval(targ + ".location='" + selObj.options[selObj.selectedIndex].value + "'");
        if (restore)
            selObj.selectedIndex = 0;
    }
</script>
<?php echo $this->Form->create(null, array('url' => DOMAINAD . 'products/search', 'type' => 'post', 'name' => 'frm1')); ?>
<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="<?php echo DOMAINAD; ?>products/addsub/<?php echo $list_cat['Product']['id']; ?>" class="toolbar"> <span class="icon-32-new"></span> Thêm mới </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD; ?>products" class="toolbar"> <span class="icon-32-unpublish"></span> Đóng </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-nhomtin">
            <h2>Option</h2>
        </div>
        <div class="clr"></div>
    </div>
</div>
<div class="content-box">
    <div class="content-box-header">
        <h3>Sản phẩm : <?php echo $list_cat['Product']['name']; ?></h3>
        <!--<ul class="content-box-tabs">
            <li><a href="#tab1" class="default-tab">Danh sách tin</a></li>
            <li><a href="#tab2"></a></li>
        </ul>-->
        <div class="clear"></div>
    </div>
    <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
            <table width="100%">
                <thead>
                    <tr>
                        <th width="4%">STT</th>
                        <th width="12%" style="text-align:center;">Ảnh</th>
                        <th width="20%" style="text-align:center;">Tên sản phẩm</th>
                        <th width="11%">Cập nhật</th>
                        <th width="11%">Xử lý</th>
                        <th width="3%">ID</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($product as $key => $value) { ?>
                        <tr>
                            <td><?php echo $key + 1; ?></td>
                            <td style="text-align:center;"><img src="<?php echo IMAGEAD; ?>product/<?php echo $value['Subproduct']['images']; ?>" height="100"></td>
                            <td><?php echo $value['Subproduct']['name']; ?></td>
                            <td><?php echo date('d-m-Y', strtotime($value['Subproduct']['created'])); ?></td>
                            <td>
                                <a href="<?php echo DOMAINAD ?>products/editsub/<?php echo $value['Subproduct']['id']; ?>" title="Edit"><img src="<?php echo DOMAINAD ?>images/icons/pencil.png" alt="Edit" /></a> <a href="javascript:confirmDelete('<?php echo DOMAINAD ?>products/deletesub/<?php echo $value['Subproduct']['id']; ?>')" title="Delete"><img src="<?php echo DOMAINAD ?>images/icons/cross.png" alt="Delete" /></a>
                            </td>
                            <td align="right"><?php echo $value['Subproduct']['id']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php echo $this->Form->end(); ?>