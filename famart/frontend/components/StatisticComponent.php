<?php 
namespace frontend\components;

use Yii;
use yii\base\Component;
use common\models\Statistic;

/**
* Statistic Component
*/
class StatisticComponent extends Component
{
	/**
	 * Nama event
	 */
	const EVENT_ACCESS_PAGE = 'access-page';

	/**
	 * Handle statistik pengaksesan
	 */
	public static function statisticHandler()
	{
	    $statistic = new Statistic();
        $statistic->user_id = Yii::$app->user->getId();
        $statistic->user_ip = Yii::$app->request->userIP;
        $statistic->user_host = Yii::$app->request->userHost;
        $statistic->path_info = Yii::$app->request->pathInfo;
        $statistic->query_string = Yii::$app->request->queryString;
        $statistic->save();
	}
}