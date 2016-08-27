<?php

namespace app\modules\admin\controllers;


use Yii;
use app\modules\admin\models\Messages;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\admin\models\MessagesContent;
use app\modules\admin\models\Languages;

/**
 * MessagesController implements the CRUD actions for Messages model.
 */
class MessagesController extends Controller
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
     * Lists all Messages models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Messages::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Messages model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $message_content_map = [];
        $model = $this->findModel($id);

        $message_content = MessagesContent::find()
            ->where(['message_id' => $id])
            ->asArray()->all();

        $message_content_map = array_column($message_content,null,'lang_id');

        return $this->render('view', compact('model', 'message_content_map'));

    }

    /**
     * Creates a new Messages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Messages();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Messages model.
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
     * Deletes an existing Messages model.
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
     * Finds the Messages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Messages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Messages::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



    /**
     * Edit translation for current message
     * @return string|\yii\web\Response
     */
    public function actionContentEdit()
    {

        $lang_id = (int)Yii::$app->request->get('lang_id');
        $message_id = (int)Yii::$app->request->get('message_id');
        $lang = Languages::findOne($lang_id);

        $model = MessagesContent::find()
            ->where(['lang_id' => $lang_id, 'message_id' => $message_id])
            ->one();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {



            Yii::$app->session->setFlash('success',"Content for {$lang->name} updated");

            return $this->redirect(['view', 'id' => $model->message_id]);
        } else {

            return $this->render('edit-content', compact('model', 'lang', 'message_id'));
        }
    }
}
