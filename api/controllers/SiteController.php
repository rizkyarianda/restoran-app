<?php

namespace api\controllers;

use common\models\Bahan;
use common\models\Kategori;
use common\models\LoginForm;
use Error;
use Exception;
use filsh\yii2\oauth2server\filters\auth\CompositeAuth;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\Response;
use filsh\yii2\oauth2server\filters\ErrorToExceptionFilter;
use frontend\models\BahanSearch;
use frontend\models\KategoriSearch;
use yii\base\Event;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\web\NotFoundHttpException;

use function PHPUnit\Framework\isNan;
use function PHPUnit\Framework\isNull;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $pesan = '';
    public $data = '';
    public $status = false;

    public function beforeAction($action)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        return parent::beforeAction($action);
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'authenticator' => [
                'class' => CompositeAuth::className(),
                'only' => ['create-bahan-atau-kategori','get-bahan','get-kategori','update-kategori-atau-bahan','delete-bahan','delete-kategori','find-model-bahan','find-model-kategori'],
                'authMethods' => [
                    ['class' => HttpBearerAuth::className()],
                    ['class' => QueryParamAuth::className(), 'tokenParam' => 'accessToken'],
                ]
            ],
            'exceptionFilter' => [
                'class' => ErrorToExceptionFilter::className()
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index'  => ['GET'],
                    'create-bahan-atau-kategori'  => ['POST'],
                    'get-bahan'  => ['GET'],
                    'get-kategori'  => ['GET'],
                    'update-kategori-atau-bahan'  => ['PUT','PATCH'],
                    'delete-bahan'  => ['DELETE'],
                    'delete-kategori'  => ['DELETE'],
                ],
            ],
        ]);
    }

    public function actionIndex()
    {
        return 'Hello World!';
    }

    public function actionGetBahan()
    {
        $searchModel = new BahanSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        
        return [
            'data' => $dataProvider->models,
            // 'searchModel' => $searchModel,
        ];
    }
   
    public function actionGetKategori()
    {
        $searchModel = new KategoriSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        return [
            'data' => $dataProvider->models
        ];
    }
    
    public function actionCreateBahanAtauKategori($kategoriAtauBahan){
        $post = (object)Yii::$app->request->post();

        switch ($kategoriAtauBahan) {
            case 'bahan':
                $model = new Bahan();
                $model->nama_bahan = $post->namaKategoriAtauBahan;
                break;

            case 'kategori':
                $model = new Kategori();
                $model->nama_kategori = $post->namaKategoriAtauBahan;
                break;
            
        }

        $transaction = Yii::$app->db->beginTransaction();
        try{
            if ($model->save()) {
                $transaction->commit();
                return[
                    'status' =>  true,
                    'pesan' => "File {$kategoriAtauBahan} Berhasil Ditambah",
                ];
            }
            throw new Error("File Gagal Ditambah");
        }catch(\Exception $e){
            $transaction->rollBack();

            return[
                'status' =>  false,
                'pesan' => $e->getMessage(),
            ];
        }
    }

    public function actionUpdateKategoriAtauBahan($kategoriAtauBahan, $idKategoriAtauBahan)
    {
        $post = (object)Yii::$app->request->post();

        switch ($kategoriAtauBahan) {
            case 'bahan':
                $model = $this->findModelBahan($idKategoriAtauBahan);
                $model->nama_bahan = $post->namaKategoriAtauBahan;
                break;
            
            case 'kategori':
                $model = $this->findModelKategori($idKategoriAtauBahan);
                $model->nama_kategori = $post->namaKategoriAtauBahan;
                break;
        }

        $transaction = Yii::$app->db->beginTransaction();
        try{
            if ($model->save()) {
                $transaction->commit();
                return[
                    'status' =>  true,
                    'pesan' => "File {$kategoriAtauBahan} Berhasil Diupdate",
                ];
            }
            throw new Error("File Gagal Diupdate");
        }catch(\Exception $e){
            $transaction->rollBack();

            return[
                'status' =>  false,
                'pesan' => $e->getMessage(),
            ];
        }
    }

    public function actionDeleteBahan($idBahan)
    {
        if($this->findModelBahan($idBahan)->delete()){
            return[
                'status' =>  true,
                'pesan' => "File Berhasil Dihapus",
            ];
        }else{
            throw new Exception("Error Processing Request", 1);
        }
        
    }

    public function actionDeleteKategori($idKategori)
    {
        if($this->findModelKategori($idKategori)->delete()){
            return[
                'status' =>  true,
                'pesan' => "File Berhasil Dihapus",
            ];
        }else{
            throw new Exception("Error Processing Request", 1);
        }
        
    }

    protected function findModelBahan($idKategoriAtauBahan)
    {
        if (($model = Bahan::findOne(['id_bahan' => $idKategoriAtauBahan])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
   
    protected function findModelKategori($idKategoriAtauBahan)
    {
        if (($model = Kategori::findOne(['id_kategori' => $idKategoriAtauBahan])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
