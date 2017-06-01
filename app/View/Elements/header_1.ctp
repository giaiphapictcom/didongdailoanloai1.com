<?php $setting = $this->requestAction('/comment/setting'); ?>
<div id="header_outer">
    <div id="header">
        <div class="row1"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="50%" class="hotline"><?php echo $setting['Setting']['telephone']; ?><br><a href="<?php echo DOMAIN; ?>lien-he" style="color: #FFF">Đặt hàng</a></td>
                    <td width="50%" align="right">
                        <table width="210" border="0" align="right" cellpadding="0" cellspacing="0" class="bgsearch">
                            <form name="f1" id="f1" action="<?php echo DOMAIN; ?>tim-kiem" method="post" onsubmit="return checkForm(this);">
                                <tr>
                                    <td width="125" class="searchProduct"><input name="searchProduct" type="text" id="searchProduct" style="width:125px; height:25px; border:none; text-align:center; background:none;" onfocus="if(this.value=='Từ khóa tìm kiếm') this.value=''" onblur="if(this.value=='') this.value='Từ khóa tìm kiếm'" value="Từ khóa tìm kiếm"  size="17" /></td>
                                    <td width="85"><input type="image" src="<?php echo DOMAIN; ?>images/intheu_08.png" name="button" id="button" border="0" style="border:none; padding-top:2px;" /></td>
                                </tr>
                            </form>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <div class="row2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="18%" align="center" class="menutop"><a href="<?php echo DOMAIN; ?>">Trang chủ</a></td>
                    <td width="16%" align="center" class="menutop"><a href="<?php echo DOMAIN; ?>gioi-thieu">Giới thiệu</a></td>
                    <td width="16%" align="center" class="menutop"><a href="<?php echo DOMAIN; ?>san-pham">Sản phẩm</a></td>
                    <td width="16%" align="center" class="menutop"><a href="<?php echo DOMAIN; ?>dichvu">Dịch vụ</a></td>
                    <td width="16%" align="center" class="menutop"><a href="<?php echo DOMAIN; ?>tin-tuc">Tin tức ảnh</a></td>
                    <td width="18%" align="center" class="menutop"><a href="<?php echo DOMAIN; ?>lien-he">Liên hệ</a></td>
                </tr>
            </table>
        </div>
        <div class="row3"><?php echo $this->element('slideadv'); ?></div>
        <div class="row4"><marquee behavior="scroll" scrollamount="3"><?php echo $setting['Setting']['meta_key']; ?></marquee></div>
    </div>
</div>