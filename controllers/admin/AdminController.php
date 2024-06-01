<?php

namespace app\controllers\admin;

use Yii;
use yii\db\StaleObjectException;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\Controller;
//popular items
use app\models\PopularForm;
use app\features\popular\usecase\GetAllPopularUseCase;
use app\features\popular\usecase\UpdatePopularUseCase;
use app\features\popular\usecase\CreatePopularUseCase;
use app\features\popular\usecase\DeletePopularUseCase;
use app\features\popular\usecase\SetByStorageImageUseCase;
use app\features\popular\usecase\UploadImageIdPopularUseCase;
//product items
use app\models\ProductForm;
use app\features\product\usecase\GetAllProductsUseCase;
use app\features\product\usecase\UploadImageIdProductUseCase;
use app\features\product\usecase\DeleteProductUseCase;
use app\features\product\usecase\CreateProductUseCase;
use app\features\product\usecase\UpdateProductUseCase;
use app\features\product\usecase\SetByStorageImageProductUseCase;
use app\features\product\usecase\UpdateProductVisibleUseCase;
//stocks items
use app\models\StockForm;
use app\features\stocks\usecase\GetAllStocksUseCase;
use app\features\stocks\usecase\DeleteStocksUseCase;
use app\features\stocks\usecase\CreateStocksUseCase;
use app\features\stocks\usecase\UpdateStocksUseCase;
use app\features\stocks\usecase\UploadImageIdStocksUseCase;
use app\features\stocks\usecase\SetByStorageImageStockUseCase;
use app\features\product\usecase\UpdateProductPriceWithDiscount;

class AdminController extends Controller
{
//  popular items
    private GetAllPopularUseCase $allPopularUseCase;
    private UpdatePopularUseCase $updatePopularUseCase;
    private CreatePopularUseCase $createPopularUseCase;
    private SetByStorageImageUseCase $setByStorageImageUseCase;
    private UploadImageIdPopularUseCase $uploadImageIdPopularUseCase;
    private DeletePopularUseCase $deletePopularUseCase;
//  product items
    private GetAllProductsUseCase $allProductsUseCase;
    private DeleteProductUseCase $deleteProductUseCase;
    private CreateProductUseCase $createProductUseCase;
    private UpdateProductUseCase $updateProductUseCase;
    private UploadImageIdProductUseCase $uploadImageIdProductUseCase;
    private SetByStorageImageProductUseCase $setByStorageImageProductUseCase;
    private UpdateProductVisibleUseCase $updateProductVisibleUseCase;
//  stocks items
    private GetAllStocksUseCase $allStocksUseCase;
    private DeleteStocksUseCase $deleteStocksUseCase;
    private CreateStocksUseCase $createStocksUseCase;
    private UpdateStocksUseCase $updateStocksUseCase;
    private UploadImageIdStocksUseCase $uploadImageIdStocksUseCase;
    private SetByStorageImageStockUseCase $setByStorageImageStockUseCase;
    private UpdateProductPriceWithDiscount $updateProductPriceWithDiscount;



    public function __construct($id, $module,
    //  popular items
        GetAllPopularUseCase $allPopularUseCase,
        CreatePopularUseCase $createPopularUseCase,
        UpdatePopularUseCase $updatePopularUseCase,
        SetByStorageImageUseCase $setByStorageImageUseCase,
        UploadImageIdPopularUseCase $uploadImageIdPopularUseCase,
        DeletePopularUseCase $deletePopularUseCase,
    //  product items
        GetAllProductsUseCase $allProductsUseCase,
        DeleteProductUseCase $deleteProductUseCase,
        CreateProductUseCase $createProductUseCase,
        UpdateProductUseCase $updateProductUseCase,
        UploadImageIdProductUseCase $uploadImageIdProductUseCase,
        SetByStorageImageProductUseCase $setByStorageImageProductUseCase,
        UpdateProductVisibleUseCase $updateProductVisibleUseCase,
    //  stocks items
        GetAllStocksUseCase $allStocksUseCase,
        DeleteStocksUseCase $deleteStocksUseCase,
        CreateStocksUseCase $createStocksUseCase,
        UpdateStocksUseCase $updateStocksUseCase,
        UploadImageIdStocksUseCase $uploadImageIdStocksUseCase,
        SetByStorageImageStockUseCase $setByStorageImageStockUseCase,
        UpdateProductPriceWithDiscount $updateProductPriceWithDiscount

    )

