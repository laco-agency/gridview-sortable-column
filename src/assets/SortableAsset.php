<?php

namespace laco\gridview\sortable\assets;

use yii\web\AssetBundle;

class SortableAsset extends AssetBundle
{
    public $sourcePath = '@vendor/laco-agency/gridview-sortable-column/assets/files';

    public $js = [
        'js/sortable-widgets.js',
    ];

    public $css = [
        'css/sortable-widgets.css',
    ];

    public $depends = [
        'laco\sortable\assets\RubaxaAsset',
    ];
}
