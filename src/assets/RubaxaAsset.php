<?php

namespace laco\gridview\sortable\assets;

use yii\web\AssetBundle;

class RubaxaAsset extends AssetBundle
{
    public $sourcePath = '@vendor/laco-agency/gridview-sortable-column/src/assets/files';

    public $js = [
        'js/sortable.1.4.0.js',
        'js/jquery.binding.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
