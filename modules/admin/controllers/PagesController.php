<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\PagesBlocks;
use app\modules\admin\models\PagesBlocksTrl;
use app\modules\admin\models\PagesSeoTrl;
use Yii;
use app\modules\admin\models\Pages;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\admin\models\Languages;

/**
 * PagesController implements the CRUD actions for Pages model.
 */
class PagesController extends Controller
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
     * Lists all Pages models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Pages::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pages model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        $pages_seo = PagesSeoTrl::find()
            ->where(['page_id' => $id])
            ->asArray()
            ->all();

        $pages_seo_map = array_column($pages_seo,null,'lang_id');

        return $this->render('view', compact('model', 'pages_seo_map'));

    }

    /**
     * Creates a new Pages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pages();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pages model.
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
     * Finds the Pages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pages::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    /**
     * Edit translation for current slide
     * @return string|\yii\web\Response
     */
    public function actionSeoEdit()
    {

        $lang_id = (int)Yii::$app->request->get('lang_id');
        $page_id = (int)Yii::$app->request->get('page_id');
        $lang = Languages::findOne($lang_id);



        $model = PagesSeoTrl::find()
            ->with('page')
            ->where(['lang_id' => $lang_id, 'page_id' => $page_id])
            ->one();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->session->setFlash('success',"Content for {$lang->name} updated");

            return $this->redirect(['view', 'id' => $model->page_id]);
        } else {

            return $this->render('update-seo', compact('model', 'lang_id', 'page_id','lang'));
        }
    }


    public function actionPageBlocks()
    {
        $page_id = (int)Yii::$app->request->get('id');

        $page = Pages::findOne($page_id);

        $dataProvider = new ActiveDataProvider([
            'query' =>  PagesBlocks::find()
                ->with('blockType')
                ->where(['page_id' => $page_id])


        ]);

        return $this->render('page-blocks', compact("dataProvider", 'page'));

    }


    public function actionViewPageBlock()
    {
        $block_id = Yii::$app->request->get('block_id');

        $block_content_trl = PagesBlocksTrl::find()
            ->where(['block_id' => $block_id])
            ->asArray()
            ->all();

        $block_content_map = array_column($block_content_trl,null,'lang_id');

        $model = PagesBlocks::find()
            ->with('blockType')
            ->where(['id' => $block_id])
            ->one();

        return $this->render('page-block-view', compact('model','block_content_map'));
    }
}
