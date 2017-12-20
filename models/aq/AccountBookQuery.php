<?php

namespace app\models\aq;

/**
 * This is the ActiveQuery class for [[\app\models\AccountBook]].
 *
 * @see \app\models\AccountBook
 */
class AccountBookQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \app\models\AccountBook[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\AccountBook|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
