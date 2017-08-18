<?php
/**
 * @var \app\Model\ProductModel[] $products
 * @var \app\Lib\Translator $translator
 */
?>
<div>
    <h2><?php echo $translator->translate('list_of_products'); ?></h2>

    <a href="/products/add" >
        <?php echo $translator->translate('products_add_new'); ?>
    </a>

    <?php foreach ($products as $product): ?>
        <p>
            <?php echo $translator->translate('product_id'); ?>:
            <?php echo $product->getId(); ?>
            <span><a href="/products/edit/<?php echo $product->getId(); ?>"><?php echo $translator->translate('product_edit'); ?></a></span>
            <span><a href="/products/delete/<?php echo $product->getId(); ?>"><?php echo $translator->translate('product_delete'); ?></a></span>
        </p>
        <p>
            <?php echo $translator->translate('product_title'); ?> :
            <a href="/products/<?php echo $product->getId()?>" >
                <?php echo $product->getTitle(); ?>
            </a>
        </p>
        <p>
            <?php echo $translator->translate('product_category'); ?> :
            <?php echo $product->getCategory(); ?>
        </p>
        <p>
            <?php echo $translator->translate('product_price'); ?> :
            <?php echo $product->getPrice(); ?> UAH
        </p>
        <p>
            <?php echo $translator->translate('product_count'); ?> :
            <?php echo $product->getCount(); ?>
        </p>
    <?php endforeach; ?>
</div>