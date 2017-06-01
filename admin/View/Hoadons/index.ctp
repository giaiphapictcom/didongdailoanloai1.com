<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
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
        <div class="pagetitle icon-48-nhomtin"><h2>Hóa đơn</h2></div>
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
                        <th>Tên khách hàng</th>
                        <th>Email</th>
                        <th>Điện thoại</th>
                        <th>Ngày đặt hàng</th>
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
                    <?php foreach ($listbill as $key => $value) { ?>
                        <tr>
                            <td><?php $j = $key + 1;
                    echo $j; ?></td>
                            <td> <?php echo $value['Customer']['name']; ?></td>
                            <td> <?php echo $value['Customer']['email']; ?></td>
                            <td> <?php echo $value['Customer']['phone']; ?></td>
                            <td><?php echo date('d-m-Y', strtotime($value['Hoadon']['created'])); ?></td>
                            <td>
                                <a href="<?php echo DOMAINAD; ?>hoadons/viewbill/<?php echo $value['Hoadon']['id'] ?>" title="Chi tiết"><img src="<?php echo DOMAINAD; ?>images/icons/information.png" alt="Chi tiết" /></a>
                                <a href="javascript:confirmDelete('<?php echo DOMAINAD; ?>hoadons/deletebill/<?php echo $value['Hoadon']['id'] ?>')" title="Delete"><img src="<?php echo DOMAINAD; ?>images/icons/cross.png" alt="Delete" /></a> 
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