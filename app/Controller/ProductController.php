<?php

namespace app\Controller;

use app\Model\ProductModel;

class ProductController extends AbstractController
{
    public function listAction()
    {
        $this->renderView(
            'products',
            [
                'products' => ProductModel::findAll()
            ]
        );
    }

    public function itemAction($productId)
    {
        $product = ProductModel::findById($productId);

        if (null === $product) {
            throw new \InvalidArgumentException(sprintf('Product [%d] not found', $productId));
        }

        $this->renderView('product', ['product' => $product]);
    }

    public function addFormAction()
    {
        $this->renderView('add.product');
    }

    public function addAction()
    {
        // TODO Add validation here
        $title = $_POST['title'];
        $category = trim($_POST['category']);
        $price = (int) $_POST['price'];
        $count = (int) $_POST['count'];
        $id = ($_POST['id']) ? $_POST['id'] : null;

        $product = new ProductModel(
            $id,
            $title,
            $category,
            $price,
            $count
        );

        if (!($result = $product->save())) {
            throw new \RuntimeException('Can not add new product');
        }

        $this->redirect('/products/');
    }

    public function editAction($id)
    {
        $product = ProductModel::findById($id);
        $this->renderView('add.product', ['product' => $product]);
    }

    public function deleteAction($id)
    {
        $deleted = ProductModel::deleteById($id);

        if (!$deleted) {
            throw new \RuntimeException('Can not delete product');
        }

        $this->redirect('/products/');
    }
}