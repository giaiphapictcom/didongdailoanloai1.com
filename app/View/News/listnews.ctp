<div class="boxmain">
    <div class="titlemain">Tin tức & Sự kiện</div>
    <div class="box1">        
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="paddall">
            <?php foreach ($listNews as $rows) { ?>
                <tr>
                    <td class="titleNews1" height="30"><a href="<?php echo DOMAIN; ?>chi-tiet-tin-tuc/<?php echo $rows['News']['id']; ?>"><?php echo $rows['News']['name']; ?></a></td>
                </tr>
                <tr>
                    <td>
                        <div align="justify">
                            <?php if ($rows['News']['images'] != "") { ?>
                                <div style="float: left; margin-right: 5px;"><a href="<?php echo DOMAIN; ?>chi-tiet-tin-tuc/<?php echo $rows['News']['id']; ?>/<?php echo $rows['News']['slug'] . ".html"; ?>"><img src="<?php echo IMAGEAD; ?>news/<?php echo $rows['News']['images']; ?>" width="220" class="bdimg" /></a></div>
                            <?php } ?>
                            <span class="content"> <?php echo $rows['News']['shortdes']; ?></span>
                            <div align="right" class="detail"><a href="<?php echo DOMAIN; ?>chi-tiet-tin-tuc/<?php echo $rows['News']['id']; ?>/<?php echo $rows['News']['slug'] . ".html"; ?>">Chi tiết</a></div>
                        </div></td>
                </tr>
                <tr>
                    <td class="gachngan"></td>
                </tr>
            <?php } ?>
        </table>
        <div class="pagination" style="text-align: center; margin: 4px auto;">
            <?php
            echo $this->Paginator->first('« Đầu ', null, null, array('class' => 'disabled'));
            echo $this->Paginator->prev('« Trước ', null, null, array('class' => 'disabled'));
            echo $this->Paginator->numbers() . " ";
            echo $this->Paginator->next(' Tiếp »', null, null, array('class' => 'disabled'));
            echo $this->Paginator->last('« Cuối ', null, null, array('class' => 'disabled'));
            ?>
        </div>
    </div>
</div>