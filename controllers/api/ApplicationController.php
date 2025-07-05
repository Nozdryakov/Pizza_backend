<?php

namespace app\controllers\api;

use app\features\areas\implementationRepository\AreaRepository;
use app\features\areas\interfaceRepository\IAreaRepository;
use app\features\areas\usecase\GetListAreaUseCase;
use app\features\product\usecase\GetListPopularsProductsUseCase;
use app\models\Address;
use app\models\Order;
use app\models\Product;
use app\models\User;
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
    private GetListPopularsProductsUseCase $getListPopularsProductsUseCase;
    private GetListAreaUseCase $getListAreaUseCase;

    public function __construct($id, $module,
        GetAllStocksUseCase $allStocksUseCase,
        GetAllPopularUseCase $allPopularUseCase,
        GetAllProductsUseCase $allProductsUseCase,
        SendMailUseCase $mailUseCase,
        GetListPopularsProductsUseCase $getListPopularsProductsUseCase,
        GetListAreaUseCase $getListAreaUseCase


    )
    {
       parent::__construct($id, $module);
       $this->allStocksUseCase = $allStocksUseCase;
       $this->allPopularUseCase = $allPopularUseCase;
       $this->allProductsUseCase = $allProductsUseCase;
       $this->mailUseCase = $mailUseCase;
       $this->getListPopularsProductsUseCase = $getListPopularsProductsUseCase;
       $this->getListAreaUseCase = $getListAreaUseCase;

    }

    public function actionIndex():array {
        return [
            'products' => $this->allProductsUseCase->execute(),
        ];
    }
    public function actionGetStocks():array{
        return [
            'stocks' => $this->allStocksUseCase->execute(),
        ];

    }
    public function actionGetPopulars():array
    {
        return [
            'populars' => $this->getListPopularsProductsUseCase->execute()
        ];
    }
    public function actionGetAreas():array
    {
        return [
          'areas' => $this->getListAreaUseCase->execute()
        ];
    }
    public function actionGetOrderGuest(): array {
        // Get orders grouped by phone number with distinct total costs, filtered by address_id = 1
        $orders = Order::find()
            ->select([
                'phoneNumber',
                'totalCost as total_cost', // Include totalCost as total_cost
                'nameUser as nameUser',
                'admin_accsess as admin_accsess'
            ])
            ->where(['address_id' => 1]) // Add this condition to filter by address_id = 1
            ->distinct()
            ->asArray()
            ->all();

        // Add product names and their count to each order
        foreach ($orders as &$order) {
            // Get products with their counts from the current order, filtered by address_id = 1
            $products = Order::find()
                ->select([
                    'product.title',
                    'orders.count as product_count'
                ])
                ->where(['orders.phoneNumber' => $order['phoneNumber'], 'orders.address_id' => 1]) // Add this condition to filter by address_id = 1
                ->joinWith('product')
                ->asArray()
                ->all();

            // Collect product details in an array
            $productDetails = [];
            foreach ($products as $product) {
                $productDetails[] = [
                    'title' => $product['title'],
                    'count' => $product['product_count']
                ];
            }

            // Add products to the current order
            $order['products'] = $productDetails;
        }

        return [
            'data' => $orders
        ];
    }
    public function actionGetOrderGuestKitchen(): array {
        // Get orders grouped by phone number with distinct total costs, filtered by address_id = 1
        $orders = Order::find()
            ->select([
                'phoneNumber',
                'totalCost as total_cost', // Include totalCost as total_cost
                'nameUser as nameUser',
                'admin_accsess as admin_accsess',
                'kitchen_accsess as kitchen_accsess'
            ])
            ->where(['address_id' => 1, 'admin_accsess' => 1]) // Add this condition to filter by address_id = 1
            ->distinct()
            ->asArray()
            ->all();

        // Add product names and their count to each order
        foreach ($orders as &$order) {
            // Get products with their counts from the current order, filtered by address_id = 1
            $products = Order::find()
                ->select([
                    'product.title',
                    'orders.count as product_count'
                ])
                ->where(['orders.phoneNumber' => $order['phoneNumber'], 'orders.address_id' => 1]) // Add this condition to filter by address_id = 1
                ->joinWith('product')
                ->asArray()
                ->all();

            // Collect product details in an array
            $productDetails = [];
            foreach ($products as $product) {
                $productDetails[] = [
                    'title' => $product['title'],
                    'count' => $product['product_count']
                ];
            }

            // Add products to the current order
            $order['products'] = $productDetails;
        }

        return [
            'data' => $orders
        ];
    }
    public function actionGetOrderGuestCourier(): array {
        // Get orders grouped by phone number with distinct total costs, filtered by address_id = 1
        $orders = Order::find()
            ->select([
                'phoneNumber',
                'totalCost as total_cost', // Include totalCost as total_cost
                'nameUser as nameUser',
                'admin_accsess as admin_accsess',
                'kitchen_accsess as kitchen_accsess',
                'courier_accsess as courier_accsess'
            ])
            ->where(['address_id' => 1, 'kitchen_accsess' => 1]) // Add this condition to filter by address_id = 1
            ->distinct()
            ->asArray()
            ->all();

        // Add product names and their count to each order
        foreach ($orders as &$order) {
            // Get products with their counts from the current order, filtered by address_id = 1
            $products = Order::find()
                ->select([
                    'product.title',
                    'orders.count as product_count'
                ])
                ->where(['orders.phoneNumber' => $order['phoneNumber'], 'orders.address_id' => 1]) // Add this condition to filter by address_id = 1
                ->joinWith('product')
                ->asArray()
                ->all();

            // Collect product details in an array
            $productDetails = [];
            foreach ($products as $product) {
                $productDetails[] = [
                    'title' => $product['title'],
                    'count' => $product['product_count']
                ];
            }

            // Add products to the current order
            $order['products'] = $productDetails;
        }

        return [
            'data' => $orders
        ];
    }
    public function actionGetOrderUser(): array {
        // Get orders grouped by phone number with distinct total costs, filtered by address_id = 1
        $orders = Order::find()
            ->select([
                'phoneNumber',
                'totalCost as total_cost', // Include totalCost as total_cost
                'nameUser as nameUser',
                'admin_accsess as admin_accsess'
            ])
            ->where(['address_id' => null]) // Add this condition to filter by address_id = 1
            ->distinct()
            ->asArray()
            ->all();

        // Add product names and their count to each order
        foreach ($orders as &$order) {
            // Get products with their counts from the current order, filtered by address_id = 1
            $products = Order::find()
                ->select([
                    'product.title',
                    'orders.count as product_count'
                ])
                ->where(['orders.phoneNumber' => $order['phoneNumber'], 'orders.address_id' => null]) // Add this condition to filter by address_id = 1
                ->joinWith('product')
                ->asArray()
                ->all();

            // Collect product details in an array
            $productDetails = [];
            foreach ($products as $product) {
                $productDetails[] = [
                    'title' => $product['title'],
                    'count' => $product['product_count']
                ];
            }

            // Add products to the current order
            $order['products'] = $productDetails;
        }

        return [
            'data' => $orders
        ];
    }

    public function actionGetOrderUserKitchen(): array {
        // Get orders grouped by phone number with distinct total costs, filtered by address_id = 1
        $orders = Order::find()
            ->select([
                'phoneNumber',
                'totalCost as total_cost', // Include totalCost as total_cost
                'nameUser as nameUser',
                'admin_accsess as admin_accsess',
                'kitchen_accsess as kitchen_accsess'
            ])
            ->where(['address_id' => null, 'admin_accsess' => 1]) // Add this condition to filter by address_id = 1
            ->distinct()
            ->asArray()
            ->all();

        // Add product names and their count to each order
        foreach ($orders as &$order) {
            // Get products with their counts from the current order, filtered by address_id = 1
            $products = Order::find()
                ->select([
                    'product.title',
                    'orders.count as product_count'
                ])
                ->where(['orders.phoneNumber' => $order['phoneNumber'], 'orders.address_id' => null]) // Add this condition to filter by address_id = 1
                ->joinWith('product')
                ->asArray()
                ->all();

            // Collect product details in an array
            $productDetails = [];
            foreach ($products as $product) {
                $productDetails[] = [
                    'title' => $product['title'],
                    'count' => $product['product_count']
                ];
            }

            // Add products to the current order
            $order['products'] = $productDetails;
        }

        return [
            'data' => $orders
        ];
    }
