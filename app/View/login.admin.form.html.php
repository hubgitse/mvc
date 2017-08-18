<?php
/**
 * @var \app\Model\UserModel $user
 */
?>
<div>
    <form action="/login" method="post" >
        <p>
            <label>
                <?php echo $translator->translate('admin_email'); ?>
            </label>
            <input type="text" name="email" value=""/>
        </p>

        <p>
            <label>
                <?php echo $translator->translate('admin_pass'); ?>
            </label>
            <input type="text" name="pass" value=""/>
        </p>

        <button type="submit">
            <?php echo $translator->translate('admin_enter'); ?>
        </button>
        <br />
        <br />
        <p>
            <a href="/register"><?php echo $translator->translate('admin_register'); ?></a>
        </p>
    </form>
</div>