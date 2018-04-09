<?php
/**
 * Created by PhpStorm.
 * User: gilso_nb9zlec
 * Date: 01/04/2018
 * Time: 23:49
 */

namespace app\models;


use yii\db\ActiveRecord;

class Customer extends ActiveRecord
{
    public static function tableName()
    {
        return "customer";
    }

    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['id' => 'product_id'])
            ->viaTable('customer_product', ['customer_id' => 'id']);
    }

    public function getItems()
    {
        //relacao hasMany
    }
    public function getItemsProducts()
    {
        return $this->hasMany(Product::className(), ['id' => 'product_id'])
            ->via('items');
    }

}