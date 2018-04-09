<?php

namespace frontend\controllers;

use common\models\Entrega;
use common\models\Status;
use Yii;
use common\models\Beneficiarios;
use common\models\BeneficiariosSearch;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\User as Usuarios;

/**
 * BeneficiariosController implements the CRUD actions for Beneficiarios model.
 */
class BeneficiariosController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'inicio', 'entrega'],
                'rules' => [
                    // allow authenticated users
                    [
                        'actions' => ['index', 'inicio', 'entrega'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // everything else is denied
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Beneficiarios models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        if($id){
            $searchModel = new BeneficiariosSearch();
            if(Yii::$app->request->queryParams){
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            }else{
                $query = Beneficiarios::find()->where('FOLIO < 0');
                $dataProvider = new ActiveDataProvider([
                    'query' => $query,
                ]);
            }

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'bimestre' => $id
            ]);
        }
        else{
            $this->redirect('beneficiarios/inicio');
        }

    }

    public function actionInicio(){
        return $this->render('inicio');
    }

    public function actionView($id)
    {
        die;
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Beneficiarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        die;
        $model = new Beneficiarios();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->FOLIO]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        die;
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->FOLIO]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        die;
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionEntrega($id, $bimestre){
        $beneficiario = Beneficiarios::findOne($id);
        if($beneficiario){
            $entrega = Entrega::find()->where(['FOLIO' => $id, 'MES' => $bimestre])->one();
            if($entrega){
                return $this->render('update_entrega', [
                    'model' => $entrega,
                ]);
            }else{
                $status = Status::find()->where(['FOLIO' => $id])->one();
                if($status){
                    $model = new Entrega();
                    if ($model->load(Yii::$app->request->post())) {
                        $model->FOLIO = $beneficiario->FOLIO;
                        $model->CVE_PROGRAMA = $beneficiario->CVE_PROGRAMA;
                        $model->N_PERIODO = $beneficiario->N_PERIODO;
                        $model->FOLIO_RELACIONADO = $beneficiario->ID_TARJETA;
                        $model->CVE_CEDIS = 0;
                        $model->MES = $bimestre;
                        $model->TARJETA_ID = $beneficiario->ID_TARJETA;

                        switch ($bimestre){
                            case 2:
                                $status->STATUS_P4_02 = 1;
                                break;
                            case 4:
                                $status->STATUS_P4_04 = 1;
                                break;
                            case 6:
                                $status->STATUS_P4_06 = 1;
                                break;
                            case 8:
                                $status->STATUS_P4_08 = 1;
                                break;
                            case 10:
                                $status->STATUS_P4_10 = 1;
                                break;
                            case 12:
                                $status->STATUS_P4_12 = 1;
                                break;
                        }

                        if($model->save() && $status->save(false)){
                            Yii::$app->session->setFlash('success', 'Entrega Realizada Correctamente');
                            return $this->redirect(['index', 'id' => $bimestre]);
                        }
                    }
                    return $this->render('create_entrega', [
                        'model' => $model,
                    ]);
                }

            }
        }
        else{
            throw new NotFoundHttpException('Falta ID');
        }
    }

    protected function findModel($id)
    {
        if (($model = Beneficiarios::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
