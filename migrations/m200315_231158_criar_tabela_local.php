<?php

use yii\db\Migration;

/**
 * Class m200315_231158_criar_tabela_local
 */
class m200315_231158_criar_tabela_local extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('{{%LOCAL}}', [
            'LOCAL_COD_PK' => $this->primaryKey(),
            'LOCAL_NOME' => $this->string(100)->notNull(),
            'LOCAL_ENDERECO' => $this->string(100)->notNull(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        /*
        echo "m200315_231158_criar_tabela_local cannot be reverted.\n";

        return false;
        */
        $this->dropTable('{{%LOCAL}}');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200315_231158_criar_tabela_local cannot be reverted.\n";

        return false;
    }
    */
}
