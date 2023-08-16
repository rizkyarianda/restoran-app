<?php

use yii\db\Migration;

/**
 * Class m230816_092051_insert_value_to_table
 */
class m230816_092051_insert_value_to_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('bahan',['id_bahan','nama_bahan'],
        [
            ['1','Nasi'],
            ['2','Telor'],
            ['3','Minyak'],
            ['4','Bawang Merah'],
            ['5','Bawang Putih'],
            ['6','Ayam'],
            ['7','Sayur Cesim'],
            ['8','Kecap'],
            ['9','Garam']

        ]);

        $this->batchInsert('kategori',['id_kategori','nama_kategori'],
        [
            ['1','Main Course'],
        ]);
        
        $this->batchInsert('menu',['id_menu','nama_menu'],
        [
            ['1','Nasi Goreng'],
        ]);
        
        $this->batchInsert('resep_menu',['id_menu','id_bahan','keterangan'],
        [
            ['1','1','1 Piring'],
            ['1','2','2 Buah'],
            ['1','3','Secukupnya'],
            ['1','4','5 siung'],
            ['1','5','Secukupnya'],
            ['1','6','5 helai'],
            ['1','7','Secukupnya'],
            ['1','8','Secukupnya'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230816_092051_insert_value_to_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230816_092051_insert_value_to_table cannot be reverted.\n";

        return false;
    }
    */
}
