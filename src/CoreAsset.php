<?php


namespace brucebnu\yii2fullcalendar;

use Yii;
use yii\web\AssetBundle;

class CoreAsset extends AssetBundle
{
    /**
     * [$sourcePath description]
     * 不设定默认当前扩展目录，设定去项目视图目录中找
     * @var string
     */
    public $sourcePath = '@base/brucebnu/yii2-fullcalendar/src/asset/';
    // public $sourcePath = __DIR__ . '/assets/';

    /**
     * the language the calender will be displayed in
     * @var string ISO2 code for the wished display language
     */
    public $language = NULL;

    /**
     * [$autoGenerate description]
     * @var boolean
     */
    public $autoGenerate = true;

    /**
     * tell the calendar, if you like to render google calendar events within the view
     * @var boolean
     */
    public $googleCalendar = false;

    /**
     * [$css description]
     * @var array
     */
    public $css = [
        'fullcalendar-5.7.2/lib/main.css',
    ];

    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    /**
     * [$js description]
     * @var array
     */
    public $js = [
        'fullcalendar-5.7.2/lib/main.js',
        'fullcalendar-5.7.2/lib/locales-all.js',
    ];

    /**
     * [$depends description]
     * @var array
     */
    public $depends = [
        'yii\web\YiiAsset',
        //'yii2fullcalendar\PrintAsset'
    ];

    /**
     * @inheritdoc
     */
    public function registerAssetFiles($view)
    {
        $this->js[] = "init_fullcalendar.js";

        $language = $this->language ? $this->language : Yii::$app->language;
        if (strtoupper($language) != 'EN-US')
        {
            $this->js[] = "fullcalendar-5.7.2/lib/locales/{$language}.js";
        }

        if($this->googleCalendar)
        {
            $this->js[] = 'gcal.js';
        }

        parent::registerAssetFiles($view);
    }

}