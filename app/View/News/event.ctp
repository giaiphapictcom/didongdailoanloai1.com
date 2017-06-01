<div class="titlemain">Tin tức & Sự kiện</div>
<div class="box content">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="paddall">
        <?php foreach ($listNews as $rows) { ?>
        <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="25%" valign="top">
                            <div class="calendar"><?php echo date('F, d', strtotime($rows['News']['ngay'])); ?></div>
                            <div style="line-height: 24px; padding-left: 16px;"><?php echo $rows['News']['thoigian']; ?></div>
                            <div class="diadiem"><a href="<?php echo $rows['News']['map']; ?>" target="_blank"><?php echo $rows['News']['diadiem']; ?></a></div>
                        </td>
                        <td width="75%" valign="top">
                            <div class="titleNews"><a href="<?php echo DOMAIN; ?>chi-tiet-tin-tuc/<?php echo $rows['News']['id']; ?>"><?php echo $rows['News']['name']; ?></a></div>
                            <div class="content"> <?php echo $rows['News']['shortdes']; ?></div>
                            <div align="right" class="detail"><a href="<?php echo DOMAIN; ?>chi-tiet-tin-tuc/<?php echo $rows['News']['id']; ?>/<?php echo $rows['News']['slug'] . ".html"; ?>">Chi tiết</a></div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td><div class="gachngan"></div></td>
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