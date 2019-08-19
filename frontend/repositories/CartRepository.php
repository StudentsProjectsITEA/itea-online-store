<?php

namespace frontend\repositories;

use common\models\Product;
use DomainException;
use yii\helpers\Html;

class CartRepository
{
    /**
     * @param integer $id
     *
     * @return Product the loaded model
     *
     * @throws DomainException if the product cannot be found
     */
    public function getProduct($id)
    {
        if (($product = Product::findOne((int)$id)) !== null) {
            return $product;
        }

        throw new DomainException('Товар не найден');
    }

    /**
     * @param integer $qty
     * @param integer $maxQty
     *
     * @return integer
     *
     * @throws DomainException if the product cannot be found
     */
    public function getQuantity($qty, $maxQty)
    {
        $quantity = (int)$qty > 0 ? (int)$qty : 1;
        if ($quantity > $maxQty) {
            throw new DomainException('Товара в наличии всего ' . Html::encode($maxQty) . ' шт.');
        }

        return $quantity;
    }
}
