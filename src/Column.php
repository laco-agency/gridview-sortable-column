<?php

namespace laco\gridview\sortable;

use laco\gridview\sortable\assets\SortableAsset;
use yii\helpers\Html;
use yii\web\View;

class Column extends \yii\grid\Column
{
    public $url;
    public $headerOptions = ['style' => 'width: 30px;'];

    public function init()
    {
        SortableAsset::register($this->grid->view);
        $this->grid->view->registerJs('initSortableWidgets("' . $this->url . '");', View::POS_READY, 'sortable');
    }

    protected function renderDataCellContent($model, $key, $index)
    {
        return Html::tag('div', '&#9776;', [
            'class' => 'sortable-widget-handler'
        ]);
    }
}
