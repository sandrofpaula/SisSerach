<?php

use yii\db\Migration;

/**
 * Class m200316_002404_criar_tabela_entrada
 */
class m200316_002404_criar_tabela_entrada extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ENTRADA}}', [
            'ENTRADA_COD_PK' => $this->primaryKey(),
            'ENTRADA_OCORRENCIA' => $this->string(100)->notNull(),
            'EQUIPAMENTO_COD_FK' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('ENTRADA_EQUIP_EQUIPAMENTOCODPK','{{%ENTRADA}}','EQUIPAMENTO_COD_FK','{{%EQUIPAMENTO}}','EQUIPAMENTO_COD_PK');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        /*
        echo "m200316_002404_criar_tabela_entrada cannot be reverted.\n";

        return false;
        */
        $this->dropTable('{{%ENTRADA}}');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200316_002404_criar_tabela_entrada cannot be reverted.\n";

        return false;
    }
    */
}
