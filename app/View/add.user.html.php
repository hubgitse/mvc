<?php
/**
 * @var \app\Model\UserModel $user
 */
?>
<div>
    <form action="/user/add" method="post" >
        <p>
            <label>
                <?php echo $translator->translate('user_name'); ?>
            </label>
            <input type="text" name="name" value="<?php if($user)echo $user->getUser(); ?>"/>
        </p>

        <p>
            <label>
                <?php echo $translator->translate('user_host'); ?>
            </label>
            <input type="text" name="host" value="<?php if($user)echo $user->getHost(); ?>"/>
            <input type="hidden" name="id" value="<?php if($user)echo $user->getId(); ?>"/>
        </p>

        <button type="submit">
            <?php $btn = ($user) ? 'user_edit_button' : 'user_add_button';
             echo $translator->translate($btn); ?>
        </button>
    </form>
</div>