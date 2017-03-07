<?php

namespace laco\gridview\sortable;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;

class Behaviour extends \yii\base\Behavior
{
    /** @var string */
    public $orderAttribute = 'sort_order';

    public $primaryKeyList = array();

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'beforeInsert',
        ];
    }

    public function beforeInsert()
    {
        /** @var ActiveRecord $model */
        $model = $this->owner;

        $last = $model->find()->orderBy([$this->orderAttribute => SORT_DESC])->limit(1)->one();
        if ($last === null) {
            $model->{$this->orderAttribute} = 1;
        } else {
            $model->{$this->orderAttribute} = $last->{$this->orderAttribute} + 1;
        }
    }

    public function sortGrid()
    {
        /** @var ActiveRecord $model */
        $model = $this->owner;

        $minSortOrder = $this->getMinSortOrder();

        $command = Yii::$app->db->createCommand();
        foreach ($this->primaryKeyList as $pk) {
            $command->update($model->tableName(), [$this->orderAttribute => $minSortOrder], $pk)->execute();
            $minSortOrder++;
        }
    }

    public function getMinSortOrder()
    {
        /** @var ActiveRecord $model */
        $model = $this->owner;

        $query = $model->find()->orderBy([$this->orderAttribute => SORT_ASC]);

        foreach ($this->primaryKeyList as $pk) {
            $query->orWhere($pk);
        }

        return $query->min($this->orderAttribute);
    }
}
