<?php
/**
 * Created by PhpStorm.
 * User: ruslankus
 * Date: 07/08/16
 * Time: 15:52
 */

namespace app\components\widgets;


use app\models\Languages;
use app\models\Sliders;
use yii\base\Widget;
use app\components\ctraits\TimeTrait;
use Yii;

class SliderWidget extends Widget
{
    use TimeTrait;
    
    public function run()
    {
        $content = [];

        $cache_name = "sliders_".Languages::getCurrentLanguage()['prefix'];

        $content = Yii::$app->cache->get($cache_name);

        if(empty($content)) {

            $sliders_array = Sliders::find()->with('content')
                ->where(['active' => true])
                ->asArray()
                ->all();

            $content = $this->render('slider', compact('sliders_array'));
            Yii::$app->cache->add($cache_name,$content, self::$cache_time);
        }

        return $content;
    }
}