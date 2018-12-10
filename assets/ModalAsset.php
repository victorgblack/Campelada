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
class ModalAsset extends AssetBundle
{
    public $basePath = '@webroot/usuario';
    public $baseUrl = '@web/usuario';
    public $css = [
        'css/modal.css',
        'css/bootstrap.min.css',
        'css/animate.min.css',
        'css/paper-dashboard.css',
        'css/demo.css',
        'https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css',
        'https://fonts.googleapis.com/css?family=Muli:400,300',
        'css/themify-icons.css',
        'https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css',
    ];
    public $js = [
        //'js/jquery.min.js',
        'js/bootstrap.min.js',
        'js/bootstrap-checkbox-radio.js',
        'js/chartist.min.js',
        'js/bootstrap-notify.js',
        'js/paper-dashboard.js',
        'js/demo.js',
        'js/menu_active.js',
        'https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
 
    ];
}
