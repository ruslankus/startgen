<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Category;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
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
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Category::find()->with('parent'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Category();
        $model->parent_id = 1;
        if ($model->load(Yii::$app->request->post())) {

            //upload file if exist
            $model->upload_image = UploadedFile::getInstance($model, 'upload_image');

            if(!empty($model->upload_image)) {
                //saving file
                if ($model->upload()) {
                    $model->upload_image = null;
                }

                $model->save();
                Yii::$app->session->setFlash('success',"Category  {$model->label} was created");
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
     * Updates an existing Category model.
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
            Yii::$app->session->setFlash('success',"Category  {$model->label} was updated");
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        //delete category file
        $model->deleteImage();
        $model->delete();
        Yii::$app->session->setFlash('success',"Category  {$model->label} was deleted");
        return $this->redirect(['index']);
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
