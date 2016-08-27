<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Labels;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\admin\models\LabelsContent;
use app\modules\admin\models\Languages;

/**
 * LabelsController implements the CRUD actions for Labels model.
 */
class LabelsController extends Controller
{

    public function init()
    {
        Yii::$app->view->params['current'] = 'settings';
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
     * Lists all Labels models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Labels::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Labels model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        $label_content_map = [];
        $model = $this->findModel($id);

        $label_content = LabelsContent::find()
            ->where(['label_id' => $id])
            ->asArray()->all();

        $label_content_map = array_column($label_content,null,'lang_id');

        return $this->render('view', compact('model', 'label_content_map'));

    }

    /**
     * Creates a new Labels model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Labels();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Labels model.
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
     * Deletes an existing Labels model.
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
     * Finds the Labels model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Labels the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Labels::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



    /**
     * Edit translation for current slide
     * @return string|\yii\web\Response
     */
    public function actionContentEdit()
    {

        $lang_id = (int)Yii::$app->request->get('lang_id');
        $label_id = (int)Yii::$app->request->get('label_id');
        $lang = Languages::findOne($lang_id);

        $model = LabelsContent::find()
            ->where(['lang_id' => $lang_id, 'label_id' => $label_id])
            ->one();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {



            Yii::$app->session->setFlash('success',"Content for {$lang->name} updated");

            return $this->redirect(['view', 'id' => $model->label_id]);
        } else {

            return $this->render('edit-content', compact('model', 'lang', 'label_id'));
        }
    }
}
