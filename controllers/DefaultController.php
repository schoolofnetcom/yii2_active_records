<?php

namespace app\controllers;

use Yii;
use yii\db\Query;
use yii\helpers\VarDumper;
use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $companies = Yii::$app->db->createCommand("select * from company")->queryAll();

        foreach($companies as $company) {
            echo $company['id'] . " - "  . $company['name'] . "<br>";
        }
    }

    public function actionCompany($id)
    {
//        $company = Yii::$app->db->createCommand("select * from company where id = 1")->queryOne();
//        $company = Yii::$app->db->createCommand("select name from company")->queryColumn();
//        $company = Yii::$app->db->createCommand("select count(id) as qts from company")->queryScalar();

//        $company = Yii::$app->db->createCommand("select * from company where id = :id")
//            ->bindValue(":id", $id)
//            ->queryOne();

        $company = Yii::$app->db->createCommand("select * from company where id = :id", [
            ':id' => $id
        ])->queryOne();

        VarDumper::dump($company, 10, true);
    }

    public function actionJoin()
    {
        $sql = "select p.name as product, p.release_date, c.name as company from product p
                  inner join company c on p.company_id = c.id
        ";

        $products = Yii::$app->db->createCommand($sql)->queryAll();

        foreach ($products as $product) {
            echo $product['product'] . ", " . $product['release_date'] . ", " . $product['company'] . "<br>";
        }

    }

    public function actionUpdate()
    {
        //Yii::$app->db->createCommand("update company set name = 'Google' where id = 1")->execute();

        Yii::$app->db->createCommand()->update('company', ['name' => 'Microsoft'], "id = 2")->execute();
    }

    public function actionInsert()
    {
        Yii::$app->db->createCommand()->insert('company',
            ['name' => "School of net"]
        )->execute();
    }

    public function actionDelete()
    {
        Yii::$app->db->createCommand()->delete('company', 'id = 11')->execute();
    }

    public function actionBatchInsert()
    {
        Yii::$app->db->createCommand()->batchInsert('company', ['name'],
            [
                ['School of net'],
                ['Uber'],
                ['Spotify']
            ]
        )->execute();
    }

    public function actionTransaction()
    {
        $sql1 = "update company set name = 'Teste' where id = 1";
        $sql2 = "update company_errado set name = 'Teste 2' where id = 2";

        $db = Yii::$app->db;
        $t = $db->beginTransaction();

        try {
            $db->createCommand($sql1)->execute();
            $db->createCommand($sql2)->execute();
            $t->commit();
        } catch (\Exception $e) {
            $t->rollBack();
            throw $e;
        }


//        $db->createCommand($sql1)->execute();
//        $db->createCommand($sql2)->execute();
//
//        //$t->rollBack();
//        $t->commit();
    }

    public function actionConsulta()
    {
        $q = new Query();
        $rows = $q->select(['p.id', 'p.name as product', 'p.release_date', 'c.name as company'])
            ->from('product p')
            ->join('company c', 'p.company_id = c.id')
            ->where(['or like', 'p.name', ['wine', 'fish']])
                ->andWhere(['>', 'p.id', 30])
//            ->limit(4)
                ->orderBy('p.name desc')
            ->all();

        VarDumper::dump($rows, 10, true);

    }
}