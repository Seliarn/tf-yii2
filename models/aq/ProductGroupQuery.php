<?php

namespace app\models\aq;

/**
 * This is the ActiveQuery class for [[\app\models\ProductGroup]].
 *
 * @see \app\models\ProductGroup
 */
class ProductGroupQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \app\models\ProductGroup[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\ProductGroup|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
