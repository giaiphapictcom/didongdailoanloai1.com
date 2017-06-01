<?php
$list_cat = $this->requestAction('/common/menutree');
?>
<form id="form1" name="form1" method="post" action="<?php echo DOMAIN; ?>/product/search">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td width="10%">Tên sản phẩm</td>
            <td width="14%"><input type="text" name="searchProduct" id="textfield" class="inputtext" /></td>
            <td width="10%">Mã sản phẩm</td>
            <td width="14%"><input type="text" name="codeproduct" id="textfield2" class="inputtext" /></td>
            <td width="10%" align="center">Loại</td>
            <td width="14%">
                <select name="typeproduct" id="select">
                    <option> --- Loại sản phẩm --- </option>
                    <?php foreach ($list_cat as $k => $v) { ?>
                        <option value="<?php echo $k; ?>"><?php echo $v; ?></option>
                    <?php } ?>
                </select>
            </td>
            <td width="14%" class="btncach"><input type="submit" value="Tìm kiếm" name="submit" class="btnCart" /></td>
        </tr>
    </table>
</form>