<?php
/**
 * @var array $posts
 */
?>
<div>
    <?php foreach ($posts as $post): ?>
        <p><?php echo $post['title']; ?></p>    
        <p><?php echo $post['text']; ?></p>    
    <?php endforeach; ?>
</div>