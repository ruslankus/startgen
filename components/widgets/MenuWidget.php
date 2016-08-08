<?php
/**
 * Created by PhpStorm.
 * User: ruslankus
 * Date: 07/08/16
 * Time: 15:47
 */

namespace app\components\widgets;


use app\models\Languages;
use yii\base\Widget;
use app\models\Menu;
use yii\helpers\Url;

class MenuWidget extends Widget
{
    public function run()
    {

        $menu_with_links = [];

        $menu = Menu::find()->with('contentType', 'trl')->asArray()->all();

        foreach ($menu as $m){

            //$trl = array_push($menu['trl']);
            $content = $m['contentType']['label'];
            $metod_name = '_get' . ucfirst($content) . "Link";

            $menu_with_links[] = $this->$metod_name($m);
        }


        return $this->render('top_menu', compact('menu_with_links'));
    }


    private function _getPageLink(array $m)
    {
        if(empty($m['content_id'])){

            $m['href'] = Url::toRoute(["page/index", 'language' => Languages::getCurrentLanguage()['prefix']] );
        }else{
            $m['href'] = Url::toRoute(['page/view', 'id' => $m['content_id'],
                'language' => Languages::getCurrentLanguage()['prefix'] ] );
        }

        return $m;
    }


    private function _getCatalogLink($m)
    {
        if(empty($m['content_id'])){

            $m['href'] = Url::to(['catalog/index', 'language' => Languages::getCurrentLanguage()['prefix'] ],true);
        }else{
            $m['href'] = Url::to(['catalog/view',
                'language' => Languages::getCurrentLanguage()['prefix'],'id' => $m['content_id']],true);
        }

        return $m;
    }

    private function _getLinkLink($m)
    {
        $m['href'] = $m['content_value'];

        return $m;
    }
}