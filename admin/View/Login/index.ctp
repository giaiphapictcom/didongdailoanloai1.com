<div align="center" style="padding-top: 90px;">
    <?php echo $this->Form->create(null, array('url' => DOMAINAD . 'login/login', 'type' => 'post')); ?>
    <table align="center" border="0" cellpadding="2" cellspacing="2">
        <tbody><tr>
                <td width="50">
                    &nbsp;
                </td>
                <td >
                    <input name="name" type="text" placeholder="Username ..." autocomplete="off" />
                </td>
            </tr>
            <tr>
                <td >
                    &nbsp;
                </td>
                <td >
                    <input name="password" type="password" placeholder="Password ..." autocomplete="off" />
                </td>
            </tr>
            <tr >
                <td>&nbsp;</td>
                <td>
                    <input name="login" value="Login" type="submit" class="login">
                </td>
            </tr>
        </tbody>
    </table>
    <div align="center">
        <div class="notification">
            <?php echo $this->Session->flash(); ?>
        </div>
    </div>
</form>
<!-- -->
</div>
<?php echo $this->Form->end(); ?>