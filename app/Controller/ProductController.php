<?php
	
	App::import('Vendor', 'PHPMailerAutoload');
	
	/**
		* Description of ProductController
		* @author : Trung Tong
		* @since Oct 19, 2012
	*/
	class ProductController extends AppController {
		
		public $name = 'Product';
		public $uses = array('Catalogue', 'Product', 'Hoadon', 'Customer', 'Hanghoa', 'Atribute', 'Setting');
		
		public function index($id = null) {
			$typeName = $this->Catalogue->read(null, $id);
			$this->set('typeName', $typeName);
			
			$groupId = $this->Catalogue->children($id);
			$arrId   = array($id);
			foreach ($groupId as $values) {
				$arrId[] = $values['Catalogue']['id'];
			}
			
			$duongdan = $this->Catalogue->getPath($typeName['Catalogue']['id']);
			$this->set('duongdan', $duongdan);
			
			// Set Seo
			if ($typeName['Catalogue']['title_seo'] != "") {
				$this->set('title_for_layout', $typeName['Catalogue']['title_seo']);
				} else {
				$this->set('title_for_layout', $typeName['Catalogue']['name']);
			}
			if($typeName['Catalogue']['meta_key'] != "") {
				$this->set('keywords_for_layout', $typeName['Catalogue']['meta_key']);
				} else {
				$this->set('keywords_for_layout', $typeName['Catalogue']['name']);
			}
			if($typeName['Catalogue']['meta_des'] != "") {
				$this->set('description_for_layout', $typeName['Catalogue']['meta_des']);
				} else {
				$this->set('description_for_layout', $typeName['Catalogue']['name']);
			}
			
			// list all product
			$this->paginate = array(
			'conditions' => array(
                'Product.status' => 1,
                'Product.cat_id' => $arrId,
            ),
			'order'      => 'Product.pos DESC, Product.id DESC',
			'limit'      => '30'
			);
			$listProduct    = $this->paginate('Product');
			$this->set('listProduct', $listProduct);
			
			// Thuoc tinh
			$att = $this->Atribute->find('threaded', array(
            'order' => 'Atribute.pos ASC'
			));
		}
		
		public function detail($id = null) {
			$detailProduct = $this->Product->findById($id);
			$this->set('detailProduct', $detailProduct);
			
			// Set Seo
			if ($detailProduct['Product']['title_seo'] != "") {
				$this->set('title_for_layout', $detailProduct['Product']['title_seo']);
				} else {
				$this->set('title_for_layout', $detailProduct['Product']['name']);
			}
			if($detailProduct['Product']['meta_key'] != "") {
				$this->set('keywords_for_layout', $detailProduct['Product']['meta_key']);
				} else {
				$this->set('keywords_for_layout', $detailProduct['Product']['name']);
			}
			if($detailProduct['Product']['meta_des'] != "") {
				$this->set('description_for_layout', $detailProduct['Product']['meta_des']);
				} else {
				$this->set('description_for_layout', $detailProduct['Product']['name']);
			}
			
			$duongdan = $this->Catalogue->getPath($detailProduct['Product']['cat_id']);
			$this->set('duongdan', $duongdan);
			
			// list all product
			$this->paginate = array(
			'conditions' => array(
			'Product.status' => 1,
			'Product.cat_id' => $detailProduct['Product']['cat_id']
			),
			'order'      => 'Product.pos DESC, Product.modified DESC',
			'limit'      => '30'
			);
			$listProduct    = $this->paginate('Product');
			$this->set('listProduct', $listProduct);
		}
		
		public function listproduct() {
			// list all product
			$this->paginate = array(
			'conditions' => array(
			'Product.status' => 1
			),
			'order'      => 'Product.pos DESC, Product.modified DESC',
			'limit'      => '20'
			);
			$listProduct    = $this->paginate('Product');
			$this->set('listProduct', $listProduct);
		}
		
		public function search() {
			$keyword = $this->request->data['searchProduct'];
			
			$this->set('keyword', $keyword);
			
			//Dieu kien search
			$condition[] = array(
			'OR' => array(
			'Product.name LIKE' => '%' . $keyword . '%',
			'Product.code LIKE' => '%' . $keyword . '%'
			)
			);
			
			$conditions = array();
			foreach ($condition as $values) {
				$conditions[] = $values;
			}
			
			//        pr($conditions);
			
			// list all product		
			$this->paginate = array(
			'conditions' => $conditions,
			'order'      => 'Product.pos DESC, Product.id DESC',
			'limit'      => '30'
			);
			$listProduct    = $this->paginate('Product');
			$this->set('listProduct', $listProduct);
		}
		
		/*
			* Gioi hang
		*/
		
		public function cart($id = null) {
			$this->autoRender = false;
			
			$typeCart = $this->request->params['type'];
			$cart     = $this->Session->read('cart');
			
			switch ($typeCart) {
				case 'add':
				if ($cart) {
					$cart .= ',' . $id;
					} else {
					$cart = $id;
				}
				break;
				case 'minus':
				if ($cart) {
					$items   = explode(',', $cart);
					$newcart = '';
					$k       = 0;
					foreach ($items as $item) {
						if ($id == $item) {
							if ($k > 0) {
								if ($newcart != '') {
									$newcart .= ',' . $item;
									} else {
									$newcart = $item;
								}
							}
							$k++;
							} else {
							$newcart .= ',' . $item;
						}
					}
					$cart = $newcart;
				}
				break;
				case 'delete':
				if ($cart) {
					$items   = explode(',', $cart);
					$newcart = '';
					foreach ($items as $item) {
						if ($id != $item) {
							if ($newcart != '') {
								$newcart .= ',' . $item;
								} else {
								$newcart = $item;
							}
						}
					}
					$cart = $newcart;
				}
				break;
				case 'deleteAll':
				if ($cart) {
					$cart = "";
				}
				$this->Session->delete('cart');
				$this->Session->delete('slg');
				$this->Session->delete('tongsp');
				$this->Session->delete('soluong');
				$this->Session->delete('tongtien');
				$this->redirect('/');
				break;
				case 'update':
				if ($cart) {
					$newcart = '';
					foreach ($_POST as $key => $value) {
						if (stristr($key, 'qty')) {
							$id      = str_replace('qty', '', $key);
							$items   = ($newcart != '') ? explode(',', $newcart) : explode(',', $cart);
							$newcart = '';
							foreach ($items as $item) {
								if ($id != $item) {
									if ($newcart != '') {
										$newcart .= ',' . $item;
										} else {
										$newcart = $item;
									}
								}
							}
							for ($i = 1; $i <= $value; $i++) {
								if ($newcart != '') {
									$newcart .= ',' . $id;
									} else {
									$newcart = $id;
								}
							}
						}
					}
				}
				$cart = $newcart;
				break;
			}
			if (substr($cart, 0, 1) == ",") {
				$cart = substr($cart, 1);
			}
			$this->Session->write('cart', $cart);
			$this->redirect('/product/shopingcart');
		}
		
		public function shopingcart() {
			// GIo hang
			if ($this->Session->check('cart') && $this->Session->read('cart') !== "") {
				$cart     = $this->Session->read('cart');
				$items    = explode(',', $cart);
				$contents = array();
				$gioHang  = array();
				$slg      = array();
				$soluong  = 0;
				foreach ($items as $item) {
					$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
				}
				$tongtien = 0;
				foreach ($contents as $k => $qty) {
					$temp      = $this->Product->read(null, $k);
					$gioHang[] = $temp;
					$slg[]     = $qty;
					$soluong += $qty;
					$tongtien += $temp['Product']['price'] * $qty;
				}
				$this->Session->write('slg', $soluong);
				$this->set('gioHang', $gioHang);
				$this->set('slg', $slg);
				$this->Session->write('giohang', $gioHang);
				$this->Session->write('soluong', $soluong);
				$this->Session->write('tongtien', number_format($tongtien));
				} else {
				$this->Session->delete('cart');
				$this->Session->delete('soluong');
				$this->Session->delete('giohang');
				$this->Session->delete('tongtien');
				$this->render('empty');
			}
		}
		
		public function orderproduct() {
			$this->autoRender = false;
			// So luong
			$soluong          = $this->Session->read('soluong');
			
			// insert vao bang hoadon
			
			$data = $this->request->data;
			$this->Customer->create();
			$this->Customer->save($data);
			
			// Lay ID khach hang
			$cusId = $this->Customer->getInsertID();
			
			// Insert vao hoadon
			$data                = array();
			$this->Hoadon->create();
			$data['customer_id'] = $cusId;
			$this->Hoadon->save($data);
			
			// Lay ma hoa don
			$hdId = $this->Hoadon->getInsertID();
			
			// insert vao bang monan
			$hanghoa = $this->Session->read('giohang');
			foreach ($hanghoa as $k => $value) {
				$gia = $value['Product']['price'];
				$data               = array();
				$this->Hanghoa->create();
				$data['hoadon_id']  = $hdId;
				$data['product_id'] = $value['Product']['id'];
				$data['soluong']    = $soluong[$k];
				$data['price']      = $soluong[$k] * $gia;
				$this->Hanghoa->save($data);
			}
			
			// Gui mail
			$setting = $this->Setting->find('first');
			$khachhang1 = $this->Customer->read(null, $cusId);
			
			$mail             = new PHPMailer;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'chip.anhthu176@gmail.com';
            $mail->Password   = 'xuantrung197';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;
            $mail->setFrom($khachhang1['Customer']['email'], $khachhang1['Customer']['name']);
            $mail->addReplyTo($khachhang1['Customer']['email']);
            $mail->addAddress($khachhang1['Customer']['email'], 'Website');
            $mail->addCC($setting['Setting']['email'], 'Website');
            $mail->addBCC('tongxuantrung@gmail.com', 'Trung Tong');
            $mail->WordWrap   = 80;
            $mail->isHTML(true);
			
			$content = '<style>
				#featured2 table {
					width: 100% !important;
				}
				#featured2 table td, #featured2 table td {
					border-collapse: collapse;
					border: 1px solid #CCC;
					padding: 8px;
					white-space: nowrap;
				}
				#featured2 table th {
					font-size: 14px;
					font-weight: bold;
					background: #D8D8D8;
				}
			</style>';
            $content .= '
				<div id="featured2">
					<h3>Thông tin khách hàng</h3>
					<table width="100%" border="0" cellspacing="0" cellpadding="8">
						<tr>
							<td width="18%" height="30"><strong>Họ và tên</strong></td>
							<td width="82%">' . $khachhang1['Customer']['name']. '</td>
						</tr>
						<tr>
							<td height="30"><strong>Địa chỉ </strong></td>
							<td width="82%">' . $khachhang1['Customer']['address']. '</td>
						</tr>
						<tr>
							<td height="30"><strong>Email</strong></td>
							<td width="82%">' . $khachhang1['Customer']['email']. '</td>
						</tr>
						<tr>
							<td height="30"><strong>Số điện thoại</strong></td>
							<td width="82%">' . $khachhang1['Customer']['phone']. '</td>
						</tr>
						<tr>
							<td height="30"><strong>Yêu cầu thêm</strong></td>
							<td width="82%">' . $khachhang1['Customer']['content']. '</td>
						</tr>
					</table><br><br>
					<h3>Thông tin đơn hàng</h3>
					<table width="100%" border="0" cellspacing="0" cellpadding="8">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên SP</th>
								<th>Số lượng</th>
								<th>Đơn giá</th>
								<th>Thành tiền</th>
							</tr>
						</thead>
						<tbody>';
						$tong = 0;
						foreach($hanghoa as $k => $rows) {
							$tien = $soluong[$k] * $rows['Product']['price'];
							$tong += $tien;
							$stt = $k+1;
							$content .= '<tr>
									<td>' . $stt . '</td>
									<td>' . $rows['Product']['name']. '</td>
									<td>' . $soluong[$k]. '</td>
									<td>' . number_format($rows['Product']['price']). '</td>
									<td>' . number_format($tien). '</td>
								</tr>';
								}
								$content .= '</tbody>
							<tfoot>
								<tr>
									<td colspan="5" height="35" align="right">
										<strong style="font-size: 16px;">
											Tổng tiền : ' . number_format($tong). ' đ
										</strong>
									</td>
								</tr>
							</tfoot>
						</table>
					</div>
				';
			
            $mail->Subject = 'Thông tin đơn hàng';
            $mail->Body    = $content;
            $mail->AltBody = $content;
			
            if (!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
                exit;
			}
			
			
			// Luu roi thi xoa session di
			$this->Session->delete('giohang');
			$this->Session->delete('cart');
			$this->Session->delete('soluong');
			
			// Da them thanh cong
			$this->redirect('/gui-hoa-don-thanh-cong.html');
		}
		
		public function payment() {
			
		}
		
		public function ordersuccess() {
			
		}
		
	}
