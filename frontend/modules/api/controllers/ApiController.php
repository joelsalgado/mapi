<?php


namespace frontend\modules\api\controllers;


use common\models\MapaRegion;
use common\models\MapaMun;
use common\models\RegMap;
use Yii;
use yii\db\ActiveRecord;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;

class ApiController extends ActiveController
{

    public $modelClass = '';


    public function behaviors()
    {
        $result = ArrayHelper::merge(parent::behaviors(), [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'mapa1' => ['get'],
                    'mapa2' => ['get'],
                    'mapa3' => ['get'],
                ],
            ],
        ]);
        return $result;
    }

    public function actions()
    {
        return [];
    }

    

    public function actionMapa1(){
        $mapa = MapaRegion::find()->all();
        if (!is_null($mapa)) {
            return array('status' => true, 'data'=> $mapa);
        } else {
            return new NotFoundHttpException();
        }
    }

    public function actionMapa2(){
        $mapa = MapaMun::find()->all();
        if (!is_null($mapa)) {
            return array('status' => true, 'data'=> $mapa);
        } else {
            return new NotFoundHttpException();
        }
    }

    public function actionMapa3(){
        $mapa = RegMap::find()->all();
        if (!is_null($mapa)) {
            return array('status' => true, 'data'=> $mapa);
        } else {
            return new NotFoundHttpException();
        }
    }

}