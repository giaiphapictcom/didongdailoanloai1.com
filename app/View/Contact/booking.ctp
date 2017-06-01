<?php
echo $this->Html->script(array('jquery.validationEngine'));
echo $this->Html->css(array('validationEngine.jquery'));
?>
<script>
    $(document).ready(function() {
        $("#contactIndexForm").validationEngine();
    });
</script>

<div class="titlemain"><?php echo __('datban'); ?></div>
<div class="box">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>
                <form id="contactIndexForm" name="contactForm" class="form_contact"  onsubmit="return validateForm();" method="post" action="<?php echo DOMAIN; ?>/contact/booking">
                    <table width="100%" border="0" cellspacing="0" cellpadding="4" style="border: none !important;">
                        <tr>
                            <td width="150" height="30"><span class="field">
                                    <label for="Họ tên" class="styled"><?php echo __('Name'); ?> (*)</label>
                                </span></td>
                            <td><span class="thefield">
                                    <input name="name" type="text" id="name2" size="40" class="validate[required]" />
                                </span></td>
                        </tr>
                        <tr>
                            <td height="30"><span class="field">
                                    <label for="Email2" class="styled"><?php echo __('Email'); ?> (*)</label>
                                </span></td>
                            <td><span class="thefield">
                                    <input name="email" type="text" id="name4" size="40" class="validate[required,custom[email]]" />
                                </span></td>
                        </tr>
                        <tr>
                            <td height="30"><span class="field">
                                    <label for="Điện thoại2" class="styled"><?php echo __('Mobile'); ?> (*)</label>
                                </span></td>
                            <td><span class="thefield">
                                    <input name="phone" type="text" id="name" size="40" class="validate[required,custom[telephone]]" />
                                </span></td>
                        </tr>
                        <tr>
                            <td height="30"><span class="field">
                                    <label for="Địa chỉ2" class="styled"><?php echo __('No of'); ?></label>
                                </span></td>
                            <td><span class="thefield">
                                    <select name="noof" style="height: 25px; min-width: 50px; line-height: 25px; text-align: center;">
                                        <?php for($i = 1; $i <= 200; $i++) { ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php } ?>
                                    </select>
                                </span></td>
                        </tr>
                        <tr>
                            <td height="30"><span class="field">
                                    <label for="Địa chỉ2" class="styled"><?php echo __('Date'); ?></label>
                                </span></td>
                            <td><span class="thefield">
                                    <select name="date" style="height: 25px; min-width: 50px; line-height: 25px; text-align: center;">
                                        <?php for($i = 1; $i <= 31; $i++) { ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php } ?>
                                    </select> &nbsp; / &nbsp;
                                    <select name="month" style="height: 25px; min-width: 50px; line-height: 25px; text-align: center;">
                                        <?php for($i = 1; $i <= 12; $i++) { ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php } ?>
                                    </select> &nbsp; / &nbsp;
                                    <select name="year" style="height: 25px; min-width: 50px; line-height: 25px; text-align: center;">
                                        <?php for($i = 2013; $i <= 2023; $i++) { ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php } ?>
                                    </select>
                                </span></td>
                        </tr>
                        <tr>
                            <td height="30"><span class="field">
                                    <label for="Địa chỉ2" class="styled"><?php echo __('Time'); ?></label>
                                </span></td>
                            <td><span class="thefield">
                                    <select name="hour" style="height: 25px; min-width: 50px; line-height: 25px; text-align: center;">
                                        <?php for($i = 0; $i <= 23; $i++) { ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php } ?>
                                    </select> &nbsp; / &nbsp;
                                    <select name="minute" style="height: 25px; min-width: 50px; line-height: 25px; text-align: center;">
                                        <?php for($i = 00; $i <= 59; $i++) { ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php } ?>
                                    </select>
                                </span></td>
                        </tr>
                        <tr>
                            <td><span class="field">
                                    <label for="Nội dung2" class="styled"><?php echo __('Requirement'); ?></label>
                                </span></td>
                            <td><span class="thefield">
                                    <textarea name="content"cols="40" rows="8" ></textarea>
                                </span></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><button type="submit" value="Gửi" name="save" class="btnSend" />
                                <?php echo __('Send'); ?>
                                </button></td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>
</div>