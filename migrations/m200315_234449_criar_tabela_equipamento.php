<?php

use yii\db\Migration;

/**
 * Class m200315_234449_criar_tabela_equipamento
 */
class m200315_234449_criar_tabela_equipamento extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%EQUIPAMENTO}}', [
            'EQUIPAMENTO_COD_PK' => $this->primaryKey(),
            'EQUIPAMENTO_NOME' => $this->string(100)->notNull(),
            'EQUIPAMENTO_NUM_SERIE' => $this->string(100)->notNull(),
            'LOCAL_COD_FK' => $this->integer()->notNull(),
        ]);
        
        $this->addForeignKey('EQUIPAMENTO_LOCAL_LOCALCODPK','{{%EQUIPAMENTO}}','LOCAL_COD_FK','{{%LOCAL}}','LOCAL_COD_PK');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        /*
        echo "m200315_234449_criar_tabela_equipamento cannot be reverted.\n";

        return false;
        */
        $this->dropTable('{{%EQUIPAMENTO}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200315_234449_criar_tabela_equipamento cannot be reverted.\n";

        return false;
    }
    */
}
