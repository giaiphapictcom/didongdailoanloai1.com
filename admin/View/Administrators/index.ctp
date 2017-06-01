<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new">
                    <a href="<?php echo DOMAINAD; ?>administrators/add" class="toolbar">
                        <span class="icon-32-new"></span>
                        Thêm mới
                    </a>
                </li>
                <li class="divider"></li>
                <li id="toolbar-help">
                    <a href="#messages" rel="modal" class="toolbar">
                        <span class="icon-32-help"></span>
                        Trợ giúp
                    </a>
                </li>
                <li id="toolbar-unpublish">
                    <a href="<?php echo DOMAINAD; ?>home" class="toolbar">
                        <span class="icon-32-unpublish"></span>
                        Đóng
                    </a>
                </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-nhomtin"><h2>Tài khoản</h2></div>
        <div class="clr"></div>
    </div>
</div>
<div class="content-box">
    <div class="content-box-header">

        <ul class="content-box-tabs">
            <li><a href="#tab1" class="default-tab"></a></li> 
            <li><a href="#tab2"></a></li>
        </ul>
        <div class="clear"></div>
    </div>
    <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1"> 
            <table>

                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên đăng nhập</th>
                        <th>Ngày tạo</th>
                        <th>Hoạt động</th>
                        <th>Xử lý</th>
                    </tr>

                </thead>

                <tfoot>
                    <tr>
                        <td colspan="6">
                            </div> <!-- End .pagination -->
                            <div class="clear"></div>
                        </td>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($users as $key => $value) { ?>
                        <tr>
                            <td><?php $j = $key + 1;
                    echo $j; ?></td>
                            <td> <?php echo $value['Administrator']['name']; ?></td>
                            <td><?php echo date('d-m-Y', strtotime($value['Administrator']['created'])); ?></td>
                            <td><?php
                                if ($value['Administrator']['id'] != 1) {
                                    if ($value['Administrator']['status'] == 0) {
                                        ?>
                                        <a href="<?php echo DOMAINAD ?>administrators/active/<?php echo $value['Administrator']['id']; ?>" title="Kích hoạt" class="icon-5 info-tooltip"><img src="<?php echo DOMAINAD ?>images/icons/Play-icon.png" alt="Kích hoạt" /></a>
                                        <?php
                                    } else {
                                        ?>
                                        <a href="<?php echo DOMAINAD ?>administrators/close/<?php echo $value['Administrator']['id']; ?>" title="Đóng" class="icon-4 info-tooltip"><img src="<?php echo DOMAINAD ?>images/icons/success-icon.png" alt="Ngắt kích hoạt" /></a>
                                            <?php
                                        }
                                    }
                                    ?></td>
                            <td>
                                <a href="<?php echo DOMAINAD; ?>administrators/editpass/<?php echo $value['Administrator']['id'] ?>" title="Edit"><img src="<?php echo DOMAINAD; ?>images/icons/pencil.png" alt="Edit" /></a>
                                <?php if ($value['Administrator']['id'] != 1) { ?>
                                    <a href="javascript:confirmDelete('<?php echo DOMAINAD; ?>administrators/delete/<?php echo $value['Administrator']['id'] ?>')" title="Delete"><img src="<?php echo DOMAINAD; ?>images/icons/cross.png" alt="Delete" /></a>
    <?php } ?>
                            </td>
                        </tr>
<?php } ?>
                </tbody>

            </table>
        </div> <!-- End #tab1 -->
        <!-- End #tab2 -->        
    </div> <!-- End .content-box-content -->
</div>
<?php echo $this->Form->end(); ?>