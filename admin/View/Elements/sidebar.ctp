<?php
$setActive = $this->request->url;
$setActive = explode("/", $setActive);
$setActive = $setActive[0];
$tabindex = "";
if (in_array($setActive, array('catproducts', 'products'))) {
    $tabindex = 0;
}
if (in_array($setActive, array('catalogues', 'news'))) {
    $tabindex = 1;
}
?>
<script type="text/javascript">
    ddaccordion.init({
        headerclass: "submenuheader",
        contentclass: "submenu",
        revealtype: "click",
        mouseoverdelay: 200,
        collapseprev: true,
        defaultexpanded: [<?php echo $tabindex; ?>],
        onemustopen: false,
        animatedefault: false,
        persiststate: false,
        toggleclass: ["", ""],
        animatespeed: "fast",
        oninit:function(headers, expandedindices){
            //do nothing
        },
        onopenclose:function(header, index, state, isuseractivated){
            //do nothing
        }
    })
</script>

<div id="sidebar">
    <div id="sidebar-wrapper">
        <h1 id="sidebar-title"><a href="#"></a></h1>
        <a href="#"><img id="logo" src="<?php echo DOMAINAD ?>images/logo.png" alt="" /></a>
        <div id="profile-links"> Xin chào, <a href="#" title="Edit your profile"><?php echo $this->Session->read('name'); ?></a><br />
            <br />
            <a href="<?php echo DOMAIN; ?>" title="View the Site" target="_blank">Xem trang chủ</a> | <a href="<?php echo DOMAINAD ?>login/logout" title="Sign Out">Thoát</a> </div>
        <div id="list">
            <ul id="main-nav">
                <li id="arrayorder_1"> <a href="<?php echo DOMAINAD ?>home" class="nav-top-item no-submenu"> Trang chủ </a> </li>
                <li id="arrayorder_11"> <a href="<?php echo DOMAINAD ?>catalogues" class="nav-top-item no-submenu">Danh mục menu</a> </li>
                <li id="arrayorder_11"><a href="<?php echo DOMAINAD ?>products" class="nav-top-item no-submenu">Danh sách sản phẩm</a></li>
                <li id="arrayorder_11"><a href="<?php echo DOMAINAD ?>news" class="nav-top-item no-submenu">Danh sách tin tức</a></li>
                <li id="arrayorder_4"> <a href="<?php echo DOMAINAD ?>settings" class="nav-top-item">Cấu hình</a> </li>
                <li id="arrayorder_8"> <a href="<?php echo DOMAINAD ?>slideshows" class="nav-top-item">Quản lý slideshow</a> </li>
                <li id="arrayorder_8"> <a href="<?php echo DOMAINAD ?>advertisements" class="nav-top-item">Quản lý quảng cáo</a> </li>
                <li id="arrayorder_8"> <a href="<?php echo DOMAINAD ?>banners" class="nav-top-item">Quản lý Banner</a> </li>
                <li id="arrayorder_4"> <a href="<?php echo DOMAINAD ?>supports" class="nav-top-item">Quản lý hỗ trợ trực tuyến</a> </li>
                <li id="arrayorder_4"> <a href="<?php echo DOMAINAD ?>contacts" class="nav-top-item">Quản lý liên hệ</a> </li>
				<li id="arrayorder_8"> <a href="<?php echo DOMAINAD ?>hoadons" class="nav-top-item">Quản lý đơn hàng</a> </li>
                <li id="arrayorder_8"> <a href="<?php echo DOMAINAD ?>administrators/editpass/<?php echo $this->Session->read('id'); ?>" class="nav-top-item">Đổi mật khẩu</a> </li>
            </ul>
        </div>
    </div>
</div>