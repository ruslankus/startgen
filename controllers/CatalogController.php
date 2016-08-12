<?php
/**
 * Created by PhpStorm.
 * User: ruslankus
 * Date: 08/08/16
 * Time: 19:53
 */

namespace app\controllers;


use app\models\Category;
use app\models\Products;
use yii\data\Pagination;
use Yii;

class CatalogController extends AppController
{
    
    public function init()
    {
        parent::init();
        Yii::$app->view->params['page_label'] = 'catalog';
    }

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
        $category_id = (int)Yii::$app->request->get('id');

        $category = Category::find()->with('content')
            ->where(['id' => $category_id])
            ->asArray()
            ->one();

        $query = Products::find()->with('content')
            ->where(['category_id' => $category_id]);



        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 15, 'forcePageParam' => false,
            "pageSizeParam" => false ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('category', compact('products', 'pages', 'category'));
    }

}