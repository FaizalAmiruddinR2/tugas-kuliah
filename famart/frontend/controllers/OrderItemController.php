<?php

namespace frontend\controllers;

use Yii;
use common\models\OrderItem;
use common\models\OrderItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderItemController implements the CRUD actions for OrderItem model.
 */
class OrderItemController extends Controller
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
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'pdf'],
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
     * Lists all OrderItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrderItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OrderItem model.
     * @param integer $order_id
     * @param integer $item_id
     * @return mixed
     */
    public function actionView($order_id, $item_id)
    {
        $model = $this->findModel($order_id, $item_id);
        return $this->render('view', [
            'model' => $this->findModel($order_id, $item_id),
        ]);
    }

    /**
     * Creates a new OrderItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new OrderItem();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'order_id' => $model->order_id, 'item_id' => $model->item_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing OrderItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $order_id
     * @param integer $item_id
     * @return mixed
     */
    public function actionUpdate($order_id, $item_id)
    {
        $model = $this->findModel($order_id, $item_id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'order_id' => $model->order_id, 'item_id' => $model->item_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing OrderItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $order_id
     * @param integer $item_id
     * @return mixed
     */
    public function actionDelete($order_id, $item_id)
    {
        $this->findModel($order_id, $item_id)->delete();

        return $this->redirect(['index']);
    }
    
    /**
     * 
     * Export OrderItem information into PDF format.
     * @param integer $order_id
     * @param integer $item_id
     * @return mixed
     */
    public function actionPdf($order_id, $item_id) {
        $model = $this->findModel($order_id, $item_id);

        $content = $this->renderPartial('_pdf', [
            'model' => $model,
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
     * Finds the OrderItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $order_id
     * @param integer $item_id
     * @return OrderItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($order_id, $item_id)
    {
        if (($model = OrderItem::findOne(['order_id' => $order_id, 'item_id' => $item_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
