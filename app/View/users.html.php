<?php
/**
 * @var \app\Model\UserModel[] $users
 */
?>
<h1>Hello <?php echo $admin->getName();?></h1>
<div>
    <?php foreach ($users as $user): ?>
        <p><a href="/users/<?php echo $user->getId(); ?>"><?php echo $user->getUser(); ?></a>
            <span>
                <a href="/user/edit/<?php echo $user->getId(); ?>"><?php echo $translator->translate('user_edit'); ?></a>
            </span>
            <span>
                <a href="/user/delete/<?php echo $user->getId(); ?>"><?php echo $translator->translate('user_delete'); ?></a>
            </span>
        </p>
        <p><?php echo $user->getHost(); ?></p>    
    <?php endforeach; ?>
    <p>
        <a href="/user/add/"><?php echo $translator->translate('user_add'); ?></a>
    </p>
    <p>
    <h2><a href="/logout/"><?php echo $translator->translate('admin_logout'); ?></a></h2>
    </p>
</div>