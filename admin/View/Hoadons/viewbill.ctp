<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD; ?>hoadons" class="toolbar"> <span class="icon-32-unpublish"></span> Quay lại </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-nhomtin">
            <h2>Chi tiết hóa đơn</h2>
        </div>
        <div class="clr"></div>
    </div>
</div>
<div class="content-box">
    <div class="content-box-header">
        <h3>Khách hàng : <?php echo $khachhang1['Customer']['name']; ?> - Ngày mua hàng : <?php echo date('d-m-Y H:i', strtotime($hoadon['Hoadon']['created'])); ?></h3>
        <div class="clear"></div>
    </div>
    <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="18%" height="30"><strong>Họ và tên</strong></td>
					<td width="82%"><?php echo $khachhang1['Customer']['name']; ?></td>
				</tr>
				<tr>
					<td height="30"><strong>Địa chỉ </strong></td>
					<td width="82%"><?php echo $khachhang1['Customer']['address']; ?></td>
				</tr>
				<tr>
					<td height="30"><strong>Email</strong></td>
					<td width="82%"><?php echo $khachhang1['Customer']['email']; ?></td>
				</tr>
				<tr>
					<td height="30"><strong>Số điện thoại</strong></td>
					<td width="82%"><?php echo $khachhang1['Customer']['phone']; ?></td>
				</tr>
				<tr>
					<td height="30"><strong>Yêu cầu thêm</strong></td>
					<td width="82%"><?php echo $khachhang1['Customer']['content']; ?></td>
				</tr>
			</table>
            <!-- End #tab2 -->
            <table width="100%">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên SP</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $tong = 0; foreach($hanghoa as $k => $rows) {  ?>
                    <tr>
                        <td><?php echo $k + 1; ?></td>
                        <td><?php echo $rows['Product']['name']; ?></td>
                        <td><?php echo $rows['Hanghoa']['soluong']; ?></td>
                        <td><?php echo number_format($rows['Hanghoa']['price']); ?></td>
                        <td><?php $tien = $rows['Hanghoa']['soluong'] * $rows['Hanghoa']['price']; echo number_format($tien); ?></td>
                    </tr>
                    <?php $tong += $tien;} ?>
                </tbody>

                <tfoot>
                    <tr>.
                        <td colspan="5" height="35" align="right">
                            <strong style="font-size: 16px;">
                                Tổng tiền : <?php echo number_format($tong); ?> đ
                            </strong>
                        </td>
                    </tr>

                </tfoot>
            </table>
            <!-- End .content-box-content -->
        </div>
    </div>
</div>