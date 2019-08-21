<?php

namespace frontend\repositories;

use DomainException;
use yii\helpers\Html;

class CartRepository
{
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
