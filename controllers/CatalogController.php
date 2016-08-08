<?php
/**
 * Created by PhpStorm.
 * User: ruslankus
 * Date: 08/08/16
 * Time: 19:53
 */

namespace app\controllers;


use app\models\Category;

class CatalogController extends AppController
{

    public function actionIndex()
    {
        $category_array = Category::find()->with('content','parent')
            ->where(['id' => 1])
            ->asArray()
            ->one();

        $parent_chunk_array = array_chunk($category_array['parent'],2);

        return $this->render('index', compact('category_array', 'parent_chunk_array'));
    }



    public function actionCategory()
    {
        return $this->render('category');
    }

}