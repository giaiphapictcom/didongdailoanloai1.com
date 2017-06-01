<div class="box-col-1">
    <form>
        <div class="datve">
            ĐẶT VÉ MÁY BAY
        </div>
        <table width="100%">
            <tbody><tr>
                    <td colspan="2">
                        <span class="diemdi">Điểm đi</span>
                    </td>
                    <td colspan="2">
                        <span class="diemden">Điểm đến</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" height="45" valign="top">
                        <input name="ctl00$cphMain$UsrSearchFormMainV31$txtFrom" type="text" value="Hồ Chí Minh (SGN)" id="cphMain_UsrSearchFormMainV31_txtFrom" class="startplace city departure" datetype="departure" onclick="select()" style="margin-right: 18px;">
                    </td>
                    <td colspan="2" height="45" valign="top">
                        <input name="ctl00$cphMain$UsrSearchFormMainV31$txtFrom" type="text" value="Hồ Chí Minh (SGN)" id="cphMain_UsrSearchFormMainV31_txtFrom" class="startplace city departure" datetype="departure" onclick="select()" style="margin-right: 18px;">
                    </td>
                </tr>
                <tr>
                    <td height="10">
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td width="65" class="bold-font-white14">
                        Ngày đi 
                    </td>
                    <td width="164">
                    </td>
                    <td width="55" class="bold-font-white14">
                        Ngày về
                    </td>
                    <td width="136">
                    </td>
                </tr>
                <tr height="30px;">

                    <td colspan="2" height="45" valign="top">
                        <input name="ctl00$cphMain$UsrSearchFormMainV31$txtFrom" type="text" value="Hồ Chí Minh (SGN)" id="cphMain_UsrSearchFormMainV31_txtFrom" class="startplace city departure" datetype="departure" onclick="select()" style="margin-right: 18px;">
                    </td>

                    <td colspan="2" height="45" valign="top">
                        <input name="ctl00$cphMain$UsrSearchFormMainV31$txtFrom" type="text" value="Hồ Chí Minh (SGN)" id="cphMain_UsrSearchFormMainV31_txtFrom" class="startplace city departure" datetype="departure" onclick="select()" style="margin-right: 18px;">
                    </td>
                </tr>
            </tbody></table>
        <br>
        <div class="blank10">
        </div>
        <table width="100%">
            <tbody><tr valign="middle">
                    <td class="normal-font-white14">
                        Người lớn
                    </td>
                    <td width="24%" height="35">
                        <select name="ctl00$cphMain$UsrSearchFormMainV31$cboAdult" id="cphMain_UsrSearchFormMainV31_cboAdult" class="personoption">
                            <?php for($i = 1; $i <=20; $i++) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>                            
                            <?php } ?>
                        </select>
                    </td>
                    <td width="58%" class="smallText2">
                        (Từ 12 tuổi trở lên)
                    </td>
                </tr>
                <tr valign="middle">
                    <td class="normal-font-white14">
                        Trẻ em
                    </td>
                    <td height="35">
                        <select name="ctl00$cphMain$UsrSearchFormMainV31$cboChild" id="cphMain_UsrSearchFormMainV31_cboChild" class="personoption">
                            <?php for($i = 1; $i <=10; $i++) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>                            
                            <?php } ?>
                        </select>
                    </td>
                    <td class="smallText2">
                        (Từ 2 đến 11 tuổi)
                    </td>
                </tr>
                <tr valign="middle">
                    <td class="normal-font-white14">
                        Em bé
                    </td>
                    <td height="35">
                        <select name="ctl00$cphMain$UsrSearchFormMainV31$cboInfant" id="cphMain_UsrSearchFormMainV31_cboInfant" class="personoption">
                            <?php for($i = 1; $i <=5; $i++) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>                            
                            <?php } ?>
                        </select>
                    </td>
                    <td class="smallText2">
                        (dưới 2 tuổi)
                    </td>
                </tr>
            </tbody></table>
        <br>
        <div class="blank10">
        </div>
        <a href="/tien-ich/huong-dan-su-dung.aspx" class="view-clip">Xem video hướng dẫn</a>
        <input type="submit" name="ctl00$cphMain$UsrSearchFormMainV31$btnSearch" value="Tìm chuyến bay" id="cphMain_UsrSearchFormMainV31_btnSearch" class="search">
    </form>
</div>
<div class="box-col-2">
    <?php echo $this->element('slide'); ?>
</div>