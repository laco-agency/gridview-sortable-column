<?php

namespace laco\gridview\sortable;

use yii\db\ActiveRecord;

/**
 * Class Action
 */
class Action extends \yii\rest\Action
{
    /** @var string */
    public $orderAttribute;

    public function run()
    {
        /** @var Sortable|ActiveRecord $model */
        $model = new $this->modelClass;

        if (!empty($this->orderAttribute)) {
            $model->orderAttribute = $this->orderAttribute;
        }

        $model->primaryKeyList = $this->getPrimaryKeyList();
        $model->sortGrid();
    }

    public function getPrimaryKeyList()
    {
        $list = [];
        /* @var $class \yii\db\ActiveRecord */
        $class = $this->modelClass;
        $pks = $class::primaryKey();
        foreach (\Yii::$app->request->post('sorting') as $pk) {
            if (count($pks) === 1) {
                $list[] = [$pks[0] => $pk];
            } else {
                $list[] = json_decode($pk, true);
            }
        }

        return $list;
    }
}
