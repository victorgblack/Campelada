<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class TesteAsset extends AssetBundle
{
    public $basePath = '@webroot/teste';
    public $baseUrl = '@web/teste';
    public $css = [
        'vendor/bootstrap/css/bootstrap.min.css',
        'vendor/fontawesome-free/css/all.min.css',
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic',
        'vendor/simple-line-icons/css/simple-line-icons.css',
        'css/stylish-portfolio.min.css'
    ];
    public $js = [
        'vendor/jquery/jquery.min.js',
        'vendor/bootstrap/js/bootstrap.bundle.min.js',
        'vendor/jquery-easing/jquery.easing.min.js',
        'js/stylish-portfolio.min.js'
    ];
    public $depends = [
    ];
}
