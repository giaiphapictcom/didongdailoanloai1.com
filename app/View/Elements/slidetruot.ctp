<div id="adv">
    <?php
    echo $this->Html->script(array('quangcaotruot'));
    $quangcao = $this->requestAction('/common/quangcao');
    ?>
    <style type="text/css">
        #slideads {
            position: relative;
            margin: auto;
            width: 1340px;
        }
        #slidetruottrai {
            position: absolute;
            left: 13px;
            top: -0;
            z-index: 99;
        }
        #slidetruotphai {
            top: -0;
            position: absolute;
            right: 13px;
            z-index: 99;
        }
    </style>
    <div id="slideads">
        <div class="slidetruottrai" id="slidetruottrai">
            <?php
            foreach ($quangcao as $field) {
                if ($field['Advertisement']['display'] == 3) {
                    ?>
                    <div style="margin: 2px auto; text-align: center;">
                        <a href="<?php echo $field['Advertisement']['link']; ?>" target="_blank"><img src="<?php echo IMAGEAD; ?>logo/<?php echo $field['Advertisement']['images']; ?>" width="155" alt="<?php echo $field['Advertisement']['name']; ?>" /></a>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <div class="slidetruotphai" id="slidetruotphai">
            <?php
            foreach ($quangcao as $field) {
                if ($field['Advertisement']['display'] == 4) {
                    ?>
                    <div style="margin: 2px auto; text-align: center;">
                        <a href="<?php echo $field['Advertisement']['link']; ?>" target="_blank"><img src="<?php echo IMAGEAD; ?>logo/<?php echo $field['Advertisement']['images']; ?>" width="155" alt="<?php echo $field['Advertisement']['name']; ?>" /></a>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(window).bind("resize", methodToFixLayout);
        function methodToFixLayout(e) {
            var winWidth = $(window).width();
            //alert(winWidth);
            if (winWidth > 1280) {
                $('#adv').css('display', 'block');
            } else {
                $('#adv').css('display', 'none');
            }
        }
    });
</script>