<?php

namespace common\models\blogAR;

/**
 * This is the ActiveQuery class for [[UserAccauntSite]].
 *
 * @see UserAccauntSite
 */
class UserAccauntSiteQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return UserAccauntSite[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UserAccauntSite|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
