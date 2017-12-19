<?php

namespace app\models\aq;

/**
 * This is the ActiveQuery class for [[\app\models\ClientContractor]].
 *
 * @see \app\models\ClientContractor
 */
class ClientContractorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \app\models\ClientContractor[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\ClientContractor|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
