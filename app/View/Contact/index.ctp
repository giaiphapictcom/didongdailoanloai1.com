<?php
echo $this->Html->script(array('jquery.validationEngine'));
echo $this->Html->css(array('validationEngine.jquery'));
?>
<script>
    $(document).ready(function() {
        $("#contactIndexForm").validationEngine();
    });
</script>

<div class="boxmain">
    <h2 class="titlemain"><a><?php echo __('lienhe'); ?></a><span class="title_c"></span></h2>
    <div class="paddall">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <?php
                    echo $setting['Setting']['contactinfo'];
                    ?>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <form id="contactIndexForm" name="contactForm" class="form_contact"  onsubmit="return validateForm();" method="post" action="<?php echo DOMAIN; ?>/contact/send">
                        <table width="100%" border="0" cellspacing="0" cellpadding="4" style="border: none !important;">
                            <tr>
                                <td width="150" height="30"><span class="field">
                                        <label for="Họ tên" class="styled"><?php echo __('hoten'); ?></label>
                                    </span></td>
                                <td><span class="thefield">
                                        <input name="name" type="text" id="name2" size="40" class="validate[required]" />
                                    </span></td>
                            </tr>
                            <tr>
                                <td height="30"><span class="field">
                                        <label for="Email2" class="styled"><?php echo __('Email'); ?></label>
                                    </span></td>
                                <td><span class="thefield">
                                        <input name="email" type="text" id="name4" size="40" class="validate[required,custom[email]]" />
                                    </span></td>
                            </tr>
                            <tr>
                                <td height="30"><span class="field">
                                        <label for="Điện thoại2" class="styled"><?php echo __('sodienthoai'); ?></label>
                                    </span></td>
                                <td><span class="thefield">
                                        <input name="phone" type="text" id="name" size="40" />
                                    </span></td>
                            </tr>
                            <tr>
                                <td height="30"><span class="field">
                                        <label for="Địa chỉ2" class="styled"><?php echo __('tieude'); ?></label>
                                    </span></td>
                                <td><span class="thefield">
                                        <input name="title" type="text" id="name3" size="40"  class="validate[required]" />
                                    </span></td>
                            </tr>
                            <tr>
                                <td><span class="field">
                                        <label for="Nội dung2" class="styled"><?php echo __('noidung'); ?></label>
                                    </span></td>
                                <td><span class="thefield">
                                        <textarea name="content"cols="40" rows="8" ></textarea>
                                    </span></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><button type="submit" value="Gửi" name="save" class="btnSend" />
                                    <?php echo __('gui'); ?>
                                    </button></td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
        </table>
    </div>
</div>