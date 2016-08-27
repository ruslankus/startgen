<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\HeadlinesContent;
use Yii;
use app\modules\admin\models\Headlines;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\admin\models\Languages;

/**
 * HeadlineController implements the CRUD actions for Headlines model.
 */
class HeadlineController extends Controller
{


    public function init()
    {
        Yii::$app->view->params['current'] = 'head_slide';
    }

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
     * Lists all Headlines models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Headlines::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Headlines model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        $headlines_content = HeadlinesContent::find()
            ->where(['headline_id' => $id])
            ->asArray()->all();

        $head_content_map = array_column($headlines_content,null,'lang_id');
        $model = $this->findModel($id);

        return $this->render('view', compact('model', 'head_content_map' ));


    }

    /**
     * Creates a new Headlines model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Headlines();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Headlines model.
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
     * Deletes an existing Headlines model.
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
     * Finds the Headlines model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Headlines the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Headlines::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



    /**
     * Create trnslation for current slide
     * @return string|\yii\web\Response
     */
    public function actionContentCreate()
    {

        $model = new HeadlinesContent();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->slide_id]);
        } else {

            $lang_id = (int)Yii::$app->request->get('lang_id');
            $headline_id = (int)Yii::$app->request->get('slide_id');

            $lang = Languages::findOne($lang_id);

            return $this->render('create-content', compact('model', 'lang', 'headline_id'));
        }
    }



    /**
     * Edit translation for current headline
     * @return string|\yii\web\Response
     */
    public function actionContentEdit()
    {

        $lang_id = (int)Yii::$app->request->get('lang_id');
        $headline_id = (int)Yii::$app->request->get('headline_id');
        $lang = Languages::findOne($lang_id);

        $model = HeadlinesContent::find()
            ->where(['lang_id' => $lang_id, 'headline_id' => $headline_id])
            ->one();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {


            Yii::$app->session->setFlash('success',"Content for {$lang->name} updated");

            return $this->redirect(['view', 'id' => $model->headline_id]);
        } else {

            return $this->render('edit-content', compact('model', 'lang', 'headline_id'));
        }
    }
}
