<?php

App::import('Vendor', 'PHPMailerAutoload');

/**
 * Description of ContactController
 * @author : Trung Tong
 * @since Oct 19, 2012
 */
class ContactController extends AppController {

    public $name = 'Contact';
    public $uses = array('Setting', 'Contact');

    public function index() {
        
    }

    function send() {
        $this->autoLayout = false;

        if ($this->request->is('post')) {
            $setting = $this->Setting->find('first');
            $data    = $this->request->data;
            //            pr($data);die;
            $this->Contact->create();
            $this->Contact->save($data);


            $mail             = new PHPMailer;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'chip.anhthu176@gmail.com';
            $mail->Password   = 'xuantrung197';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;
            $mail->setFrom($data['email'], $data['name']);
            $mail->addReplyTo($data['email']);
            $mail->addAddress($setting['Setting']['email'], 'Website');
            // $mail->addCC('cc@example.com');
            $mail->addBCC('tongxuantrung@gmail.com', 'Trung Tong');
            $mail->WordWrap   = 80;
            $mail->isHTML(true);

            $content = "";
            $content .= 'Họ tên: ' . $data['name'] . "<br>";
            $content .= 'Email: ' . $data['email'] . "<br>";
            $content .= 'Điện thoại: ' . $data['phone'] . "<br>";
            $content .= 'Tiêu đề: ' . $data['title'] . "<br>";
            $content .= 'Nội dung: ' . $data['content'] . "<br>";

            $mail->Subject = 'Thông tin liên hệ tunglamtek';
            $mail->Body    = $content;
            $mail->AltBody = $content;

            if (!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
                exit;
            }

            echo '<script language="javascript"> alert("Gửi mail thành công"); location.href="' . DOMAIN . '";</script>';
        }
    }

    function nhanxet() {
        $this->autoLayout = false;

        if ($this->request->is('post')) {
            if (isset($data['maxacthuc'])) {
                $data['Contentreview'] = $this->request->data;
                //pr($data);die;
                if ($data['maxacthuc'] == $data['code']) {

                    $this->Contentreview->save($data);

                    $setting       = $this->Setting->find('first');
                    $email         = new CakeEmail();
                    $email->from(array($data['email'] => 'Đánh giá nhận xét'));
                    $email->to($setting['Setting']['email']);
                    $email->subject('Đánh giá nhận xét');
                    $content       = "";
                    $content .= 'Họ và tên khách hàng: ' . $data['name'] . "<br>";
                    $content .= 'Email: ' . $data['email'] . "<br>";
                    $content .= 'Di động: ' . $data['phone'] . "<br>";
                    $content .= 'Nội dung nhận xét: ' . $data['content'] . "<br>";
                    $email->sendAs = 'html';
                    $email->send($content);
                    echo '<script language="javascript"> alert("Gửi mail thành công"); location.href="' . DOMAIN . '";</script>';
                } else {
                    echo '<script language="javascript"> alert("Bạn chưa nhập đủ thông tin"); location.href="' . DOMAIN . '";</script>';
                }
            }//end maxacthuc
        }
    }

}
