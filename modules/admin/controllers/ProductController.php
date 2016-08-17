<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Products;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\admin\models\ProductContent;
use app\modules\admin\models\Languages;

/**
 * ProductController implements the CRUD actions for Products model.
 */
class ProductController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Products::find()->with(['category']),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $product_content_map = [];
        $model = $this->findModel($id);

        $product_content = ProductContent::find()
            ->where(['product_id' => $id])
            ->asArray()->all();

        $product_content_map = array_column($product_content, null, 'lang_id');

        return $this->render('view', compact('model', 'product_content_map'));

    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->session->setFlash('success',"Product {$model->name} was updated");
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionContentCreate()
    {
        $lang_id = (int)Yii::$app->request->get('lang_id');
        $product_id = (int)Yii::$app->request->get('product_id');
        $lang = Languages::findOne($lang_id);
        $product = Products::findOne($product_id);
        $model = new ProductContent();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->session->setFlash('success',"Content for {$lang->name} was created");

            return $this->redirect(['view', 'id' => $model->product_id]);
        } else {

            return $this->render('content-create', compact('model', 'lang', 'product'));
        }
    }



    public function actionContentEdit()
    {
        $lang_id = (int)Yii::$app->request->get('lang_id');
        $product_id = (int)Yii::$app->request->get('product_id');
        $lang = Languages::findOne($lang_id);

        $model = ProductContent::find()
            ->where(['lang_id' => $lang_id, 'product_id' => $product_id])
            ->one();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->session->setFlash('success',"Content for {$lang->name} updated");

            return $this->redirect(['view', 'id' => $model->product_id]);
        } else {

            return $this->render('content-update', compact('model', 'lang', 'product_id'));
        }
    }
}
