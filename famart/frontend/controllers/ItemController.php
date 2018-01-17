<?php

namespace frontend\controllers;

use Yii;
use common\models\Item;
use common\models\ItemSearch;
use frontend\components\StatisticComponent;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ItemController implements the CRUD actions for Item model.
 */
class ItemController extends Controller
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
                        'actions' => ['index', 'view', 'pdf'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'pdf'],
                        'roles' => ['?']
                    ],
                ]
            ]
        ];
    }

    /**
     * Lists all Item models.
     * @return mixed
     */
    public function actionIndex()
    {
        Yii::$app->statistic->trigger(StatisticComponent::EVENT_ACCESS_PAGE);
        $searchModel = new ItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Item model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        Yii::$app->statistic->trigger(StatisticComponent::EVENT_ACCESS_PAGE);
        $model = $this->findModel($id);
        $providerOrderItem = new \yii\data\ArrayDataProvider([
            'allModels' => $model->orderItems,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerOrderItem' => $providerOrderItem,
        ]);
    }
    
    /**
     * 
     * Export Item information into PDF format.
     * @param integer $id
     * @return mixed
     */
    public function actionPdf($id) {
        $model = $this->findModel($id);
        $providerOrderItem = new \yii\data\ArrayDataProvider([
            'allModels' => $model->orderItems,
        ]);

        $content = $this->renderPartial('_pdf', [
            'model' => $model,
            'providerOrderItem' => $providerOrderItem,
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
     * Finds the Item model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Item the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Item::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
