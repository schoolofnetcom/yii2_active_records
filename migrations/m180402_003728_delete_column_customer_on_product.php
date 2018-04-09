<?php

use yii\db\Migration;

/**
 * Class m180402_003728_delete_column_customer_on_product
 */
class m180402_003728_delete_column_customer_on_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk_customer_product', 'product');
        $this->dropColumn('product', 'customer_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180402_003728_delete_column_customer_on_product cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180402_003728_delete_column_customer_on_product cannot be reverted.\n";

        return false;
    }
    */
}
