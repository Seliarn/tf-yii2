<?php

namespace app\models\aq;

/**
 * This is the ActiveQuery class for [[\app\models\AdminEventLog]].
 *
 * @see \app\models\AdminEventLog
 */
class AdminEventLogQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \app\models\AdminEventLog[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\AdminEventLog|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
