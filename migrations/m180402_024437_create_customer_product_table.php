<?php

use yii\db\Migration;

/**
 * Handles the creation of table `customer_product`.
 */
class m180402_024437_create_customer_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('customer_product', [
            'customer_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
        ]);

        $this->addPrimaryKey('cust_prod', 'customer_product', ['customer_id', 'product_id']);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('customer_product');
    }
}
