<?php
Router::connect('/', array('controller' => 'home', 'action' => 'index'));

Router::connect('/home', array('controller' => 'home', 'action' => 'index'));
Router::connect('/trang-chu.html', array('controller' => 'home', 'action' => 'index'));
Router::connect('/gioi-thieu.html', array('controller' => 'home', 'action' => 'intro', 1));
Router::connect('/tien-ich/*', array('controller' => 'home', 'action' => 'intro'));
Router::connect('/gioi-thieu/*', array('controller' => 'home', 'action' => 'aboutus'));
Router::connect('/lien-he.html', array('controller' => 'contact', 'action' => 'index'));
Router::connect('/doi-tac.html', array('controller' => 'news', 'action' => 'partner'));
Router::connect('/video.html', array('controller' => 'album', 'action' => 'video'));
Router::connect('/nhan-xet.html', array('controller' => 'Contact', 'action' => 'nhanxet'));

Router::connect('/su-kien.html', array('controller' => 'news', 'action' => 'event', 6));
Router::connect('/tim-kiem.html', array('controller' => 'product', 'action' => 'search'));

Router::connect('/gio-hang/*', array('controller' => 'product', 'action' => 'cart', 'type' => 'add'));
Router::connect('/del-cart/*', array('controller' => 'product', 'action' => 'cart', 'type' => 'delete'));
Router::connect('/del-all-cart.html', array('controller' => 'product', 'action' => 'cart', 'type' => 'deleteAll'));
Router::connect('/update-cart.html', array('controller' => 'product', 'action' => 'cart', 'type' => 'update'));
Router::connect('/thanh-toan.html', array('controller' => 'product', 'action' => 'payment'));
Router::connect('/gui-hoa-don.html', array('controller' => 'product', 'action' => 'orderproduct'));
Router::connect('/gui-hoa-don-thanh-cong.html', array('controller' => 'product', 'action' => 'ordersuccess'));

Router::connect('/dat-mua/*', array('controller' => 'product', 'action' => 'cart', 'type' => 'add'));
Router::connect('/xoa-mon/*', array('controller' => 'product', 'action' => 'cart', 'type' => 'delete'));
Router::connect('/xoa-gio-hang.html', array('controller' => 'product', 'action' => 'cart', 'type' => 'deleteAll'));
Router::connect('/giam-mua/*', array('controller' => 'product', 'action' => 'cart', 'type' => 'minus'));

Router::connect('/dang-ky-mail-khuyen-mai.html', array('controller' => 'Registertocoment', 'action' => 'dangkymailkhuyenmai'));

Router::connect('/chi-tiet-tin/*', array('controller' => 'news', 'action' => 'detail'));
Router::connect('/chi-tiet-tin-tuc/*', array('controller' => 'news', 'action' => 'detail'));

Router::connect('/phu-tung-o-to/*', array('controller' => 'product', 'action' => 'autopart'));

Router::connect(
    '/:slug-:id.html', 
    array('controller' => 'product', 'action' => 'index'),
    array(
        'pass' => array('id', 'slug'),
        "id"=>"[0-9]+",
    )
);

Router::connect(
    '/:sluga/:slug-:id.html', 
    array('controller' => 'product', 'action' => 'detail'),
    array(
        'pass' => array('id', 'slug'),
        "id"=>"[0-9]+",
    )
); 
	
Router::connect(
    '/:id/:slug.html', 
    array('controller' => 'news', 'action' => 'index'),
    array(
        'pass' => array('id', 'slug'),
        "id"=>"[0-9]+",
    )
);

CakePlugin::routes();
require CAKE . 'Config' . DS . 'routes.php';
