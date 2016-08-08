<?php
/**
 * Created by PhpStorm.
 * User: ruslankus
 * Date: 06/08/16
 * Time: 22:15
 */

namespace app\controllers;


use app\models\Languages;
use app\models\Pages;
use Yii;


class PageController extends AppController
{

    public function actionIndex()
    {
        $content_array = [];
        $cache_name = "index_".Languages::getCurrentLanguage()['prefix'];

        $content_array = Yii::$app->cache->get($cache_name);

        if(empty($content_array)) {
            $page = Pages::find()->with('seo', 'blocks')
                ->where(['main' => true])
                ->asArray()
                ->one();


            foreach ($page['blocks'] as $block) {
                $method_name = "_get" . ucfirst($block['type']['label']);

                $content_array[] = $this->$method_name($block);
            }

            Yii::$app->cache->add($cache_name,$content_array,60);
        }

        return  $this->render('index', compact('content_array'));
    }



    public function actionView()
    {
        return Languages::getCurrentLanguage()['prefix'] . "  PAGE/VIEW";
    }



    private function _getHeadline(array $block)
    {
        return $this->renderPartial('partials/_headline');
    }


    private function _getHtml(array $block)
    {
        return $this->renderPartial('partials/_content');
    }


    private function _getCategory(array $block)
    {
        return $this->renderPartial('partials/_category');
    }


}