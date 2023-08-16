<?php

namespace common\components;

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

    public function token(){

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
            return $response->data['access_token'];
        }
        else{
            return false;
        }
    }

} 