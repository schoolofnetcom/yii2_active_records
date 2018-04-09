<?php

use yii\db\Migration;

/**
 * Class m180401_002159_add_column_customer_id_product_table
 */
class m180401_002159_add_column_customer_id_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('product', 'customer_id', 'int(11)');

        $this->addForeignKey('fk_customer_product', 'product', 'customer_id', 'customer', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180401_002159_add_column_customer_id_product_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180401_002159_add_column_customer_id_product_table cannot be reverted.\n";

        return false;
    }
    */
}
