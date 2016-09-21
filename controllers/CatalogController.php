<?php
/**
 * Created by PhpStorm.
 * User: ruslankus
 * Date: 08/08/16
 * Time: 19:53
 */

namespace app\controllers;


use app\models\Category;
use app\models\Languages;
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

        $content = array_shift($category_array['content']);
        $this->setMeta($content['title_seo'], $content['keywords'], $content['description_seo']);
        return $this->render('index', compact('category_array', 'parent_chunk_array', 'content'));
    }



    public function actionCategory()
    {
        $category_id = (int)Yii::$app->request->get('id');

        $category = Category::find()->with('content')
            ->where(['id' => $category_id])
            ->asArray()
            ->one();

        $category_content = array_shift($category['content']);

        $this->setMeta($category_content['title_seo'],$category_content['keywords'], $category_content['description_seo']);

        $query = Products::find()->with('content')
            ->where(['category_id' => $category_id]);



        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 15, 'forcePageParam' => false,
            "pageSizeParam" => false ]);
        $products = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->asArray()
            ->all();

        return $this->render('category', compact('products', 'pages', 'category', 'category_content'));
    }


    public function actionProduct()
    {
        $product_id = Yii::$app->request->get('id');

        $product = Products::find()
            ->with(['content'])
            ->where(['id' => $product_id])
            ->one();

        //checking product
        if(empty($product)){
            return $this->redirect(['index']);
        }
        //no translation
        if(empty($product->content)){
            $current_lang = Languages::getCurrentLanguage()['prefix'];
            return $this->redirect(['category', 'id' => $product->category_id,
                'language' => $current_lang ]);
        }

        $content  = $product->content[0]
            ->toArray();

        //getting category
        $category = $product->category;
        $category_content = $category->content[0]
            ->toArray();

        $this->setMeta($content['product_title'],$category_content['keywords'] ,$content['product_description']);

        return $this->render('product', compact('product', 'content'));
    }

}