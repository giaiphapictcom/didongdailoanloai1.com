<?php
$setting = $this->requestAction('/common/setting');
echo $setting['Setting']['analytics'];
?>
<div class="hd-intro-outer">
    <div class="hd-intro">
        <div id="logo-intro">
            <img src="<?php echo DOMAIN; ?>images/logo.png" alt="Hung phat" title="Hung phat" />
        </div>
        <ul id="menu-intro">
            <li>
                <a href="<?php echo DOMAIN; ?>home">
                    <span class="mn1">Home</span><br>
                    <span class="mn2">Trang chủ</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="mn1">About us</span><br>
                    <span class="mn2">Giới thiệu</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="mn1">Sitemap</span><br>
                    <span class="mn2">Sitemap</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="mn1">Project</span><br>
                    <span class="mn2">Dự án</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="mn1">Contact</span><br>
                    <span class="mn2">Liên hệ</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="mn1">Recruitment</span><br>
                    <span class="mn2">Tuyển dụng</span>
                </a>
            </li>
        </ul>
        <div id="flag-intro">
            <a href="?language=vie"><img src="<?php echo DOMAIN; ?>images/home-hungphat_05.png" alt="" height="24" /></a> &nbsp; <a href="?language=eng"><img src="<?php echo DOMAIN; ?>images/home-hungphat_07.png" alt="" height="24" /></a>
        </div>
    </div>
</div>

<div class="bg-intro">
    <div class="content-intro">
        <div class="sp-intro">
            <div class="bg-pro1">
                <img src="<?php echo DOMAIN; ?>images/intro_05.png" alt="Hung phat" title="Hung phat" />
            </div>
            <div class="bg-pro1">
                <img src="<?php echo DOMAIN; ?>images/intro_05-04.png" alt="Hung phat" title="Hung phat" />
            </div>
            <div class="bg-pro1">
                <img src="<?php echo DOMAIN; ?>images/intro_06.png" alt="Hung phat" title="Hung phat" />
            </div>
            <div class="bg-pro1">
                <img src="<?php echo DOMAIN; ?>images/intro_12.png" alt="Hung phat" title="Hung phat" />
            </div>
            <div class="bg-pro1">
                <img src="<?php echo DOMAIN; ?>images/intro_14.png" alt="Hung phat" title="Hung phat" />
            </div>
        </div>
    </div>
</div>
<div class="ft-intro">
    <div class="ft-content">
        <?php
        echo $setting['Setting']['copyright'];
        ?>
    </div>
</div>