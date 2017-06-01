<?php
$multiMenu = $this->requestAction('/common/multiMenu/44');
$multiMenu = substr($multiMenu, 4);
$multiMenu = substr($multiMenu, 0, -10);
?>
<div class="boxright">
    <div class="box1">
        <form method="post" name="f1" id="f1" action="<?php echo DOMAIN; ?>product/search">
            <div class="titleleft">Phụ tùng theo hãng</div>
            <?php
            $thuoctinh = $this->requestAction('/common/thuoctinh');
            foreach ($thuoctinh as $k => $field) {
                ?>
                <div class="titleNews1"><?php echo $field['Atribute']['name']; ?></div>
                <div class="sl-search">
                    <select name="at<?php echo $k + 1; ?>">
                        <option value="0">  --- Tất cả ---</option>
                        <?php
                        foreach ($field['children'] as $i => $rows) {
                            ?>
                            <option value="<?php echo $rows['Atribute']['id']; ?>" <?php
                            if(isset($at[$i])) {
                                if($rows['Atribute']['id'] == $at[$i]){
                                    echo 'selected="selected"';
                                }
                                } ?>><?php echo $rows['Atribute']['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            <?php } ?>
            <div style="margin: 25px 0px; padding-left: 19px;">
                <input type="text" name="searchProduct" class="bgsearch" placeholder=" ... Nhập từ khóa ..." />
                <input type="image" name="submit" src="<?php echo DOMAIN; ?>images/search.png" style="border: none;" />
            </div>
        </form>
    </div>
</div>

<div class="boxright">
    <div class="box1">
        <div class="titleleft">Phụ tùng theo hãng</div>
        <ul id="menu1">
            <?php echo $multiMenu; ?>
        </ul>
    </div>
</div>

<div class="boxright">
    <div class="box1">
        <div class="titleleft">Hình ảnh xe</div>
        <?php
        $quangcao = $this->requestAction('/common/quangcao');
        foreach ($quangcao as $field) {
            if ($field['Advertisement']['display'] == 1) {
                ?>
                <div class="paddbottom">
                    <a href="<?php echo $field['Advertisement']['link']; ?>" target="_blank"><img src="<?php echo IMAGEAD; ?>logo/<?php echo $field['Advertisement']['images']; ?>" alt="<?php echo $field['Advertisement']['name']; ?>" /></a>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>