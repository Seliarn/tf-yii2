<?php

namespace app\models\aq;

/**
 * This is the ActiveQuery class for [[\app\models\ClientCustomer]].
 *
 * @see \app\models\ClientCustomer
 */
class ClientCustomerQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \app\models\ClientCustomer[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\ClientCustomer|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
