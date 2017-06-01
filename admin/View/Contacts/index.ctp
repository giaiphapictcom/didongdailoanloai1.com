<?php echo $this->Html->script('jwplayer'); ?>
<script type="text/javascript">
    function changepos() {
        document.frm1.action = "<?php echo DOMAINAD; ?>contacts/changepos";
        document.frm1.submit();
    }
</script>
<?php echo $this->Form->create(null, array('url' => DOMAINAD . 'contacts/changepos', 'type' => 'post', 'enctype' => 'multipart/form-data', 'name' => 'frm1')); ?>

<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="<?php echo DOMAINAD; ?>contacts/add" class="toolbar"> <span class="icon-32-new"></span> Thêm mới </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD ?>home" class="toolbar"> <span class="icon-32-unpublish"></span> Đóng </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-nhomtin">
			<h2>Quản lý liên hệ</h2>
        </div>
        <div class="clr"></div>
    </div>
</div>
<div class="content-box">
    <div class="content-box-header">
        <h3></h3>
        <div class="clear"></div>
    </div>
    <!-- End .content-box-header -->
    <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1"> 
            <!-- This is the target div. id must match the href of this div's tab -->
            <table width="100%">
                <thead>
                    <tr>
                        <th width="5%">STT</th>
                        <th width="24%">Tiêu đề</th>
                        <th width="16%">Email</th>
                        <th width="14%">Phone</th>
                        <th width="10%">Cập nhật</th>
                        <th width="13%">Xử lý</th>
                        <th width="7%">ID</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $i = 1;
                    foreach ($Contact as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $i + 1; ?></td>
                            <td><?php echo $value['Contact']['name'] ?></td>
                            <td><?php echo $value['Contact']['email'] ?></td>
                            <td><?php echo $value['Contact']['phone'] ?></td>
                            <td><?php echo date('d-m-Y', strtotime($value['Contact']['created'])); ?></td>
                            <td><!-- Icons --> 
                                <a href="<?php echo DOMAINAD ?>contacts/edit/<?php echo $value['Contact']['id'] ?>" title="Sửa mục này"><img src="<?php echo DOMAINAD ?>images/icons/pencil.png" alt="Sửa" /></a> <a href="javascript:confirmDelete('<?php echo DOMAINAD ?>contacts/delete/<?php echo $value['Contact']['id'] ?>')" title="Xóa mục này"><img src="<?php echo DOMAINAD ?>images/icons/cross.png" alt="Xóa" /></a>
                                <?php
                                if ($value['Contact']['status'] == 0) {
                                    ?>
                                    <a href="<?php echo DOMAINAD ?>contacts/active/<?php echo $value['Contact']['id']; ?>" title="Kích hoạt" class="icon-5 info-tooltip"><img src="<?php echo DOMAINAD ?>images/icons/Play-icon.png" alt="Kích hoạt" /></a>
                                    <?php
                                } else {
                                    ?>
                                    <a href="<?php echo DOMAINAD ?>contacts/close/<?php echo $value['Contact']['id']; ?>" title="Đóng" class="icon-4 info-tooltip"><img src="<?php echo DOMAINAD ?>images/icons/success-icon.png" alt="Ngắt kích hoạt" /></a>
                                        <?php
                                    }
                                    ?>
                            </td>
                            <td align="right"><?php echo $value['Contact']['id']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- End #tab1 --> 
        <!-- End #tab2 --> 
    </div>
    <!-- End .content-box-content --> 
</div>
<?php echo $this->Form->end(); ?> 