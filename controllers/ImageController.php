<?php

namespace app\controllers;

use app\models\Image;
use Yii;
use yii\helpers\BaseFileHelper;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CountryController implements the CRUD actions for Country model.
 */
class ImageController extends Controller
{
    /**
     * {@inheritdoc}
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
     * @return string
     */
    public function actionIndex()
    {
        $query = Image::find();

        $image = $query->all();
        return $this->render('index', ['image' => $image]);
    }


    public function actionView($id)
    {
        //
    }

    public function actionCreate()
    {
        $model = new Image();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        if ($model->load(Yii::$app->request->post())) {
            BaseFileHelper::createDirectory('uploads/');
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $model->imageFile->saveAs('uploads/' . $model->imageFile->baseName . "." . $model->imageFile->extension);
            $model->image_path = 'uploads/' . $model->imageFile->baseName . "." . $model->imageFile->extension;

            $model->save();
            return $this->redirect(['image/index', 'model' => $model]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = Image::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Image updated successfully');
            return $this->redirect(['index']);
        } else {
            return $this->render('update', ['model' => $model]);
        }
    }

    public function actionDelete($id)
    {
        $model = Image::findOne($id);

        if ($model) {
            if (file_exists($model->image_path)) {
                unlink($model->image_path);
            }
            $model->delete();
            Yii::$app->session->setFlash('success', 'Image deleted successfully');
            return $this->redirect(['index']);
        }
    }

    protected function findModel($id)
    {
        //
    }
}
