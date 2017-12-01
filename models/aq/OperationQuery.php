<?php

namespace app\models\aq;

/**
 * This is the ActiveQuery class for [[\app\models\Operation]].
 *
 * @see \app\models\Operation
 */
class OperationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Operation[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Operation|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
