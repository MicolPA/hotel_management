<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css?v=1',
        'css/bootstrap.min.css?v=1',
        'css/fontawesome.min.css',
        'css/select2.min.css',
        // 'css/uikit.min.css',
    ];
    public $js = [
        'js/bootstrap.min.js',
        'js/fontawesome.min.js',
        'js/jquery.min.js',
        'js/select2.min.js',
        'js/sweetalert.min.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
}
