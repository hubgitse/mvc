<?php
/**
 * @var \app\Model\ProductModel $product
 */
?>
<div>
    <p><?php echo $product->getId(); ?></p>
    <p><?php echo $product->getTitle(); ?></p>
    <p><?php echo $product->getCategory(); ?></p>
    <p><?php echo $product->getPrice(); ?></p>
    <p><?php echo $product->getCount(); ?></p>
    <a href="/products/edit/<?php echo $product->getId(); ?>"><?php echo $translator->translate('product_edit_button'); ?></a>
</div>