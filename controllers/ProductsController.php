<?php
/**
 * Created by PhpStorm.
 * User: gilso_nb9zlec
 * Date: 01/04/2018
 * Time: 22:36
 */

namespace app\controllers;


use app\models\Customer;
use app\models\Product;
use yii\helpers\VarDumper;
use yii\web\Controller;

class ProductsController extends Controller
{
    public function actionIndex()
    {
        $products = Product::find()->select('id, name, release_date')
            ->asArray()
            ->all();

        VarDumper::dump($products, 10, true);
        exit;

        foreach ($products as $product) {
            echo $product['name'] . "<br>";
        }
    }

    public function actionVer($id)
    {
//        $product = Product::find()->where(['id' => $id])->one();

        $product = Product::findOne(['id' => $id]);

        echo $product->id . '<br>';
        echo $product->name . '<br>';
        echo $product->release_date . '<br>';
        echo $product->empresa->name . '<br>';
        echo $product->description;

//        VarDumper::dump($product, 10, true);
    }

    public function actionSalvar()
    {
        $dados = [
            'name' => "Celular",
            'release_date' => '2017-05-29',
            'description' => "Um celular bacana",
            'company_id' => 3
        ];

        \Yii::$app->request->post();

        $product = new Product();
        $product->setAttributes($dados);
        $product->save();
    }

    public function actionCustomers()
    {
        $customer = Customer::findOne(['id' => 1]);
        $products = $customer->products;

        VarDumper::dump($products, 10, true);exit;
    }

    public function actionQuery()
    {
        $product = Product::find()->byCompany(3)->all();

        Product::find()->products();

        VarDumper::dump($product, 10, true);
        exit;
    }
}