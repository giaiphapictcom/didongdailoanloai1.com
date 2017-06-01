<?php echo $this->Html->script('jwplayer'); ?>
<script type="text/javascript">
    function changepos() {
        document.frm1.action = "<?php echo DOMAINAD; ?>videos/changepos";
        document.frm1.submit();
    }
</script>
<?php echo $this->Form->create(null, array('url' => DOMAINAD . 'videos/changepos', 'type' => 'post', 'enctype' => 'multipart/form-data', 'name' => 'frm1')); ?>

<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="<?php echo DOMAINAD; ?>videos/add" class="toolbar"> <span class="icon-32-new"></span> Thêm mới </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD ?>home" class="toolbar"> <span class="icon-32-unpublish"></span> Đóng </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-nhomtin">
            <h2>Quản lý video</h2>
        </div>
        <div class="clr"></div>
    </div>
</div>
<div class="content-box">
    <div class="content-box-header">
        <h3></h3>
        <!--<ul class="content-box-tabs">
            <li><a href="#tab1" class="default-tab">Nội dung tiếng Việt</a></li>
            <li><a href="#tab2">Nội dung tiếng Anh</a></li>
        </ul>-->
        <div class="clear"></div>
    </div>
    <!-- End .content-box-header -->
    <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1"> 
            <!-- This is the target div. id must match the href of this div's tab -->
            <table width="100%">
                <thead>
                    <tr>
                        <th width="6%">STT</th>
                        <th width="40%">Video</th>
                        <th width="11%" style="text-align:center;"><a href="#" onclick="changepos()">Vị trí</a></th>
                        <th width="12%">Cập nhật</th>
                        <th width="11%">Xử lý</th>
                        <th width="6%">ID</th>
                    </tr>
                </thead>
   
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($video as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $i + 1; ?></td>
                            <td>
                                <p>
                                    <?php echo $value['Video']['name'] ?>
                                </p>
                                <embed width="600" height="372" wmode="transparent" type="application/x-shockwave-flash" src="http://www.youtube.com/v/<?php echo $value['Video']['youtube']; ?>&autoplay=0&rel=0&loop=0">
                            </td>
                            <td style="text-align:center;"><input class="text-input medium-input" style="text-align:center; width:30% !important;" type="text" value="<?php echo $value['Video']['pos']; ?>" name="order[<?php echo $value['Video']['id']; ?>]" /></td>
                            <td><?php echo date('d-m-Y', strtotime($value['Video']['modified'])); ?></td>
                            <td><!-- Icons --> 
                                <a href="<?php echo DOMAINAD ?>videos/edit/<?php echo $value['Video']['id'] ?>" title="Sửa mục này"><img src="<?php echo DOMAINAD ?>images/icons/pencil.png" alt="Sửa" /></a> <a href="javascript:confirmDelete('<?php echo DOMAINAD ?>videos/delete/<?php echo $value['Video']['id'] ?>')" title="Xóa mục này"><img src="<?php echo DOMAINAD ?>images/icons/cross.png" alt="Xóa" /></a>
                             <?php
                                    if ($value['Video']['status'] == 0) {
                                        ?>
                                <a href="<?php echo DOMAINAD ?>videos/active/<?php echo $value['Video']['id']; ?>" title="Kích hoạt" class="icon-5 info-tooltip"><img src="<?php echo DOMAINAD ?>images/icons/Play-icon.png" alt="Kích hoạt" /></a>
                                <?php
                                    } else {
                                        ?>
                                <a href="<?php echo DOMAINAD ?>videos/close/<?php echo $value['Video']['id']; ?>" title="Đóng" class="icon-4 info-tooltip"><img src="<?php echo DOMAINAD ?>images/icons/success-icon.png" alt="Ngắt kích hoạt" /></a>
                                <?php
                                    }
                                    ?>
                            </td>
                            <td align="right"><?php echo $value['Video']['id']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- End #tab1 --> 

        <!-- End #tab2 --> 

    </div>
    <!-- End .content-box-content --> 
</div>
<?php echo $this->Form->end(); ?> 