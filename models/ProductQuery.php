<?php
/**
 * Created by PhpStorm.
 * User: gilso_nb9zlec
 * Date: 02/04/2018
 * Time: 00:39
 */

namespace app\models;


use yii\db\ActiveQuery;

class ProductQuery extends ActiveQuery
{
    public function byCompany($id)
    {
        return $this->andWhere(['company_id' => $id]);
    }

    public function products()
    {
        $sql = "select * from products";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }
}
