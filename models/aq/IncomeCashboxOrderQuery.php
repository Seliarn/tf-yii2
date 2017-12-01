<?php

namespace app\models\aq;

/**
 * This is the ActiveQuery class for [[\app\models\IncomeCashboxOrder]].
 *
 * @see \app\models\IncomeCashboxOrder
 */
class IncomeCashboxOrderQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \app\models\IncomeCashboxOrder[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\IncomeCashboxOrder|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