    {
        parent::__construct($id, $module);
    //  popular items
        $this->allPopularUseCase = $allPopularUseCase;
        $this->createPopularUseCase = $createPopularUseCase;
        $this->updatePopularUseCase = $updatePopularUseCase;
        $this->setByStorageImageUseCase = $setByStorageImageUseCase;
        $this->uploadImageIdPopularUseCase= $uploadImageIdPopularUseCase;
        $this->deletePopularUseCase= $deletePopularUseCase;
    //  product items
        $this->allProductsUseCase = $allProductsUseCase;
        $this->deleteProductUseCase=$deleteProductUseCase;
        $this->createProductUseCase=$createProductUseCase;
        $this->updateProductUseCase=$updateProductUseCase;
        $this->uploadImageIdProductUseCase=$uploadImageIdProductUseCase;
        $this->setByStorageImageProductUseCase=$setByStorageImageProductUseCase;
        $this->updateProductPriceWithDiscount=$updateProductPriceWithDiscount;
        $this->updateProductVisibleUseCase=$updateProductVisibleUseCase;
    //  stocks items
        $this->allStocksUseCase = $allStocksUseCase;
        $this->deleteStocksUseCase=$deleteStocksUseCase;
        $this->createStocksUseCase=$createStocksUseCase;
        $this->updateStocksUseCase=$updateStocksUseCase;
        $this->uploadImageIdStocksUseCase=$uploadImageIdStocksUseCase;
        $this->setByStorageImageStockUseCase=$setByStorageImageStockUseCase;

    }

