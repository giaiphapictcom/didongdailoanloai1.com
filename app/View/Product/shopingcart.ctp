<div class="titlemain"><?php echo __('giohang'); ?></div>
<div class="box2">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td>
                <table width="100%" border="0" cellpadding="0" cellspacing="3">
                    <form name="f1" id="f1" method="post" action="<?php echo DOMAIN; ?>/update-cart.html">
                        <tr class="titleNews">
                            <td width="7%" height="30" align="center" valign="middle" bgcolor="#CCCCCC" class="titleNews">STT</td>
                            <td width="34%" valign="middle" bgcolor="#CCCCCC" class="titleNews">&nbsp;</td>
                            <td width="15%" align="center" valign="middle" bgcolor="#CCCCCC" class="titleNews">Số lượng</td>
                            <td width="18%" align="center" valign="middle" bgcolor="#CCCCCC" class="titleNews">Đơn giá</td>
                            <td width="17%" align="center" valign="middle" bgcolor="#CCCCCC" class="titleNews">Thành tiền</td>
                            <td width="9%" valign="middle" bgcolor="#CCCCCC" class="titleNews">&nbsp;</td>
                        </tr>
                        <?php
                        $tongTien = 0;
                        $tongsoluong = 0;
                        foreach ($gioHang as $k => $rows) {
                            if (count($gioHang) > 0) {
                                 if ($this->Session->read('mtype') == 1) {
                                    $giadaily = $this->Session->read('mtype');
                                    $gia = $rows['Product']['price' . $giadaily];
                                } else {
                                    $gia = $rows['Product']['price'];
                                }
                                ?>
                                <tr class="NormalText">
                                    <td height="30" align="center" style="color:#F00; font-weight:800" ><?php echo $k + 1; ?></td>
                                    <td align="center" class="textBoxCart"><img src="<?php echo IMAGEAD; ?>product/<?php echo $rows['Product']['images']; ?>" border="0" width="125" />
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td height="25" class="NormalText">Tên SP : <?php echo $rows['Product']['name']; ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td align="center">
                                        <input name="qty<?php echo $rows['Product']['id']; ?>" type="text" id="qty<?php echo $rows['Product']['id']; ?>" size="3" maxlength="4" value="<?php echo $slg[$k]; ?>" style="text-align:center" />
                                    </td>
                                    <td class="error"><?php echo number_format($gia); ?></td>
                                    <td class="error"><?php echo number_format($gia * $slg[$k]) ?></td>
                                    <td align="center" class="textBoxCart">
                                        <input name="xoa" type="button" class="btnCart" id="xoa" onclick="window.location='<?php echo DOMAIN; ?>/del-cart/<?php echo $rows['Product']['id']; ?>'" value="Xóa" />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6" height="1px" bgcolor="#0066FF"></td>
                                </tr>
                                <?php
                                $tongTien += $gia * $slg[$k];
                                $tongsoluong += $slg[$k];
                            }
                        }
                        ?>
                        <tr>
                            <td height="30" colspan="6">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="38%" height="30" style="padding-left:14px;"><span style="font-size:14px; font-weight:bold">Tổng số lượng: <?php echo $tongsoluong ?></span>
                                        </td>
                                        <td colspan="2" style="padding-right:10px; font-size:14px; font-weight:bold;">Tổng tiền thanh toán : <span style="color:#F00; font-weight:bold" ><?php echo number_format($tongTien) . " VND" ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" colspan="3">
                                           <input name="xoa2" type="button" class="btnCart" id="xoa2" onclick="window.history.back()" value="Mua hàng tiếp" /> <input name="Submit" type="submit" class="btnCart" value="Cập nhật giỏ hàng" /> <input name="Xoaall" type="button" class="btnCart" onclick="window.location='<?php echo DOMAIN; ?>/del-all-cart.html'" value="Xóa giỏ hàng" />
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" align="center" height="10"></td>
                        </tr>
                    </form>
                </table>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
    </table>
</div>

<?php
echo $this->Html->script(array('jquery.validationEngine'));
echo $this->Html->css(array('validationEngine.jquery'));
?>
<script>
    $(document).ready(function() {
        $("#contactIndexForm").validationEngine();
    });
</script>
<div class="titlemain"><?php echo __('xacnhanthanhtoan'); ?></div>
<div class="box2">
    <form style="height:370px;"  id="contactIndexForm" name="contactForm" class="form_contact"  method="post" action="<?php echo DOMAIN; ?>gui-hoa-don.html">
        <table width="100%" border="0" cellspacing="0" cellpadding="4">
            <tr>
                <td width="150" height="30"><span class="field">
                        <label for="Họ tên" class="styled">Họ Tên</label>
                    </span></td>
                <td><span class="thefield">
                        <input name="name" type="text" id="name" size="40" class="validate[required]" />
                    </span></td>
            </tr>
            <tr>
                <td height="30"><span class="field">
                        <label for="Địa chỉ2" class="styled">Địa chỉ</label>
                    </span></td>
                <td><span class="thefield">
                        <input name="address" type="text" id="address" size="40" class="validate[required]" />
                    </span></td>
            </tr>
            <tr>
                <td height="30"><span class="field">
                        <label for="Email2" class="styled">Email</label>
                    </span></td>
                <td><span class="thefield">
                        <input name="email" type="text" id="email" size="40" class="validate[custom[email]]" />
                    </span></td>
            </tr>
            <tr>
                <td height="30"><span class="field">
                        <label for="Điện thoại2" class="styled">Số điện thoại</label>
                    </span></td>
                <td><span class="thefield">
                        <input name="phone" type="text" id="mobile" size="40" class="validate[custom[telephone]]" />
                    </span></td>
            </tr>
            <tr>
                <td><span class="field">
                        <label for="Nội dung2" class="styled">Thông tin thêm</label>
                    </span></td>
                <td style="padding-top: 10px;"><span class="thefield">
                        <textarea name="content"cols="40" rows="8" ></textarea>
                    </span></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><button type="submit" value="Gửi mail" name="save" class="btnCart"  />
                    Gửi đơn hàng
                    </button></td>
            </tr>
        </table>
    </form>
</div>
