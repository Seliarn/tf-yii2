<?php

namespace app\models\aq;

/**
 * This is the ActiveQuery class for [[\app\models\ProductOrder]].
 *
 * @see \app\models\ProductOrder
 */
class ProductOrderQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \app\models\ProductOrder[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\ProductOrder|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
