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
            'EQUIPAMENTO_NOME','EQUIPAMENTO_NUM_SERIE','LOCAL_COD_FK' ,'EQUIPAMENTO_HISTORICO_LOCAL' 
        ],[
            [
                'Computador desktop', 
                'DGTI-32154623',
                '1',
                '3;18/03/2020;1;18/03/2020;3;18/03/2020;5;18/03/2020;6;18/03/2020;1;18/03/2020;4;18/03/2020;',
            ],
            [
                'Impressora', 
                'DGTI-78998524',
                '5',
                '10;18/03/2020;100;18/03/2020;385;18/03/2020;59;18/03/2020;46;18/03/2020;122;18/03/2020;74;18/03/2020;',
            ],
            [
                'Roteador', 
                'DGTI-96963252',
                '2',
                '410;18/03/2020;180;18/03/2020;325;18/03/2020;39;18/03/2020;112;18/03/2020;272;18/03/2020;174;18/03/2020;',
            ],
            [
                'No break', 
                'DGTI-96321472',
                '7',
                '210;18/03/2020;18;18/03/2020;',
            ],
            [
                'Monitor', 
                'DGTI-42573695',
                '2',
                '27;18/03/2020;88;18/03/2020;',
            ],
            [
                'Scanner', 
                'DGTI-78233454',
                '4',
                '310;18/03/2020;180;18/03/2020;',
            ],
            [
                'HD', 
                'DGTI-73546825',
                '10',
                '370;18/03/2020;508;18/03/2020;',
            ],
            [
                'Memória RAM', 
                'DGTI-79654821',
                '20',
                '500;18/03/2020;518;18/03/2020;',
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
