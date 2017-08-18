<?php
/**
 * @var array $posts
 */
?>
<div>
    <?php foreach ($posts as $post): ?>
        <p><b><?php echo $post['title']; ?></b></p>    
        <p><?php echo $post['text']; ?></p>    
    <?php endforeach; ?>
</div>