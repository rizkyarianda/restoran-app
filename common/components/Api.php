<?php

namespace common\components;

use common\models\User;
use Exception;
use Yii;
use yii\base\Component;
use yii\helpers\Inflector;
use yii\helpers\Url;
use yii\httpclient\Client;


class Api extends Component {

    public function validateFormData($body, $reqbody){

        $dataBody = array_keys($body);
        foreach($dataBody as $field)
        {
            if(!in_array($field, $reqbody)){
                $message = "Body Yang anda kirim ".$field." \nHarus sesuai dengan salah satu : ".json_encode($reqbody);
                    throw new \yii\web\HttpException(406, $message);
            }
        }

        return true;
    }

    public function createToken(){

        $url = Url::base(true).'/api';
        $username = 'admin';
        $password = '12345678';

        $client = new Client();
        $response = $client->createRequest()
        ->setMethod('POST')
        ->setUrl("$url/oauth2/token")
        ->addHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded',
        ])
        ->setData([
            'grant_type' => 'password',
            'username' => $username,
            'password' => $password,
            'client_id' => 'testclient',
            'client_secret' => 'testpass',
        ])
        ->send();

        if(isset($response->data['access_token']) ){
            $user = User::find()->where(['id' => Yii::$app->user->id])->one();
            $user->access_token = $response->data['access_token'];
            if($user->save()){
                return $response->data['access_token'];
            }else{
                throw new Exception("Error Processing Request", 1);
            }
        }
        else{
            return false;
        }
    }

    public function getToken(){
        $user = User::findOne(['id' => \Yii::$app->user->id]);
        return $user->access_token ?? null;
    }

    public function responseApiRead($url){
        try {
            $token = $this->getToken();
            $url = Url::base(true).'/api/site/'.$url;
            $client = new Client();

            $response = $client->createRequest()
                    ->setMethod('GET')
                    ->setUrl("$url")
                    ->addHeaders(['Content-Type' => 'application/json','Authorization' => "Bearer $token"])
                    ->send();
          
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return $response;
    }

    public function responseApiCreate($url,$model){
        try {
            $token = $this->getToken();
            $url = Url::base(true).'/api/site/'.$url;
            $client = new Client();

            $response = $client->createRequest()
                    ->setMethod('GET')
                    ->setUrl("$url")
                    ->addHeaders(['Content-Type' => 'application/json','Authorization' => "Bearer $token"])
                    ->send();
          
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return $response;
    }

} 