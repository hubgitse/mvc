<?php
/**
 * @var \app\Model\UserModel $user
 */
?>
<div>
    <form action="/register" method="post" >
        <p>
            <label>
                <?php echo $translator->translate('register_user_name'); ?>
            </label>
            <input type="text" name="name" value=""/>
        </p>

        <p>
            <label>
                <?php echo $translator->translate('register_user_email'); ?>
            </label>
            <input type="text" name="email" value=""/>
        </p>

        <p>
            <label>
                <?php echo $translator->translate('register_user_pass'); ?>
            </label>
            <input type="password" name="pass" value=""/>
        </p>

        <button type="submit">
            <?php echo $translator->translate('register_user_button'); ?>
        </button>
    </form>
</div>