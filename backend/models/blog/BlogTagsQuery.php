<?php

namespace backend\models\blog;

/**
 * This is the ActiveQuery class for [[BlogTags]].
 *
 * @see BlogTags
 */
class BlogTagsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return BlogTags[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return BlogTags|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
