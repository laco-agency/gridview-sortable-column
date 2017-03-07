<?php

namespace laco\gridview\sortable;

use yii\db\ActiveRecord;

/**
 * Class Action
 */
class Action extends \yii\base\Action
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
        foreach (\Yii::$app->request->post('sorting') as $pk) {
            $list[] = json_decode($pk, true);
        }

        return $list;
    }
}
