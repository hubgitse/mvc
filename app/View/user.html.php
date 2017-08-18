<?php
/**
 * @var \app\Model\UserModel $user
 */
?>
<div>
    <p><?php echo $user->getUser(); ?></p>
    <p><?php echo $user->getHost(); ?></p>
    <a href="/user/edit/<?php echo $user->getId(); ?>"><?php echo $translator->translate('user_edit'); ?></a>
</div>