<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "resep_menu".
 *
 * @property int $id_resep_menu
 * @property int|null $id_menu
 * @property int|null $id_bahan
 * @property string|null $keterangan
 */
class ResepMenu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resep_menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_menu', 'id_bahan'], 'default', 'value' => null],
            [['id_menu', 'id_bahan'], 'integer'],
            [['keterangan'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_resep_menu' => 'Id Resep Menu',
            'id_menu' => 'Id Menu',
            'id_bahan' => 'Id Bahan',
            'keterangan' => 'Keterangan',
        ];
    }
}