    public function behaviors(): array
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CompositeAuth::class,
            'authMethods' => [
                HttpBearerAuth::class,
            ],
        ];
        return $behaviors;
    }

    public function actionIndex():array {
        return [

            'products' => $this->allProductsUseCase->execute(),
//            'populars' => $this->allPopularUseCase->execute(),
        ];
    }
    public function actionGetStocks():array {
        return [
            'stocks' => $this->allStocksUseCase->execute(),
        ];
    }

    public function actionDeletePopular(): array
    {
        $popularId = Yii::$app->request->post('id');

        if (empty($popularId)) {
            return [
                'error' => true,
                'delete' => false,
            ];
        }

        $status = $this->deletePopularUseCase->execute($popularId);

        if ($status) {
            return [
                'error' => false,
                'delete' => true,
            ];
        }

        return [
            'error' => true,
            'delete' => false,
        ];
    }

    public function actionInsertPopular(): array
    {
        $model = new PopularForm();

        if ($model->load(Yii::$app->request->post(), '') && $model->validate() || Yii::$app->request->isPost) {
            extract(Yii::$app->request->post());
            $image = $this->setByStorageImageUseCase->execute();
            $this->createPopularUseCase->execute($title, $description, $price,$image);

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

    public function actionUpdatePopular(): array
    {
        $model = new PopularForm();
        $status = false;
        if ($model->load(Yii::$app->request->post(), '') && $model->validate() || Yii::$app->request->isPost) {
            extract(Yii::$app->request->post());
            $this->updatePopularUseCase->execute($id, $title, $description, $price);
            $path = $this->setByStorageImageUseCase->execute();
            $id = Yii::$app->request->post('id');
            $id = $id ? trim($id) : '';
            $status = $this->uploadImageIdPopularUseCase->execute($path, $id);
        }
            if ($status) {
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
    /**
     * @throws StaleObjectException
     * @throws \Throwable
     */
    public function actionDeleteProduct(): array
    {
        $productId = Yii::$app->request->post('product_id');

        if (empty($productId)) {
            return [
                'error' => true,
                'delete' => false,
            ];
        }

        $status = $this->deleteProductUseCase->execute($productId);

        if ($status) {
            return [
                'error' => false,
                'delete' => true,
            ];
        }

        return [
            'error' => true,
            'delete' => false,
        ];
    }

    public function actionInsertProduct(): array
    {
        $model = new ProductForm();

        if ($model->load(Yii::$app->request->post(), '') && $model->validate() || Yii::$app->request->isPost) {
            extract(Yii::$app->request->post());
            $image = $this->setByStorageImageProductUseCase->execute();
            $status = $this->createProductUseCase->execute($title, $description, $price, $image, $category_id);
            if ($status && $image !== '') {
                return [
                    'error' => false,
                    'send' => true,
                ];
            }
        }
            return [
                'error' => true,
                'send' => false,
            ];
    }

    public function actionUpdateProduct(): array
    {
        $model = new ProductForm();
        $status = false;

        if ($model->load(Yii::$app->request->post(), '') && $model->validate() || Yii::$app->request->isPost) {
            extract(Yii::$app->request->post());

            $this->updateProductUseCase->execute($product_id, $title, $description, $price);

            $path = $this->setByStorageImageProductUseCase->execute();

            if (!empty($path)) {
                $id = Yii::$app->request->post('product_id');
                $id = $id ? trim($id) : '';

                $status = $this->uploadImageIdProductUseCase->execute($path, $id);
            } else {
                $status = true;
            }
        }

        if ($status) {
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


    public function actionDeleteStock(): array
    {
        $stock_id = Yii::$app->request->post('stock_id');

        if (empty($stock_id)) {
            return [
                'error' => true,
                'delete' => false,
                "id"=> $stock_id
            ];
        }

        $status = $this->deleteStocksUseCase->execute($stock_id);


        if ($status) {
            return [
                'error' => false,
                'delete' => true,
                'status' => $status
            ];
        }

        return [
            'error' => true,
            'delete' => false,
        ];
    }
    public function actionInsertStock(): array
    {
        $model = new StockForm();

        if ($model->load(Yii::$app->request->post(), '') && $model->validate() || Yii::$app->request->isPost) {
            extract(Yii::$app->request->post());
            $image = $this->setByStorageImageStockUseCase->execute();
            $status = $this->createStocksUseCase->execute($image, $product_id);
            if ($status && $image !== '') {
                return [
                    'error' => false,
                    'send' => true,
                    'image' => $image,
                    'status'=> $status
                ];
            }
        }
        return [
            'error' => true,
            'send' => false,
            'image' => $image,
            'status'=> $status
        ];
    }

    public function actionUpdateVisible(): array
    {
        $model = new StockForm();

        if ($model->load(Yii::$app->request->post(), '') && $model->validate() || Yii::$app->request->isPost) {
            extract(Yii::$app->request->post());
            $this->updateProductVisibleUseCase->execute($product_id, $visible);
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




    public function actionUpdateStock(): array
    {
        $model = new StockForm();
        $status = false;
        if ($model->load(Yii::$app->request->post(), '') && $model->validate() || Yii::$app->request->isPost) {
            extract(Yii::$app->request->post());
            $this->updateProductPriceWithDiscount->execute($product_id, $discount);
            $this->updateStocksUseCase->execute($stock_id, $discount);
            $path = $this->setByStorageImageStockUseCase->execute();

            if (!empty($path)) {
                $id = Yii::$app->request->post('stock_id');
                $id = $id ? trim($id) : '';

                $status = $this->uploadImageIdStocksUseCase->execute($path, $id);
            } else {
                $status = true;
            }
        }
        if ($status) {
            return [
                'error' => false,
                'send' => true,
                'status1' => $status,
            ];
        }
        return [
            'error' => true,
            'send' => false,
            'path' => $path,
            'status1' => $status,
        ];

    }

}