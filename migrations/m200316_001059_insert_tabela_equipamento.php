<?php

use yii\db\Migration;

/**
 * Class m200316_001059_insert_tabela_equipamento
 */
class m200316_001059_insert_tabela_equipamento extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%EQUIPAMENTO}}', [
            'EQUIPAMENTO_NOME','EQUIPAMENTO_NUM_SERIE','LOCAL_COD_FK' 
        ],[
            [
                'Computador desktop', 
                'DGTI-32154623',
                '1',
            ],
            [
                'Impressora', 
                'DGTI-78998524',
                '5',
            ],
            [
                'Roteador', 
                'DGTI-96963252',
                '2',
            ],
            [
                'No break', 
                'DGTI-96321472',
                '7',
            ],
            [
                'Monitor', 
                'DGTI-42573695',
                '2',
            ],
            [
                'Scanner', 
                'DGTI-78233454',
                '4',
            ],
            [
                'HD', 
                'DGTI-73546825',
                '10',
            ],
            [
                'Memória RAM', 
                'DGTI-79654821',
                '20',
            ],
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        /*
        echo "m200316_001059_insert_tabela_equipamento cannot be reverted.\n";

        return false;
        */
        $this->truncateTable('{{%EQUIPAMENTO}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200316_001059_insert_tabela_equipamento cannot be reverted.\n";

        return false;
    }
    */
}
