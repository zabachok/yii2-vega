<?php

namespace zabachok\vega\assets;

use yii\web\AssetBundle;

class VegaAsset extends AssetBundle
{
    public $sourcePath = '@zabachok/vega/assets';
    public $js = [
        'vega.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}