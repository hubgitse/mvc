<?php
/**
 * @var \app\Model\ProductModel $product
 */
?>
<div>
    <form action="/products/add" method="post" >
        <p>
        <label>
            <?php echo $translator->translate('product_title'); ?>
        </label>
        <input type="text" name="title" value="<?php if($product) echo $product->getTitle(); ?>"/>
        </p>

        <p>
        <label>
            <?php echo $translator->translate('product_category'); ?>
        </label>
        <input type="text" name="category" value="<?php if($product) echo $product->getCategory(); ?>" />
        </p>

        <p>
        <label>
            <?php echo $translator->translate('product_price'); ?>
        </label>
        <input type="number" name="price" value="<?php if($product) echo $product->getPrice(); ?>" />
        </p>

        <p>
        <label>
            <?php echo $translator->translate('product_count'); ?>
        </label>
        <input type="number" name="count" value="<?php if($product) echo $product->getCount(); ?>" />
        </p>

        <input type="hidden" name="id" value="<?php if($product) echo $product->getId(); ?>" />

        <button type="submit">
            <?php $btn = ($product) ? 'product_edit_button' : 'product_add_button';
            echo $translator->translate($btn); ?>
        </button>
    </form>
</div>