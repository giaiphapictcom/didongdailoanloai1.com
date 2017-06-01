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
<div class="box">
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
