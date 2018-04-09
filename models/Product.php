<?php
/**
 * Created by PhpStorm.
 * User: gilso_nb9zlec
 * Date: 01/04/2018
 * Time: 22:35
 */

namespace app\models;


use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName()
    {
        return "product";
    }

    public function rules() {
        return [
            [['name', 'release_date', 'description', 'company_id'], 'safe']
        ];
    }

    public function getEmpresa()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }

    public static function find()
    {
        return new ProductQuery(get_called_class());
    }

}