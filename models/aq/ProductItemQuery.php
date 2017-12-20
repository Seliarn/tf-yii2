<?php

namespace app\models\aq;

/**
 * This is the ActiveQuery class for [[\app\models\ProductItem]].
 *
 * @see \app\models\ProductItem
 */
class ProductItemQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \app\models\ProductItem[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\ProductItem|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
