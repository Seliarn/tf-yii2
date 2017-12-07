<?php

namespace app\models\aq;

/**
 * This is the ActiveQuery class for [[\app\models\BankStatement]].
 *
 * @see \app\models\BankStatement
 */
class BankStatementQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \app\models\BankStatement[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\BankStatement|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
