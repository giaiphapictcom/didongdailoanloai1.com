<div class="titlemain">Thư viện Video</div>
<div class="row1">
    <div class="">
        <?php foreach ($video as $rows) { ?>
        <div class="boxproduct">
            <div class="bdimg">
                <a href="<?php echo DOMAIN; ?>home/detailvideo/<?php echo $rows['Video']['id']; ?>"><img src="<?php echo $rows['Video']['images']; ?>" width="168" height="128" /></a>
            </div>
            <div class="titlepro"><a href="<?php echo DOMAIN; ?>home/detailvideo/<?php echo $rows['Video']['id']; ?>"><?php echo $rows['Video']['name']; ?></a></div>
        </div>
    <?php } ?>
    </div>
</div>
