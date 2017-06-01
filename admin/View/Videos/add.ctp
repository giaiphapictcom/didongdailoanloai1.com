<script type="text/javascript">
 $(document).ready(function() {
   $('#computer').click( function() {
    $('.show1').hide();
    $('.show2').show();
   });
   $('#youtube').click( function() {
    $('.show1').show();
    $('.show2').hide();
   });
})
</script>
<style>
    .show2 {
        display: none;
    }
</style>
<?php echo $this->Form->create(null, array('url' => DOMAINAD . 'videos/add', 'type' => 'post', 'enctype' => 'multipart/form-data', 'name' => 'image')); ?>
<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.image.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD; ?>videos" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="pagetitle icon-48-category-add">
            <h2>Thêm mới video</h2>
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
    <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
            <table width="100%" class="input">
                <tr>
                    <td width="150" class="label">Tiêu đề</td>
                    <td><?php echo $this->Form->input('Video.name', array('label' => '', 'class' => 'text-input medium-input', 'id' => '')); ?></td>
               	</tr>
<!--                <tr>
                    <td class="label">Nguồn</td>
                    <td>
                        <label style="float: left; width: auto; padding-right: 20px;">
                            <input name="data[Video][type]" type="radio" id="computer" value="1">
                            Từ máy tính</label>
                        &nbsp; 
                        <label style="float: left; width: auto;">
                            <input type="radio" name="data[Video][type]" value="2" id="youtube" checked>
                            Nhúng youtube</label>
                    </td>
               	</tr>
                <tr class="show2">
                    <td class="label">Chọn file</td>
                    <td>
                        <input name="userfile" type="file" id="userfile" size="50">
                    </td>
               	</tr>-->
                <tr class="show1">
                    <td class="label">Mã nhúng</td>
                    <td><?php echo $this->Form->input('Video.youtube', array('label' => '', 'class' => 'text-input medium-input', 'id' => '', 'type' => 'textarea')); ?></td>
               	</tr>
            </table>
            <div class="clear"></div>
        </div>
        <div class="tab-content" id="tab2">
            <div class="clear"></div>
        </div>
    </div>
</div>
<div id="khung">
    <div id="main">
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li id="toolbar-new"> <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="toolbar"> <span class="icon-32-save"></span> Lưu </a> </li>
                <li id="toolbar-refresh"> <a href="javascript:void(0);" class="toolbar" onclick="javascript:document.image.reset();"> <span class="icon-32-refresh"> </span> Reset </a> </li>
                <li class="divider"></li>
                <li id="toolbar-help"> <a href="#messages" rel="modal" class="toolbar"> <span class="icon-32-help"></span> Trợ giúp </a> </li>
                <li id="toolbar-unpublish"> <a href="<?php echo DOMAINAD ?>videos" class="toolbar"> <span class="icon-32-cancel"></span> Hủy </a> </li>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="clr"></div>
    </div>
</div>
<?php echo $this->Form->end(); ?>