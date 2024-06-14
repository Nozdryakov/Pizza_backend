<?php

namespace app\controllers\api;

use Yii;
use yii\rest\Controller;
use app\features\product\usecase\GetAllProductsUseCase;
use app\features\stocks\usecase\GetAllStocksUseCase;
use app\features\popular\usecase\GetAllPopularUseCase;
use app\features\mail\usecase\SendMailUseCase;
use app\models\HandlerOrder;
use yii\web\Response;

class ApplicationController extends Controller
{
    private GetAllStocksUseCase $allStocksUseCase;
    private GetAllPopularUseCase $allPopularUseCase;
    private GetAllProductsUseCase $allProductsUseCase;
    private SendMailUseCase $mailUseCase;

    public function __construct($id, $module,
       GetAllStocksUseCase $allStocksUseCase,
       GetAllPopularUseCase $allPopularUseCase,
       GetAllProductsUseCase $allProductsUseCase,
       SendMailUseCase $mailUseCase
    )
    {
       parent::__construct($id, $module);
       $this->allStocksUseCase = $allStocksUseCase;
       $this->allPopularUseCase = $allPopularUseCase;
       $this->allProductsUseCase = $allProductsUseCase;
       $this->mailUseCase = $mailUseCase;
    }

    public function actionIndex():array {
        return [

            'products' => $this->allProductsUseCase->execute(),
            'populars' => $this->allPopularUseCase->execute(),
        ];
    }
    public function actionGetStocks():array{
        return [
            'stocks' => $this->allStocksUseCase->execute()
        ];

    }
    public function actionSendOrder():array{
        Yii::$app->response->format = Response::FORMAT_JSON;

        $data = Yii::$app->request->post('data');

        if($data){
            return [
                'error' => false,
                'send' => true,
                'data' => $data
            ];
        }
        else
        {
            return [
                'error' => true,
                'send' => false,
            ];
        }
    }
    public function actionHandlerOrder(): array
    {
        $model = new HandlerOrder();
        if ($model->load(Yii::$app->request->post(), '') && $model->validate()) {
            extract(Yii::$app->request->post());
            $this->mailUseCase->execute($setFrom, $setSubject, $setTextBody);
            return [
                'error' => false,
                'send' => true,
            ];
        }
        return [
            'error' => true,
            'send' => false,
        ];
    }
}


