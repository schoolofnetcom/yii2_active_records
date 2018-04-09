<?php
/**
 * Created by PhpStorm.
 * User: gilso_nb9zlec
 * Date: 01/04/2018
 * Time: 22:23
 */

namespace app\models;


use yii\db\ActiveRecord;

class Company extends ActiveRecord
{
    public static function tableName()
    {
        return 'company';
    }

    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['company_id' => 'id']);
    }
}