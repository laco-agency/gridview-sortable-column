<?php

namespace laco\gridview\sortable\assets;

use yii\web\AssetBundle;

class RubaxaAsset extends AssetBundle
{
    public $sourcePath = '@vendor/laco-agency/gridview-sortable-column/src/assets/files';

    public $js = [
        '//cdnjs.cloudflare.com/ajax/libs/Sortable/1.2.1/Sortable.js',
        'js/jquery.binding.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
