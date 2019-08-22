<?php

namespace frontend\components;

use DomainException;
use yii\helpers\Html;

class CartViewer
{
    /**
     * @param integer $qty
     * @param integer $maxQty
     *
     * @return integer
     *
     * @throws DomainException if the product cannot be found
     */
    public function getQuantity(int $qty, int $maxQty)
    {
        $quantity = (int)$qty > 0 ? (int)$qty : 1;
        if ($quantity > $maxQty) {
            throw new DomainException('Only ' . Html::encode($maxQty) . ' item(s) available in stock.');
        }

        return $quantity;
    }
}
