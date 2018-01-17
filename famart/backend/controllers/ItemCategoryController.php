<?php

namespace backend\controllers;

use Yii;
use common\models\ItemCategory;
use common\models\ItemCategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ItemCategoryController implements the CRUD actions for ItemCategory model.
 */
class ItemCategoryController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'pdf', 'add-item', 'add-item-category'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => false
                    ]
                ]
            ]
        ];
    }

    /**
     * Lists all ItemCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ItemCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ItemCategory model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerItem = new \yii\data\ArrayDataProvider([
            'allModels' => $model->items,
        ]);
        $providerItemCategory = new \yii\data\ArrayDataProvider([
            'allModels' => $model->itemCategories,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerItem' => $providerItem,
            'providerItemCategory' => $providerItemCategory,
        ]);
    }

    /**
     * Creates a new ItemCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ItemCategory();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ItemCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ItemCategory model.
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
     * 
     * Export ItemCategory information into PDF format.
     * @param integer $id
     * @return mixed
     */
    public function actionPdf($id) {
        $model = $this->findModel($id);
        $providerItem = new \yii\data\ArrayDataProvider([
            'allModels' => $model->items,
        ]);
        $providerItemCategory = new \yii\data\ArrayDataProvider([
            'allModels' => $model->itemCategories,
        ]);

        $content = $this->renderPartial('_pdf', [
            'model' => $model,
            'providerItem' => $providerItem,
            'providerItemCategory' => $providerItemCategory,
        ]);

        $pdf = new \kartik\mpdf\Pdf([
            'mode' => \kartik\mpdf\Pdf::MODE_CORE,
            'format' => \kartik\mpdf\Pdf::FORMAT_A4,
            'orientation' => \kartik\mpdf\Pdf::ORIENT_PORTRAIT,
            'destination' => \kartik\mpdf\Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => \Yii::$app->name],
            'methods' => [
                'SetHeader' => [\Yii::$app->name],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        return $pdf->render();
    }

    
    /**
     * Finds the ItemCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ItemCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ItemCategory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for Item
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddItem()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Item');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formItem', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for ItemCategory
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddItemCategory()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('ItemCategory');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formItemCategory', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
