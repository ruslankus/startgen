<?php
/**
 * Created by PhpStorm.
 * User: ruslankus
 * Date: 06/08/16
 * Time: 22:15
 */

namespace app\controllers;


use app\models\Category;
use app\models\Headlines;
use app\models\Languages;
use app\models\Pages;
use app\models\Settings;
use app\components\ctraits\TimeTrait;
use Yii;


class PageController extends AppController
{
    
    use TimeTrait;
    
    public function actionIndex()
    {
        Yii::$app->view->params['slider'] = true;

        $content_array = [];
        $cache_name = "index_".Languages::getCurrentLanguage()['prefix'];

        $content_array = Yii::$app->cache->get($cache_name);
        $seo_content = Yii::$app->cache->get($cache_name. '_seo');

        if(empty($content_array)) {
            $page = Pages::find()->with('seo', 'blocks')
                ->where(['main' => true])
                ->asArray()
                ->one();


            foreach ($page['blocks'] as $block) {
                $method_name = "_get" . ucfirst($block['type']['label']);

                $content_array[] = $this->$method_name($block);
            }
            
            $content_array['page_label'] = $page['label'];
            $seo_content = array_shift($page['seo']);

            Yii::$app->cache->add($cache_name . "_seo",$seo_content,self::$cache_time);
            Yii::$app->cache->add($cache_name,$content_array,self::$cache_time);
        }

        Yii::$app->view->params['page_label'] = $content_array['page_label'];
        //unset label
        unset($content_array['page_label']);
        //setting seo
        $this->setMeta($seo_content['title'], $seo_content['keywords'], $seo_content['description']);
        return  $this->render('index', compact('content_array'));
    }



    public function actionView()
    {

        $id = (int)Yii::$app->request->get('id');
        $content_array = [];
        $cache_name = "page_{$id}_".Languages::getCurrentLanguage()['prefix'];

        $content_array = Yii::$app->cache->get($cache_name);
        $seo_content = Yii::$app->cache->get($cache_name. '_seo');

        if(empty($content_array)) {
            $page = Pages::find()->with('seo', 'blocks')
                ->where(['id' => $id])
                ->asArray()
                ->one();


            foreach ($page['blocks'] as $block) {
                $method_name = "_get" . ucfirst($block['type']['label']);

                $content_array[] = $this->$method_name($block);
            }
            
            $content_array['page_label'] = $page['label'];
            $seo_content = array_shift($page['seo']);

            Yii::$app->cache->add($cache_name . "_seo",$seo_content,self::$cache_time);
            Yii::$app->cache->add($cache_name,$content_array,self::$cache_time);
        }

        Yii::$app->view->params['page_label'] = $content_array['page_label'];
        //unset label
        unset($content_array['page_label']);
        $this->setMeta($seo_content['title'], $seo_content['keywords'], $seo_content['description']);
        return  $this->render('index', compact('content_array'));
    }


/*---------------------------- private section ------------------------------------------*/


    private function _getHeadline(array $block)
    {
        $block_values_array = explode(',' , $block['block_value']);

        $headline_array = Headlines::find()->with('content')
            ->where(['id' => $block_values_array])
            ->limit(4)
            ->asArray()
            ->all();


        return $this->renderPartial('partials/_headline', compact('headline_array'));
    }


    private function _getHtml(array $block)
    {

        return $this->renderPartial('partials/_content', compact('block'));
    }


    private function _getCategory(array $block)
    {
        $category_array = Category::find()->with('content')
            ->where(['not in', 'id', 1])
            ->limit(4)
            ->asArray()
            ->all();

        return $this->renderPartial('partials/_category', compact('category_array'));
    }


    private function _getForm(array $block)
    {
       return $this->renderPartial('partials/_form');
    }


}