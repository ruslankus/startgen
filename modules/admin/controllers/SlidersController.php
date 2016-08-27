<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Languages;
use Yii;
use app\modules\admin\models\Sliders;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\modules\admin\models\SlidersContent;

/**
 * SlidersController implements the CRUD actions for Sliders model.
 */
class SlidersController extends Controller
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
     * Lists all Sliders models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Sliders::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sliders model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $slide_content_map = [];
        $model = $this->findModel($id);

        $slide_content = SlidersContent::find()
            ->where(['slide_id' => $id])
            ->asArray()->all();

        $slide_content_map = array_column($slide_content,null,'lang_id');

        return $this->render('view',compact('model', 'slide_content_map'));
    }

    /**
     * Creates a new Sliders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sliders();

        if ($model->load(Yii::$app->request->post())) {

            //upload file if exist
            $model->upload_image = UploadedFile::getInstance($model, 'upload_image');

            if(!empty($model->upload_image)) {
                //saving file
                if ($model->upload()) {
                    $model->upload_image = null;
                }

                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);

            }

            $model->addError('upload_image',"Image is required");
            return $this->render('create', compact('model'));

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Sliders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            //upload file if exist
            $model->upload_image = UploadedFile::getInstance($model, 'upload_image');

            if(!empty($model->upload_image)) {
                //saving file
                if ($model->upload()) {
                    $model->upload_image = null;
                }

            }

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Sliders model.
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
     * Finds the Sliders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sliders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sliders::findOne($id)) !== null) {
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

        $model = new SlidersContent();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            //clear slides cache
            $lang = Languages::findOne($model->lang_id);
            $cache_name = "sliders_".$lang->prefix;
            Yii::$app->cache->delete($cache_name);

            Yii::$app->session->setFlash('success',"Content for {$lang->name} created");

            return $this->redirect(['view', 'id' => $model->slide_id]);
        } else {

            $lang_id = (int)Yii::$app->request->get('lang_id');
            $slide_id = (int)Yii::$app->request->get('slide_id');

            $lang = Languages::findOne($lang_id);

            return $this->render('create-content', compact('model', 'lang', 'slide_id'));
        }
    }


    /**
    * Edit translation for current slide
    * @return string|\yii\web\Response
    */
    public function actionContentEdit()
    {

        $lang_id = (int)Yii::$app->request->get('lang_id');
        $slide_id = (int)Yii::$app->request->get('slide_id');
        $lang = Languages::findOne($lang_id);

        $model = SlidersContent::find()
            ->where(['lang_id' => $lang_id, 'slide_id' => $slide_id])
            ->one();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            //clear slides cache
            $lang = Languages::findOne($model->lang_id);
            $cache_name = "sliders_".$lang->prefix;
            Yii::$app->cache->delete($cache_name);

            Yii::$app->session->setFlash('success',"Content for {$lang->name} updated");

            return $this->redirect(['view', 'id' => $model->slide_id]);
        } else {

            return $this->render('edit-content', compact('model', 'lang', 'slide_id'));
        }
    }
}