public  function actionGetStatusOrder(): array
{
    Yii::$app->response->format = Response::FORMAT_JSON;
    $phoneNumber = Yii::$app->request->post('phoneNumber');

    try {
        $order = Order::find()
            ->select([
                'admin_accsess',
                'kitchen_accsess',
                'courier_accsess'
            ])
            ->where(['phoneNumber' => $phoneNumber])
            ->asArray()
            ->one();

        if ($order === null) {
            return [
                'error' => true,
                'message' => 'No records found for the given phone number.'
            ];
        }

        return [
            'error' => false,
            'data' => $order
        ];
    } catch (\Exception $e) {
        return [
            'error' => true,
            'message' => $e->getMessage()
        ];
    }
}
    public function actionGetOrderUserCourier(): array {
        // Get orders grouped by phone number with distinct total costs, filtered by address_id = 1
        $orders = Order::find()
            ->select([
                'phoneNumber',
                'totalCost as total_cost', // Include totalCost as total_cost
                'nameUser as nameUser',
                'admin_accsess as admin_accsess',
                'kitchen_accsess as kitchen_accsess',
                'courier_accsess as courier_accsess'

            ])
            ->where(['address_id' => null, 'kitchen_accsess' => 1]) // Add this condition to filter by address_id = 1
            ->distinct()
            ->asArray()
            ->all();

        // Add product names and their count to each order
        foreach ($orders as &$order) {
            // Get products with their counts from the current order, filtered by address_id = 1
            $products = Order::find()
                ->select([
                    'product.title',
                    'orders.count as product_count'
                ])
                ->where(['orders.phoneNumber' => $order['phoneNumber'], 'orders.address_id' => null]) // Add this condition to filter by address_id = 1
                ->joinWith('product')
                ->asArray()
                ->all();

            // Collect product details in an array
            $productDetails = [];
            foreach ($products as $product) {
                $productDetails[] = [
                    'title' => $product['title'],
                    'count' => $product['product_count']
                ];
            }

            // Add products to the current order
            $order['products'] = $productDetails;
        }

        return [
            'data' => $orders
        ];
    }

    public function actionGetStatusUser(): array {
        // Get orders grouped by phone number with distinct total costs, filtered by address_id = 1
        $orders = Order::find()
            ->select([
                'phoneNumber',
                'totalCost as total_cost', // Include totalCost as total_cost
                'nameUser as nameUser',
                'admin_accsess as admin_accsess',
                'kitchen_accsess as kitchen_accsess',
                'courier_accsess as courier_accsess'

            ])
            ->where(['address_id' => null]) // Add this condition to filter by address_id = 1
            ->distinct()
            ->asArray()
            ->all();

        // Add product names and their count to each order
        foreach ($orders as &$order) {
            // Get products with their counts from the current order, filtered by address_id = 1
            $products = Order::find()
                ->select([
                    'product.title',
                    'orders.count as product_count'
                ])
                ->where(['orders.phoneNumber' => $order['phoneNumber'], 'orders.address_id' => null]) // Add this condition to filter by address_id = 1
                ->joinWith('product')
                ->asArray()
                ->all();

            // Collect product details in an array
            $productDetails = [];
            foreach ($products as $product) {
                $productDetails[] = [
                    'title' => $product['title'],
                    'count' => $product['product_count']
                ];
            }

            // Add products to the current order
            $order['products'] = $productDetails;
        }

        return [
            'data' => $orders
        ];
    }

    public function actionUpdateAdminAccess(): array
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $phoneNumber = Yii::$app->request->post('phoneNumber');

        if ($phoneNumber) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                // Обновляем поле admin_accsess на 1 для всех записей с указанным номером телефона
                $updateCount = Order::updateAll(['admin_accsess' => 1], ['phoneNumber' => $phoneNumber]);

                if ($updateCount === 0) {
                    throw new \Exception('No records updated. Check the phone number.');
                }

                $transaction->commit();
                return [
                    'error' => false,
                    'updated' => true,
                    'message' => 'All relevant records updated successfully.'
                ];
            } catch (\Exception $e) {
                $transaction->rollBack();
                return [
                    'error' => true,
                    'updated' => false,
                    'message' => $e->getMessage()
                ];
            }
        } else {
            return [
                'error' => true,
                'updated' => false,
                'message' => 'No phone number provided'
            ];
        }
    }

    public function actionKitchenAccess(): array
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $phoneNumber = Yii::$app->request->post('phoneNumber');

        if ($phoneNumber) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                // Обновляем поле admin_accsess на 1 для всех записей с указанным номером телефона
                $updateCount = Order::updateAll(['kitchen_accsess' => 1], ['phoneNumber' => $phoneNumber]);

                if ($updateCount === 0) {
                    throw new \Exception('No records updated. Check the phone number.');
                }

                $transaction->commit();
                return [
                    'error' => false,
                    'updated' => true,
                    'message' => 'All relevant records updated successfully.'
                ];
            } catch (\Exception $e) {
                $transaction->rollBack();
                return [
                    'error' => true,
                    'updated' => false,
                    'message' => $e->getMessage()
                ];
            }
        } else {
            return [
                'error' => true,
                'updated' => false,
                'message' => 'No phone number provided'
            ];
        }
    }
    public function actionCourierAccess(): array
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $phoneNumber = Yii::$app->request->post('phoneNumber');

        if ($phoneNumber) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                // Обновляем поле admin_accsess на 1 для всех записей с указанным номером телефона
                $updateCount = Order::updateAll(['courier_accsess' => 1], ['phoneNumber' => $phoneNumber]);

                if ($updateCount === 0) {
                    throw new \Exception('No records updated. Check the phone number.');
                }

                $transaction->commit();
                return [
                    'error' => false,
                    'updated' => true,
                    'message' => 'All relevant records updated successfully.'
                ];
            } catch (\Exception $e) {
                $transaction->rollBack();
                return [
                    'error' => true,
                    'updated' => false,
                    'message' => $e->getMessage()
                ];
            }
        } else {
            return [
                'error' => true,
                'updated' => false,
                'message' => 'No phone number provided'
            ];
        }
    }
    public function actionUpdateAdminAccessZero(): array
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $phoneNumber = Yii::$app->request->post('phoneNumber');

        if ($phoneNumber) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                // Обновляем поле admin_accsess на 1 для всех записей с указанным номером телефона
                $updateCount = Order::updateAll(['admin_accsess' => 0], ['phoneNumber' => $phoneNumber]);

                if ($updateCount === 0) {
                    throw new \Exception('No records updated. Check the phone number.');
                }

                $transaction->commit();
                return [
                    'error' => false,
                    'updated' => true,
                    'message' => 'All relevant records updated successfully.'
                ];
            } catch (\Exception $e) {
                $transaction->rollBack();
                return [
                    'error' => true,
                    'updated' => false,
                    'message' => $e->getMessage()
                ];
            }
        } else {
            return [
                'error' => true,
                'updated' => false,
                'message' => 'No phone number provided'
            ];
        }
    }
    public function actionKitchenAccessZero(): array
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $phoneNumber = Yii::$app->request->post('phoneNumber');

        if ($phoneNumber) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                // Обновляем поле admin_accsess на 1 для всех записей с указанным номером телефона
                $updateCount = Order::updateAll(['kitchen_accsess' => 0], ['phoneNumber' => $phoneNumber]);

                if ($updateCount === 0) {
                    throw new \Exception('No records updated. Check the phone number.');
                }

                $transaction->commit();
                return [
                    'error' => false,
                    'updated' => true,
                    'message' => 'All relevant records updated successfully.'
                ];
            } catch (\Exception $e) {
                $transaction->rollBack();
                return [
                    'error' => true,
                    'updated' => false,
                    'message' => $e->getMessage()
                ];
            }
        } else {
            return [
                'error' => true,
                'updated' => false,
                'message' => 'No phone number provided'
            ];
        }
    }

    public function actionCourierAccessZero(): array
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $phoneNumber = Yii::$app->request->post('phoneNumber');

        if ($phoneNumber) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $updateCount = Order::updateAll(['courier_accsess' => 0], ['phoneNumber' => $phoneNumber]);

                if ($updateCount === 0) {
                    throw new \Exception('No records updated. Check the phone number.');
                }

                $transaction->commit();
                return [
                    'error' => false,
                    'updated' => true,
                    'message' => 'All relevant records updated successfully.'
                ];
            } catch (\Exception $e) {
                $transaction->rollBack();
                return [
                    'error' => true,
                    'updated' => false,
                    'message' => $e->getMessage()
                ];
            }
        } else {
            return [
                'error' => true,
                'updated' => false,
                'message' => 'No phone number provided'
            ];
        }
    }




    public function actionGetAddressUser(): array
    {
        $user_id = Yii::$app->request->post('user_id');
        $users = User::find()
            ->select(['user_id', 'email'])
            ->where(['user_id' => $user_id]) // Только id и email
            ->with([
                'addresses' => function ($query) {
                    $query->select(['address_id', 'area_id', 'nameUser', 'phoneNumber', 'dom', 'kvartira', 'podezd', 'poverh', 'type_delivery', 'streetVal', 'paymentMethod', 'user_id'])
                        ->with([
                            'area' => function ($query) {
                                $query->select(['area_id', 'title']); // Обязательно включите area_id
                            }
                        ]);
                },
                'addresses.orders' => function ($query) {
                    $query->select(['order_id', 'address_id', 'price', 'count', 'admin_accsess', 'kitchen_accsess', 'courier_accsess', 'product_id']);
                },
                'addresses.orders.product' => function ($query) {
                    $query->select(['product_id', 'title']); // Только id и title
                }
            ])
            ->asArray() // Преобразовать результат в массив
            ->all();

        return [
            'data' => $users
        ];
    }
    public function actionSendAddressUser(): array
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $data = Yii::$app->request->post('data');

        if ($data) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $address = new Address();
                $address->area_id = $data['area_id'];
                $address->phoneNumber = $data['phoneNumber'];
                $address->nameUser = $data['nameUser'];
                $address->dom = $data['dom'];
                $address->kvartira = $data['kvartira'];
                $address->podezd = $data['podezd'];
                $address->poverh = $data['poverh'];
                $address->type_delivery = $data['type_delivery'];
                $address->streetVal = $data['streetVal'];
                $address->paymentMethod = $data['paymentMethod'];
                $address->user_id = $data['user_id'];

                // Логирование перед сохранением
                Yii::info('Address data: ' . json_encode($address->attributes), 'debug');

                if (!$address->save()) {
                    throw new \Exception('Error saving address: ' . json_encode($address->errors));
                }

                $transaction->commit();
                return [
                    'error' => false,
                    'send' => true,
                    'data' => $data
                ];
            } catch (\Exception $e) {
                $transaction->rollBack();
                return [
                    'error' => true,
                    'send' => false,
                    'message' => $e->getMessage()
                ];
            }
        } else {
            return [
                'error' => true,
                'send' => false,
                'message' => 'No data received'
            ];
        }
    }
    public function actionSendOrder(): array
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $data = Yii::$app->request->post('data');

        if ($data) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                foreach ($data as $item) {
                    $order = new Order();
                    $order->product_id = $item['product_id'];
                    $order->price = $item['price'];
                    $order->phoneNumber = $item['phoneNumber'];
                    $order->area_id = $item['area_id'];
                    $order->streetVal = $item['streetVal'];
                    $order->dom = $item['dom'];
                    $order->kvartira = $item['kvartira'];
                    $order->podezd = $item['podezd'];
                    $order->poverh = $item['poverh'];
                    $order->totalCost = $item['totalCost'];
                    $order->type_delivery= $item['type_delivery'];
                    $order->nameUser = $item['nameUser'];
                    $order->paymentMethod = $item['paymentMethod'];
                    $order->count = $item['count'];
                    $order->address_id = $item['address_id'];

                    if (!$order->save()) {
                        throw new \Exception('Error saving order: ' . json_encode($order->errors));
                    }
                }
                $transaction->commit();
                return [
                    'error' => false,
                    'send' => true,
                    'data' => $data
                ];
            } catch (\Exception $e) {
                $transaction->rollBack();
                return [
                    'error' => true,
                    'send' => false,
                    'message' => $e->getMessage()
                ];
            }
        } else {
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


